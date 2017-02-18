<?PHP
header('Content-type: text/html; charset=utf-8');
require_once("mmodel.php");

$mmodel = new Mymodel();

$mmodel->SetWebsiteName('Form');
					  
$mmodel->InitDB(/*hostname*/'localhost',
                     /*username*/'root',
                    /*password*/'',
                     /*database name*/'imlive',
                     /*table name*/'users');
$mmodel->SetRandomKey('aRRcVS1DrJzrPvk');
$mmodel->SetAdminEmail('erdenibilig@gmail.com');
?>