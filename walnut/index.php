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

// HTML_Template_IT-1.1
// License: PHP License 2.02
// Author: Ulf Wendel <ulf.wendel@phpdoc.de>
// Package from PEAR
require_once('./includes/IT.php');

$walnut_db = new dbMysql;
$tpl = new HTML_Template_IT("./templates");

$tpl->loadTemplatefile("index.html", true, false);

foreach($data as $name) {
    foreach($name as $cell) {
        // Assign data to the inner block
        $tpl->setCurrentBlock("cell") ;
        $tpl->setVariable("DATA", $cell) ;
        $tpl->parseCurrentBlock("cell") ;
    }
    // Assign data and the inner block to the
    // outer block
    $tpl->setCurrentBlock("row") ;
    $tpl->parseCurrentBlock("row") ;
}
// print the output
$tpl->show();

$title = $walnut_db->fetchDataDB('settings', 'title');
$logo = $walnut_db->fetchDataDB('settings', 'logo_url');
$menu = $walnut_db->fetchDataDB('menu','ref');

//echo '<pre>';
//var_dump($menu);
//echo '</pre>';

foreach($menu as $_menu)
{
	$tpl->setVar('menu', $_menu, TRUE);
}

$tpl->loadTemplate('index.tpl');
$tpl->setVar('logo', $logo, FALSE);
$tpl->setVar('title', $title, FALSE);
$tpl->show('index.tpl');

?>
