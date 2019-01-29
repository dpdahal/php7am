<?php

namespace Application\system;


class UploadFile
{

    private $data;

    private $tmpName;

    public function check($file)
    {
        if (empty($file)) return false;
        $this->data = strtolower(pathinfo($_FILES[$file]['name'], PATHINFO_EXTENSION));
        $this->tmpName = $_FILES[$file]['tmp_name'];
        return $_FILES[$file]['name'];

    }


    public function getExt()
    {

        return $this->data;

    }

    public function move($location)
    {
        if (empty($location)) throw new \PDOException("Location not found");

        return move_uploaded_file($this->tmpName, $location);

    }

}