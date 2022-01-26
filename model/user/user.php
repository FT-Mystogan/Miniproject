<?php
class User
{
    public $id;
    public $fullname;
    public $username;
    public $password;
    public $img;
    public function __construct($id, $fullname, $username, $password,$img)
    {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->username = $username;
        $this->password = $password;
        $this->img = $img;
    }
}
