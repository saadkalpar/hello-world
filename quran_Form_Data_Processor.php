<?php

 
  // define variables and set to empty values

$radio =     $Checkbox= 0;   //  Set Radio and Checkbox to default value of zero 
$findWord  = "?????? ???? ?? ???";    //  to be used with empty input or on First visit of page 
// if  ( $suraNo  == "" || $suraNo   <1 ) $suraNo  = 90;  
 $suraNo =  $nextSuraNo  =    $previousSuraNo  = $rakoohNo = $paraNo = 0; 
 $suraName =  $nextSuraName = $previousSuraName =   $paraName =   ""; 

$ayatNo = $nextAyatNo = $previousAyatNo = 0; 
$limit = 100; 
$duplicate =0; 
$counts = 0; 

 
 



if ($_SERVER["REQUEST_METHOD"] == "POST")  
	{  
	//  to be used with empty input or on First visit of page 
        if (!empty($_POST["findWord"]))	{$findWord  = test_input($_POST["findWord"]);} else $findWord	= "جنت";
	 	 
 	if (!empty($_POST["suraNo"]))  	{$suraNo    = test_input($_POST["suraNo"]);  } else $suraNo 	= 101; 
 	if (!empty($_POST["suraName"])) {$suraName  = test_input($_POST["suraName"]);} else $suraName 	= ""; 
 	if (!empty($_POST["ayatNo"]))  	{$ayatNo    = test_input($_POST["ayatNo"]);  } else $ayatNo 	= 0; 
 	if (!empty($_POST["rakoohNo"])) {$rakoohNo  = test_input($_POST["rakoohNo"]);} else $rakoohNo 	= 0; 
 	if (!empty($_POST["paraNo"]))  	{$paraNo    = test_input($_POST["paraNo"]);  } else $paraNo 	= 0; 
 	if (!empty($_POST["paraName"])) {$paraName  = test_input($_POST["paraName"]);} else $paraName 	= ""; 
      
$nextAyat = $ayatNo + 1; 
$previousAyat = $ayatNo -1 ; 
$nextSuraNo  = $suraNo + 1;   

  }	

function test_input($data) {
   	$data = trim($data);
   	$data = stripslashes($data);
  	$data = htmlspecialchars($data);
   	return $data;
	}
error_reporting(E_ALL ^ E_NOTICE);

?>
