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