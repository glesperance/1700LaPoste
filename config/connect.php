<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
define('_MYSQL_SET_SQL_MODE',true);
$GLOBALS['spip_connect_version'] = 0.7;
spip_connect_db('localhost','','','','spip_1700','sqlite3', 'spip','');
?>