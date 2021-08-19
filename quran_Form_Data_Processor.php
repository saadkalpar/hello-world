<?php
  // define variables and set to empty values
$radio =     $Checkbox= 0;   //  Set Radio and Checkbox to default value of zero 
$findWord  = "?????? ???? ?? ???";    //  to be used with empty input or on First visit of page 
// if  ( $suraNo  == "" || $suraNo   <1 ) $suraNo  = 90;  
 $suraNo =  $nextSuraNo  =    $previousSuraNo  = $rakoohNo = $paraNo = 0; 
 
//  POST method used to process the FORM input data
//   Blank 

// test data function 
function test_data($data) {
   	$data = trim($data);
   	$data = stripslashes($data);
  	$data = htmlspecialchars($data);
   	return $data;
	}
error_reporting(E_ALL ^ E_NOTICE);
?>
