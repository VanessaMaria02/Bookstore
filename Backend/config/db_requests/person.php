<?php
class Person
{
    public $anrede;
    public $vname;
    public $nname;
    public $adresse;
    public $plz;
    public $ort;
    public $email;
    public $uname;

    function __construct($anrede, $vname, $nname, $adresse, $plz, $ort, $email, $uname)
    {
        $this->anrede= $anrede;
        $this->vname = $vname;
        $this->nname = $nname;
        $this->adresse = $adresse;
        $this->plz = $plz;
        $this->ort = $ort;
        $this->email = $email;
        $this->uname = $uname;
    }
}
?>



