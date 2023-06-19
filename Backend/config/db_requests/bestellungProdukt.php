<?php
class BestellungProdukt
{
    public $p_id;
    public $anzahl;
    public $timestamp;
    public $title;
    public $preis;

    function __construct($p_id, $anzahl, $timestamp, $title, $preis)
    {
        $this->p_id= $p_id;
        $this->anzahl = $anzahl;
        $this->timestamp = $timestamp;
        $this->title = $title;
        $this->preis = $preis;
    }
}
?>