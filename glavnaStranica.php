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

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark ">
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
                        <a class="nav-link active" aria-current="page" href="glavnaStranica.php">Pocetna stranica</a>
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
    <div class="container-fluid" style="width: 80%;">

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
                <div style="height: 35px"></div>
                <h1 class="fw-bolder position-absolute start-50 translate-middle">
                    Snabdevanje knjizare</h1>
                <div style="height: 200px"></div>
                <p class="lead fw-semibold position-absolute top-50 start-50 translate-middle "
                    style="text-align: center">Dobro do??li na sajt za
                    knji??are Zazz. <br /> Ulaskom na stranicu 'Knjige' mo??ete pristupiti svim dostupnim
                    knjigama. Na stranici 'Pisci' se nalaze svi pisci ??ije knjige imamo u ponudi.</br> U delu 'Dodaj' se
                    mogu dodati nove
                    knjige i pisci. Stranica 'Informacije' sadr??i potrebne informacije o zaposlenima i najprodavanijoj
                    knjizi.</p>
                <div style="height:100px"></div>
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