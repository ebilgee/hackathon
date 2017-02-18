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
        $this->sitename = 'ImLive';
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
    /**
     * Хэрэглэгчийн системд бүртгэх, транзакшн арга
     * @param  $formvars бөглсөн форм дахь өгөгдлүүд
     * @return амжилттай бүртгэгдвэл true
     * @since 0.0
     * @todo бүртгэл хийсний дараа мэйл явуулах аргыг тестлэх
     */
    function RegisterUser()
    {
        if(!isset($_POST['submitted']))
        {
           return false;
        }
        
        /* -- if(!$this->ValidateRegistrationSubmission())
        {
            return false;
        } TODO--*/ 
            
        $this->CollectRegistrationSubmission($formvars);
        
        if(!$this->SaveToDatabaseRegistration($formvars))
        {
            return false;
        }
        
        $this->SendAdminIntimationEmail($formvars);
        
        return true;
    }

    function CollectRegistrationSubmission(&$formvars)
    {
        
        $formvars['firstname'] = $this->Sanitize($_POST['firstname']);
        $formvars['lastname'] = $this->Sanitize($_POST['lastname']);
        $formvars['email'] = $this->Sanitize($_POST['email']);
        $formvars['password'] = $this->Sanitize($_POST['password']);
        $formvars['country'] = $this->Sanitize($_POST['gender']);
        $formvars['brithyear'] = $this->Sanitize($_POST['birthyear']);
        $formvars['birthmonth'] = $this->Sanitize($_POST['birthmonth']);
        $formvars['birthday'] = $this->Sanitize($_POST['birthday']);
        
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

        $temparray = array($formvars['brithyear'],$formvars['birthmonth'], $formvars['birthday']);
        $birthdate = implode("-", $temparray);
        $provi = '';
        if($formvars['provider'] == 'Twitter'){
            $provi = 'login_twitter';
        }
        else if($formvars['provider'] == 'Facebook'){
            $provi = 'login_facebook';
        }
        else if($formvars['provider'] == 'Linkedin'){
            $provi = 'login_linkedin';
        }
        else{
            $provi =='no';
        }
        echo $provi . '- '. $formvars['authid'];
        if(isset($formvars['provider']) AND $provi != 'no' AND isset($formvars['authid']) AND $formvars['authid'] != 'no'){
            $insert_query = 'insert into users(
                user_name,
                user_primary_email,
                user_confirm,
                user_country_id,
                user_bio,
                user_birth_date,
                user_employment,
                user_education,
                '.$provi.'
                )
                values
                (
                "' . $this->SanitizeForSQL($formvars['firstname']) . '",
                "' . $this->SanitizeForSQL($formvars['lastname']) . '",
                "' . $this->SanitizeForSQL($formvars['email']) . '",
                "' . $passwo . '",
                "' . $confirmcode . '",
                "' . $this->SanitizeForSQL($formvars['mobilephone']) . '",
                "' . $this->SanitizeForSQL($formvars['gender']) . '",
                "' . $birthdate . '",
                "' . $this->SanitizeForSQL($formvars['employment']) . '",
                "' . $this->SanitizeForSQL($formvars['education']) . '",
                "' . $this->SanitizeForSQL($formvars['authid']) . '"
                )';
        }
        else{
            $insert_query = 'insert into users(
                user_firstname,
                user_lastname,
                user_email,
                user_password,
                user_confirmation,
                user_phone,
                user_gender,
                user_birth_date,
                user_employment,
                user_education
                )
                values
                (
                "' . $this->SanitizeForSQL($formvars['firstname']) . '",
                "' . $this->SanitizeForSQL($formvars['lastname']) . '",
                "' . $this->SanitizeForSQL($formvars['email']) . '",
                "' . $passwo . '",
                "' . $confirmcode . '",
                "' . $this->SanitizeForSQL($formvars['mobilephone']) . '",
                "' . $this->SanitizeForSQL($formvars['gender']) . '",
                "' . $birthdate . '",
                "' . $this->SanitizeForSQL($formvars['employment']) . '",
                "' . $this->SanitizeForSQL($formvars['education']) . '"
                
                )';
        }
             
        if(!mysqli_query($this->connection, $insert_query))
        {
            $this->HandleDBError("Error inserting data to the table\nquery:$insert_query");
            return false;
        }else{

        $lastid = mysqli_insert_id($this->connection);
        if(isset($formvars['provider']) AND $provi != 'no' AND isset($formvars['authid']) AND $formvars['authid'] != 'no'){
           $_SESSION[$this->GetLoginSessionVar()] = $lastid;
        }
        $insert_query_bank = 'insert into useraccounts(
                bank_id,
                user_id,
                user_account_number,
                user_account_name,
                user_register_id
                )
                values
                (
                "' . $this->SanitizeForSQL($formvars['bankname']) . '",
                "' . $lastid . '",
                "' . $this->SanitizeForSQL($formvars['bankaccount']) . '",
                "' . $this->SanitizeForSQL($formvars['firstname']) . ' '. $this->SanitizeForSQL($formvars['lastname']) .'",1
                )'; 
        if(!mysqli_query($this->connection, $insert_query_bank))
        {
            $this->HandleDBError("Error inserting data to the table\nquery:$insert_query_bank");
            return false;
        }
        if(isset($formvars['provider']) AND $provi != 'no' AND isset($formvars['authid']) AND $formvars['authid'] != 'no'){
            if(!$this->SendUserWelcomeEmail($formvars)){
                return false;
            }
        }
        else{
            if(!$this->SendUserConfirmationEmail($formvars)){
                return false;
            }
        }

        return true;
        }
    }


    /*---BASE---*/

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
    function IsFieldUnique($formvars,$fieldname)
    {
        $field_val = $this->SanitizeForSQL($formvars['email']);
        $qry = "select user_created_date from users where $fieldname='".$field_val."'";
        $result = mysqli_query($this->connection, $qry);   
        if($result && mysqli_num_rows($result) > 0)
        {
            return false;
        }
        return true;
    }
}
?>