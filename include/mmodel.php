<?PHP
header('Content-type: text/html; charset=utf-8');
require_once("class.phpmailer.php");

class Mymodel
{
    var $admin_email;
    var $from_address;
    
    var $username;
    var $pwd;
    var $database;
    var $tablename;
    var $connection;
    var $rand_key;
    var $error_message;
    
    //-----Initialization -------
    function Mymodel()
    {
        $this->sitename = 'Form';
        $this->rand_key = '0iQx5oBk66oVZep';
    }
    
    function InitDB($host,$uname,$pwd,$database,$tablename)
    {
        $this->db_host  = $host;
        $this->username = $uname;
        $this->pwd  = $pwd;
        $this->database  = $database;
        $this->tablename = $tablename;
        
    }
    function SetAdminEmail($email)
    {
        $this->admin_email = $email;
    }
    
    function SetWebsiteName($sitename)
    {
        $this->sitename = $sitename;
    }
    
    function SetRandomKey($key)
    {
        $this->rand_key = $key;
    }

    
    function RegisterUser()
    {

        if(!isset($_POST['submitted']))
        {
           return false;
        }
        
            
        $this->CollectRegistrationSubmission($formvars);

        
        if(!$this->SaveToDatabaseRegistration($formvars))
        {
            return false;
        }
        
        
        return true;
    }

    function CollectRegistrationSubmission(&$formvars)
    {
        
        $formvars['firstname'] = $this->Sanitize($_POST['firstname']);
        $formvars['lastname'] = $this->Sanitize($_POST['lastname']);
        $formvars['email'] = $this->Sanitize($_POST['email']);
        $formvars['password'] = $this->Sanitize($_POST['password']);
        $formvars['country'] = $this->Sanitize($_POST['country']);
    }
    function SaveToDatabaseRegistration(&$formvars)
    {
        //if(!isset($_SESSION['captcha'])) session_start();
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        
        if(!$this->IsFieldUnique($formvars,'user_email'))
        {
            $this->HandleError("Имейл хаягаар бүртгүүлсэн байна, 3дагч логин оор орж үзнэ үү");
            return false;
        }


            
        if(!$this->InsertIntoDBRegistration($formvars))
        {
            $this->HandleError("Inserting to Database failed!");
            return false;
        }
        
        return true;
    }
    function InsertIntoDBRegistration(&$formvars)
    {
        $confirmcode = $this->MakeConfirmationMd5($formvars['email']);
        
        $formvars['confirmcode'] = $confirmcode;

        $passwo = crypt($formvars['password'],'$6$rounds=5000$gyshido$');

        
            $insert_query = 'insert into users(
                user_name,
                user_primary_email,
                user_confirm,
                user_country
                )
                values
                (
                "' . $this->SanitizeForSQL($formvars['firstname']) . " " . $this->SanitizeForSQL($formvars['lastname']) . '",
                "' . $this->SanitizeForSQL($formvars['email']) . '",
                "' . $confirmcode . '",
                "' . $this->SanitizeForSQL($formvars['country']) . '"
                )';
       
             
        if(!mysqli_query($this->connection, $insert_query))
        {
            $this->HandleDBError("Error inserting data to the table\nquery:$insert_query");
            return false;
        }else{

        $lastid = mysqli_insert_id($this->connection);
        if(isset($formvars['provider']) AND $provi != 'no' AND isset($formvars['authid']) AND $formvars['authid'] != 'no'){
           $_SESSION[$this->GetLoginSessionVar()] = $lastid;
        }
        $insert_query_bank = 'insert into logins(
                user_id,
                login_email,
                login_password
                )
                values
                (
                "' . $lastid . '",
                "' . $this->SanitizeForSQL($formvars['email']) . '",
                "' . $passwo . '"
                )'; 

        echo $insert_query_bank;
        if(!mysqli_query($this->connection, $insert_query_bank))
        {
            $this->HandleDBError("Error inserting data to the table\nquery:$insert_query_bank");
            return false;
        }
        

