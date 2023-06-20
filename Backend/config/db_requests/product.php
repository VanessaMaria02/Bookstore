<?php
class Product
{
    public $id;
    public $name;
    public $image_url;
    public $preis;
    public $kategorie;
    public $autor;
    public $beschreibung;

    function __construct($id, $name, $image_url, $preis, $kategorie = null, $autor = null, $beschreibung = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->image_url = $image_url;
        $this->preis = $preis;
        $this->kategorie = $kategorie;
        $this->autor = $autor;
        $this->beschreibung = $beschreibung;
    }
}
?>