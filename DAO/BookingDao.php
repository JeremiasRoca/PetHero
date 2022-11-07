<?php
namespace DAO;

use Models\Booking as Booking;

class BookingDao{
    private $bookingList = [];
    private $bookingListAux = [];
    private $bookingListAux2 = [];
    private $fileName = ROOT."Data/Bookings.json";


    public function getByIdKeeper($idKeeper){
        $this->retrieveData();

        $bookings = array_filter($this->bookingList, function($booking) use($idKeeper){
            return $booking->getEmail() == $idKeeper;
        });
        $bookings = array_values($bookings); 
        return (count($bookings) > 0) ? $bookings[0] : null;

    }

    public function getById($id){
        $this->retrieveData();

        $bookings = array_filter($this->bookingList, function($booking) use($id){
            return $booking->getId() == $id;
        });
        $bookings = array_values($bookings);
        return (count($bookings) > 0) ? $bookings[0] : null;
    }



    public function getAll()
    {
        $this->retrieveData();

        return $this->bookingList;
    }

    public function getAllByIdOwner($id){
        $this->retrieveDataByIdOwner($id);

        return $this->bookingListAux;
    }

    public function getAllByIdKeeper($id){
        $this->retrieveDataByIdKeeper($id);

        return $this->bookingListAux2;
    }

    public function getPendienteIdKeeper($idKeeper){
        $this->retrieveData();
        $pendienteList = [];

        foreach($this->bookingList as $booking){
            if($booking->getType() == "pendiente" && $booking->getIdKeeper() == $idKeeper){
                array_push($pendienteList,$booking);
            }
        }
        return $pendienteList;
    }

    public function retrieveData(){

        $this->bookingList = [];

             if(file_exists($this->fileName))
             {
                $jsonToDecode = file_get_contents($this->fileName);
                $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : [];
                
                foreach($contentArray as $content)
                {
                    
                        $booking = new Booking();
                        $booking->setId($content["id"]);
                        $booking->setIdOwner($content["idOwner"]);
                        $booking->setIdKeeper($content["idKeeper"]);
                        $booking->setState($content["state"]);
                        $booking->setPets($content["pets"]);
                        $booking->setDate($content["date"]);
                        
                    array_push($this->bookingList, $booking);
                }
             }
    
    }


    public function retrieveDataByIdOwner($id){

        $this->bookingListAux = [];

             if(file_exists($this->fileName))
             {
                $jsonToDecode = file_get_contents($this->fileName);
                $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : [];
                
                foreach($contentArray as $content)
                {
                    
                        
                    $booking = new Booking();
                    $booking->setId($content["id"]);
                    $booking->setIdOwner($content["idOwner"]);
                    $booking->setIdKeeper($content["idKeeper"]);
                    $booking->setState($content["state"]);
                    $booking->setPets($content["pets"]);
                    $booking->setDate($content["date"]);
                    if($booking->getIdOwner()===$id){
                    array_push($this->bookingListAux, $booking);
                    }
                }
             }
    
    }

    public function retrieveDataByIdKeeper($id){

        $this->bookingListAux2 = [];

             if(file_exists($this->fileName))
             {
                $jsonToDecode = file_get_contents($this->fileName);
                $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : [];
                
                foreach($contentArray as $content)
                {
                    
                        
                    $booking = new Booking();
                    $booking->setId($content["id"]);
                    $booking->setIdOwner($content["idOwner"]);
                    $booking->setIdKeeper($content["idKeeper"]);
                    $booking->setState($content["state"]);
                    $booking->setPets($content["pets"]);
                    $booking->setDate($content["date"]);
                   
                    if($booking->getIdKeeper()===strval($id)){
                    array_push($this->bookingListAux2, $booking);
                    }
                }
             }
    
    }



    public function register(Booking $booking){

        $this->retrieveData();
        
        $booking->setId($this->getNextId());  
        $booking->setPets($this->getNextId());  
        
        array_push($this->bookingList, $booking);

        $this->saveData();

    }

    public function saveData(){

        $arrayToEncode = [];

            foreach($this->bookingList as $booking)
            {
                $valuesArray = [];
                $valuesArray["id"] = $booking->getId();
                $valuesArray["idKeeper"] = $booking->getIdKeeper();
                $valuesArray["idOwner"] = $booking->getIdOwner();
                $valuesArray["state"] = $booking->getState();
                $valuesArray["date"] = $booking->getDate();
                $valuesArray["pets"] = $booking->getPets();
                
              
                array_push($arrayToEncode, $valuesArray);
            }

            $fileContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

            file_put_contents($this->fileName, $fileContent);
    
    }

    private function getNextId()
    {
        $id = 0;
        if(sizeof($this->bookingList) != 0){
            foreach($this->bookingList as $booking)
            {
                $id = ($booking->getId() > $id) ? $booking->getId() : $id;

            }   
        }
        return $id+1;
    }


}







?>