<?php foreach($store->getAllP() as $pomidoras): ?>
            <div class="form-top">
                <div class="agurkas-nr">
                    <img class="agurkas-img" src="<?= $pomidoras->photo ?>" alt="photo">
                    <div class="name">Pomidoro nr. <?= $pomidoras->id ?></div>
                </div>
                <div class="agurkas-vnt">Galima skinti: <span class="count"><?= $pomidoras->count ?></span></div>
                <?php if ($pomidoras->count != 0) { ?>
                    <div class="skinti-input">
                        <input class="input" name="kiekis[<?= $pomidoras->id ?>]" value="<?= $kiekis ?>"><br>
                        <button class="btn-skinti-i skintiP" type="submit" name="skintiP" value="<?= $pomidoras->id ?>">Skinti</button>
                    </div>
                    <button class="btn-skinti skintiVisusP" type="submit" name="skinti-visusP" value="<?= $pomidoras->id ?>">Skinti visus</button>
                <?php } ?>
            </div>
            <?php endforeach ?>