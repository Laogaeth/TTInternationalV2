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
  
</head>

 <body>

 
  <!--Nav Menu-->
  <div class="sticky" id="menu">
    <nav class="navbar navbar-expand-lg ">
      <a class="navbar-brand" href="../1.MainPage/MainPage.php">HOME</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="../4.LoginPage/LoginPage.php">User Hub</a> 
          <a class="nav-item nav-link" href="../6.PortfolioPage/PortfolioPage.php">Products</a> 
          <a class="nav-item nav-link" href="../2.OrçamentoPage/OrçamentoPage.html" >Custom Pricing</a> 
          <a class="nav-item nav-link" href="../3.ContactsPage/Contacts.html">Contacts</a>
          <a class="nav-item nav-link" href="../3.ContactsPage/Contacts.html">Shopping cart <img  class="icon--shoppingCart" src="../icons/shoppingCart.png" alt=""></a>

        </div>
      </div>
    </nav>
  </div>
 <main class="main--glass--effect">

  <section>

    <h3 id="takeMeBack--button"class="section--h3">Our Selection</h3>

    <div class="filters">
  <a href="#hygiene"><button class=" shadow--xs">Hygiene       </button></a>
  <a href="#foods-div">     <button class=" shadow--xs">Food & Treats </button></a>
  <a href="#toys-div">            <button class=" shadow--xs">Toys          </button></a>
  <a href="#clothes-div">         <button class=" shadow--xs">Clothes       </button></a>
    
    
    </div>


   <div class="container products--title underline">
    <h5 id="hygiene">Hygiene</h5>
        <div id="hygiene-products" class="row"></div>

    <h5 id="foods-div">Foods & Treats</h5>
        <div id="food-treats" class="row"></div>

    <h5 id="toys-div">Toys</h5>
        <div id="toys" class="row"></div>

    <h5 id="clothes-div">Clothes</h5>
        <div id="clothes" class="row"></div>

  </div>

  <div class="container">
          <a href="#takeMeBack--button"><button class="button--icon"><img class="button--icon--arrow" src="../icons/arrowUp.png" alt=""></button></a>
  </div>
        
  </section>




 <div id="Footer">
  <h1 class="socialstitle">TTI®</h1>

  <div class="rights">2022 Pedro, Pereira. All rights reserved.</div>
 </div>
</main>


 <script src="../Products/javascriptProducts.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>