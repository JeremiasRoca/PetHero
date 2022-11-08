<?php
namespace Controllers;

use DAO\PetDao as PetDao;
use Models\Pet as Pet;

class PetController{
    private $PetDao;  
    
    function __construct(){
        $this->PetDao = new PetDao();
    }

    private function checkImgFiles($file,$user,$pet,$type){//tenemos que migrarlo a dao que me retorne el string
        $fileExtExplode = explode('.',$file['name']);
        $fileExt = strtolower(end( $fileExtExplode));
        
        if($type !='video'){
            if($type == 'vaxImg'){
                $fileName = $user->getId() . '_' . $pet->getId() .'_vacu.' . $fileExt;
            }elseif($type == 'profile'){
                $fileName = $user->getId() . '_' . $pet->getId() . '.' . $fileExt;
            }
            $fileDestination = ROOT.VIEWS_PATH."pet-images/" . $fileName ;

            $allowed = array('jpeg','jpg','pdf','gif','png','jfif');
    
            $size = 50000000;

        }else{
            $fileName = $user->getId() . '_' . $pet->getId() .'_video.' . $fileExt;
            $fileDestination = ROOT.VIEWS_PATH."pet-videos/" . $fileName ;
            $allowed = array('mkv','mov','mp4','264','mpg4','avi');

            $size = 2000000000;
        }

        if(in_array($fileExt,$allowed)){
            if($file['error'] == 0){
                if($file['size'] < $size ){ 
                    move_uploaded_file($file['tmp_name'],$fileDestination);
                } else{
                    $this->cancelPetRegister($pet->getId());
                    unlink($fileDestination);
                }
            }else{
                $this->cancelPetRegister($pet->getId());
                unlink($fileDestination);
            }
        }else{
            $this->cancelPetRegister($pet->getId());
            unlink($fileDestination);
        }

        return $fileName;

    }
    public function uploadFile(){
        require_once(VIEWS_PATH."validate-session.php");
        $user = $_SESSION["loggedUser"];

        $pet = $this->PetDao->getByOwnerId($user->getId());

        $size = (int) $_SERVER['CONTENT_LENGTH'];   

        if(isset($_POST)  )  {

                $photo = $_FILES['photo'];
                    
                $photoName = $this->checkImgFiles($photo,$user,$pet,'profile');
    
                $vaxPlanImg = $_FILES['vaxPlanImg'];
    
                $vaxImgName = $this->checkImgFiles($vaxPlanImg,$user,$pet,'vaxImg');
    
                $pet->setPhoto($photoName);
                $pet->setVaxPlanImg($vaxImgName);
                
                if($_FILES['video']['size'] != 0){
                    $video = $_FILES['video'];
    
                    $videoFileName =  $this->checkImgFiles($video,$user,$pet,'video');
                    $pet->setVideo($videoFileName); 
                }
                
            }


        $this->PetDao->addFilesToPet($pet);
        require_once(VIEWS_PATH."home-owner.php");
    }

    
    public function registerPet($petClass, $name, $breed, $size, $observation){
        require_once(VIEWS_PATH."validate-session.php");
        $user = $_SESSION["loggedUser"];

        $pet = new Pet();

        $pet->setIdOwner($user->getId());
        $pet->setPetClass($petClass);
        $pet->setName($name);
        $pet->setBreed($breed);
        $pet->setSize($size);
        $pet->setObservation($observation);

        $this->PetDao->register($pet);

        require_once(VIEWS_PATH."add-files.php");
    }

    public function cancelPetRegister($idPet){
        $this->PetDao->cancelPetRegister($idPet);
        require_once(VIEWS_PATH."home-owner.php");
    }

    public function Index($message = "")
    {
        echo $message; 
        require_once(VIEWS_PATH."validate-session.php");
        require_once(VIEWS_PATH."login.php");
    }        

    public function showHomeView($userType)
    {
        require_once(VIEWS_PATH."validate-session.php");
        if($userType == "owner"){
            require_once(VIEWS_PATH."home-owner.php");
        }else if($userType == "keeper"){
            require_once(VIEWS_PATH."home-keeper.php");
        }else{
            require_once(VIEWS_PATH."home.php");
        }
    }

    public function showAddPet(){
        require_once(VIEWS_PATH."validate-session.php");
        require_once(VIEWS_PATH."add-pet.php");  
    }

    public function showPetList(){
        require_once(VIEWS_PATH."validate-session.php");

        if(isset($_SESSION["loggedUser"])){
            require_once(VIEWS_PATH."pet-list.php");  
        }else{
            require_once(VIEWS_PATH."login.php");  
        } 
    }

    public function showMyPetList(){
    
      $user=$_SESSION["loggedUser"];
      $petList=$this->PetDao->getAllById($user->getId());
    
        if(isset($_SESSION["loggedUser"])){
            require_once(VIEWS_PATH."pet-list.php");
        }
    }
}
?>