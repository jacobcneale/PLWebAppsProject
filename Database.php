<?php
class Database {
    private $dbConnector;

    /**
     * Reads configuration from the Config class above
     */
    public function __construct() {
        $host = Config::$db["host"];
        $user = Config::$db["user"];
        $database = Config::$db["database"];
        $password = Config::$db["pass"];
        $port = Config::$db["port"];

        $this->dbConnector = pg_connect("host=$host port=$port dbname=$database user=$user password=$password");
        $this->createDatabases();
    }

    public function createDatabases(){
        $dbHandle = $this->dbConnector;

        // Create tables
        $res  = pg_query($dbHandle, "create table if not exists users (
                username  text primary key,
                password  text
        );");

        $res  = pg_query($dbHandle, "create table if not exists posts (
                id serial primary key,
                name text,
                email text,
                password text,
                score int);");
                
        $res  = pg_query($dbHandle, "create table if not exists likes (
                post serial primary key,
                name text,
                email text,
                password text,
                score int);");
    }

    public function addUser($username, $password, $)

    public function query($query, ...$params) {
        // Use safe querying
        $res = pg_query_params($this->dbConnector, $query, $params);

        // If there was an error, print it out
        if ($res === false) {
            echo pg_last_error($this->dbConnector);
            return false;
        }

        // Return an array of associative arrays (the rows
        // in the database)
        return pg_fetch_all($res);
    }
}