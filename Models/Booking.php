<?php
namespace Models ;


class Booking extends User{
    private $id;
    private $idOwner;
    private $date;
    private $idKeeper;
    private $state;//pendiente(earring) - aceptado(accepted) - rechazado(refused)
    private $pets;

   

    /**
     * Get the value of idKeeper
     */ 
    public function getIdKeeper()
    {
        return $this->idKeeper;
    }

    /**
     * Set the value of idKeeper
     *
     * @return  self
     */ 
    public function setIdKeeper($idKeeper)
    {
        $this->idKeeper = $idKeeper;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of idOwner
     */ 
    public function getIdOwner()
    {
        return $this->idOwner;
    }

    /**
     * Set the value of idOwner
     *
     * @return  self
     */ 
    public function setIdOwner($idOwner)
    {
        $this->idOwner = $idOwner;

        return $this;
    }

    /**
     * Get the value of state
     */ 
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */ 
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of pets
     */ 
    public function getPets()
    {
        return $this->pets;
    }

    /**
     * Set the value of pets
     *
     * @return  self
     */ 
    public function setPets($pets)
    {
        $this->pets = $pets;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }
}
?>