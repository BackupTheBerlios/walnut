<?php
// Walnut CMS 
// version: 0.1dev
// Author: Kacper Nyka <kacper.nyka@gmail.com>
// License: Apache License, Version 2.0

/* Copyright 2005 Kacper Nyka
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
*/

require_once('./includes/db_mysql.class.php');
require_once('./includes/user.class.php');

// HTML_Template_IT-1.1
// License: PHP License 2.02
// Author: Ulf Wendel <ulf.wendel@phpdoc.de>
// Package from PEAR
require_once('./includes/IT.php');

session_start();
define("PHPSESSID", session_id());
if(!(isset($HTTP_GET_VARS["PHPSESSID"])))
{
	header("Location: login.php?PHPSESSID=". session_id());
	return 0;
}

$walnut_db = new dbMysql;
$tpl = new HTML_Template_IT("./templates");
$user = new user;

if(!(isset($HTTP_GET_VARS["action"])))
{
	$tpl->loadTemplatefile("login.tpl", true, true);
}

if($HTTP_GET_VARS["action"] == "logging_in")
{
	$username = $walnut_db->fetchDataDB('users', 'username', 'asc', 'user_name', $HTTP_POST_VARS["username"]);
	$password_md5 = $walnut_db->fetchDataDB('users', 'user_password', 'asc', 'user_name', $HTTP_POST_VARS["username"]);
	$password2_md5 = md5($HTTP_POST_VARS["password"]);
	$user->login($username, $password_md5, $password2_md5);
}

// data for title and logo url
$title = $walnut_db->fetchDataDB('settings', 'title');
$logo = $walnut_db->fetchDataDB('settings', 'logo_url');

$tpl->setVariable("TITLE", $title["0"]);
$tpl->setVariable("LOGO", $logo["0"]);
$tpl->setVariable("PHPSESSID", PHPSESSID);
$tpl->parse();
$tpl->show();

?>
