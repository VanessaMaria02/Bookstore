<?php
class Person
{
    public $u_id;
    public $uname;
    public $u_role;
    public $anrede;
    public $vname;
    public $nname;
    public $adresse;
    public $plz;
    public $ort;
    public $email;

    function __construct($u_id, $uname, $u_role, $anrede, $vname, $nname, $adresse, $plz, $ort, $email)
    {
        $this->u_id = $u_id;
        $this->uname = $uname;
        $this->u_role = $u_role;
        $this->anrede= $anrede;
        $this->vname = $vname;
        $this->nname = $nname;
        $this->adresse = $adresse;
        $this->plz = $plz;
        $this->ort = $ort;
        $this->email = $email;
        
    }
}
?>



