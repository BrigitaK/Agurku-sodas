<?php foreach($store->getAll() as $agurkas): ?>
            <div class="form-top agurkas">
                <div class="agurkas-nr">
                    <img class="agurkas-img" src="<?= $agurkas->photo ?>" alt="photo">
                    <div class="name">Agurkas nr. <?= $agurkas->id ?></div>
                </div>
                <div class="agurkas-vnt">Galima skinti: <span class="count"><?= $agurkas->count ?></span></div>
                <?php if ($agurkas->count != 0) { ?>
                    <div class="skinti-input">
                        <input class="input" name="kiekis" value="<?= $kiekis ?>"><br>
                        <button class="btn-skinti-i skintiA" type="submit" name="skintiA" value="<?= $agurkas->id ?>">Skinti</button>
                    </div>
                    <button class="btn-skinti skintiVisusA" type="submit" name="skintiVisusA" value="<?= $agurkas->id ?>">Skinti visus</button>
                <?php } ?>
            </div>
            <?php endforeach ?>