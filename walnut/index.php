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
$HTTP_SESSION_VARS["remoteip"] = $HTTP_SERVER_VARS["REMOTE_ADDR"];
if(!(isset($HTTP_GET_VARS["PHPSESSID"])))
{
	header("Location: index.php?PHPSESSID=". session_id());
	return 0;
}


//error_reporting(E_ALL);
$ref = $HTTP_GET_VARS["ref"];


$walnut_db = new dbMysql;
$tpl = new HTML_Template_IT("./templates");
$user = new user;

$tpl->loadTemplatefile("index.tpl", true, true);

// data for the news
$news_id = $walnut_db->fetchDataDB('news', 'news_id', 'desc');
$news_author = $walnut_db->fetchDataDB('news', 'news_author', 'desc');
$news_title = $walnut_db->fetchDataDB('news', 'news_title', 'desc');
$news_date = $walnut_db->fetchDataDB('news', 'news_date', 'desc');
$news_content = $walnut_db->fetchDataDB('news', 'news_content', 'desc');

$num = count($news_id);
for($i = 0; $i < $num; $i++)
{
	$tpl->setCurrentBlock("news");
	$tpl->setVariable("TIT_NEWS", $news_title[$i]);
	$tpl->setVariable("AUTHOR_NEWS", $news_author[$i]);
	$tpl->setVariable("DATE_NEWS", $news_date[$i]);
	$news_content[$i] = nl2br($news_content[$i]);
	$tpl->setVariable("CONTENT_NEWS", $news_content[$i]);
	$tpl->parseCurrentBlock("news");
}

/// data from database
// data for title and logo url
$title = $walnut_db->fetchDataDB('settings', 'title');
$logo = $walnut_db->fetchDataDB('settings', 'logo_url');

// data for the menu
$menu_id = $walnut_db->fetchDataDB('menu','id');
$menu_name = $walnut_db->fetchDataDB('menu','name');
$menu_ref = $walnut_db->fetchDataDB('menu','ref');

$num = count($menu_id);
for($i = 0; $i < $num; $i++)
{
	$tpl->setCurrentBlock("menu");
	$tpl->setVariable("REF", $menu_ref[$i]);
	$tpl->setVariable("NAME", $menu_name[$i]);
	$tpl->setVariable("ID", $menu_id[$i]);
	$tpl->parseCurrentBlock("menu");
}

$tpl->setVariable("TITLE", $title["0"]);
$tpl->setVariable("LOGO", $logo["0"]);
$tpl->setVariable("PHPSESSID", PHPSESSID);
$tpl->parse();
$tpl->show();

?>
