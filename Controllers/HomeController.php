<?php
namespace Controllers;

use DAO\UserDao as UserDao;
use Models\Keeper as Keeper;
use Models\Owner as Owner;

class HomeController {
    private $UserDao;  

    function __construct() {
        $this->UserDao = new UserDao();
    }

    public function register($email, $firstname, $lastname, $password, $repeatPassword, $userName, $userType) {

        if(!$this->confirmPassword($password, $repeatPassword)) {
            $this->showRegisterView();
        }else if($this->UserDao->getByEmail($email)) {
            $this->showRegisterView();
        }else {
                if($userType == "keeper"){
                    $user = new Keeper();  
                }else{
                    $user = new Owner();  
                }
                $user->setEmail($email);
                $user->setPassword($password);
                $user->setUserName($userName);
                $user->setFirstname($firstname);
                $user->setLastname($lastname);
                $user->setUserType($userType);

                $_SESSION["loggedUser"]= $user; 
    
                $this->UserDao->register($user);
                
                $this->showHomeView($user->getUserType());
            }
        
    }

   

    public function confirmPassword($password,$repeat){
        if($password === $repeat){
            return true;
        }
        return false;
    }

    public function Index($message = "")
    {

        require_once(VIEWS_PATH."login.php");
    }        

    public function showHomeView(){
        require_once(VIEWS_PATH."validate-session.php");
        
        $user=$_SESSION["loggedUser"];

        if($user->getUserType()== "owner"){  
            require_once(VIEWS_PATH."home-owner.php");
        }else if($user->getUserType()== "keeper"){  

            if($user->getCompensation()==""){
                require_once(VIEWS_PATH."home-keeper.php");
            }else {
                $this->lobbyKeeper();
            }
            
        }else{
            require_once(VIEWS_PATH."home.php"); 
        }
    }

    public function showKeeperList(){
        $keeperList = $this->UserDao->getKeepers();
        require_once(VIEWS_PATH."validate-session.php");
        require_once(VIEWS_PATH."keeper-list.php");
    }

    public function showOwnerList(){
        $ownerList = $this->UserDao->getOwners();
        require_once(VIEWS_PATH."validate-session.php");
        require_once(VIEWS_PATH."owner-list.php");
    }


    public function showTypeOfPet(){
        if(isset($_SESSION["loggedUser"])){
            require_once(VIEWS_PATH."type-pets.php");
        }else{
            $this->Index();
        }
    }

    public function lobbyKeeper()
    {
      
        require_once(VIEWS_PATH."lobby-keeper.php");
    }   

    public function moreData ($dates,$compensation,$size){
        $today = date('Y-m-d');
   
        if($dates > $today){
            $this->UserDao->addAvilability($dates);
            $this->UserDao->setCompensation($compensation);
            $this->UserDao->setPetType($size);
        }

        $this->lobbyKeeper();
    }


    public function login($email,$password){
        $user = $this->UserDao->getByEmail($email);
      
        if($user!=null && $user->getPassword() == $password){
            $_SESSION["loggedUser"]= $user; 
            $this->showHomeView($user->getUserType());
        }else{

        
            $this->Index("Incorret user or password");
        }
    }
    public function logout(){
        session_destroy();
        $this->Index();
    }
   
    public function showRegisterView(){
       
        require_once(VIEWS_PATH."register.php");
    }

}
