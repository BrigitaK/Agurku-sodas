<?php foreach($store->getAllM() as $moliugas): ?>
                <div class="form-top">
                    <div class="agurkas-nr">
                        <img class="agurkas-img" src="<?= $moliugas->photo ?>" alt="photo">
                        <?php $kiekis = $moliugas->auga() ?>
                        <div>Moliūgo nr. <?= $moliugas->id ?></div>
                    </div>
                    <div class="agurkas-vnt">Moliūgų: <?= $moliugas->count ?></div>
                    <h3 class="kiekis" >+<?= $kiekis ?></h3>
                    <input type="hidden" name="kiekis[<?=$moliugas->id ?>]" value="<?= $kiekis ?>">
                </div>
                <?php endforeach ?>