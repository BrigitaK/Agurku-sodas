<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./css/layout.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" defer integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script><!-- defer nurodo, kad uzsikrautu veliau-->
    <script src="http://localhost:8888/dashboard/agurkai/agurku-sodas/js/app.js" defer></script> <!-- cia rasyti pilna kelia -->
    <script>const apiUrl = "http://localhost:8888/dashboard/agurkai/agurku-sodas/sodinimas" </script>
    <title>Sodinimas</title>
</head>
<style>
    
    .listV, .list, .listM, .listP, .form {
        gap: 35px;
        display: flex;
        flex-flow: row wrap;
        justify-content: center;
        align-content: center;
    }
</style>
<body>
    <nav>
        <a class="loggout" href="login/logout">Atsijungti</a>
        <a href="<?= URL.'skynimas' ?>">Skynimas</a>
        <a href="<?= URL.'auginimas' ?>">Auginimas</a>
        <a href="<?= URL.'sodinimas' ?>">Sodinimas</a>
    </nav>
    
    <main>

        <h1>Daržovių sodinimas</h1>
        <div class="container">
            <div id="error"></div>
            <form class="form" action="" method="POST">
            <div class="listV" id="listV">
                <div class="list" id="list">
                </div>
                <div class="listP" id="listP">
                </div>
                <div class="listM" id="listM">
                </div>
            </div>
            <div class="sodinti">
                <input type="hidden" name="kiekis">
                <button class="btn-sodinti" type="button" id="sodintiA" name="sodintiA">SODINTI AGURKUS</button>
                <input type="hidden" name="kiekisP">
                <button class="btn-sodinti" type="button" name="sodintiP">SODINTI POMIDORUS</button>
                <input type="hidden" name="kiekisM">
                <button class="btn-sodinti" type="button" name="sodintiM">SODINTI MOLIŪGUS</button>
                <input type="hidden" name="kiekisV">
                <button class="btn-sodinti" type="button" name="sodintiV">SODINTI VISUS</button>
            </div>
            </form>
        </div>
       
    </main>

</body>
</html>