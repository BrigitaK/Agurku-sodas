<?php foreach($store->getAll() as $agurkas): ?>
<div class="form-top">
    <div class="agurkas-nr agurkas">
        <img class="agurkas-img" src="<?= $agurkas->photo ?>" alt="photo">
        <div class="name">Agurkas nr. <?= $agurkas->id ?></div>
    </div>
    <div class="agurkas-vnt">Agurkų: <?= $agurkas->count ?></div>
    <h3 class="kiekis" >+<?= $agurkas->kiekAugti?></h3>
    <input type="hidden" id="kiekis" name="kiekis[<?=$agurkas->id ?>]" value="<?= $kiekis ?>">
</div>
<?php endforeach ?>