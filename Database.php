<?php

class Database {

    function connect(){

        $host = 'db';
        $dbname = 'superlogica';
        $user = 'root';
        $pass = 'root';

        $dsn = "mysql:host=$host;dbname=$dbname";

        try {
            $DBH = new PDO($dsn, $user, $pass);
            $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $DBH;
        }
        catch(PDOException $e) {

            echo 'ERROR: ' . $e;
        }
    } 

}