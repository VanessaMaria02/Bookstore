<?php
class Bestellung
{
    public $id;
    public $u_id;
    public $pr_id;
    public $anzahl;
    public $timestamp;

    function __construct($id, $u_id, $pr_id, $anzahl,$timestamp)
    {
        $this->id= $id;
        $this->u_id = $u_id;
        $this->pr_id = $pr_id;
        $this->anzahl = $anzahl;
        $this->timestamp = $timestamp;
    }
}
?>