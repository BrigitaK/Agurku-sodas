<?php foreach($store->getAll() as $agurkas): ?>
<div class="form-top">
    <div class="agurkas-nr agurkas">
        <img class="agurkas-img" src="<?= $agurkas->photo ?>" alt="photo">
        <?php $kiekis = $agurkas->auga() ?>
        <div class="name">Agurkas nr. <?= $agurkas->id ?></div>
    </div>
    <div class="agurkas-vnt">Agurkų: <?= $agurkas->count ?></div>
    <h3 class="kiekis" >+<?= $kiekis ?></h3>
    <input type="hidden" id="kiekis" name="kiekis[<?=$agurkas->id ?>]" value="<?= $kiekis ?>">
</div>
<?php endforeach ?>