<div class="lid__wrapper">
    <section class="content contact">
        <h2 class="content__title">Contact</h2>
        <p class="content__description">Zit je met vragen over de vereniging of heb je nog enkele onduidelijkheden? Stuur ons gerust een bericht en we beantwoorden dit zo spoedig mogelijk.</p>
            
        <form action="index.php?page=contact" method="post" class="contact-form">
            <input type="hidden" name="action" value="insertMessage">
            <div class="form--line">
                <label class="form__label" for="firstname">Voornaam
                    <span class="error"><?php if(!empty($errors['firstname'])){ echo $errors['firstname'];} ?></span>
                    <input type="text" name="firstname" id="firstname" class="input" size="33" placeholder="John" value="<?php if(!empty($_POST['voornaam'])){ echo $_POST['voornaam'];} ?>" required >
                </label>
                <label class="form__label" for="lastname">Familienaam
                    <span class="error"><?php if(!empty($errors['lastname'])){ echo $errors['lastname'];} ?></span>
                    <input type="text" name="lastname" id="lastname" class="input" size="33" placeholder="Doe" value="<?php if(!empty($_POST['familienaam'])){ echo $_POST['familienaam'];} ?>"  required >
                </label>
            </div>
            <label class="form__label">E-mail
                <span class="error"><?php if(!empty($errors['email'])){ echo $errors['email'];} ?></span>
                <input type="email" name="email" class="input" placeholder="john.doe@domain.com" value="<?php if(!empty($_POST['emial'])){ echo $_POST['email'];} ?>" required />
            </label>
            <label class="form__label" for="message">Bericht
                <span class="error"><?php if(!empty($errors['message'])){ echo $errors['message'];} ?></span>
                <textarea name="message" id="message" class="input" cols="50" rows="10" required ></textarea>
            </label>
                    
            <label class="form__text"><input type="checkbox" name="terms" />Ik heb de <a href="#" class="terms__link">algemende voorwaarde</a> gelezen.</label>
            <button type="submit" class="btn btn--light btn--submit">Versturen</button>
        </form> 
    </section>

    <aside class="aside contact-geg">
    <h3 class="hidden">Contactgegevens</h3>
        <h4 class="aside__title">Adres</h4>
        <address class="address">
            Valkenhuisweg 32 <br>
            9000 Gent, België
        </address>
        <p class="tel-mail">
            0471 48 95 27 <br>
            kruideniersgilde@gmail.com
        <p>
        
        <h4 class="aside__title">Volg ons</h4>
        <div class="footer__socials aside__socials">
            <div class="footer__social">
            <a href="https://www.instagram.com/" class="social__img"><img src="assets/img/insta-green.svg" width="16" alt="instagram icon"></a>
            <p>Instagram</p>
            </div>
            <div class="footer__social">
            <a href="https://twitter.com/" class="social__img"><img src="assets/img/twitter-green.svg" width="16" alt="twitter icon"></a>
            <p>Twitter</p>
            </div>
            <div class="footer__social">
            <a href="https://www.facebook.com/" class="social__img"><img src="assets/img/facebook-green.svg" height="16" width="16"  alt="facebook icon"></a>
            <p>Facebook</p>
            </div>
          </div>
    </aside>
</div>
