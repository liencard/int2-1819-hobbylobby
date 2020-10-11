<section class="content cart">
    <h2 class="content__title">Uitchecken</h2>

    <?php if(!empty($_SESSION['cart'])){ ?>
    <form action="index.php?page=cart" method="post" id="cart-form">
      <table class='cart-table'>
        <thead>
          <tr>
            <th class='product-description' colspan='2'>Activiteiten</th>
            <th class='price'>Prijs</th>
            <th class='quantity'>Aantal</th>
            <th class='total'>Totaal</th>
            <th class='remove-item'></th>
          </tr>
        </thead>

        <tbody>
          <?php
          $total = 0;
          foreach($_SESSION['cart'] as $item) {
            $itemTotal = $item['activity']['price'] * $item['quantity'];
            $total += $itemTotal;
          ?>

          <tr class="item">
            <td class='activity-image'>
              <a href="index.php?page=detail&amp;id=<?php echo $item['activity']['id'];?>"">
                <img src="<?php echo $item['activity']['image'];?>"  alt="<?php echo $item['activity']['title'];?>" width=110/>
              </a>
            </td>
            <td class='activity-title'><?php echo $item['activity']['title'];?></td>
            <td class='price'>€ <?php echo $item['activity']['price'];?></td>
            <td class='quantity'> <input class="quantity" type="text" name="quantity[<?php echo $item['activity']['id'];?>]" value="<?php echo $item['quantity'];?>"/> </td>
            <td class='total'>€ <?php echo $itemTotal;?></td>
            <td class='remove-item'>
              <button type="submit" class="btn--remove" name="remove" value="<?php echo $item['activity']['id'];?>"><img src="assets/img/remove-button.svg"  alt="remove" /></button>
            </td>
          </tr>
          <?php } ?>
        </tbody>
        </table>

        <div class='cart-end'>
          <div class="cart-wrapper">
          <p class='order-total'><span>total:</span>€ <?php echo $total;?>,00</p>
          <div class="cart-buttons">
            <button type="submit" id="update-cart" class="btn btn--light btn--button" name="action" value="update">Update</button>
            <button type="submit" id="checkout" class="btn btn--dark" name="action" value="checkout">Uitchecken</button>
          </div>
          </div>
        </div>

     </form>

    <?php } else {?>

     <div class="cart-empty">
       <p class="cart-empty-text">Oei, je hebt geen activiteiten om uit te checken!</p>
       <a class="btn btn--light" href="index.php?page=activiteiten">Voeg activiteiten toe</a>
     </div>
    <?php }?>
</section>