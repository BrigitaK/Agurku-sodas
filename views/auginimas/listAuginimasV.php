<div id="listAuginimas">
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
</div>
<div id="listAuginimasM">
<?php foreach($store->getAllM() as $moliugas): ?>
<div class="form-top">
    <div class="agurkas-nr">
        <img class="agurkas-img" src="<?= $moliugas->photo ?>" alt="photo">>
        <div>Moliūgo nr. <?= $moliugas->id ?></div>
    </div>
    <div class="agurkas-vnt">Moliūgų: <?= $moliugas->count ?></div>
    <h3 class="kiekis" >+<?=  $moliugas->kiekAugti?></h3>
    <input type="hidden" name="kiekis[<?=$moliugas->id ?>]" value="<?= $kiekis ?>">
</div>
<?php endforeach ?>
</div>
<div id="listAuginimasP">
<?php foreach($store->getAllP() as $pomidoras): ?>
<div class="form-top">
    <div class="agurkas-nr">
        <img class="agurkas-img" src="<?= $pomidoras->photo ?>" alt="photo">
        <div class="name">Pomidoro nr. <?= $pomidoras->id ?></div>
    </div>
    <div class="agurkas-vnt">Pomidorų: <?= $pomidoras->count ?></div>
    <h3 class="kiekis" >+<?= $pomidoras->kiekAugti ?></h3>
    <input type="hidden" name="kiekis[<?=$pomidoras->id ?>]" value="<?= $kiekis ?>">
</div>
<?php endforeach ?>
</div>