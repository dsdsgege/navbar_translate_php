<?php
    // This class generates our PDO object using Singleton model
    // with this PDO object we can connect to our database
    class Database {
        private static $host = "localhost";
        private static $dbName = "languages";
        private static $username = "root";
        private static $password = "";
        private static $pdo = null;

        // singleton pattern
        // ~return PDO object
        public static function getConnection() {

            // ha még nem hoztunk létre pdo object-et, csak akkor
            // self - ellentétben a this-el, az osztály 
            // adattagjára utal, nem az objektumraÍ
            if(self::$pdo === null) {   
                try {
                    self::$pdo = new PDO("mysql:dbname=". self::$dbName . ";host=" . self::$host, self::$username, self::$password);
                } catch (PDOException $e) {
                    die("Database connection failed: " . $e->getMessage());
                }
            }

            // visszaadjuk a PDO objektumot, ami tartalmazza a csatlakozást
            return self::$pdo;
        }
    }
?>