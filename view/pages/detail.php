<?php
  $id = $_GET['id'];
?>

<section class="prev_next">
    <a class="prev" href="index.php?page=detail&id=<?php echo $id-1;?>">Vorige activiteit</a>
    <a class="all" href="index.php?page=activiteiten"> Alle activiteiten</a>
    <a class="next" href="index.php?page=detail&id=<?php echo $id+1;?>">Volgende activiteit</a>
</section>

<section class="content activity-detail">
    <div class="activity__text">
        <p class="type__label"><?php echo $activity['type']; ?></p>
        <h2 class="content__title"><?php echo $activity['title']; ?></h2>

        <div class="activity__info">
            <span class="info__date"><?php echo strftime("%e %B %Y", strtotime($activity['start'])); ?></span>
            <span class="info__time"><?php echo strftime('%H:%M', strtotime($activity['start'])); ?> - <?php echo strftime('%H:%M', strtotime($activity['end'])); ?></span>
            <span class="info__location"><?php echo $activity['location']; ?></span>
        </div>

        <div class="activity__description">    
            <?php echo $activity['description']; ?>
            <p class="content__description content__description--green">We weten graag hoeveel mensen te verwachten bij workshop. Zo kunnen we de nodige benodigdheden, ruimte, etc  voorzien. Schrijf je hieronder dus in!</p>
        </div>

        <div class="activity__register">
            <form method="post" action="index.php?page=cart">
                <input type="hidden" name="activity_id" value="<?php echo $activity['id'];?>" />
                <div class="register__wrapper">
                    <p class="register__title"> Inschrijven <?php echo $activity['type']; ?></p>
                    <input class="register__input" type="number" name="quantity" value="1" min="1">
                </div>
                <button class="btn btn--full" type="submit" name="action" value="add">Inschrijven</button>
            </form>
        </div>
    </div>
    
    <div class="activiteit__img">
        <img src="<?php echo $activity['image']; ?>" alt="..." width=502 >
    </div>

</section>