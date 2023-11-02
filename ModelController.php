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
                $this->showWelcome();
                break;
            case "signup":
                $this->showSignUp();
                break;
            case "goto_login":
                $this->showLogin();
                break;
            case "verify_login":
                $this->verifyLogin();
                break;
            case "verify_signup":
                $this->verifySignUp();
                break;
            default:
                $this->showWelcome();
                break;
        }
    }


    public function showWelcome($username=null){
        if (isset($_SESSION["user"])){$username=$_SESSION["user"];}
        include("src/templates/home.php");
    }

    public function showLogin(){
        include("src/templates/login.php");
    }

    public function showSignUp(){
        include("src/templates/signup.php");
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

    public function verifySignUp(){
        $res = $this->db->getUser($_POST["username"]);
        if (!(empty($res))){
            $this->showSignUp();
            echo "USERNAME TAKEN";
        }
        else {
            // regex pattern from https://ihateregex.io/expr/password/
            $regex_pattern = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$/";
            if ($_POST["username"]===""){
                $this->showSignUp();
                echo "Please enter a username";
            }
            else if (!preg_match($regex_pattern,$_POST["password"])){
                $this->showSignUp();
                echo "Password must contain an upppercase letter, a lowercase letter, a number, and one of 
                    the following: #?!@$%^&*-. It must be at least 8 characters long.";
            }
            else if ($_POST["password"]!==$_POST["verify_password"]){
                $this->showSignUp();
                echo "Passwords do not match.";
            }
            else {
                $this->db->addUser($_POST["username"],password_hash($_POST["password"],PASSWORD_DEFAULT));
                $_SESSION["user"]=$_POST["username"];
                $this->showWelcome();
            }
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
        session_destroy();
        session_start();
    }
}