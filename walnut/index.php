<?php
require('./includes/db_mysql.class.php');
require('./includes/wte.php');

$walnut_db = new dbMysql;
$tpl = new wte;

$title = $walnut_db->fetchDataDB('settings', 'title');
$logo = $walnut_db->fetchDataDB('settings', 'logo_url');
$menu[] = $walnut_db->fetchDataDB('menu','id');
$arr = $walnut_db->$this->_arr;
echo $arr;
print_r($walnut_db->$this->_arr);
$tpl->CreateVar('logo', $logo);
$tpl->CreateVar('title', $title);
$tpl->CreateArr('menu', $menu);
$tpl->DisplayTpl('index.tpl');

?>
