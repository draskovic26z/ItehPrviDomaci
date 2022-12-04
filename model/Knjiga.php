<?php

include_once('response.php');

class Knjiga
{
    public $knjigaID;
    public $naslov;
    public $godinaIzdavanja;
    public $cena;
    public $pisacID;


    public function __construct($knjigaID, $naslov, $godinaIzdavanja, $cena, $pisacID)
    {
        $this->knjigaID = $knjigaID;
        $this->naslov = $naslov;
        $this->godinaIzdavanja = $godinaIzdavanja;
        $this->cena = $cena;
        $this->pisacID = $pisacID;

    }

    public static function getAll($baza)
    {
        $sql = "SELECT * from knjiga";
        $rezultat = mysqli_query($baza, $sql);
        return $rezultat;
    }

    public function addNew($baza)
    {
        $sqlUpit = "INSERT INTO knjiga(naslov, godinaIzdavanja,cena, pisacID)
      VALUES('$this->naslov', '$this->godinaIzdavanja', '$this->cena', '$this->pisacID')";
        $rez = mysqli_query($baza, $sqlUpit);
        if ($rez)
            echo "Uspesno uneta knjiga" . '<br>';
        else
            echo "Greska pri unosu knjige" . '<br>';

    }

    public static function getById($baza, $knjigaID)
    {
        $svi = self::getAll($baza);
        while ($knjiga = mysqli_fetch_array($svi)) {
            if ($knjiga['knjigaID'] == $knjigaID) {
                return $knjiga;
            }
        }
    }

    public function deleteById($baza, $knjigaID)
    {
        $sqlUpit = "DELETE FROM knjiga WHERE knjigaID = $knjigaID";
        $rez = mysqli_query($baza, $sqlUpit);
        if ($rez)
            echo "Uspecno obrisana knjiga" . '<br>';
        else
            echo "Greska pri brisanju knjige" . '<br>';
    }
}
?>