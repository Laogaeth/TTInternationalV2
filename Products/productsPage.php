<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="Trauma Team, Life Insurance">
  <meta name="author" content="Pedro Pereira">
  <link rel="icon" type="image/x-icon" href="../Images/brain.png">
  <title>Products</title> 
  <!--fonts-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/9d05ceeaf4.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../Products/products.css">
  <script>


$.getJSON("./dbProductsData.php", function(data) {
  $.each(data, function(index, value) {
    const category = value.category;
    const product_name = value.product_name;
    const price = value.price;
    const image_path = value.image_path;
    const product_id = value.product_id;
    const user_id = value.user_id;
    
    let categoryDiv = $("#" + category);
    let card = $("<div>", { class: "col-sm-2 card shadow--sm" });
    let cardImg = $("<img>", { class: "card-img-top card--image", src: image_path });
    let cardBody = $("<div>");
    let cardTitle = $("<h5>", { class: "card--title", text: product_name });
    let cardFooter = $("<div>", { class: "card--footer card--buy--info " });
    let cardText = $("<p>", { class: "card--text col", text: price + " €" });
    let cardCart = $( "<i>", { class: "cart-icon fa-solid fa-2x fa-cart-shopping card--cart", "data-id": product_id, "data-product-name": product_name, "data-price": price });


    cardBody.append(cardTitle);
    card.append(cardImg);
    card.append(cardBody);
    categoryDiv.append(card);
    cardFooter.append(cardText, cardCart);
    card.append(cardFooter);

    // Add the click event on the shopping cart icon
    cardCart.on('click', function(e) {
      e.preventDefault();

      const product_id = $(this).data('id');
      const product_name = $(this).data('product-name');
      const price = $(this).data('price');

      $.ajax({
        url: 'addToCart.php',
        type: 'POST',
        data: {product_id: product_id, product_name: product_name, user_id: user_id, price: price, quantity: 1},
        success: function(response){
          $('#cart-content').html(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.error(textStatus, errorThrown);
        }
      });
    });
  });
});



  </script>
  
</head>

 <body>
  
 
 <div class="wrapper row">
 
  <!--Nav Menu-->
 <div class=" col navbar">
      <button  class="btn col btn__menu__arrow sticky"><img src="../icons/right-arrow.png" alt="arrow" class="nav--arrow"></button>

    <div class="menu__nav">


      <?php if (isset($_SESSION["user_name"])):?>
        <div class="nav--user--area">
      <img src="../Images/welcomeCat.png" alt="" class="navbar--cat">
     <p class="navbar--cat--text"> Welcome <?php echo $_SESSION["user_name"];?> </p>
        </div>
     
      <?php endif; ?>
      
      <a class="menu--icon" href="../MainPage/MainPage.php">      <i class="fas fa-2x fa-home"></i>              <p class="menu--nav--text">Home           </p></a>
    <?php if (isset($_SESSION["user_name"])):?>
      <a class="menu--icon" href="../LoginPage/session.php">     <i class="fa-solid fa-2x fa-user"></i>         <p class="menu--nav--text">User           </p></a>
  <?php else: ?>
     <a class="menu--icon" href="../LoginPage/LoginPage.php">    <i class="fa-solid fa-2x fa-user"></i>         <p class="menu--nav--text">User           </p></a>
  <?php endif; ?>
      <a class="menu--icon" href="./productsPage.php"> <i class="fa-brands fa-2x fa-shopify"></i>     <p class="menu--nav--text">Products       </p></a>    
      <a class="menu--icon" href="../ContactsPage/Contacts.php"><i class="fa-solid fa-2x fa-address-book"></i> <p class="menu--nav--text">Contacts       </p></a>
      <a class="menu--icon" href="../ShoppingCart/creditCard.php"> <i class="fa-solid fa-2x fa-box"></i><p class="menu--nav--text">Orders </p></a>
      
      <?php if (isset($_SESSION["user_name"])):?>
       <a class="menu--icon menu--icon--logout" href="../loginPage/logout.php"> <i class="fa-solid fa-2x fa-sign-out-alt"></i><p class="menu--nav--text">Logout</p></a>
    <?php endif; ?>
      </div>
</div>
      
 
  <main class="col-11 main--glass--effect">
  <section>

    <h3 id="takeMeBack--button"class="section--h3">Our Selection</h3>

    <div class="filters">
  <a href="#Hygiene">    <button class=" shadow--xs">Hygiene      </button></a>
  <a href="#Food">  <button class=" shadow--xs">Food & Treats</button></a>
  <a href="#Toys">   <button class=" shadow--xs">Toys         </button></a>
  <a href="#Clothes"><button class=" shadow--xs">Clothes      </button></a>
    
    
    </div>


   <div class="container-fluid">
    <div class="row">
        <h5 class="col-12 ">Hygiene</h5>
        <hr>
        <div id="Hygiene" class="row"></div>
    </div>
    <div class="row">
        <h5 class="col-12">Food</h5>
        <hr>
        <div id="Food" class="row"></div>
    </div>
    <div class="row">
        <h5 class="col-12 ">Toys</h5>
        <hr>
        <div id="Toys"class="row"></div>
    </div>
    <div class="row">
        <h5 class="col-12 ">Clothes</h5>
        <hr>
        <div id="Clothes"class="row"></div>
    </div>
</div>



  <div class="container">
          <a href="#takeMeBack--button"><button class="button--icon"><img class="button--icon--arrow" src="../icons/arrowUp.png" alt=""></button></a>
  </div>

  </section>

</main>
</div>
 <div id="Footer">
  <h1 class="socialstitle">TTI®</h1>

  <div class="rights">2022 Pedro, Pereira. All rights reserved.</div>
 </div>
 <script src="../Products/javascriptProducts.js"></script>
 
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>