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
            case "logout":
                $this->logout();
            default:
                $this->showWelcome();
                break;
        }
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
        include("explore.php");
    }

    
    public function newUser() {
        $this->db->addUser($_POST["nameN"], $_POST["passwdB"]);
        $this->showPosts();
    }

    public function login() {
        // need a name, email, and password
        // If something went wrong, show the welcome page again
        $res = $this->db->verifyUser($_POST["name"], $_POST["passwd"]);
        if($res){
            //$this->showWelcome();
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