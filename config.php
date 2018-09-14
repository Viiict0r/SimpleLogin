<?php

/*
 * Arquivo de configurações
 */

global $config;
global $db;

$config = array();
$config['dbname'] = 'viiict0r';
$config['host'] = 'localhost';
$config['dbuser'] = 'root';
$config['dbpass'] = '';

try {
    $db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}