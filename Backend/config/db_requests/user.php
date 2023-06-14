<?php
class User
{
    public $uid;
    public $uname;
    public $password;
    public $urole;


    function __construct($uid, $uname, $password, $urole)
    {
        $this->uid= $uid;
        $this->uname = $uname;
        $this->password = $password;
        $this->urole = $urole;
    }
}
?>