<?php
class sms
{
	var $username;
	var $password;
	var $curl;
	var $server;
	var $loginDone;
	var $debugMode;
	var $data;
	var $error;
	public function __construct()
	{
		$this->curl=new cURL();
	//	$this->curl->setProxy("");
		$this->loginDone=false;
		$this->debugMode=false;
		$this->data=array();
	}
	public function setGateway($serverName)
	{
		switch($serverName)
		{
			case '160by2':
			$this->server='160by2';
			break;
			
			case 'way2sms':
			$this->server='way2sms';
			break;
			
			case 'airtel':
			$this->server='airtel';
			break;
			
			default :
			$this->server='way2sms';
			
		}
	}
	public function login($username,$password)
	{
		$server=$this->server;
	
		call_user_func(array($this,"login_$server"),$username,$password);
		$this->loginDone=true;
		
	}
	public function send($number,$msg)
	{
		$server=$this->server;
		if($this->loginDone)
		return call_user_func(array($this,"send_$server"),$number,$msg);
		else
		{
			echo "<h2>Please login first before sending SMS</h2>";
		}
		
	}
	private function login_way2sms($username,$password)
	{
		$out=($this->curl->post("http://www.way2sms.com","1=1"));
		$pattern="/Location:(.+?)\n/";
		preg_match($pattern,$out,$matches);
		$domain=trim($matches[1]);
		
		$this->data['domain']=$domain;
		
		$out= $this->curl->post("{$domain}auth.cl","username=$username&password=$password&Submit=Sign+in");

		$pattern="/Location:(.+?)\n/";
		preg_match($pattern,$out,$matches);
		$referer=trim($matches[1]);
		$this->data['referer']=$referer;
		

	}
	
	 
	private function send_way2sms($number,$msg)
	{
		$domain=$this->data['domain'];
		$html=$this->curl->post("{$domain}jsp/InstantSMS.jsp?val=0","1=1",$this->data['referer']);
		if($this->debugMode)
		{
		echo "<h2>After logging in, the HTML returned by server is</h2>";
		echo $html;
		}
	
		$pattern = '/name="Action".+?value="(.*)"/';
		preg_match($pattern, $html, $matches);
		
		$custfrom=$matches[1];
		$msg=urlencode($msg);
		$html=$this->curl->post("{$domain}FirstServletsms?custid=","custid=undefined&HiddenAction=instantsms&Action={$custfrom}&login=&pass=&MobNo=$number&textArea=$msg");
		$pattern = '/class="style1">(.+?)<\/span>/';
		preg_match($pattern, $html, $matches);
		$out=($matches[1]);
		
		if(!preg_match("/successfully/",$out))
		{
		$this->setError($out);
		return false;
		}
		else
		{
		return true;
		$this->setError("No errors");
		}
		
	}
	public function getLastError()
	{
		return $this->error;
		
	}
	private function setError($error)
	{
		$this->error=$error;
	}
	private function login_160by2($username,$password)
	{
	//	$out2=$this->curl->get("http://m.160by2.com");
		$out=$this->curl->post("http://m.160by2.com/LoginCheck.asp?l=1&txt_msg=&mno=","txtUserName=$username&txtPasswd=$password&RememberMe=Yes&cmdSubmit=Login");
		$pattern="/MyMenu.asp\?Msg=(.+?)&/";
		
		preg_match($pattern,$out,$matches);
		$id=trim($matches[1]);
		$this->data['id']=$id;
		
	}
	
	private function send_160by2($number,$msg)
	{
		$msg=urlencode($msg);
		$id=$this->data['id'];
		$out1=$this->curl->post("http://m.160by2.com/SaveCompose.asp?l=1","txt_mobileno=$number&txt_msg=$msg&cmdSend=Send+SMS&TID=&T_MsgId=&Msg=$id");
		//echo $out1;
		$pattern = '/\<table.+?\>(.+)\<\/table/s';
		preg_match($pattern, $out1, $matches);
		
		$out=strip_tags(@$matches[1]);
		if(count($matches)<1)
		{
		$pattern="/\<div.+?background:.+?yellow.+?\>(.+?)\<\/div\>/s";
		
		preg_match($pattern,$out1,$matches);
		
		$out=strip_tags($matches[1]);
		}
		
//
	//	echo "out is $out";
		
		if(!preg_match("/successfully/i",$out))
		{
		
		$this->setError($out);
		
		return false;
		}
		else
		{
		return true;
		$this->setError("No errors");
		}
		
	}
	
	private function login_airtel($username,$password)
	{
		$this->data['username']=$username;
		$this->data['password']=$password;
		
	}
	
	
	private function send_airtel($number,$msg)
	{

	}
}

?>