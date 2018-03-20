<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="tags">
<div class="my-auto">
				
<h2>HIERARCHIA KATEGORII</h2>

<div class="label">
Sprawdźmy ideę hierarchi tagów na #polish.<br /><br />

<h3>Oto drzewko tagów według priorytetu, jakich używają Polacy:</h3>
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


<div id="tagcloud" class="label">
<?php
echo "<h3>".ucfirst(strftime("%B %Y",strtotime($data))).":</h3>";
?>


 <script type="text/javascript">
      google.charts.load('current', {packages:['wordtree']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable(
          [ ['Phrases'],
					

<?php


$tree = json_decode(file_get_contents("data/tree-$data.json"), true);

//ksort($tree);
//shuffle_assoc($tags);
$tree = array_unique($tree);

foreach ($tree as $val)
	{
			//eliminate functional tags
			$val = str_replace("pl-artykuly","",$val);
			echo "['$val'],\n";
		
	}

//echo "<br/><pre>";
//print_r($tree);
//echo "</pre>";

?>
						]
        );

        var options = {
          wordtree: {
            format: 'implicit',
            word: 'polish'
          }
        };

        var chart = new google.visualization.WordTree(document.getElementById('wordtree_basic'));
        chart.draw(data, options);
      }
    </script>

		<div id="wordtree_basic" style="max-width: 1280px; height: 1280px;"></div>



</div>

<div class="label">
<p>
<br />
<b>*</b> dopóki idea się nie przyjmie badamy miesiące zamiast całości, wyjaśnienie - https://steemit.com/polish/@rafalski/inteligentne-drzewo-kategorii-na-polish-i-jak-mozesz-pomoc-ty-uzywajac-tagow-w-odpowiedniej-kolejnosci
<br /><br />
<b>**</b> tagi aktualne do daty: <?php echo $wbazie;?> (aktualizowane co godzinę, lecz zależne od bazy sbds by @privex)
</p>
<br />
</div>


<?php

//echo $average = array_sum($tags)/count($tags);

?>



</div>
</section>