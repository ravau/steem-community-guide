<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="users">
<div class="my-auto">

<h2>TEST</h2>

<div class="label">
test
</div>



<?php
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
			
			$res = mysql_query("
			select *
			from
			sbds_tx_claim_reward_balances
			where account = 'rafalski'
			order by timestamp desc
			limit 10");
			
			while ($row = mysql_fetch_row($res))
				{
				
				echo "<br/><pre>";
				print_r($row);
				
				echo "</pre>";
				}
		}

?>


<div class="label">
Dane aktualne do daty: <?php echo $wbazie;?>
</div>
<br />


<div class="label">

<h3>TOPLISTA</h3>
<br />
	<div style="color:#0009;">
	<table cellpadding="8" cellspacing="2" border="0">
							<tr bgcolor="#ccc">
									<td>NR.</td>
									<td>NICK</td>
									<td>POSTÓW</td>
							</tr>
							
							
							<?php
							$i = 0; //row counter
							
							foreach ($users as $key=>$val)
							{	
						
									echo "<tr";

									if ($i % 2 == 0)
											echo " bgcolor=\"#ededed\"";

									echo ">";
									
									//link - przejscie do profilu usera juz live mysql
									echo "<td>".($i+1)."</td><td>$key</td><td>$val</td></tr>";
									
									$i++;
									
							}
							
							?>
							
	</table>
	</div>
</div>

</div>
</section>