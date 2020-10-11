
<section class="content activity-jaarlijks">
    <div class="activity__text">
        <p class="type__label type__label--red"><?php echo $activity['type']; ?></p>
        <h2 class="content__title content__title--orange"><?php echo $activity['title']; ?></h2>

        <div class="activity__info">
            <span class="info__date info__date--red"><?php echo strftime("%e %B %Y", strtotime($activity['start'])); ?></span>
            <span class="info__time info__time--red"><?php echo strftime('%H:%M', strtotime($activity['start'])); ?> - <?php echo strftime('%H:%M', strtotime($activity['end'])); ?></span>
            <span class="info__location info__location--green"><?php echo $activity['location']; ?></span>
        </div>

        <div class="activity__description">  
            <p class="content__description">In augustus is het weer zo ver, ons jaarlijkse kruidenmarkt waar alle leden hun nieuwe creaties kunnen presenteren.</p>  
            <p class="content__description">Voor de nieuwsgierigen zal er ook een <strong>beginners workshop</strong> worden gegeven over het <strong>kruisen van kruiden & specerijen.</strong> Zo kan je meteen hands-on zien hoe we te werk gaan in ons lab.</p>
            <p class="content__description content__description--red">Deze workshop zal tweemaal gegeven worden, eens om 13:00 en eens om 15:45.</p>
        </div>

    </div>
    
    <div class="activiteit-markt__img">
        <img src="<?php echo $activity['image']; ?>" alt="..." width=570 >
    </div>

     <div class="activity__register">
        <p class="register__title">Koop tickets</p>

        <form method="post" action="index.php?page=cart">
            <input type="hidden" name="activity_id" value="<?php echo $activity['id'];?>" />
            <div class="register__wrapper">
                <p class="register__text">Tickets:</p>
                <p class="register__price">€ <?php echo $activity['price']; ?>,00</p>
                <input class="register__input" type="number" name="quantity" value="1" min="1">
            </div>
            <button class="btn btn--full" type="submit" name="action" value="add">In winkelmandje</button>
        </form>
    </div>

    <div class="activity__description--side">  
        <h4 class="content__subtitle">Interesse in onze vereniging?</h4>
        <p class="content__description">Onze mark is de ideale gelegenheid om eens een kijkje te komen nemen hoe het eraan toe gaat bij ons. Loop rustig rond de verschillende kraampjes en sla een babbeltje met de leden.</p>  
    </div>
</section>