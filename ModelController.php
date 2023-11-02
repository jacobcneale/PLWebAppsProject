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
            case "posts":
                $this->showPosts();
                break;
            case "post":
                $this->makePost();
                break;
            case "submit":
                $this->submitPost();
                break;
            case "logout":
                $this->logout();
            case "goto_login":
                $this->showLogin();
                break;
            case "verify_login":
                $this->verifyLogin();
                break;
            default:
                $this->showWelcome();
                break;
        }
    }


    public function showWelcome($username=null){
        include("src/templates/home.php");
    }

    public function showLogin(){
        include("src/templates/login.php");
    }

    public function verifyLogin(){
        $res = $this->db->getUser($_POST["username"]);
        if (!(empty($res))){
            if (password_verify($_POST["password"],$res["passhash"])){
                $_SESSION["user"]=$_POST["username"];
                $this->showWelcome($_SESSION["user"]);
            }
            else {
                $this->showLogin();
                echo "PASSWORD INCORRECT";
            }
        }
        else {
            $this->showLogin();
            echo "Username not found. Sign up instead?";
        }
    }

    /*
     * Handle user registration and log-in
     */
    public function makePost(){
        include("posts.php");
    }

    public function submitPost(){
        $title = $_POST["Title"];
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