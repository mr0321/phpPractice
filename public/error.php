<!DOCTYPE html>
<html lang="et">
	<head>
		<title>error page</title>
		<meta charset="UTF-8">
		<meta enctype="UTF-8">
		<base href="/phpiggy/public/"></base>
		<meta name="viewport" content="width=device-width, height=device-height initial-scale=1.0">
		<style>
			body {
				background-color:#E8E8E8
			}
			p {
			color: red;
			font-family: arial;
			font-size: 16;
			bold:1000;
			}
			i {
			font-weight: bolder;
			}
			div {
			text-align: center;
			margin: 100px 0;
			}
		</style>
	</head>
	<body>
		<?php
			// Taken directly from https://css-tricks.com/snippets/php/error-page-to-handle-all-errors/
		$codes = array(
				 403 => array('403 Forbidden', 'The server has refused to fulfill your request.'),
				 404 => array('404 Not Found', 'The document/file requested was not found on this server.'),
				 405 => array('405 Method Not Allowed', 'The method specified in the Request-Line is not allowed for the specified resource.'),
				 408 => array('408 Request Timeout', 'Your browser failed to send a request in the time allowed by the server.'),
				 500 => array('500 Internal Server Error', 'The request was unsuccessful due to an unexpected condition encountered by the server.'),
				 502 => array('502 Bad Gateway', 'The server received an invalid response from the upstream server while trying to fulfill the request.'),
				 504 => array('504 Gateway Timeout', 'The upstream server failed to send a request in the time allowed by the server.'),
			 );
		$status = null;
		$message = null;
		$title = false;
		if(isset($_GET['status'])) {
			$status = $_GET['status'];
			$title = $codes[$status][0];
			$message = $codes[$status][1];
		}
		//RewriteRule ^profilepage/([0-9a-zA-Z.]+) profilepage.php?user=$1 [NC,L]
		echo "<div>
						<p>Well... this is for that.</p>
						<p>At least the idea was good.</p>
					</div>";
		if ($title && strlen($status) == 3) {
			echo "<div>
							<p>So, the official statement from the system is:</p>
								<p> <i>Error number: " . $title . "</i></p>
								<p> In other words: <i>" . $message . "</i></p>
						</div>";
					}
				echo "<div>
							<p>What would you say if we would just head back to the
							 <a href='index.php'>HOME PAGE</a>?</p>
							</div>";
		 ?>
	</body>
</html>
