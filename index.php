<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>IP Address</title>
		<link rel="icon" type="image/png" href="romania-flag-square-icon-256.png">
		<link rel="apple-touch-icon" href="romania-flag-square-icon-256.png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
		<style type="text/css">
			html, body, .container {
				height: 100%;
			}

			.container {
				display: -webkit-flexbox;
				display: -ms-flexbox;
				display: -webkit-flex;
				display: flex;
				-webkit-flex-align: center;
				-ms-flex-align: center;
				-webkit-align-items: center;
				align-items: center;
				justify-content: center;
			}

			.border {
				text-align: center;
				border: 1px solid black
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div id="row">
				<div class="border">
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

					function ip2geo($host) {
						// Get GeoIP info
						@$data = file_get_contents('http://freegeoip.net/json/'.$host);
						if ($data) {
							$data = json_decode($data);
							// Return the countrycode, the regionname and the city
							return $data->country_code.": ".$data->region_name.": ".$data->city;
						} else {
							// An error has accourred
							return "(No geo info found)";
						}
					}

					$user_ip = getUserIP();
					echo "Your public IP address: <strong>".$user_ip."</strong>\n";
				?>
				</div>
				<p class="text-center">Website developed by <a href="https://www.moga.doctor/" target="_blank">Stefan-Mihai MOGA</a></p>
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
	</body>
</html>
