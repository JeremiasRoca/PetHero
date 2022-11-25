<?php

namespace DAO;

use Models\Booking as Booking;

class BookingDao
{
    private $bookingList = [];
    private $bookingListAux = [];
    private $bookingListAux2 = [];
    private $fileName = ROOT . "Data/Bookings.json";


    public function getByIdKeeper($idKeeper)
    {
        $this->retrieveData();

        $bookings = array_filter($this->bookingList, function ($booking) use ($idKeeper) {
            return $booking->getEmail() == $idKeeper;
        });
        $bookings = array_values($bookings);
        return (count($bookings) > 0) ? $bookings[0] : null;
    }

    public function getById($id)
    {
        $this->retrieveData();

        $bookings = array_filter($this->bookingList, function ($booking) use ($id) {
            return $booking->getId() == $id;
        });
        $bookings = array_values($bookings);
        return (count($bookings) > 0) ? $bookings[0] : null;
    }

    public function getByTransition()
    {
        $this->retrieveData();
        $state = "transition";
        $bookings = array_filter($this->bookingList, function ($booking) use ($state) {
            return $booking->getState() == $state;
        });
        $bookings = array_values($bookings);
        return (count($bookings) > 0) ? $bookings[0] : null;
    }

    public function addPet($pet, $idBooking)
    {

        $this->retrieveData();
        foreach ($this->bookingList as $booking) {
            if ($booking->getId() == $idBooking) {
                $array = $booking->getPets();
                array_push($array, $pet);
                $booking->setPets($array);
            }
        }
        $this->saveData();
    }


    public function updateState(Booking $booking, $state)
    {

        $this->retrieveData();
        foreach ($this->bookingList as $aux) {

            if ($aux->getId() == $booking->getId()) {

                if ($state == "accepted") {
                    $booking->setState("accepted");
                } else if ($state == "refused") {
                    $booking->setState("refused");
                } else if ($state == "transition") {
                    $booking->setState("transition");
                } else if ($state->setState("earring")) {
                    $booking->setState("earring");
                }
                $this->retrieveData();
                $this->delete($booking->getId());
                array_push($this->bookingList, $booking);
                $this->saveData();
            }
        }
    }

    public function updateStateEarring()
    {

        $this->retrieveData();
        foreach ($this->bookingList as $aux) {



            if ($aux->getState() == "transition") {
                $aux->setState("earring");
            }


            $this->retrieveData();
            $this->delete($aux->getId());
            array_push($this->bookingList, $aux);
            $this->saveData();
        }
    }



    public function modify($booking)
    {
        $this->retrieveData();
        $this->delete($booking->getId());
        array_push($this->bookingList, $booking);
        $this->saveData();
    }




    public function getAll()
    {
        $this->retrieveData();

        return $this->bookingList;
    }

    public function getAllByIdOwner($id)
    {
        $this->retrieveDataByIdOwner($id);

        return $this->bookingListAux;
    }

    public function getAllByIdKeeper($id)
    {
        $this->retrieveDataByIdKeeper($id);

        return $this->bookingListAux2;
    }


    public function getPendienteIdKeeper($idKeeper)
    {
        $this->retrieveData();
        $pendienteList = [];

        foreach ($this->bookingList as $booking) {
            if ($booking->getType() == "earring" && $booking->getIdKeeper() == $idKeeper) {
                array_push($pendienteList, $booking);
            }
        }
        return $pendienteList;
    }

    public function retrieveData()
    {

        $this->bookingList = [];

        if (file_exists($this->fileName)) {
            $jsonToDecode = file_get_contents($this->fileName);
            $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : [];

            foreach ($contentArray as $content) {

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



    public function retrieveDataByIdOwner($id)
    {

        $this->bookingListAux = [];

        if (file_exists($this->fileName)) {
            $jsonToDecode = file_get_contents($this->fileName);
            $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : [];

            foreach ($contentArray as $content) {


                $booking = new Booking();
                $booking->setId($content["id"]);
                $booking->setIdOwner($content["idOwner"]);
                $booking->setIdKeeper($content["idKeeper"]);
                $booking->setState($content["state"]);
                $booking->setPets($content["pets"]);
                $booking->setDate($content["date"]);
                if ($booking->getIdOwner() === $id) {
                    array_push($this->bookingListAux, $booking);
                }
            }
        }
    }

    public function retrieveDataByIdKeeper($id)
    {

        $this->bookingListAux2 = [];

        if (file_exists($this->fileName)) {
            $jsonToDecode = file_get_contents($this->fileName);
            $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : [];

            foreach ($contentArray as $content) {


                $booking = new Booking();
                $booking->setId($content["id"]);
                $booking->setIdOwner($content["idOwner"]);
                $booking->setIdKeeper($content["idKeeper"]);
                $booking->setState($content["state"]);
                $booking->setPets($content["pets"]);
                $booking->setDate($content["date"]);

                if ($booking->getIdKeeper() === strval($id)) {
                    array_push($this->bookingListAux2, $booking);
                }
            }
        }
    }



    public function register(Booking $booking)
    {

        $this->retrieveData();

        $booking->setId($this->getNextId());

        array_push($this->bookingList, $booking);

        $this->saveData();
    }

    public function saveData()
    {

        $arrayToEncode = [];

        foreach ($this->bookingList as $booking) {
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

    public function delete($id)
    {
        $this->retrieveData();

        $positionToDelete = $this->getPositionById($id);
        if (!is_null($positionToDelete)) unset($this->bookingList[$positionToDelete]);

        $this->saveData();
    }

    public function getPositionById($id)
    {
        $position = 0;
        foreach ($this->bookingList as $booking) {
            if ($booking->getId() == $id) return $position;
            $position++;
        }
        return null;
    }






    private function getNextId()
    {
        $id = 0;
        if (sizeof($this->bookingList) != 0) {
            foreach ($this->bookingList as $booking) {
                $id = ($booking->getId() > $id) ? $booking->getId() : $id;
            }
        }
        return $id + 1;
    }
}
