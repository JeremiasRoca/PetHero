<?php
namespace Controllers;

use DAO\UserDao as UserDao;
use Models\Keeper as Keeper;


class KeeperController {
    private $UserDao;  

    function __construct() {
        $this->UserDao = new UserDao();
    }

    public function lobbyKeeper($message="")
    {
        require_once(VIEWS_PATH."lobby-keeper.php");
    }   

    public function addAvilability ($dates){
        $today = date('Y-m-d');
   
        if($dates > $today){
            $this->UserDao->addAvilability($dates);
            $this->lobbyKeeper("");
        }else{

            $this->lobbyKeeper("ERROR-INCORRET DATE");
        }

     
    }

    public function showAddAvilability(){
      
        require_once(VIEWS_PATH."add-avilability.php");
        
    }


    
    

}   
    
?> 