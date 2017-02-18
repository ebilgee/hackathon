<?PHP
header('Content-type: text/html; charset=utf-8');
require_once("mmodel.php");

$mmodel = new Mymodel();

$mmodel->SetWebsiteName('ImLive');

//Provide the email address where you want to get notifications
//$mmodel->SetAdminEmail('erdenebileg@bolorsoft.com');
					  
$mmodel->InitDB(/*hostname*/'localhost',
                     /*username*/'root',
                    /*password*/'',
                     /*database name*/'imlive',
                     /*table name*/'users');
$mmodel->SetRandomKey('aRRcVS1DrJzrPvk');
$mmodel->SetAdminEmail('erdenibilig@gmail.com');
?>