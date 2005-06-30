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
		<div id="menu">
			<!-- BEGIN menu --> 
			<a href="index.php?ref={REF}&id={ID}">{NAME}</a><br />
			<!-- END menu --> 
			<p>-----------------------------------------------------</p>
			<p class="small-caps">You've successfuly logged in!</p>			
			<p>Welcome {USER}</p><br /><br />
			<a href="index.php?action=logout"><p>Logout</p></a>
		</div>
		<div id="content">
			<!-- BEGIN news -->
			<p><b>Titel: {TIT_NEWS}</b></p>
			<p class="small-caps">Autor: {AUTHOR_NEWS}</p>
			<p>Datum: {DATE_NEWS}</p>
			<p class="navy"><b><u>Inhalt:</b></u> <br />{CONTENT_NEWS}</p>
			<b>---------------------------------------------------------------------------</b>
			<!-- END news -->
		</div>
		<br style="clear:both;" />		
	</div>
</body>
</html>
