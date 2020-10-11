<section class="content uitchecken">
    <h2 class="content__title">Uitchecken</h2>
    <p class="content__description content__description--red">Vul jouw gegevens in:</p>
    <form action="index.php?page=checkout" method="post" class="checkout__form">
        <div class="checkout__gegevens">
            <input type="hidden" name="action" value="insertCheckout">
            <div class="form--line">
                <label class="form__label">Voornaam
                    <span class="error"><?php if(!empty($errors['firstname'])){ echo $errors['firstname'];} ?></span>
                    <input type="text" name="firstname" class="input" size="40" placeholder="John" value="<?php if(!empty($_POST['firstname'])){ echo $_POST['firstname'];} ?>" required/>
                </label>
                <label class="form__label">Familienaam
                    <span class="error"><?php if(!empty($errors['lastname'])){ echo $errors['lastname'];} ?></span>
                    <input type="text" name="lastname" class="input" size="40" placeholder="Doe" value="<?php if(!empty($_POST['lastname'])){ echo $_POST['lastname'];} ?>" required />
                </label>
            </div>
            <div class="form--line">
                <label class="form__label">Adres
                    <span class="error"><?php if(!empty($errors['adres'])){ echo $errors['adres'];} ?></span>
                    <input type="text" name="adres" class="input" size="60" placeholder="Straatnaam" value="<?php if(!empty($_POST['adres'])){ echo $_POST['adres'];} ?>" required />
                </label>
                <label class="form__label">Huisnummer
                    <span class="error"><?php if(!empty($errors['housenumber'])){ echo $errors['housenumber'];} ?></span>
                    <input type="number" name="housenumber" class="input" size="5" placeholder="Nr." min="1" value="<?php if(!empty($_POST['housenumber'])){ echo $_POST['housenumber'];} ?>" required />
                </label>
            </div>
            <div class="form--line">
                <label class="form__label">Postcode
                    <span class="error"><?php if(!empty($errors['postcode'])){ echo $errors['postcode'];} ?></span>
                    <input type="number" name="postcode" class="input postcode" size="10" placeholder="Postcode"  min="1000" max="9999" value="<?php if(!empty($_POST['postcode'])){ echo $_POST['postcode'];} ?>" required />
                </label>
                <label class="form__label">Gemeente
                    <span class="error"><?php if(!empty($errors['city'])){ echo $errors['city'];} ?></span>
                    <input type="text" name="city" class="input" size="60" placeholder="Gemeente" value="<?php if(!empty($_POST['city'])){ echo $_POST['city'];} ?>" required />
                </label>
            </div>
            <label class="form__label">E-mail 
                <span class="error"><?php if(!empty($errors['email'])){ echo $errors['email'];} ?></span>
                <input type="email" class="input" name="email" placeholder="john.doe@domain.com" value="<?php if(!empty($_POST['email'])){ echo $_POST['email'];} ?>" required />
            </label>
            
            <label class="form__text">
                <input type="checkbox" name="terms" />Ik heb de <a href="#" class="terms__link">algemende voorwaarde</a> gelezen.
            </label>
            <button type="submit" class="btn btn--light btn--submit" >Betalen</button>
        </div>

        <aside class="aside checkout__list">
            <h4 class="aside__title aside__title--red">Overzicht</h4>
            <?php
            $total = 0;
            foreach($_SESSION['cart'] as $item) {
                $itemTotal = $item['activity']['price'] * $item['quantity'];
                $total += $itemTotal;
            ?>
            <div class="checkout__item">
                <p class="checkout__amount"><?php echo $item['quantity'];?>x</p>
                <p class="checkout__activity"><?php echo $item['activity']['title'];?></p>
                <p class="checkout__price">€ <?php echo $itemTotal;?></p>
            </div>
            <?php } ?>
            <div class="checkout__total">
                <p class="checkout__text">Totaal:</p>
                <p class="checkout__totalprice">€ <?php echo $total;?>,00</p>
            </div>
            
            <a class="btn btn--full" href="index.php?page=cart">wijzigen</a>
        </aside>
    </form> 
</section>