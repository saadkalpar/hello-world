<?php
$abc = 1;
echo " <div class=\"divMid\"> \n <br> \n ";
// SELECT quran.quranArabic FROM quran WHERE quran.suraNo = 112 ORDER BY quran.id ASC
if ($suraNo == "") {
    $suraNo = 112;
    $suraName = " سورۃ اخلاص";
}
if ($suraNo == 0) {
    $suraNo = 110;
    $suraName = "سورۃ النصر";
}


$finds 	= "  SELECT * FROM quran WHERE suraNo = '$suraNo' ";

$result = $mysqli->query($finds) ; 
/*  if ($result = $mysqli->query($finds)) {    $max = mysqli_num_rows($result); }  */

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
		
        $counts++;
        $thisRow = $row["id"];
	    $suraNo = $row["suraNo"];
        $suraName = $row["suraName"];
        $ayatNo = $row["ayatNo"];
        $rakuNo = $row["rakuNo"];
        $paraNo = $row["paraNo"];
        $paraName = $row["paraName"];
        $qufateh = $row["qufateh"];
        $qumehmood = $row["qumehmood"];
        $engMohsin = $row["engMohsin"];
        $engTaqi = $row["engTaqi"];
        // Div starts : suraBlock

	$nextSuraNo = $suraNo +1 ; 
	
	


        echo " \n  \n <div id='suraBlock'>  ";
        echo " \n <div class = \"arabic\" style= \" width: 92%;\"   > ";
        echo "<span class = \"ayatNumberListStyle\"   > ";
        echo $abc;
        echo "    </span>  &nbsp;&nbsp;    ";
        echo "    </span>  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;    ";
        echo $row["quranArabic"];
        echo " \n</div > ";
        echo " \n <div class = \"qumehmood\"  style= \"padding-right: 80px; width: 85%;\"  >  ";
        echo $row["qumehmood"];
        echo " \n  </div > ";
        echo " \n  </div > ";
        $abc++;
    }





   
}
		echo " <div class =\"introBlock\"> "; 
		echo " <div class =\"suraTitle\">  $suraName "; echo "</div> ";
		echo " <div class =\"suraTranslator\"> ترجمہ:  محمود الحسن"; echo "</div> ";
		echo " <div class =\"suraData\">  سورۃ نمبر  : $suraNo <br>   ";  
		echo "کل آیات : ";
		echo $counts ;
		echo " </div> ";


echo " <div class =\"bTestBlock\"> "; 
if ( $suraNo <> 9 ) {echo "بِسۡمِ اللّٰہِ الرَّحۡمٰنِ الرَّحِیۡمِ " ; 
}  else  echo " Sura Tuba " ; 
echo "</div> ";


echo " </div> ";

if( $nextSuraNo < 115 ) {  

$newData = "SELECT suraName FROM quran WHERE suraNo =  '$nextSuraNo' ";		
$nextName = $mysqli->query ($newData);	
	if ($nextName->num_rows > 0  ) {
		while ($row6 = $nextName->fetch_assoc()) {
			$nextSuraName = $row6["suraName"];
			break; 
		} 
	}
 }  else   { 	echo "  Total 114 Sura in Holy Quran. ) ";  
				$nextSuraNo = 1 ;  $nextSuraName = "الفاتحۃ";
				
			} 

echo " <div class =\"nextSuraData\"> ";

echo " \n <form method=\"post\" action=\"index.php\" >  ";

echo " \n <input  type=\"hidden\" name=\"suraNo\" value=\"$nextSuraNo\"	/> ";					

echo " <button type=\"submit\" class=\"button22\">  ";

echo "	اگلی سورۃ <br>"; 
echo "سورۃ نمبر :    $nextSuraNo  " ;
echo "<br> سورۃ  " ; 
echo ".     ." ;  
echo  $nextSuraName ; 
echo " </button> ";  



echo " </div> ";



echo "</div> ";
mysqli_close($mysqli);
?>