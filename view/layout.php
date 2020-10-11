<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="favicon.png" type="image/x-icon" />
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Kruideniers Gilde - <?php echo $title;?></title>
</head>

<body>
  <div class="container">
   
   <header class="headerbalk">
    <a class="header__logo" href="index.php">
      <img class="header__logo" src="assets/img/logo.svg" alt="logo kruideniers gilde" width="27" height="29">
      <h1>Kruideniers <br> Gilde </h1>
    </a> 
    <nav class="menu" id="menu">
      <ul class="menu__items">
        <li class="menu__item"><a class="menu__link <?php if ($_GET['page'] === 'activiteiten'){ echo ' menu__link--active'; }?>" href="index.php?page=activiteiten">Activiteiten</a></li>
        <li class="menu__item"><a class="menu__link <?php if ($_GET['page'] === 'overons'){ echo ' menu__link--active'; }?>" href="index.php?page=overons">Over ons</a></li>
        <li class="menu__item"><a class="menu__link <?php if ($_GET['page'] === 'lidworden'){ echo ' menu__link--active'; }?>" href="index.php?page=lidworden">Lid worden</a></li>
        <li class="menu__item"><a class="menu__link <?php if ($_GET['page'] === 'contact'){ echo ' menu__link--active'; }?>" href="index.php?page=contact">Contact</a></li>
        <li class="menu__item"><a class="menu__link menu__link--button" href="index.php?page=cart"> <?php echo $numItems;?> <img src="assets/img/cart.svg" alt="cart" width="11" height="10"> </a></li>
      </ul>
    </nav>
  </header>

    <main>
      <?php if (!empty($_SESSION['info'])): ?>
        <div class="box__wrapper">
          <div class="box info"><?php echo $_SESSION['info']; ?></div>
        </div>
      <?php endif; ?>

      <?php echo $content; ?>
    </main>

  </div>

  <!--FOOTER-->
  <footer class="footer">
    <div class="container">
      <div class="footer__wrapper">
        <section class="footer__left">
          <h2 class="footer__title">Contacteer ons</h2>
          <address class="address">
            Valkenhuisweg 32, 9000 Gent <br>
            0471 48 95 27<br>
            kruideniersgilde@mail.com
          </address>
        </section>
        <section class="footer__center">
          <h2 class="footer__title">Volg ons</h2>
          <div class="footer__socials">
            <div class="footer__social">
            <a href="https://www.instagram.com/" class="social__img"><img src="assets/img/insta.png" width="16"
                height="16" alt="instagram icon"></a>
            <p>Instagram</p>
            </div>
            <div class="footer__social">
            <a href="https://twitter.com/" class="social__img"><img src="assets/img/twitter.png" width="16" height="16"
                alt="twitter icon"></a>
            <p>Twitter</p>
            </div>
            <div class="footer__social">
            <a href="https://www.facebook.com/" class="social__img"><img src="assets/img/facebook.png" width="16"
                height="16" alt="facebook icon"></a>
            <p>Facebook</p>
            </div>
          </div>
        </section>
        <section class="footer__right">
          <h2 class="footer__title">Schrijf je in voor onze nieuwsbrief</h2>
          <p>Blijf op de hoogte van al onze activiteiten</p>
          <div class="footer__subscribe">
            <input type="email" name="email" placeholder="emailadres" />
            <input type="submit" value=" " class="btn-footer">
          </div>
        </section>
        </div>
      <p class="footer__text">&copy; Lien Cardoen - Int II - 2019</p>
    </div>
  </footer>
  <script src="js/script.js"></script>
  <script src="js/validate.js"></script>
</body>

</html>
