<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./css/layout.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" defer integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script><!-- defer nurodo, kad uzsikrautu veliau-->
    <script src="http://localhost:8888/dashboard/agurkai/agurku-sodas/js/auginimas.js" defer></script> <!-- cia rasyti pilna kelia -->
    <script>const apiUrlA = "http://localhost:8888/dashboard/agurkai/agurku-sodas/auginimas" </script>
    <title>Auginimas</title>
</head>
<style>
#listAuginimas, #listAuginimasP, #listAuginimasM, #listAuginimasV{
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
        <h1>Daržovių auginimas</h1>
        <div class="container">
        <div id="error"></div>
            <form class="form" action="<?= URL.'auginimas' ?>" method="POST">
                <div id="listAuginimas"></div>
                <div id="listAuginimasP"></div>
                <div id="listAuginimasM"></div>
           
            

            <div class="sodinti">
                <button class="btn-auginti auginti" type="button" name="auginti">AUGINTI AGURKUS</button>
                <button class="btn-auginti augintiP" type="button" name="augintiP">AUGINTI POMIDORUS</button>
                <button class="btn-auginti augintiM" type="button" name="augintiM">AUGINTI MOLIŪGUS</button>
                <!---- <button class="btn-auginti augintiV" type="button" name="augintiV">AUGINTI VISUS</button>--->
            </div>
            </form>
        </div>

    </main>

</body>
</html>