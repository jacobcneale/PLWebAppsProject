<?php

class ModelController {
    private $db;

    private $input = [];

    /**
     * Constructor
     */
    public function __construct($input) {
        session_start();
        $this->db = new Database();
        $this->input = $input;

    }

    //Determines what function to execute
    public function run() {
        // Handles get options
        if(isset($this->input["number"])){
            $this->editPost("");
            return;
        }

        // Handles post options
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
            case "restaurants":
                $this->showRestaurants();
                break;
            case "aboutus":
                $this->aboutUs();
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
            case "json":
                $this->jsonFormat();
                break;
            default:
                $this->showWelcome();
                break;
        }
    }

    public function aboutUs(){
        include("aboutus.php");
    }

    public function showRestaurants(){
        include("restaurants.php");
    }

    //Display posts in json
    public function jsonFormat(){
        $posts=$this->db->getPosts();
        $json=json_encode($posts);
        include("json.php");
    }

    //Load edit a post form
    public function editPost($m){
        $message=$m;
        $id=$_GET["number"];
        $post=$this->db->getPost($id);
        $title=$post[0]["title"];
        $content=$post[0]["content"];
        include("edit.php");
    }

    //Finalize post edits
    public function submitEdit(){
        if(!isset($_POST["Title2"])){
            $this->showPosts();
            return;
        }
        $title = $_POST["Title2"];
        $username=$_SESSION["username"];
        $date=date('Y-m-d');
        $content=$_POST["story2"];
        $id=$_POST["editNumber"];
        $_GET["number"]=$id;
        //make sure title is filled
        if($title==""){
            $this->editPost("Please include title");
        }
        else{
            $this->db->updatePost($id, $title, $username, $date, $content);
            $this->showPosts();
        }
    }

    //delete posts
    public function deletePost(){
        $id = $_POST["number"];
        $this->db->deletePost($id);
        $this->showPosts();
    }

    //show home
    public function showWelcome($username=null){
        if (isset($_SESSION["user"])){$username=$_SESSION["user"];}
        $database=$this->db;
        include("src/templates/home.php");
    }

    //login page
    public function showLogin(){
        include("src/templates/login.php");
        //include("login.php");
    }

    //sign up page
    public function showSignUp(){
        include("src/templates/signup.php");
    }

    //verify user login and password
    public function verifyLogin(){
        $res = $this->db->getUser($_POST["username"]);
        if (!(empty($res))){
            if (password_verify($_POST["password"],$res["passhash"])){
                $_SESSION["user"]=$_POST["username"];
                $_SESSION["username"]=$_POST["username"];
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

    //verify signup is valid
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
                $_SESSION["username"]=$_POST["username"];
                $this->showWelcome();
            }
        }
    }

    /*
     * Loads form page
     */
    public function makePost($m){
        if(isset($_SESSION["username"])){
            $message=$m;
            include("posts.php");
        }
        //$this->showPosts();
    }

    //submits a post from form
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

    //resets tables
    public function reset(){
        $this->db->dropTables();
        $this->db->createDatabases();
        $this->showWelcome();
    }

    //displays posts page
    public function showPosts(){
        $database = $this->db;
        include("explore.php");
    }

    //creates a new user
    public function newUser() {
        $this->db->addUser($_POST["nameN"], $_POST["passwdB"]);
        $_SESSION["username"] = $_POST["nameN"];
        $this->showPosts();
    }

    //login page
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
        session_destroy();
        session_start();
    }
}