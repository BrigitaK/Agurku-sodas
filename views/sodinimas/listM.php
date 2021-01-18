<?php foreach($store->getAllM() as $moliugas): //paverciam i obj, norint panaudoti reikia isserializuoti?>
<div class="form-top moliugas">
    <div class="agurkas-nr">
        <img class="agurkas-img" src="<?= $moliugas->photo ?>" alt="photo"> <!-- kreipiames kaip i savybe -->
        <div class="name">Moliūgo nr. <?= $moliugas->id ?></div>
    </div>
    <div class="agurkas-vnt">Moliūgų: <?= $moliugas->count ?></div>
    <div class="agurkas-vnt">Kaina: <?= $moliugas->priceD() ?></div>
    <button class="btn-israuti" type="button" name="rautiM" value="<?= $moliugas->id ?>">Išrauti</button>
</div>
<?php endforeach ?>