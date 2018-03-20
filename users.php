<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="users">
<div class="my-auto">

<h2>RANKING USERÓW</h2>

<div class="label">
Ranking najaktywniejszych użytkowników od kwietnia 2016 r. na podstawie przebadanych tagów. <a href="/tags">Więcej info</a>.
</div>

<form method="post" action="" class="forma">
<br />
<i>Wybierz datę**:</i> 
<select name="data" onchange="this.form.submit()">
<option value="all"> - ALL TIME - </option>
<?php

//select date + post formulas
$data = data_form($wbazie);

$data2 = date('Y-m', strtotime("-1 months", strtotime($data)));

?>
</select>
<br /><br />
</form>


<?php
//dodac wykres przyrostu userow w czasie


if($_POST['data'] != "all" && $_POST['data'] != "")
{
	//user datta is additive, need to substract for specific month
	$m1 = json_decode(file_get_contents("data/users-$data.json"), true);
	$m2 = json_decode(file_get_contents("data/users-$data2.json"), true);

	foreach($m1 as $key=>$val)
	{
		$users[$key] = $val - $m2[$key];
	}

}else $users = json_decode(file_get_contents("data/users-$data.json"), true);

arsort($users);

?>


<div class="label">
Dane aktualne do daty: <?php echo $wbazie;?>
</div>
<br />


<div class="label">

<h3>TOPLISTA - <?php if($_POST['data'] != "all" && $_POST['data'] != "") echo ucfirst(strftime("%B %Y",strtotime($data))); else echo "ALL TIME";;?>
</h3>
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