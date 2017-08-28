<?
	require 'scraperwiki.php';
	require 'scraperwiki/simple_html_dom.php';

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
						$InstDte	=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[2]", 0)->plaintext;
						$InstDte1st	=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[1]", 1)->plaintext;
						$Status		=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[2]", 1)->plaintext;
						$CaseFlDte	=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[2]", 2)->plaintext;
						$RestrCode	=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[1]", 3)->plaintext;
						$USCode		=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[2]", 3)->plaintext;
						$AdvPSide1	=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[1]", 4)->plaintext;
						$AdvPSide2	=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[2]", 4)->plaintext;
						
						echo	"Institution Date = " . $InstDte . '<br/>';
						echo 	"Institution Date 1st Court = " . $InstDte1st . '<br/>';
						echo 	"Status = " . $Status . '<br/>';
						echo 	"Current Case Flow Date = " . $CaseFlDte . '<br/>';
						echo 	"Restore Code = " . $RestrCode . '<br/>';
						echo 	"U/S Code = " . $USCode . '<br/>';
						echo 	"Advocate Party Side 1 = " . $AdvPSide1 . '<br/>';
						echo 	"Advocate Party Side 2 = " . $AdvPSide2 . '<br/>';
						
						//	Show a line betten records
						echo	'<hr>';
					}
				}
			}
		}
	}

?>
