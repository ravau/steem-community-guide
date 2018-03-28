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

function array_mesh() {
	// Combine multiple associative arrays and sum the values
		
	// Get the number of arguments being passed
	$numargs = func_num_args();
	
	// Save the arguments to an array
	$arg_list = func_get_args();
	
	// Create an array to hold the combined data
	$out = array();

	// Loop through each of the arguments
	for ($i = 0; $i < $numargs; $i++) {
		$in = $arg_list[$i]; // This will be equal to each array passed as an argument

		// Loop through each of the arrays passed as arguments
		foreach($in as $key => $value) {
			// If the same key exists in the $out array
			if(array_key_exists($key, $out)) {
				// Sum the values of the common key
				$sum = $in[$key] + $out[$key];
				// Add the key => value pair to array $out
				$out[$key] = $sum;
			}else{
				// Add to $out any key => value pairs in the $in array that did not have a match in $out
				$out[$key] = $in[$key];
			}
		}
	}
	
	return $out;
}
?>