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
						 $CaseNo		=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[1]", 0)->plaintext;
						 $InstDte		=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[2]", 0)->plaintext;
						 $InstDte1st	=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[1]", 1)->plaintext;
						 $Status		=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[2]", 1)->plaintext;
						 $CourtName		=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[1]", 2)->plaintext;
						 $CaseFlDte		=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[2]", 2)->plaintext;
						 $RestrCode		=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[1]", 3)->plaintext;
						 $USCode		=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[2]", 3)->plaintext;
						 $AdvPSide1		=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[1]", 4)->plaintext;
						 $AdvPSide2		=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[2]", 4)->plaintext;
						 //This is for Parties Side
						 $Partyside1	=	$DetailPg->find("//*[@id='party_side_1']/tbody/tr/td", 0)->plaintext;
						 $Partyside2	=	$DetailPg->find("//*[@id='party_side_2']/tbody/tr/td", 0)->plaintext;
						 //This is for FIR DETAILS
						 $FIR			=	$DetailPg->find("//div[@class='container']/table[2]/tbody/tr[1]/td[1]", 0)->plaintext;
						 $FIRReg		=	$DetailPg->find("//div[@class='container']/table[2]/tbody/tr[1]/td[2]", 0)->plaintext;
						 $Offence		=	$DetailPg->find("//div[@class='container']/table[2]/tbody/tr[2]/td[1]", 0)->plaintext;
						 $IncidentDate =	$DetailPg->find("//div[@class='container']/table[2]/tbody/tr[2]/td[2]", 0)->plaintext;
						 $CaseProperty	=	$DetailPg->find("//div[@class='container']/table[2]/tbody/tr[3]/td[1]", 0)->plaintext;
						 $NameofIO		=	$DetailPg->find("//div[@class='container']/table[2]/tbody/tr[3]/td[2]", 0)->plaintext;
						 $ChallanDetail =   $DetailPg->find("//div[@class='container']/table[2]/tbody/tr[4]/td", 0)->plaintext;
						 $FIRDesc 		= 	$DetailPg->find("//div[@class='container']/table[2]/tbody/tr[5]/td", 0)->plaintext;	
						 $pagetext 		= $DetailPg->plaintext;
				
						scraperwiki::save_sqlite(array('name'), array('name' => $CaseNo, 
											      'InstDte' => $InstDte, 
											      'Status' => $Status
											      ));
							
						}

				}
				
	}}}

?>
