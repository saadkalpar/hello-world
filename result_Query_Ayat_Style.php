<div class="divMid">  <br>  
<div id='ayatBox'>     

<?php 
$language  = 0;  
$abc = 1; 
if ( $findWord != "" ) { 
$checkUrdu = "  SELECT * FROM quran WHERE 

			quran.qufateh LIKE  '%$findWord%'  
			OR 
			quran.qumehmood LIKE  '%$findWord%' "; 
	
	
// Checking if input text is typed in Urdu or English			
			
if ($cU = $mysqli->query($checkUrdu)) 
		{
	  	$urduLines =mysqli_num_rows($cU);		
			if ($urduLines > 0){ $language = 2;   }
		}	

$checkEnglish = "  SELECT * FROM quran WHERE 
			quran.engMohsin LIKE  '%$findWord%'   
			OR 
			quran.engTaqi LIKE  '%$findWord%' ";   
		  
if ($cEng = $mysqli->query($checkEnglish)) 
		{
	  	$engLines =mysqli_num_rows($cEng);		
			if ($engLines > 0){ $language = 4;   }
		}	
		if ($language > 3 ) {
			echo " Search Text was found in English <br>  \n ";  } 
			

			else if ($language > 1 ) {
			echo " Search Text was found in Urdu  <br> \n";  } 
			
			else if ($language < 1 ) {
			echo " Search Text was not found in Urdu and English Translations <br>  \n";  } 
			
} 


	$finds = "  SELECT * FROM quran WHERE 
			quran.qufateh LIKE  '%$findWord%'  
			OR 
			quran.qumehmood LIKE  '%$findWord%'   
			OR 
			quran.engMohsin LIKE  '%$findWord%'   
			OR 
			quran.engTaqi LIKE  '%$findWord%'   
            OR 
			quran.qufateh LIKE  '%$findWord%'  
			OR 
			quran.qumehmood LIKE  '%$findWord%'    
			ORDER BY quran.id ASC ";	



if ($result = $mysqli->query($finds)) 
		{
	  	$max =mysqli_num_rows($result);
//  Span starts   : result  

		echo " \n<span class = \"result\"  > "; 
	
				
//  Span starts   : textSearched\		
		echo " \n<span class=\"textSearched\"  >   $findWord </span>\n"; 	  
		
		
			//  Span starts   : textLeft\
        
	if ( $max > 0 ) {	
			if ($language < 3  ) {
				echo " \n<span class=\"textLeft\"  >  ";
					
					echo " \n $max "; 
					echo " \n   آیات مبارکۃ کے اردو ترجمہ میں موجود ہے۔ "; 
			} else if  ($language > 3 ) {
			
echo " is present in English translation  of " . 	$max . " verses of Holy Quran"; 		
				
			}
                    }     
		else  if ( $max < 1 ) {
						if ($language < 2 ) {
							echo " کسی آیت مبارکۃ کے اردو ترجمہ میں نہیں ہے۔";
							echo " <br> $findWord is not present in our database of English translation of Holy Quran";
						} 

			} 
		
		echo " \n</span>"; 

	

		
		$cp = 0; 
		$line1 = 50;  $counts = 0; 	$line1Posn = $line1."px" ; 
		$poet_check = ""; 
		
		
		if ($result->num_rows > 0)  
			{
		   	while($row = $result->fetch_assoc()) 
                	  	{
			$counts++;     

            $thisRow 		= 		$row["id"] ;  
        	$suraNo			= 		$row["suraNo"] ;
     		$suraName 		= 		$row["suraName"] ;                     
            $ayatNo 		= 		$row["ayatNo"] ; 	
	    	$rakuNo 		= 		$row["rakuNo"] ;
            $paraNo 		= 		$row["paraNo"] ; 					
		    $paraName       =		$row["paraName"] ;
            $qufateh 		= 		$row["qufateh"] ;  
            $qumehmood 		=       $row["qumehmood"] ;  
            $engMohsin 		=       $row["engMohsin"] ;  
            $engTaqi 		=       $row["engTaqi"] ;  
                                
                	


// Div starts : ayatBlock

echo " <div id='ayatBlock'>  "; 

//  Div  starts   : ayatNumberListStyle
echo "<span class = \"ayatNumberListStyle\"   > "; 
echo $abc ; echo "</span>  " ;
//  Div  starts   :  ayatData
echo " <span class=\"ayatData\">  ";
echo "   سورۃ نمبر    " ; echo $suraNo ; 
echo "  سورۃ    " ; echo $suraName ; 
echo " .    .  آیت نمبر  " ;  echo $ayatNo  ; 
echo "</span>  " ;

  
echo " \n <form method=\"post\" action=\"index.php\" >  ";

echo " <button class=\"button24\">  ";
echo "   مکمل سورۃ   \n" ; echo $suraName ;   echo "   پڑھیں     " ; 
echo " </button>";

echo " \n <div class = \"arabic\"   > "; echo $row["quranArabic"] ;   echo " \n</div > ";	

echo " \n <span class = \"transNameU\"   >   ترجمہ  محمود الحسن   </span>      " ;
echo " \n <div class = \"qumehmood\"   > "; echo $row["qumehmood"] ;  echo " \n  </div > ";

echo " \n <span class = \"transNameU\"   >  ترجمہ فتح محمد جالندھری  </span>  " ;
echo " \n <div class = \"qufateh\"   > ";  echo $row["qufateh"] ;  echo " \n  </div > ";


echo " \n   </div > "; 

echo " <div id='engTransBlock'\">  ";
echo " \n <span class = \"transNameE\"   >Translation by Mohsin </span>      " ;
echo " \n <div class = \"quMohsin\"   > ";  echo $row["engMohsin"] ; echo " \n  </div > ";

echo " \n <span class = \"transNameE\"   > Translation by Taqi Usmani  </span> " ;
echo " \n <div class = \"quTaqi\"   > ";  echo $row["engTaqi"] ; echo " \n   </div >  ";
echo " \n <br>  </div > ";  // end of engTransBlock

echo " \n <input  type=\"hidden\" name=\"id\" value=\"$thisRow\"   /> "; 
echo " \n <input  type=\"hidden\" name=\"suraNo\" value=\"$suraNo\"	/> ";					
echo " \n <input  type=\"hidden\" name=\"suraName\" value=\"$suraName\"    	/> "; 
echo " \n <input  type=\"hidden\" name=\"ayatNo\" value=\"$ayatNo\"	/> "; 
echo " \n <input  type=\"hidden\" name=\"rakoohNo\" value=\"$rakoohNo\"    	/> "; 
echo " \n <input  type=\"hidden\" name=\"paraNo\" value=\"$paraNo\"	/> "; 				
echo " \n <input  type=\"hidden\" name=\"paraName\" value=\"$paraName\"    	/> "; 

echo " \n 	</form> " ; 
$abc++ ;	
}
}	
echo " \n </span> " ; 			
}
/* free result set */
$result->close();
echo " \n </div> "; 
mysqli_close($mysqli);
?>