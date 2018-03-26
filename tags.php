<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="tags">
<div class="my-auto">
				
<h2>LISTA POLSKICH TAGÓW</h2>

<div class="label">
Nie wiesz jakich tagów użyć w swoim poście?<br /><br />

<h3>Oto tagi* jakich używają Polacy na platformie opartej o blockchain Steem:</h3>
</div>

<form method="post" action="" class="forma">
<br />
<i>Wybierz datę**:</i> 
<select name="data" onchange="this.form.submit()">

<?php

//select date + post formulas
$data = data_form($wbazie);

?>
</select>
<br /><br />
</form>


<div id="tagcloud" class="label"">
<?php
echo "<h3>".ucfirst(strftime("%B %Y",strtotime($data))).":</h3>";
?>
<?php


$tags = json_decode(file_get_contents("data/tags/$data.json"), true);

ksort($tags);

//activation level for showing tag in cloud? average, sqrt(floor(avg))
$prog=floor(array_sum($tags)/count($tags));


foreach ($tags as $key=>$val)
	{
		if($val >= $prog) //or median?
		{
			$ile = $val;
			$val = sqrt(sqrt($val));
			echo "<a target=\"_blank\" href=\"https://steemit.com/created/$key\" rel=\"$val\">$key</a> <span style=\"font-size:8px;\">($ile)</span>\n";
		}
	}

//echo "<br/><pre>";
//print_r($tags);
//echo "</pre>";

?>
</div>

<div class="label">
<p>
<br />
<b>*</b> wyjaśnienie: możliwe, że nie ma tu wszystkich tagów, są one szukane po bazowych tagach <b>polish</b>, <b>tematygodnia</b>, <b>reakcja</b> i prefiksach <b>pl-</b>.
<br /><br />
<b>**</b> tagi aktualne do daty: <?php echo $wbazie;?> (aktualizowane codziennie, lecz zależne od bazy sbds by @privex)
</p>
<br />
</div>


<script>
$("#tagcloud a").tagcloud({
	size: {start: 12, end: 41, unit: "px"},
	color: {start: '#CB9D19', end: '#CB3819'}
});
</script>

<div class="label">

<h3>Listing tagów *pl-*</h3>
<br />
	<div style="color:#0009;">
	<table cellpadding="8" cellspacing="2" border="0">
							<tr bgcolor="#ccc">
									<td>TAG</td>
									<td>ILE</td>
							</tr>
							
							
							<?php
							$i = 0; //row counter
							
							foreach ($tags as $key=>$val)
							{	
							if (strpos($key, 'pl-') !== false) 
								{
									echo "<tr";

									if ($i % 2 == 0)
											echo " bgcolor=\"#ededed\"";

									echo ">";
									
									echo "<td><a target=\"_blank\" href=\"https://steemit.com/created/$key\" style=\"color:#0009;\">$key</a></td><td>$val</td></tr>";
									
									$i++;
									}
							}
							
							?>
							
	</table>
	</div>
</div>

</div>
</section>