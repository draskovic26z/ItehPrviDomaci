<?php include_once('dbBroker.php') ?>
<?php include_once('model/Pisac.php') ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pisci</title>
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
                        <a class="nav-link active" href="pisci.php">Pisci</a>
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
            <div class="card-header container-fluid">
                <span class="fw-bold" style="display: flex; justify-content: center;"> Knjizara Zazz nastala je 2022.
                    godine, kao projekat Nikole
                    Draskovica za
                    predmet
                    ITEH.</span>
            </div>
            <div class="card-body p-4 ">
                <?php
                $result = Pisac::vratiSve($link);
                echo '<table class="table table-striped table-bordered border-dark table-hover">';
                echo '<thead class="thead-dark"><tr><th>ID</th><th>Ime</th><th>Prezime</th><th>Obrisi</th></tr></thead>';
                echo '<tbody>';
                while ($pisac = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td >' . $pisac['pisacID'] . '</td>';
                    echo '<td>' . $pisac['ime'] . '</td>';
                    echo '<td>' . $pisac['prezime'] . '</td>';
                    echo '<td>'
                    ?>
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $pisac['pisacID'] ?>">
                    <button type="submit" name="delete" value="DELETE" class="btn btn-danger">Obrisi</button>
                </form>
                <?php
                    echo '</td';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
                ?>
            </div>
            <div class="card-footer">
                <span class="fw-normal" style="display: flex; justify-content: center;">
                    Email:
                    nd20201015@student.fon.bg.ac.rs<span style="width: 250px;"></span>Kontakt telefon:
                    +381648239727</span>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>

<?php

if (isset($_POST['delete'])) {
    $vrednost = $_POST['id'];
    Pisac::obrisiPremaID($link, $vrednost);
}

?>