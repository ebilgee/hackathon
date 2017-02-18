<?PHP
require_once("./include/config.php");

if(isset($_GET['code']))
{
   if($mmodel->ConfirmUser())
   {
        $mmodel->RedirectToURL("./login.php");
   }
}

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Бүртгэлээ баталгаажуулах</title>
</head>
<body>

<h2>Бүртгэлээ баталгаажуулах</h2>
<p>
Автоматаар шинэчлэгдэхгүй бол баталгаажуулах кодыг оруулна уу?
</p>

<!-- Form Code Start -->
<div id='fg_membersite'>
<form id='confirm' action='<?php echo $mmodel->GetSelfScript(); ?>' method='get' accept-charset='UTF-8'>
<div class='short_explanation'>* </div>
<div><span class='error'><?php echo $mmodel->GetErrorMessage(); ?></span></div>
<div class='container'>
    <label for='code' >Баталгаажуулах Код:* </label><br/>
    <input type='text' name='code' id='code' maxlength="50" /><br/>
</div>
<div class='container'>
    <input type='submit' name='Submit' value='Баталгаажуулах' />
</div>

</form>

</div>

</body>
</html>