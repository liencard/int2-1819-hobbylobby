<div class="contact__wrapper">
    <section class="content lidworden">
        <h2 class="content__title">Ledenformulier</h2>
        <p class="content__description content__description--green">Ga je samen met ons voor meer kruideniersplezier? <br> Vul hieronder je gegevens in en we heten je van harte welkom!</p>
        <p class="content__description">Het lidgeld hangt af of je al dan niet ervoor kiest om een stukje grond te nemen. Standaard lidgeld komt neer op €115. Met een stukje grond erbij wordt dit €150. Indien je een tuintje wilt, vink dit dan zeker onderaan het formulier aan!</p>

        <form action="index.php?page=lidworden" method="post" class="lidworden-form">
            <input type="hidden" name="action" value="insertUser">
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
                    <input type="number" name="postcode" class="input postcode" size="15" placeholder="Postcode"  min="1000" max="9999" value="<?php if(!empty($_POST['postcode'])){ echo $_POST['postcode'];} ?>" required />
                </label>
                <label class="form__label">Gemeente
                    <span class="error"><?php if(!empty($errors['city'])){ echo $errors['city'];} ?></span>
                    <input type="text" name="city" class="input" size="60" placeholder="Gemeente" value="<?php if(!empty($_POST['city'])){ echo $_POST['city'];} ?>" required />
                </label>
            </div>
            <label class="form__label">E-mail 
                <span class="error"><?php if(!empty($errors['email'])){ echo $errors['email'];} ?></span>
                <input type="email" name="email" placeholder="john.doe@domain.com" value="<?php if(!empty($_POST['email'])){ echo $_POST['email'];} ?>"  required />
            </label>
            
            <div class="form--line">

                <label class="form__label label--gender">Geslacht
                    <select name="gender" id="gender" class="select-geslacht filter-select">
                        <option value="--"> ---- </option>
                        <option value="man"> Man </option>
                        <option value="vrouw"> Vrouw </option>
                        <option value="ander"> Ander </option>
                    </select>
                </label>

                <label class="form__label">Geboortedatum
                    <span class="error"><?php if(!empty($errors['birthdate'])){ echo $errors['birthdate'];} ?></span>
                    <input type="date" name="birthdate" size="15" value="<?php if(!empty($_POST['birthdate'])){ echo $_POST['birthdate'];} ?>" required />
                </label>
            </div>

            <div class="form--checkbox">
                <label class="form__text form__text--bold"><input type="checkbox" name="terms" />Ik wil graag een tuintje van de vereniging gebruiken en ben bereid hier  jaarlijks €35 boven op het lidgeld te betalen</label>
                <label class="form__text"><input type="checkbox" name="terms" />Ik wil wekelijks de nieuwsbrief ontvangen</label>     
                <label class="form__text"><input type="checkbox" name="terms" />Ik heb de <a href="#" class="terms__link">algemende voorwaarde</a> gelezen.</label>
            </div>
            <button type="submit" class="btn btn--light btn--submit">Ga verder</button>
        </form> 
    </section>

    <aside class="aside lid-voordelen">
        <h4 class="aside__title aside__title--red">Lid worden? <br> Ontdek hier de voordelen!</h4>
        
        <ul class="voordelen__list">
            <li>(Stads)Mensen die geen tuin hebben of geen plaats hebben om een kruidentuin aan te leggen, kunnen bij ons een <strong>stukje grond aanvragen</strong>.</li>
            <li>Je krijgt een <strong>lidkaart</strong> met tal van kortingen en voordelen in tuinwinkels.</li>
            <li>Je ontvangt driemaandelijks ons <strong>ledenmagazine</strong> boordevol informatie.</li>
            <li><strong>Deel</strong> samen met andere tuinliefhebbers je <strong>ervaringen, vragen, tips,</strong> etc…</li>
        </ul>

        <p> <span class="voordeel__price">€115</span> / per jaar (excl. tuin)</p>
    </aside>
</div>
