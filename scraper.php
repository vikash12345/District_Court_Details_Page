<?
	require 'scraperwiki.php';
	require 'scraperwiki/simple_html_dom.php';
	$BaseLink	=	'http://202.61.43.40:8080/';
	$SiteURL	=	'http://202.61.43.40:8080/index.php?r=site%2Fsearchbyvalue&page=';
	$RowNumb;
//
/** looping over list of ids of doctors **/
for($id = 0; $id <= 2; $id++)
	{
	$url = ("http://202.61.43.40:8080/index.php?r=site%2Fsearchbyvalue&page=".$id);
	$link2 = file_get_html($url);
	
	if ($link2) {
			//	Paginate all 'View' buttons
			foreach ($link2->find("//div[@id='w0']/table[contains(@class,'table-striped')]/tbody/tr") as $element) {
				$RowNumb	+=	1;
				if ($RowNumb != 0) {
					$CourtName	=	$element->find('./td[2]', 0);
					$CaseNumbr	=	$element->find('./td[3]', 0);
					$CaseStats	=	$element->find('./td[4]', 0);
					$CaseValue	=	$element->find('./td[5]/button', 0);
					$CaseLinkR	=	$BaseLink . $CaseValue->attr['value'];
					echo $CaseLink	=	str_replace("amp;", "", $CaseLinkR);
					
					if($CaseLink != null)
					{
					//	Visit link inside 'View' button
					$DetailPg	=	file_get_html($CaseLink);
					if ($DetailPg) {
						
						//	Assign fields to varilables
						//This is for Case Details
						 $CaseNo		=	$link2->find("//div[@class='container']/table[1]/tbody/tr/td[1]", 0)->plaintext;
						 $InstDte		=	$link2->find("//div[@class='container']/table[1]/tbody/tr/td[2]", 0)->plaintext;
						 $InstDte1st	=	$link2->find("//div[@class='container']/table[1]/tbody/tr/td[1]", 1)->plaintext;
						 $Status		=	$link2->find("//div[@class='container']/table[1]/tbody/tr/td[2]", 1)->plaintext;
						 $CourtName		=	$link2->find("//div[@class='container']/table[1]/tbody/tr/td[1]", 2)->plaintext;
						 $CaseFlDte		=	$link2->find("//div[@class='container']/table[1]/tbody/tr/td[2]", 2)->plaintext;
						 $RestrCode		=	$link2->find("//div[@class='container']/table[1]/tbody/tr/td[1]", 3)->plaintext;
						 $USCode		=	$link2->find("//div[@class='container']/table[1]/tbody/tr/td[2]", 3)->plaintext;
						 $AdvPSide1		=	$link2->find("//div[@class='container']/table[1]/tbody/tr/td[1]", 4)->plaintext;
						 $AdvPSide2		=	$link2->find("//div[@class='container']/table[1]/tbody/tr/td[2]", 4)->plaintext;
						 //This is for Parties Side
						 $Partyside1	=	$link2->find("//*[@id='party_side_1']/tbody/tr/td", 0)->plaintext;
						 $Partyside2	=	$link2->find("//*[@id='party_side_2']/tbody/tr/td", 0)->plaintext;
						 //This is for FIR DETAILS
						 $FIR			=	$link2->find("//div[@class='container']/table[2]/tbody/tr[1]/td[1]", 0)->plaintext;
						 $FIRReg		=	$link2->find("//div[@class='container']/table[2]/tbody/tr[1]/td[2]", 0)->plaintext;
						 $Offence		=	$link2->find("//div[@class='container']/table[2]/tbody/tr[2]/td[1]", 0)->plaintext;
						 $IncidentDate =	$link2->find("//div[@class='container']/table[2]/tbody/tr[2]/td[2]", 0)->plaintext;
						 $CaseProperty	=	$link2->find("//div[@class='container']/table[2]/tbody/tr[3]/td[1]", 0)->plaintext;
						 $NameofIO		=	$link2->find("//div[@class='container']/table[2]/tbody/tr[3]/td[2]", 0)->plaintext;
						 $ChallanDetail =   $link2->find("//div[@class='container']/table[2]/tbody/tr[4]/td", 0)->plaintext;
						 $FIRDesc 		= 	$link2->find("//div[@class='container']/table[2]/tbody/tr[5]/td", 0)->plaintext;	
						 $pagetext 		= $link2->plaintext;
						 
				
	}}}}}}
?>
