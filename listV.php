<div class="list" id="list">
    <?php foreach($store->getAll() as $agurkas): //paverciam i obj, norint panaudoti reikia isserializuoti?>
    <div class="form-top">
        <div class="agurkas-nr">
            <img class="agurkas-img" src="<?= $agurkas->photo ?>" alt="photo"> <!-- kreipiames kaip i savybe -->
            <div class="name">Agurkas nr. <?= $agurkas->id ?></div>
        </div>
        <div class="agurkas-vnt">Agurkų: <?= $agurkas->count ?></div>
        <button class="btn-israuti" type="submit" name="rauti" value="<?= $agurkas->id ?>">Išrauti</button>
    </div>
    <?php endforeach ?>
</div>
<div class="listM" id="listM">
    <?php foreach($store->getAllM() as $moliugas): //paverciam i obj, norint panaudoti reikia isserializuoti?>
    <div class="form-top">
        <div class="agurkas-nr">
            <img class="agurkas-img" src="<?= $moliugas->photo ?>" alt="photo"> <!-- kreipiames kaip i savybe -->
            <div class="name">Moliūgo nr. <?= $moliugas->id ?></div>
        </div>
        <div class="agurkas-vnt">Moliūgų: <?= $moliugas->count ?></div>
        <button class="btn-israuti" type="submit" name="rautiM" value="<?= $moliugas->id ?>">Išrauti</button>
    </div>
    <?php endforeach ?>
</div>
<div class="listP" id="listP">
    <?php foreach($store->getAllP() as $pomidoras): //paverciam i obj, norint panaudoti reikia isserializuoti?>
    <div class="form-top">
        <div class="agurkas-nr">
            <img class="agurkas-img" src="<?= $pomidoras->photo ?>" alt="photo"> <!-- kreipiames kaip i savybe -->
            <div class="name">Pomidoras nr. <?= $pomidoras->id ?></div>
        </div>
        <div class="agurkas-vnt">Pomidorų: <?= $pomidoras->count ?></div>
        <button class="btn-israuti" type="submit" name="rautiP" value="<?= $pomidoras->id ?>">Išrauti</button>
    </div>
    <?php endforeach ?>
</div>