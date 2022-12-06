<?php include_once('dbBroker.php') ?>
<?php include_once('model/Knjiga.php') ?>


<?php

class Pisac
{
    public $pisacID;
    public $ime;
    public $prezime;


    public function __construct($ime, $prezime)
    {
        $this->ime = $ime;
        $this->prezime = $prezime;
    }

    public static function vratiSve($baza)
    {
        $sql = "SELECT * from pisac";
        $rezultat = mysqli_query($baza, $sql);
        return $rezultat;
    }

    public function dodaj($baza)
    {
        $sqlUpit = "INSERT INTO pisac (ime, prezime)
      VALUES('$this->ime', '$this->prezime')";
        $rez = mysqli_query($baza, $sqlUpit);
        if ($rez)
            echo "Uspesno unet pisac" . '<br>';
        else
            echo "Greska pri unosu pisca" . '<br>';

    }

    public static function vratiPremaID($baza, $pisacID)
    {
        $svi = self::vratiSve($baza);
        while ($pisac = mysqli_fetch_array($svi)) {
            if ($pisac['pisacID'] == $pisac) {
                return $pisac;
            }
        }
    }

    public function obrisiPremaID($baza, $pisacID)
    {
        $sqlUpit = "DELETE FROM pisac WHERE pisacID = $pisacID";
        $rez = mysqli_query($baza, $sqlUpit);
        if ($rez)
            echo "Uspesno obrisan pisac" . '<br>';
        else
            echo "Greska pri brisanju pisca" . '<br>';
    }

    //da li pisac postoji u bazi
    function postojiLi($baza)
    {
        $rez = self::vratiSve($baza);
        while ($pisac = mysqli_fetch_array($rez)) {
            if ($pisac['ime'] == $this->ime && $pisac['prezime'] == $this->prezime)
                return true;
        }

        return false;
    }
}
?>