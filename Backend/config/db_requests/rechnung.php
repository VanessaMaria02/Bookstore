<?php
class Rechnung
{
    public $id;
    public $u_id;
    public $timestamp;

    function __construct($id, $u_id, $timestamp)
    {
        $this->id= $id;
        $this->u_id = $u_id;
        $this->timestamp = $timestamp;
    }
}
?>