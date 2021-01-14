<?php foreach($store->getAll() as $agurkas): //paverciam i obj, norint panaudoti reikia isserializuoti?>
<div class="form-top agurkas">
    <div class="agurkas-nr">
        <img class="agurkas-img" src="<?= $agurkas->photo ?>" alt="photo"> <!-- kreipiames kaip i savybe -->
        <div class="name">Agurkas nr. <?= $agurkas->id ?></div>
    </div>
    <div class="agurkas-vnt">Agurkų: <?= $agurkas->count ?></div>
    <button class="btn-israuti" type="button" name="rauti" value="<?= $agurkas->id ?>">Išrauti</button>
</div>
<?php endforeach ?>

