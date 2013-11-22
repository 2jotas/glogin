
<?php

/*Just 3 lines */
require_once('GloGin.php');  //magic class
$mylogin = new ghostLogin();
$mylogin->magicVar();


/*************WRITE YOUR CODE HERE*************/
//Uncomment to destroy active session on refresh page
//unset($_SESSION[$mylogin->getSessionName()]);

//code example  - write your code 
$html = file_get_contents('http://gmail.com');
echo $html;

/***********************************************/
?>


