<?php

namespace Controllers;

use DAO\BookingDao as BookingDao;
use DAO\PetDao as PetDao;
use Models\Booking as Booking;


class BookingController
{
    private $BookingDao;
    private $PetDao;


    function __construct()
    {
        $this->BookingDao = new BookingDao();
        $this->PetDao = new PetDao();
    }


    public function showAddBooking($date, $idKeeper)
    {
        $user = $_SESSION["loggedUser"];
        $this->booking->setIdOwner($user->getId());
        $this->booking->getState("earring");
        $this->booking->setIdKeeper($idKeeper);
        $this->booking->getDate($date);
        require_once(VIEWS_PATH . "add-booking.php");
    }


    public function registerBooking($date, $idKeeper)
    {

        $user = $_SESSION["loggedUser"];

        $booking = new Booking();

        $booking->setIdOwner($user->getId());
        $booking->setState("earring");
        $booking->setIdKeeper($idKeeper);
        $booking->setDate($date);

        $this->BookingDao->register($booking);

        require_once(VIEWS_PATH . "home-owner.php");
    }


    public function updateState($state, $id)
    {

        $booking = $this->BookingDao->getById($id);


        $this->BookingDao->updateState($booking, $state);


        $this->lobbyKeeper();
    }

    public function updatePet($state, $id)
    {

        $booking = $this->BookingDao->getById($id);


        $this->BookingDao->updateState($booking, $state);

        $this->selectPet();
    }

    public function selectPet()
    {
        $user = $_SESSION["loggedUser"];
        $petList =  $this->PetDao->getAllById($user->getId());

        require_once(VIEWS_PATH . "add-pet-booking.php");
    }

    public function addPetBooking($id)
    {
        $booking =  $this->BookingDao->getByTransition();


        $this->BookingDao->addPet($id, $booking->getId());
        $this->BookingDao->updateStateEarring();
        require_once(VIEWS_PATH . "home-owner.php");
    }


    public function showMyBookingList()
    {
        $user = $_SESSION["loggedUser"];
        $bookingList = $this->BookingDao->getAllByIdOwner($user->getId());

        if (isset($_SESSION["loggedUser"])) {
            require_once(VIEWS_PATH . "booking-list.php");
        }
    }

    public function showMyBookingListKeeper()
    {
        $user = $_SESSION["loggedUser"];
        $bookingList2 = $this->BookingDao->getAllByIdKeeper($user->getId());


        if (isset($_SESSION["loggedUser"])) {
            require_once(VIEWS_PATH . "booking-keeper-list.php");
        }
    }

    public function showMyBookingListKeeperAll()
    {
        $user = $_SESSION["loggedUser"];
        $bookingList2 = $this->BookingDao->getAllByIdKeeper($user->getId());


        if (isset($_SESSION["loggedUser"])) {
            require_once(VIEWS_PATH . "booking-keeper-listAll.php");
        }
    }

    public function lobbyKeeper()
    {

        require_once(VIEWS_PATH . "lobby-keeper.php");
    }
}
