<?php

function getPDO(array $config){
    try{
        return $db = new PDO('mysql:host='.$config['host'].';dbname='.$config['database'], $config['username'], $config['password'],array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    }catch(exception $e){
        
    }
}
?>
