<?php
	// Credit: https://stackoverflow.com/a/13646735
	function getUserIP()
	{
	    // Get real visitor IP behind CDN such as Cloudflare
		if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
			$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
			$_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
		}
		$client  = @$_SERVER['HTTP_CLIENT_IP'];
		$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
		$remote  = $_SERVER['REMOTE_ADDR'];
		
		if(filter_var($client, FILTER_VALIDATE_IP))
		{
			$ip = $client;
		}
		elseif(filter_var($forward, FILTER_VALIDATE_IP))
		{
			$ip = $forward;
		}
		else
		{
			$ip = $remote;
		}
		
		return $ip;
	}

	$user_ip = getUserIP();
	$data = array('ip-address' => $user_ip);
	header('Content-Type: application/json; charset=utf-8');
	echo json_encode($data);
?>
