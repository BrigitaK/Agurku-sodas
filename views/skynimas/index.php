<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./css/layout.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" defer integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script><!-- defer nurodo, kad uzsikrautu veliau-->
    <script src="http://localhost:8888/dashboard/agurkai/agurku-sodas/js/skynimas.js" defer></script> <!-- cia rasyti pilna kelia -->
    <script>const apiUrl = "http://localhost:8888/dashboard/agurkai/agurku-sodas/skynimas" </script>
    <title>Skynimas</title>
</head>
<style>
    .agurkas-vnt .count {
        position: absolute;
        bottom: -3px;
        width: 27%;
        margin-left: 3px;
        text-align: left;
    }
    .agurkas-vnt {
        position: relative;
        margin-top: 10px;
        margin-right: 10px;

        margin-bottom: 15px;
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
        <h1>Daržovių skynimas</h1>
        <div class="container">
            <?php if(isset($_SESSION['ERROR'])) { echo "<span class='session'>" .$_SESSION['ERROR']. "</span>"; unset($_SESSION['ERROR']); }?>
            <?php if(isset($_SESSION['msg'])) { echo "<span class='session'>" .$_SESSION['msg']. "</span>"; unset($_SESSION['msg']); }?>
            <form class="form" action="<?= URL.'skynimas' ?>" method="POST">
            <div id="listSkynimas"></div>
            <div id="listSkynimasP"></div>
            <div id="listSkynimasM"></div>
            <div class="skinti">
                <button class="btn-skinti-visus skynimasA" type="submit" name="skynimas">Skinti agurkų derlių</button>
                <button class="btn-skinti-visus skynimasP" type="submit" name="skynimasP">Skinti pomidorų derlių</button>
                <button class="btn-skinti-visus skynimasM" type="submit" name="skynimasM">Skinti moliūgų derlių</button>
                <button class="btn-skinti-visus skynimasV" type="submit" name="skynimasV">Skinti daržovių derlių</button>
            </div>
            </form>
        </div>
    </main>

</body>

</html>