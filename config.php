<?php

$config =array(
		"base_url" => "http://survey.form.mn/hybridauth/index.php", 
		"providers" => array ( 

			"Google" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "351107902868-0563bchtvghieo1h9e1kae0qd59fjf0e.apps.googleusercontent.com", "secret" => "r3Dg2FsmY9fnUcC4YyoYK7Oo" ), 
			),

			"Facebook" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "811606862282337", "secret" => "5b7c19a6b90138355ab567a63d746306" ),
				"scope"   => "email, user_birthday"
			),

			"Twitter" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "Yzc1RjrmCBU5usSGowo1MEVD6", "secret" => "1nq1RLN4dCMKsf1CRlB9Bjoq6cmjPpSAnxttg5OVRYIH6Qi3Ix" ) 
			),
			"LinkedIn" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "75mm4ei4zgu7oh", "secret" => "InYztmjWWAMsn9qJ" ) 
			)
		),
		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => false,
		"debug_file" => "",
	);
