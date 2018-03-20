<?php
//Cron updating data

// funkcje + uporzadkowac kod

require_once("config.php");

$polaczenie = mysql_connect($mysql_host,$mysql_user,$mysql_password);

//brak polaczenia nie wyswietlaj strony?
if (!$polaczenie) 
	{
    die('not connected : ' . mysql_error());
	}
	else
		{
			//ok, wybierz baze
			mysql_select_db($mysql_database);
			mysql_query("set names 'utf8'");
			
			//jaki jest ostatni blok w bazie? / dostawcy bazy lubia sie desynchronizowac :( /
			$res = mysql_query("
			select timestamp
			from sbds_tx_comments
			order by timestamp desc
			limit 1");
			
			while ($row = mysql_fetch_row($res))
				{
				echo "privex base is up to:";
				echo "<br/><pre>";
				print_r($row);
				echo $wbazie = date("Y-m",strtotime($row[0]));
					file_put_contents("data/aktualne.txt", date("Y-m-d",strtotime($row[0])));
				echo "</pre>";
				}
	
			//pierwszy wpis na steemit mial miejsce 30 marca 2016, sprawdzamy wiêc istnienie cache od kwietnia 2016
			$start = "2016-04";
			$today = date("Y-m");
			$done = 0;
			
			while($done!=1)  //tylko jeden mc analizuj na raz
			{

				//ktory miesiac uaktualnic? - sprawdz ostatni wpis - timestamp + aktualny miesiac + od poczatku istnienia steem w folderze data/tags
				$data = $start;
				
				while(file_exists("data/tags/$data.json") && $data != $today && date("Y-m",strtotime($data)) < date("Y-m",strtotime($wbazie))) //current month nadpisuj dopoki sie nie skonczy AND ostatni blok w bazie aktualny!!!
				{
					$data = date('Y-m', strtotime("+1 months", strtotime($data)));
				}
				


				//okres cachowania tagow
				$x = explode('-',$data);
				$dni = date("t",mktime(0,0,0,$x[1],1,$x[0]));
				echo "sprawdzam:";
				echo $od = $data."-01";
				echo $do = $data."-".$dni;

				//pobierz poprzednie staty userow (addytywne)
				$poprzedni = date('Y-m', strtotime("-1 months", strtotime($data)));
				$users = json_decode(file_get_contents("data/users-$poprzedni.json"), true); //or previous if same month is now
				file_put_contents("data/users-previous.json", json_encode($users));

				//wybierz tagi w jsonie z bazy, unikalny permlink 
				$res = mysql_query("

				SELECT json_metadata,author FROM (
					 SELECT * FROM sbds_tx_comments 
						where
						(timestamp BETWEEN '$od 00:00:01' AND '$do 23:59:59')
						and
						(parent_permlink = 'polish' or parent_permlink like 'pl-%' or parent_permlink = 'reakcja' or parent_permlink = 'tematygodnia')
						and 
						parent_author = '' 
				) AS t1
				GROUP BY permlink
				");

				$j=0;
				while ($row = mysql_fetch_row($res))
				{
						//echo "<br/><pre>";
						//print_r($row);
						//echo "</pre>";
						
						//userzy post count
						$users[$row[1]] = $users[$row[1]] +1;
						
						$dane = json_decode($row[0], true);
						
						//echo "<pre>";
						//print_r($json_a);
						//echo "</pre>";
						
						for($i=0;$i<count($dane['tags']);$i++)
						{
							$tagi[$dane['tags'][$i]] = $tagi[$dane['tags'][$i]] + 1;
						}
						
						
						//tree category strings eg. with pl- where polish base
						$i=0;
						
						if($dane['tags'][$i] == "polish") //jesli tag bazowy sie zgadza
							{
								
								for($i=0;$i<count($dane['tags']);$i++)
									{
										$tagi[$dane['tags'][$i]] = $tagi[$dane['tags'][$i]] + 1;
										
										if(strpos($dane['tags'][$i], 'pl-') !== false || $i == 0) //(this) && $i <3 (last two tags not important)
											$tree[$j] = $tree[$j]." ".$dane['tags'][$i];
									}
						
								$j=$j+1;
							}
				}




				echo "<br/><pre>";
				print_r($tagi);
				echo "</pre>";


				//cache tagi
				file_put_contents("data/tags/$data.json", json_encode($tagi));

				//dodaj brakujacych users piszacy na polish
				file_put_contents("data/users-$data.json", json_encode($users));
				
				//add tree strings connected with prefix eg pl-
				file_put_contents("data/tree-$data.json", json_encode($tree));
			
			$done = 1; //nieuzywany obecnie
			}
		}
?>