<?
	require 'scraperwiki.php';
	require 'scraperwiki/simple_html_dom.php';
	require		"simple_html_dom.php";
	$BaseLink	=	'http://202.61.43.40:8080/';
	$SiteURL	=	'http://202.61.43.40:8080/index.php?r=site%2Fsearchbyvalue&page=';
	
	//	Page pagination
	for($PageLoop = 1; $PageLoop < 2; $PageLoop++){

		$FinalURL	=	$SiteURL . $PageLoop;
		$Html		=	file_get_html($FinalURL);
		$RowNumb	=	-1;

		if ($Html) {

			//	Paginate all 'View' buttons
			foreach ($Html->find("//div[@id='w0']/table[contains(@class,'table-striped')]/tbody/tr") as $element) {
				$RowNumb	+=	1;
				if ($RowNumb != 0) {
					$CourtName	=	$element->find('./td[2]', 0);
					$CaseNumbr	=	$element->find('./td[3]', 0);
					$CaseStats	=	$element->find('./td[4]', 0);
					$CaseValue	=	$element->find('./td[5]/button', 0);
					$CaseLinkR	=	$BaseLink . $CaseValue->attr['value'];
					$CaseLink	=	str_replace("amp;", "", $CaseLinkR);
					
					//	Visit link inside 'View' button
					$DetailPg	=	file_get_html($CaseLink);

					if ($DetailPg) {
						//	Assign fields to varilables
						echo $CaseNo		=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[1]", 0)->plaintext;
						echo $InstDte		=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[2]", 0)->plaintext;
						echo $InstDte1st	=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[1]", 1)->plaintext;
						echo $Status		=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[2]", 1)->plaintext;
						echo $CourtName		=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[1]", 2)->plaintext;
						echo $CaseFlDte		=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[2]", 2)->plaintext;
						echo $RestrCode		=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[1]", 3)->plaintext;
						echo $USCode		=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[2]", 3)->plaintext;
						echo $AdvPSide1		=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[1]", 4)->plaintext;
						echo $AdvPSide2		=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[2]", 4)->plaintext;
						 //This is for Parties Side
						echo $Partyside1	=	$DetailPg->find("//*[@id='party_side_1']/tbody/tr/td", 0)->plaintext;
						echo $Partyside2	=	$DetailPg->find("//*[@id='party_side_2']/tbody/tr/td", 0)->plaintext;
						 //This is for FIR DETAILS
						echo $FIR			=	$DetailPg->find("//div[@class='container']/table[2]/tbody/tr[1]/td[1]", 0)->plaintext;
						echo $FIRReg		=	$DetailPg->find("//div[@class='container']/table[2]/tbody/tr[1]/td[2]", 0)->plaintext;
						echo $Offence		=	$DetailPg->find("//div[@class='container']/table[2]/tbody/tr[2]/td[1]", 0)->plaintext;
						echo $IncidentDate =	$DetailPg->find("//div[@class='container']/table[2]/tbody/tr[2]/td[2]", 0)->plaintext;
						echo $CaseProperty	=	$DetailPg->find("//div[@class='container']/table[2]/tbody/tr[3]/td[1]", 0)->plaintext;
						echo $NameofIO		=	$DetailPg->find("//div[@class='container']/table[2]/tbody/tr[3]/td[2]", 0)->plaintext;
						echo $ChallanDetail =   $DetailPg->find("//div[@class='container']/table[2]/tbody/tr[4]/td", 0)->plaintext;
						echo $FIRDesc 		= 	$DetailPg->find("//div[@class='container']/table[2]/tbody/tr[5]/td", 0)->plaintext;	
						echo $DetailPg;
						
					/*	
						echo	"Case No = " . $CaseNo . '<br/>';
						echo	"Institution Date = " . $InstDte . '<br/>';
						echo 	"Institution Date 1st Court = " . $InstDte1st . '<br/>';
						echo 	"Status = " . $Status . '<br/>';
						echo 	"Current Case Flow Date = " . $CaseFlDte . '<br/>';
						echo 	"Restore Code = " . $RestrCode . '<br/>';
						echo 	"U/S Code = " . $USCode . '<br/>';
						echo 	"Advocate Party Side 1 = " . $AdvPSide1 . '<br/>';
						echo 	"Advocate Party Side 2 = " . $AdvPSide2 . '<br/>';
						*/
						//	Show a line betten records
						echo	'<hr>';
					}
				}
			}
		}
	}

?>



