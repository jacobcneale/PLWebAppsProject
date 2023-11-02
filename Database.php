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
                title text,
                username text,
                date text,
                content text);");
                
        $res  = pg_query($dbHandle, "create table if not exists likes (
                post int,
                username text);");
    }

    public function dropTables(){
        $res  = pg_query($this->dbConnector, "drop table if exists users");
        $res  = pg_query($this->dbConnector, "drop table if exists posts");
        $res  = pg_query($this->dbConnector, "drop table if exists likes");
    }

    public function addUser($username, $password){
        #Need to add unique username verification
        $res = pg_query_params($this->dbConnector, "insert into users (username, password) values ($1, $2);", array($username, $password));
    }

    public function verifyUser($username, $password){
        $res = pg_query_params($this->dbConnector, "select * from users where username=$1 and password=$2;", array($username, $password));
        if ($res && pg_num_rows($res) > 0) {
            return true;
        }else{
            return false;
        }
    }

    public function addPost($title, $username, $date, $content){
        $res = pg_query_params($this->dbConnector, "insert into posts (title, username, date, content) values ($1, $2, $3, $4);", 
                array($title, $username, $date, $content));
    }

    public function getPosts(){
        $res = pg_query($this->dbConnector, "select * from posts");
        return pg_fetch_all($res);
    }

    public function getUserPosts($username){
        $res = pg_query_params($this->dbConnector, "select * from posts where username=$1", $username);
        return pg_fetch_all($res);
    }

    public function deletePost($id){
        $res = pg_query_params($this->dbConnector, "delete from posts where id=$1", $id);
    }

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

    public function getUser($username){
        $res = $this->query("select * from users where username = $1;",$username);
        if (empty($res)) return null;
        return ["username"=>$res[0]["username"],"passhash"=>$res[0]["password"]];
    }

    

}