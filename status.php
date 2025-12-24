<!DOCTYPE html>
<html>
	<head>
		<title>NetVoyager</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="NetVoyager">
		<meta name="author" content="Stefan-Mihai MOGA">
		<meta name="keywords" content="link manager, monitor links, internal link, external link, free application">
		<meta name="robots" content="index, follow">

		<meta property="og:title" content="NetVoyager" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="https://www.ip-address.ro/" />
		<meta property="og:image" content="/romania-flag-square-icon-256.png" />

		<link rel="icon" type="image/x-icon" href="/romania-flag-square-icon-256.png" />
		<!-- CSS styles for standard search box -->
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
		<style type="text/css">
			/* Set height to 100% for body and html to enable the background image to cover the whole page: */
			body, html {
				height: 100%
			}

			.bgimg {
				/* Background image */
				background-image: url('status.jpg');
				/* Full-screen */
				height: 100%;
				/* Center the background image */
				background-position: center;
				/* Scale and zoom in the image */
				background-size: cover;
				/* Add position: relative to enable absolutely positioned elements inside the image (place text) */
				position: relative;
				/* Add a white text color to all elements inside the .bgimg container */
				color: black;
				/* Add a font */
				font-family: "Tahoma";
				/* Set the font-size to 25 pixels */
				font-size: 25px;
			}

			/* Position text in the top-left corner */
			.topleft {
				position: absolute;
				top: 0;
				left: 16px;
			}

			/* Position text in the bottom-left corner */
			.bottomleft {
				position: absolute;
				bottom: 0;
				left: 16px;
			}

			/* Position text in the middle */
			.middle {
				position: absolute;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				text-align: center;
			}

			/* Style the <hr> element */
			hr {
				margin: auto;
				width: 40%;
			}
		</style>
	</head>
	<body>
		<div class="bgimg">
			<div class="middle">
				<?php
				function isSiteAvailible($url){
	    			/* Check, if a valid url is provided
					if(!filter_var($url, FILTER_VALIDATE_URL)){
						return false;
					}*/

	    			// Initialize cURL
					$curlInit = curl_init($url);

	    			// Set options
					curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
					curl_setopt($curlInit,CURLOPT_HEADER,true);
					curl_setopt($curlInit,CURLOPT_NOBODY,true);
					curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);

	    			// Get response
					$response = curl_exec($curlInit);

	    			// Close a cURL session
					curl_close($curlInit);

					return $response ? true : false;
				}

				$website = $_GET["domain"];
				if(isSiteAvailible($website)){
					echo "The website <strong>$website</strong> is available.<br>\n";      
				}else{
					echo "Woops, the website <strong>$website</strong> is not found!<br>\n"; 
				}
				?>
				<a href="https://www.ip-address.ro/status.html">Check another</a>.
			</div>
		</div>
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
	</body>
</html>
