<?
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
					$CaseLink	=	str_replace("amp;", "", $CaseLinkR);
					
					if($CaseLink != null)
					{
					//	Visit link inside 'View' button
					$DetailPg	=	file_get_html($CaseLink);
					if ($DetailPg) {
						
						//	Assign fields to varilables
						$InstDte	=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[2]", 0);
						$InstDte1st	=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[1]", 1);
						echo $Status		=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[2]", 1);
						$CaseFlDte	=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[2]", 2);
						$RestrCode	=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[1]", 3);
						$USCode		=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[2]", 3);
						$AdvPSide1	=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[1]", 4);
						$AdvPSide2	=	$DetailPg->find("//div[@class='container']/table[1]/tbody/tr/td[2]", 4);
				
	}}}}}}
?>
