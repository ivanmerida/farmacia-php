<?php
    class ConnectionDB{
        public static function connect(){
            $db = new mysqli('localhost', 'root', '', 'farmacia_jesusito');
            $db->query("SET NAMES 'utf8'");
            return $db;
        }
    }
?>