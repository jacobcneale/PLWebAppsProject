<?php

class ModelController {
    private $db;

    private $errorMessage = "";

    private $input = [];

    /**
     * Constructor
     */
    public function __construct($input) {
        session_start();
        $this->db = new Database();
        $this->input = $input;

    }

    public function run() {
        // Get the command
        $command = "welcome";
        if (isset($this->input["command"]))
            $command = $this->input["command"];

        switch($command) {
            case "newUser":
                $this->newUser();
                break;
            case "login":
                $this->login();
                break;
            case "reset":
                $this->reset();
                break;
            case "post":
                $this->makePost();
                break;
            case "submit":
                $this->submitPost();
                break;
            case "logout":
                $this->logout();
            default:
                $this->showWelcome();
                break;
        }
    }

    public function makePost(){
        include("posts.php");
    }

    public function submitPost(){
        $title = $_POST["title"];
        $username=$_SESSION["username"];
        $date=date('Y-m-d');
        $content=$_POST["story"];
        $this->db->addPost($title, $username, $date, $content);
        $this->showPosts();

    }

    public function reset(){
        $this->db->dropTables();
        $this->db->createDatabases();
        $this->showWelcome();
    }

    public function showWelcome(){
        include("login.php");
    }

    public function showPosts(){
        $database = $this->db;
        include("explore.php");
    }

    
    public function newUser() {
        $this->db->addUser($_POST["nameN"], $_POST["passwdB"]);
        $_SESSION["username"] = $_POST["nameN"];
        $this->showPosts();
    }

    public function login() {
        // need a name, email, and password
        // If something went wrong, show the welcome page again
        $res = $this->db->verifyUser($_POST["name"], $_POST["passwd"]);
        if($res){
            //$this->showWelcome();
            $_SESSION["username"] = $_POST["name"];
            $this->showPosts();
        }else{
            //$this->showPosts();
            $this->showWelcome();
        }
    }

    /**
     * Log out the user
     */
     public function logout() {
        // Udate the user's score before they log out, just in case
        $this->db->query("update users set score = $1 where email = $2;", $_SESSION["score"], $_SESSION["email"]);
        session_destroy();
        session_start();
    }
}