        return true;
        }
    }
    function CheckLogin()
    {   
        if(!isset($_SESSION)){
            session_start(); 
        }

        $sessionvar = $this->GetLoginSessionVar();
        
        if(empty($_SESSION[$sessionvar])){
            return false;
        }
        return true;
    }

     function Login(){

        if(empty($_POST['email'])){
            $this->HandleError("Имэйл хаяг оруулна уу!");
            return false;
        }
        
        if(empty($_POST['password'])){
            $this->HandleError("Нууц үг оруулна уу!");
            return false;
        }
        
        $useremail = trim($_POST['email']);
        $password = trim($_POST['password']);
        
        if(!isset($_SESSION)){ 
            session_start();
        }

        if(!$this->CheckLoginInDB($useremail, $password)){
            return false;
        }
        
        return true;
    }

    function LogOut()
    {
        session_start();
        
        $sessionvar = $this->GetLoginSessionVar();
        
        $_SESSION[$sessionvar] = NULL;
        
        unset($_SESSION[$sessionvar]);
        
        $this->RedirectToURL("../");
    }

    function CheckLoginInDB($useremail,$password)
    {
        //echo "".$useremail." - ".$password;
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }          

        $user_email = $useremail;
        $pssw = crypt($password,'$6$rounds=5000$gyshido$');
        
        $qry = "SELECT user_id FROM logins WHERE login_email='$user_email' AND login_password='$pssw'";
        echo $qry;
        $result = mysqli_query($this->connection, $qry);
        if(!$result || mysqli_num_rows($result) <= 0)
        {
            $this->HandleError("Имэйл хаяг, нууц үг буруу байна!");
            return false;
        }
        
        /*$qry1 = "SELECT user_id, user_firstname FROM users WHERE user_email = '$user_email' AND user_password ='$pssw' AND user_confirmation = 'Y'";
        $result1 = mysqli_query($this->connection, $qry1);
        if(!$result1 || mysqli_num_rows($result1) <= 0)
        {
            $this->HandleError("Имэйл хаягаа баталгаажуулна уу!");
            return false;
        }*/

        $row = mysqli_fetch_assoc($result);
        $_SESSION[$this->GetLoginSessionVar()] = $row['user_id'];
            
        return true;
    }

    
    //-------Public Helper functions -------------
    function GetSelfScript()
    {
        return htmlentities($_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
    }    
    
    function SafeDisplay($value_name)
    {
        if(empty($_POST[$value_name]))
        {
            return'';
        }
        return htmlentities($_POST[$value_name]);
    }
    
    function RedirectToURL($url)
    {
		ob_start();	
		while (ob_get_status()) 
		{
			ob_end_clean();
		}
		
        header("Location: $url");	
        exit;	
    }
    
    function GetSpamTrapInputName()
    {
        return 'sp'.md5('KHGdnbvsgst'.$this->rand_key);
    }
    
    function GetErrorMessage()
    {
        if(empty($this->error_message))
        {
            return '';
        }

        return $this->error_message;
    }    
    //-------Private Helper functions-----------
    
    function HandleError($err)
    {
        $this->error_message .= $err."\r\n";
    }
    
    function HandleDBError($err)
    {
        $this->HandleError($err."\r\n mysqlerror:".mysql_error());
    }
    
    function GetLoginSessionVar()
    {
        $retvar = md5($this->rand_key);
        $retvar = 'usr_'.substr($retvar,0,10);
        return $retvar;
    }

    function GetLoginSessionVarMerchant()
    {
        $retvar = md5($this->rand_key);
        $retvar = 'cli_'.substr($retvar,0,10);
        return $retvar;
    }
    
    function GetLoginSessionVarAdmin()
    {
        $retvar = md5($this->rand_key);
        $retvar = 'r2d2r2d2'.substr($retvar,0,10);
        return $retvar;
    }
	
    
	
    function IsFieldUnique($formvars,$fieldname)
    {
        $field_val = $this->SanitizeForSQL($formvars['email']);
        $qry = "select user_id from users where $fieldname='".$field_val."'";
        $result = mysqli_query($this->connection, $qry);   
        if($result && mysqli_num_rows($result) > 0)
        {
            return false;
        }
        return true;
    }

    function IsFieldUniqueNotOwn($formvars,$fieldname)
    {
        $field_val = $this->SanitizeForSQL($formvars[$fieldname]);
        $qry = "select UserId from $this->tablename where $fieldname='".$field_val."' and UserId!=".$_SESSION['id_of_user']." ";
        $result = mysql_query($qry,$this->connection);   
        if($result && mysql_num_rows($result) > 0)
        {
            return false;
        }
        return true;
    }
    
    function DBLogin()
    {

        $this->connection = mysqli_connect($this->db_host,$this->username,$this->pwd,$this->database);
		
        if(!$this->connection)
        {   
            $this->HandleDBError("Database Login failed! Please make sure that the DB login credentials provided are correct");
            return false;
        }
        if(!mysqli_select_db($this->connection,$this->database))
        {
            $this->HandleDBError('Failed to select database: '.$this->database.' Please make sure that the database name provided is correct');
            return false;
        }
        if(!mysqli_query($this->connection,"SET NAMES 'UTF8'"))
        {
            $this->HandleDBError('Error setting utf8 encoding');
            return false;
        }
        return true;
    }    
    
    

    function CheckForgottenLink($i,$inquire){
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        $qry = "SELECT 1 FROM users WHERE user_email = '$i' AND user_forgotten = '$inquire'";
        $result = mysqli_query($this->connection, $qry);
        if(!mysqli_num_rows($result) > 0)
        {
            $this->HandleError("Хүсэлт байхгүй байна");
            return false;
        }
        return true;
    }

    function CheckEmailSendForgotten($email){
        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }
        $qry = "SELECT 1 FROM users WHERE user_email = '$email' AND (user_login_facebook IS NULL AND user_login_linkedin IS NULL AND user_login_google IS NULL)";
        $result = mysqli_query($this->connection, $qry);
        if(!mysqli_num_rows($result) > 0)
        {
            $this->HandleError("Бүртгэлгүй хэрэглэгч");
            return false;
        }
        if(!$this->SendForgottenEmail($email)){
            return false;
        }
        return true;
    }

   

    function MakeConfirmationMd5($email)
    {
        $randno1 = rand();
        $randno2 = rand();
        return md5($email.$this->rand_key.$randno1.''.$randno2);
    }
    function SanitizeForSQL($str)
    {
        if( function_exists( "mysqli_real_escape_string" ) )
        {
              $ret_str = mysqli_real_escape_string($this->connection, $str );
        }
        else
        {
              $ret_str = addslashes( $str );
        }
        return $ret_str;
    }
    
 /*
    Sanitize() function removes any potential threat from the
    data submitted. Prevents email injections or any other hacker attempts.
    if $remove_nl is true, newline chracters are removed from the input.
    */
    function Sanitize($str,$remove_nl=true)
    {
        $str = $this->StripSlashes($str);

        if($remove_nl)
        {
            $injections = array('/(\n+)/i',
                '/(\r+)/i',
                '/(\t+)/i',
                '/(%0A+)/i',
                '/(%0D+)/i',
                '/(%08+)/i',
                '/(%09+)/i'
                );
            $str = preg_replace($injections,'',$str);
        }

        return $str;
    }    
    function StripSlashes($str)
    {
        if(get_magic_quotes_gpc())
        {
            $str = stripslashes($str);
        }
        return $str;
    }
}
?>