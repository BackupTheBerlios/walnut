<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>{TITLE}</title>
	<link rel="stylesheet" type="text/css" href="./templates/page.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
	<div id="root">
		<div id="header">
			<img src="{LOGO}" border="0" alt="Logo">
		</div>
		<div id="login-section">
			<form action="index.php?action=logging_in&PHPSESSID={PHPSESSID}" method="post">
			<b>Username:</b> <br /><input type="text" name="username"><br />
			<b>Password:</b>  <br /><input type="password" name="password"><br /><br />
			<input type="submit">&nbsp;&nbsp;<input type="reset">
			</form>
		</div>
		<br style="clear:both;" />
		</div>
</body>
</html>
