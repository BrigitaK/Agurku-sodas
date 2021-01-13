<?php foreach($store->getAllP() as $pomidoras): //paverciam i obj, norint panaudoti reikia isserializuoti?>
<div class="form-top pomidoras">
    <div class="agurkas-nr">
        <img class="agurkas-img" src="<?= $pomidoras->photo ?>" alt="photo"> <!-- kreipiames kaip i savybe -->
        <div class="name">Pomidoras nr. <?= $pomidoras->id ?></div>
    </div>
    <div class="agurkas-vnt">Pomidorų: <?= $pomidoras->count ?></div>
    <button class="btn-israuti" type="button" name="rautiP" value="<?= $pomidoras->id ?>">Išrauti</button>
</div>
<?php endforeach ?>