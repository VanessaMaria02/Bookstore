<?php
class Product
{
    public $name;
    public $image_url;
    public $preis;

    function __construct($name, $image_url, $preis)
    {
        $this->name = $name;
        $this->image_url = $image_url;
        $this->preis = $preis;
    }
}
?>