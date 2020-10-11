      <!--Home - Header -->
      <header class="header"> 
        <div class="header__img">
          <img class="header__img" src="assets/img/home_header.png" alt="header image herbs" width="584" height="512">
        </div>
         <div class="header__text">
          <h2 class="header__title">Experimenteer <br> erop los!</h2>
          <p class="header__description">Ben je niet bang om buiten de lijnen te denken? Ben je de alledaagse kruiden & specerijen beu en wil je opzoek naar meer? Zoek niet verder!</p>
          <p class="header__description header__description--bold">Creëer nieuwe kruiden en specerijen in ons fameuze lab en maak je eigen unieke creaties.</p>
          <div class="buttons buttons--header">
            <a class="btn btn--dark" href="index.php?page=lidworden">Word lid</a>
            <a class="btn btn--light" href="index.php?page=activiteiten">Zie activiteiten</a>
          </div>
        </div>
      </header>

      <!-- Home - Intro -->
      <section class="content home-intro">
          <div class="content__home">
            <h2 class="content__title">Wat? ...</h2>
            <p class="content__description content__description--green">Hoe vaak experimenteer jij er nog op los? Hoe vaak gun je jezelf in je werk de tijd om te onderzoeken hoe je iets kan….</p>
            <p class="content__description">Wij, bij de Kruideniers Gilde, gaan de uitdaging aan om nieuwe kruiden en specerijen te produceren. Hiermee gaan we dan verder aan de slag.</p>
            <div class="buttons">
              <a class="btn btn--dark" href="index.php?page=overons">Leer ons kennen</a>
              <a class="btn btn--light" href="index.php?page=lidworden">Word lid</a>
            </div>
          </div>

          <div class="home-intro__img">
            <img src="assets/img/home-intro.png" alt="Intro collage beeld" width="442" height="475">
          </div>
      </section>

      <!-- Home - Kruidenmarkt -->
      <section class="content home-markt">
          <div class="markt__img">
            <img class="" src="assets/img/activiteit_kruidenmarkt.png" alt="Kruidenmarkt collage beeld" width="590" height="485">
          </div>
          <div class="content__home">
            <p class="markt__label">In de kijker</p>
            <h2 class="content__title content__title--orange">Kruidenmarkt '19</h2>
            <p class="content__description">Jaarlijks organiseren we een marktje, waar alle leden de mogelijkheid hebben om hun nieuwe creaties ten toon te stellen. Er zullen ook enkele workshops gegeven worden. Bovendien kan u een kijkje nemen hoe het eraan toegaat in ons lab.</p>
            <p class="content__description content__description--red">Heeft u interesse in onze vereniging, maar wilt u meer zien van wat we precies doen? Dan is onze kruidenmarkt de ideale gelegenheid om ons beter te leren kennen.</p>
            <a class="btn btn--light" href="index.php?page=jaarlijks">Meer info</a>
          </div>
      </section>

      <!-- Home - Activiteten -->
      <section class="activities home-activities">
        <h2 class="content__title">Aankomende activiteiten</h2>
        <a class="btn btn--margin btn--light" href="index.php?page=activiteiten">Ontdek alle activiteiten</a>
        <div class="activities__wrapper">

          <?php foreach ($activities as $activity): ?>
            <article class="activity">
                <div class="labels">
                    <span class="label__type"><?php echo $activity['type']; ?></span>
                    <span class="label__date"><?php echo strftime("%e %B %Y", strtotime($activity['start'])); ?></span>
                </div>
                <div class="activity__wrapper">
                    <img class="activity__img" src="<?php echo $activity['image']; ?>" alt="Kruidenmarkt collage beeld" height="205">
                    <h3 class="activity__title"><?php echo $activity['title']; ?></h3>
                </div>
                <a class="btn btn--full" href="index.php?page=detail&id=<?php echo $activity['id']; ?>">Meer info</a>
            </article>
          <?php endforeach; ?>
          
        </div>
      </section>
