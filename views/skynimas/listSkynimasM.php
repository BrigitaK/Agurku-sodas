<?php foreach($store->getAllM() as $moliugas): ?>
            <div class="form-top moliugas">
                <div class="agurkas-nr">
                    <img class="agurkas-img" src="<?= $moliugas->photo ?>" alt="photo">
                    <div class="name">Moliūgo nr. <?= $moliugas->id ?></div>
                </div>
                <div class="agurkas-vnt">Galima skinti: <span class="count"><?= $moliugas->count ?></span></div>
                <?php if ($moliugas->count != 0) { ?>
                    <div class="skinti-input">
                        <input class="input" name="kiekis" value="<?= $kiekis ?>"><br>
                        <button class="btn-skinti-i skintiM" type="button" name="skintiM" value="<?= $moliugas->id ?>">Skinti</button>
                    </div>
                    <button class="btn-skinti skintiVisusM" type="button" name="skintiVisusM" value="<?= $moliugas->id ?>">Skinti visus</button>
                    <input type="hidden" name="<?= $moliugas->count ?>">
                <?php } ?>
            </div>
            <?php endforeach ?>