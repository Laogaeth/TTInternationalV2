<?php
session_start();
require '../ShoppingCart/cardInfoCheck.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="Pet care">
  <meta name="author" content="Pedro Pereira">
  <link rel="icon" type="image/x-icon" href="../Images/brain.png">
  <title>Whiskers & Bandits</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="https://kit.fontawesome.com/9d05ceeaf4.js" crossorigin="anonymous"></script>
  <!--My css & JS-->

  <link rel="stylesheet" href="./MainCSS.css">

</head>

<body>
  <div class="menu__nav">
    <div class=" navbar">


      <?php if (isset($_SESSION["user_name"])) : ?>


      <?php endif; ?>

      <a class="menu--icon" href="./MainPage.php"> <i class="fas  fa-home"></i> </a>
      <?php if (isset($_SESSION["user_name"])) : ?>
        <a class="menu--icon" href="../LoginPage/session.php"> <i class="fa-solid  fa-user"></i></a>

      <?php else : ?>
        <a class="menu--icon" href="../LoginPage/LoginPage.php"> <i class="fa-solid  fa-user"></i> </a>
      <?php endif; ?>
      <a class="menu--icon" href="../Products/productsPage.php"> <i class="fa-brands  fa-shopify"></i> </a>
      <a class="menu--icon" href="../ContactsPage/Contacts.php"><i class="fa-solid  fa-address-book"></i> </a>

      <?php if ($hasCreditCard) : ?>
        <a class="menu--icon" href="../ShoppingCart/creditCard.php"> <i class="fa-solid  fa-box"></i></a>
      <?php else : ?>
        <a class="menu--icon" href="../ShoppingCart/cartPage.php"> <i class="fa-solid  fa-box"></i></a>
      <?php endif; ?>



    </div>
  </div>
  
  <div class="wrapper row">







    <main class=" col-12 main--glass--effect section--color">
      <!--intro-->
      <!-- <div class="nav--user--area">
        <?php if (isset($_SESSION["user_name"])) : ?>
          <a class="menu--icon--logout" href="../loginPage/logout.php"> <i class="fa-solid fa-sign-out-alt"></i></a>
        <?php endif; ?>
      </div> -->


      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <h1 class="main--title">Whiskers & Bandits</h1>
          </div>
          <div class="col-sm-8">
            <h3 class="intro">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, accusantium. Vitae, in quae quis placeat nostrum similique.
              Repudiandae, quis vitae nesciunt, repellendus natus, non asperiores omnis delectus
              amet in ut!
              <hr style="border: 0">
              Lorem ipsum dolor sit amet,
              consectetur adipisicing elit. Cupiditate delectus iusto tenetur at totam adipisci
              eveniet neque maxime ratione suscipit dicta possimus, voluptatibus omnis et
              consequatur mollitia nam quidem quas!

            </h3>

          </div>

          <div class="col-sm-4">
            <img src="../MainPage/images/cat.png" alt="cato" class="intro--image">
          </div>
        </div>
      </div>



      <section>
        <!--hero banner + text-->
        <div class="container-fluid" id="HERO">
          <div class="addInfo"><em style="color: #F57F17;">Lorem ipsum dolor sit amet consectetur adipisicing elit. </em> Officia explicabo reprehenderit doloremque sit tempore
            aut quasi ad! Ratione, atque ducimus sit, asperiores porro est alias rerum pariatur soluta necessitatibus consequuntur?
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate laudantium ad dicta, animi consequuntur, excepturi dolore repudiandae natus aliquid,
            in nihil hic numquam veritatis. Necessitatibus voluptate ad laudantium autem aut.
            Then you'll see the medics, your guardian angels clad in green and white and armed to the teeth.


            <div class="addInfo">

              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repudiandae recusandae, et itaque quasi accusantium quos, adipisci, pariatur
              exercitationem dignissimos officiis vero! Labore, ratione perspiciatis!
              Consectetur vitae eveniet ex laborum impedit!
              <b style="color: #F57F17;">Labore, ratione perspiciatis!
                Consectetur vitae eveniet ex laborum impedit!</b>
            </div>
          </div>
        </div>

      </section>


      <div class="container-fluid">
        <div class="col-12">
          <h3 class="main--title products--title">Pet Care</h3>
        </div>


        <div class="row">
          <div class="col-sm">
            <div class="card shadow--sm">
              <div class="card--body">
                <h5 class="card--title">Hygiene Products</h5>
                <a href="../Products/productsPage.php#Hygiene"><img src="../MainPage/images/soap.png" alt="Hygiene" class="card--image"></a>
              </div>
            </div>
          </div>


          <div class="col-sm">
            <div class="card shadow--sm">
              <div class="card--body">
                <h5 class="card--title">Foods</h5>
                <a href="../Products/productsPage.php#Food"><img src="../MainPage/images/pet-food.png" alt="Food" class="card--image"></a>
              </div>
            </div>
          </div>


          <div class="col-sm">
            <div class="card shadow--sm">
              <div class="card--body">
                <h5 class="card--title">Toys</h5>
                <a href="../Products/productsPage.php#Toys"><img src="../MainPage/images/toys.png" alt="Toys" class="card--image"></a>
              </div>
            </div>
          </div>



          <div class="col-sm">
            <div class="card shadow--sm">
              <div class="card--body">
                <h5 class="card--title">Clothes</h5>
                <a href="../Products/productsPage.php#Clothes"><img src="../MainPage/images/clothes.png" alt="Clothes" class="card--image"></a>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="container">
        <h3 class="main--title products--title">Clients hall of fame</h3>
        <div class="row">
          <div class="col-sm hall--images"><img src="./hallfImages/1.jpg" alt=""></div>
          <div class="col-sm hall--images"><img src="./hallfImages/2.jpg" alt=""></div>
          <div class="col-sm hall--images"><img src="./hallfImages/3.jpg" alt=""></div>
          <div class="col-sm hall--images"><img src="./hallfImages/4.jpg" alt=""></div>
          <div class="col-sm hall--images"><img src="./hallfImages/1.jpg" alt=""></div>
          <div class="col-sm hall--images"><img src="./hallfImages/5.jpg" alt=""></div>
        </div>

      </div>



    </main>
  </div>


  <div id="Footer">
    <h4 class="socialstitle">TTI®</h4>

    <div class="rights">2022 Pedro, Pereira. All rights reserved.</div>
  </div>


  <script src="./MainJavascript.js"></script>
  <!--redundante// 4.1.3 for button -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>