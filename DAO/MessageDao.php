<?php

namespace DAO;

use Models\Message as Message;

class MessageDao
{
    private $messageList = [];
    private $messageListAux = [];
    private $fileName = ROOT . "Data/Message.json";


    public function getAllByIdOwnerAndIdOwner($idOwner, $idKeeper)
    {
        $this->retrieveDataByIdOwnerAndIdOwner($idOwner, $idKeeper);

        return $this->messageListAux;
    }

    public function retrieveData()
    {
        $this->messageList = [];

        if (file_exists($this->fileName)) {
            $jsonToDecode = file_get_contents($this->fileName);
            $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : [];

            foreach ($contentArray as $content) {

                $message = new Message();
                $message->setId($content["id"]);
                $message->setIdOwner($content["idOwner"]);
                $message->setIdKeeper($content["idKeeper"]);
                $message->setText($content["text"]);
                $message->setDate($content["date"]);
                $message->setSource($content["source"]);

                array_push($this->messageList, $message);
            }
        }
    }

    public function retrieveDataByIdOwnerAndIdOwner($idOwner, $idKeeper)
    {
        $this->messageListAux = [];

        if (file_exists($this->fileName)) {
            $jsonToDecode = file_get_contents($this->fileName);
            $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : [];

            foreach ($contentArray as $content) {

                $message = new Message();
                $message->setId($content["id"]);
                $message->setIdOwner($content["idOwner"]);
                $message->setIdKeeper($content["idKeeper"]);
                $message->setText($content["text"]);
                $message->setDate($content["date"]);
                $message->setSource($content["source"]);
                if ($message->getIdOwner() == $idOwner && $message->getIdKeeper() == $idKeeper) {
                    array_push($this->messageListAux, $message);
                }
            }
        }
    }

    public function register(Message $message)
    {

        $this->retrieveData();

        $message->setId($this->getNextId());

        array_push($this->messageList, $message);

        $this->saveData();
    }

    public function saveData()
    {
        $arrayToEncode = [];

        foreach ($this->messageList as $message) {
            $valuesArray = [];
            $valuesArray["id"] = $message->getId();
            $valuesArray["idKeeper"] = $message->getIdKeeper();
            $valuesArray["idOwner"] = $message->getIdOwner();
            $valuesArray["text"] = $message->getText();
            $valuesArray["date"] = $message->getDate();
            $valuesArray["source"] = $message->getSource();

            array_push($arrayToEncode, $valuesArray);
        }

        $fileContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

        file_put_contents($this->fileName, $fileContent);
    }

    public function delete($id)
    {
        $this->retrieveData();

        $positionToDelete = $this->getPositionById($id);
        if (!is_null($positionToDelete)) unset($this->messageList[$positionToDelete]);

        $this->saveData();
    }

    public function getPositionById($id)
    {
        $position = 0;
        foreach ($this->messageList as $message) {
            if ($message->getId() == $id) return $position;
            $position++;
        }
        return null;
    }

    private function getNextId()
    {
        $id = 0;
        if (sizeof($this->messageList) != 0) {
            foreach ($this->messageList as $message) {
                $id = ($message->getId() > $id) ? $message->getId() : $id;
            }
        }
        return $id + 1;
    }
}
