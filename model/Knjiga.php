<?php include_once('dbBroker.php') ?>
<?php include_once('model/Pisac.php') ?>

<?php
class Knjiga
{
    public $knjigaID;
    public $naslov;
    public $godinaIzdavanja;
    public $cena;
    public $pisacID;


    public function __construct($naslov, $godinaIzdavanja, $cena, $pisacID)
    {
        $this->naslov = $naslov;
        $this->godinaIzdavanja = $godinaIzdavanja;
        $this->cena = $cena;
        $this->pisacID = $pisacID;

    }

    public static function vratiSve($baza)
    {
        $sql = "SELECT * from knjiga";
        $rezultat = mysqli_query($baza, $sql);
        return $rezultat;
    }

    public function dodaj($baza)
    {
        $sqlUpit = "INSERT INTO knjiga (naslov, godinaIzdavanja, cena, pisacID)
      VALUES('$this->naslov', '$this->godinaIzdavanja', '$this->cena', '$this->pisacID')";
        $rez = mysqli_query($baza, $sqlUpit);
        // if ($rez)
        //     echo "Uspesno uneta knjiga" . '<br>';
        // else
        //     echo "Greska pri unosu knjige" . '<br>';

    }

    public static function vratiPremaID($baza, $knjigaID)
    {
        $svi = self::vratiSve($baza);
        while ($knjiga = mysqli_fetch_array($svi)) {
            if ($knjiga['knjigaID'] == $knjigaID) {
                return $knjiga;
            }
        }
    }

    public static function obrisiPremaID($baza, $knjigaID)
    {
        $sqlUpit = "DELETE FROM knjiga WHERE knjigaID = $knjigaID";
        $rez = mysqli_query($baza, $sqlUpit);
        // if ($rez)
        //     echo "Uspesno obrisana knjiga" . '<br>';
        // else
        //     echo "Greska pri brisanju knjige" . '<br>';
    }

    function postojiLi($baza)
    {
        $rez = self::vratiSve($baza);
        while ($knjiga = mysqli_fetch_array($rez)) {
            if ($knjiga['naslov'] == $this->naslov && $knjiga['pisacID'] == $this->pisacID)
                return true;
        }

        return false;
    }

    static function vratiIDZaNaslovIPisca($baza, $naslov, $pisacID)
    {
        $rez = self::vratiSve($baza);
        while ($knjiga = mysqli_fetch_array($rez)) {
            if ($knjiga['naslov'] == $naslov && $knjiga['pisacID'] == $pisacID)
                return $knjiga['knjigaID'];
        }

        return false;
    }

    public static function vratiSveIPisca($baza)
    {
        $sql = "SELECT * from knjiga k INNER JOIN pisac p on k.pisacID=p.pisacID";
        $rezultat = mysqli_query($baza, $sql);
        return $rezultat;
    }
}
?>