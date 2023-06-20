<?php
class userBestellung
{
    public $u_id;
    public $timestamp;
    

    function __construct($u_id, $timestamp)
    {
        $this->u_id = $u_id;
        $this->timestamp = $timestamp;
    }
}
?>