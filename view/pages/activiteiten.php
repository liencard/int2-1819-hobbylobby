<!-- Activiteiten - Kruidenmarkt -->
<section class="content activiteiten-markt">
    <div class="content__markt">
        <p class="markt__label">In de kijker</p>
        <h2 class="content__title content__title--orange">Kruidenmarkt '19</h2>
        <p class="content__description">Jaarlijks organiseren we een marktje, waar alle leden de mogelijkheid hebben om hun nieuwe creaties ten toon te stellen. Er zullen ook enkele workshops gegeven worden. Bovendien kan u een kijkje nemen hoe het eraan toegaat in ons lab.</p>
        <p class="content__description content__description--red">Heeft u interesse in onze vereniging, maar wilt u meer zien van wat we precies doen? Dan is onze kruidenmarkt de ideale gelegenheid om ons beter te leren kennen.</p>
        <a class="btn btn--light" href="index.php?page=jaarlijks">Meer info</a>
    </div>
     <div class="markt__img markt__img--activiteiten">
        <img class="" src="assets/img/activiteit_kruidenmarkt.png" alt="Kruidenmarkt collage beeld" width="565" height="462">
    </div>
</section>

<!-- Activiteiten - Agenda -->
<section class="activiteiten-agenda">
    <h2 class="content__title content__title--green">Activiteiten</h2>

    <form action="index.php" method="get" class="filter-activities">
      <input type="hidden" name="page" value="activiteiten" />
      <label for="type" class="filter">
        <span>Soort activiteit</span>
        <select name="type" id="type" class="filter-select filter-type">
            <option value="all">-- Alles --</option>
            <?php foreach($types as $type): ?>
            <option value="<?php echo $type['type']; ?>"
            <?php
              if(!empty($_GET['type'])){
                if($_GET['type'] == $type['type']){
                  echo ' selected';
                }
              }
            ?>
            ><?php echo $type['type']; ?></option>
          <?php endforeach; ?>

        </select>
      </label>
      <label for="date" class="filter">
        <span>Datum</span>
        <select name="date" id="date" class="filter-select filter-month">
            <option value="all">-- Alle maanden --</option>
            <?php foreach($months as $month): ?>
            <option value="<?php echo $month['month']; ?>"
            <?php
              if(!empty($_GET['date'])){
                if($_GET['date'] == $month['month'] ){
                  echo ' selected';
                }
              }
            ?>
            ><?php echo date("F", mktime(0, 0, 0, $month['month'], 10)); ?></option>
          <?php endforeach; ?>
        </select>
      </label>
      <input type="submit" value="TOEPASSEN" class="btn btn--light filter-button">
    </form>

  <div class="agenda">
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

    <?php if (!empty($_SESSION['info'])): ?>
        <div class="info"><?php echo $_SESSION['info']; ?></div>
      <?php endif; ?>
</div>


</section>
