<?php

  // The URL of the website to get information from
	$htmlContent = file_get_contents("http://www.gsmarena.com/samsung_galaxy_j7_(2016)-7870.php");

	// A new object of DOMDucument	
	libxml_use_internal_errors(true);

	$DOM = new DOMDocument();
	$DOM->loadHTML($htmlContent);

	libxml_use_internal_errors(false);

	// Gets the Elements by the Tags. The Header and the Details of the Table
	$Table_Header = $DOM->getElementsByTagName('th');
	$Table_Detail = $DOM->getElementsByTagName('td');


    // Loop to get the Name of the Header. This is to be assigned to the Details
	foreach($Header as $node_header) 
	{
		$table_detail[] = trim($node_detail->textContent);
	}

    // Initialize two variables
	$i = 0;
	$j = 0;
    
    // Loop to get the Details of the table
	foreach($details as $node_detail) 
	{
		$table_detail[$j][] = trim($node_detail->textContent);
		$i = $i + 1;
		$j = $i % count($table_detail) == 0 ? $j + 1 : 
		$j;
	}
	
	//#Get row data/detail table with header name as key and outer array index as row number
	for($i = 0; $i < count($table_detail); $i++)
	{
		for($j = 0; $j < count($table_detail); $j++)
		{
			$temporal_data[$i][$table_detail[$j]] = $table_detail[$i][$j];
		}
	}

	$table_detail = $temporal_data; unset($temporal_data);

	// Display information."[0]" => Getting information from the first postion
	print_r($table_detail[0]); 


    // Exixt current Script
	die();
?>

