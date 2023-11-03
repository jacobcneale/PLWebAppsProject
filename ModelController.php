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
        if(isset($this->input["number"])){
            $this->editPost("");
            return;
        }

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
                $this->makePost("");
                break;
            case "delete":
                $this->deletePost();
                break;
            case "edit":
                $this->editPost();
                break;
            case "submit":
                $this->submitPost();
                break;
            case "submitEdit":
                $this->submitEdit();
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

    public function editPost($m){
        $message=$m;
        $id=$_GET["number"];
        $post=$this->db->getPost($id);
        $title=$post[0]["title"];
        $content=$post[0]["content"];
        include("edit.php");
    }

    public function submitEdit(){
        $title = $_POST["Title2"];
        $username=$_SESSION["username"];
        $date=date('Y-m-d');
        $content=$_POST["story2"];
        $id=$_POST["editNumber"];
        $_GET["number"]=$id;
        if($title==""){
            $this->editPost("Please include title");
        }
        else{
            $this->db->updatePost($id, $title, $username, $date, $content);
            $this->showPosts();
        }
    }

    public function deletePost(){
        $id = $_POST["number"];
        $this->db->deletePost($id);
        $this->showPosts();
    }


    public function showWelcome($username=null){
        include("src/templates/home.php");
    }

    public function showLogin(){
        //include("src/templates/login.php");
        include("login.php");
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
    public function makePost($m){
        if(isset($_SESSION["username"])){
            $message=$m;
            include("posts.php");
        }
        $this->showPosts();
    }

    public function submitPost(){
        $title = $_POST["Title"];
        $username=$_SESSION["username"];
        $date=date('Y-m-d');
        $content=$_POST["story"];
        if($title==""){
            $this->makePost("Please include title");
        }
        else{
            $this->db->addPost($title, $username, $date, $content);
            $this->showPosts();
        }

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
        if(isset($_SESSION["username"])){
            $this->showPosts();
            return;
        }
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