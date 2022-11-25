<?php

namespace Controllers;

use DAO\MessageDao as MessageDao;
use Models\Message as Message;


class MessageController
{
    private $MessageDao;
    private $idAux;

    function __construct()
    {
        $this->MessageDao = new MessageDao();
    }

    public function addMessage($text, $idAux)
    {
        require_once(VIEWS_PATH . "validate-session.php");
        $user = $_SESSION["loggedUser"];

        $message = new Message();
        if ($user->getUserType() == "owner") {
            $message->setIdOwner(strval($user->getId()));
            $message->setIdKeeper($idAux);
        } elseif ($user->getUserType() == "keeper") {
            $message->setIdOwner($idAux);
            $message->setIdKeeper($user->getId());
        }
        date_default_timezone_set('America/Argentina/Buenos_Aires');

        $message->setDate(date("Y/m/d/H:i"));
        $message->setText($text);
        $message->setSource($user->getUserType());

        $this->MessageDao->register($message);
        if ($user->getUserType() == "owner") {
            $messageListAux = $this->MessageDao->getAllByIdOwnerAndIdOwner($user->getId(), $idAux);
            var_dump($user->getId());
            var_dump($idAux);
            require_once(VIEWS_PATH . "lobby-chat.php");
        } elseif ($user->getUserType() == "keeper") {
            $messageListAux = $this->MessageDao->getAllByIdOwnerAndIdOwner($idAux, strval($user->getId()));
            require_once(VIEWS_PATH . "lobby-chat.php");
        }
    }

    public function IndexMessage($idKeeper)
    {
        require_once(VIEWS_PATH . "validate-session.php");
        $user = $_SESSION["loggedUser"];
        $this->idAux = $idKeeper;
        var_dump($this->idAux);
        if ($user->getUserType() == "owner") {
            $messageListAux = $this->MessageDao->getAllByIdOwnerAndIdOwner(strval($user->getId()), $idKeeper);
        } elseif ($user->getUserType() == "keeper") {
            $messageListAux = $this->MessageDao->getAllByIdOwnerAndIdOwner($idKeeper, $user->getId());
        }


        $idAux = $idKeeper;
        require_once(VIEWS_PATH . "lobby-chat.php");
    }



    public function showMyMessageList()
    {
        require_once(VIEWS_PATH . "validate-session.php");
        $user = $_SESSION["loggedUser"];
        if ($user->getUserType() == "owner") {
            $messageListAux = $this->MessageDao->getAllByIdOwnerAndIdOwner(strval($user->getId()), $this->idAux);
            require_once(VIEWS_PATH . "lobby-chat.php");
        } elseif ($user->getUserType() == "keeper") {
            $messageListAux = $this->MessageDao->getAllByIdOwnerAndIdOwner($this->idAux, strval($user->getId()));
            require_once(VIEWS_PATH . "lobby-chat.php");
        }

        var_dump(strval($user->getId()));
        var_dump($user->getId());
        var_dump($this->idAux);
        var_dump($messageListAux);
    }
}
