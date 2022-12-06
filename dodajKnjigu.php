<?php include_once('dbBroker.php') ?>
<?php include_once('model/Pisac.php') ?>
<?php include_once('model/Knjiga.php') ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Knjizara Zazz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- Navbar content -->

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Knjizara Zazz</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="glavnaStranica.php">Pocetna stranica</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="knjige.php">Knjige</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pisci.php">Pisci</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="informacije.php">Informacije</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dodaj
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="dodajKnjigu.php">Nova knjiga</a></li>
                            <li><a class="dropdown-item" href="dodajPisca.php">Nov pisac</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div style="height: 50px"></div>

    <!-- Page Content -->
    <div class="container">

        <div style="height: 50px"></div>
        <div class="card border border-1 rounded-5 shadow my-5" style="background-color: wheat">
            <div class="card-body p-4 ">
                <div style="height: 20px"></div>
                <h1 class="fw-bolder position-absolute start-50 translate-middle">
                    Dodaj knjigu</h1>
                <div style="height: 30px"></div>
                <form method="post">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Naslov</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="naslov"
                            placeholder="Naslov knjige">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Godina izdavanja</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" name="godinaIzdavanja"
                            placeholder="Godina izdavanja knjige">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Cena</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Cena knjige"
                            name="cena">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Pisac</label>
                        <select class="form-control" name="pisac">
                            <?php
                            $rez = Pisac::vratiSve($link);
                            while ($pisac = mysqli_fetch_array($rez)) {
                                $pisacID = $pisac['pisacID'];
                                $imePrezime = $pisac['ime'] . ' ' . $pisac['prezime'];
                            ?>
                            <option value="<?php echo $pisacID ?>">
                                <?php echo $imePrezime ?>
                            </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div style="height: 45px"></div>
                    <div class="form-group position-absolute start-50 translate-middle">
                        <button type="submit" name="unesiKnjigu">Dodaj knjigu</button>
                    </div>
                </form>
                <br /><br /><br />
                <p class="lead mb-0 fw-normal position-absolute start-50 translate-middle" style="text-align: center">
                    Informacije:
                    nd20201015@student.fon.bg.ac.rs<br />Kontakt telefon:
                    +381648239727</p>
                <br /><br />
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>

<?php

//  dodavanje knjige u bazu
if (isset($_POST['unesiKnjigu'])) {
    if ($_POST['naslov'] !== "" && $_POST['godinaIzdavanja'] !== "" && $_POST['cena'] !== "" && $_POST['pisacID'] !== "") {
        $knjiga = new Knjiga($_POST['naslov'], $_POST['godinaIzdavanja'], $_POST['cena'], $_POST['pisac']);
        if (!$knjiga->postojiLi($link))
            $knjiga->dodaj($link);
        else
            echo "Knjiga vec postoji u bazi!";
    }
}

?>