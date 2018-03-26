<?php

function data_form($wbazie){


if ($_POST['data'] != "" && $_POST['data'] != "all")
	$data = $_POST['data'];
else
{
	//default date, when new month is there enough data to have nice effect?
	if(date("d", strtotime($wbazie)) > 3 )
		$data = date("Y-m", strtotime($wbazie));
			else
				$data = date('Y-m', strtotime("-1 months", strtotime($wbazie)));
}
		
$start = "2016-04";
$today = date("Y-m");
$day = date("d");

while(date("Y-m",strtotime($today)) >= date("Y-m",strtotime($start)))
{
	$label = ucfirst(strftime("%B %Y",strtotime($today)));
	echo "<option";
	
	if($_POST['data']==$today) 
		echo " selected=\"selected\" ";
			else 
				echo " ";
	
	echo "value=\"$today\">$label</option>";
	$today = date('Y-m', strtotime("-1 months", strtotime($today)));
}

return $data;
}
?>