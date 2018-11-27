<?php

class Database
{
    const   HOST = "localhost",
            DBNAME = "combat",
            LOGIN = "root";

    static public function DB()
    {

        try {
            $db = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::DBNAME, self::LOGIN);
            return $db;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

}
?>