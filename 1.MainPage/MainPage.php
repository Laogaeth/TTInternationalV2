<!DOCTYPE html>
<html lang="en">
<head>
  

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="Trauma Team, Life Insurance">
  <meta name="author" content="Pedro Pereira">
  <link rel="icon" type="image/x-icon" href="../Images/brain.png">
  <title>Night City</title>
  <!--fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet"> 
  <!--fonts-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="https://kit.fontawesome.com/9d05ceeaf4.js" crossorigin="anonymous"></script>
  <!--My css & JS-->
 <link rel="stylesheet" href="./MainCSS.css">
  
  
  <!--lightbox-->
  <link rel="stylesheet" href="../lightbox.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.9.0/js/lightbox.js"></script>
</head>

 <body>
 
 
  <!--Nav Menu-->
  <div class="sticky" id="menu">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="./MainPage.php">HOME</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="../4.LoginPage/LoginPage.php">User Hub</a> 
          <a class="nav-item nav-link" href="../6.PortfolioPage/PortfolioPage.php">Portfolio</a> 
          <a class="nav-item nav-link" href="../2.OrçamentoPage/OrçamentoPage.html" >Custom Pricing</a> 
          <a class="nav-item nav-link" href="../3.ContactsPage/Contacts.html">Contacts</a>
        </div>
      </div>
    </nav>
  </div>


 <main></main>
      <!--intro-->

  <div class="container-fluid">
    <div class="col-sm-12">
  <h1 class="mainTitle">TRAUMA TEAM INC.</h1>
    </div>
  <h3 class="intro">
  Trauma Team International (TTI) is a corporation that specializes in rapid response medical services. As the premium paramedical franchise, Trauma Team™ is one of the most notable corporations of the 21st century. 
  The company automatically bills their patients from the moment they receive the order to the location of retrieval.
  TTI partners with many corporations such as Arasaka, Militech, Night Corp, Biotechnica, or Kiroshi, allowing certain employees access to Trauma Team memberships without paying for the service themselves. 
  The medical corporation also manufacturers its own products for the general public to use. </h3>
</div>



<section>
<!------------------NEWS------------------>

<div class="container" id="news-feed">
  <h1 class="h1--news">Night City News</h1>
  <p class="p--news">click here</p>
  <div class="row">
  <div class="col-sm-4">
  <img class="newsCaster" src="../Images/NCN.jpg" alt="">
  </div>
  <div class="col-sm-8">
  <?php
$db = new mysqli('localhost:3307', 'root', '', 'db_login');
$result = $db->query('SELECT * FROM news ORDER BY id DESC LIMIT 5');
echo '<ul class="ul--news">';
while ($row = $result->fetch_assoc()) {

    echo '<li>
    <h3 class="h1--news" data-id="'.$row['id'].'">'.$row['name'].'</h3>'.'<br>'.'<p>'.$row['resumo']."</p>".'<hr>'.'</li>';
}
echo '</ul>';

// Close the database connection
$db->close();

  ?>
  </div>
</div>
</div>

</section>


<section>
<!--hero banner + text-->
<div class="container-fluid" id="HERO">
  <div class="addInfo"><em style="color: #79F2BA"> Seven minutes or a refund. That's the Trauma Team guarantee</em> - the type of guarantee that warms a policy holder's heart as they begin to bleed out in an alley.
    Assuming you haven't lost consciousness from blood loss, don't worry as you count the seconds of life slipping from you, because help is on the way. First, you'll see a heavily armored AV descend from the sky, using its heavy machine gun turrets to mow down the bastards who are trying to kill you. 
    Then you'll see the medics, your guardian angels clad in green and white and armed to the teeth. 
   

    <div class="addInfo">  
    
      It may have a long list of zeros attached to it, but you'll still sign up for a half-year policy extension with a smile on your lips.
      Trauma Team provides medical, paramedical and extraction services in all of the world's major cities.
      In fact, this may be the only corporation that enjoys such a high level of public trust.
      As long as you pay your dues, <b style="color: #79F2BA">your life is safe in their hands no matter how dire the situation.</b>
  </div>
  </div>
</div>


</section>



<section>
<!--Gallery-->
<div class="container-fluid" id="personnel">
 <h2 class="squadTitle" >Our personnel</h2>
 <br>
 <br>
<div class="teamShowcase">
 <a href="../Images/Pilot.png" data-lightbox="mygallary" data-title="Your own aerodyne Militech trained Pilot."><img src="../Images/Pilot_thumbnail.png" alt="Pilot" ></a>
 <a href="../Images/Security.png" data-lightbox="mygallary" data-title="Combat ready paramedic."><img src="../Images/Security_thumbnail.png" alt="Paramedic"></a>
 <a href="../Images/leadEMT.png" data-lightbox="mygallary" data-title="Militech grade hardware."><img src="../Images/leadEMT_thumbnail.png" alt="Hardware"></a>
 <a href="../Images/ship.jpg" data-lightbox="mygallary" data-title="Aerodyne complete with the most recent weaponry and medical care utilities."><img src="../Images/ship_thumbnail.jpg" alt="Airship"></a>
</div>
</div>

<!--Gallery-->
   <!--Ajax div-->   
<div class="container-fluid" id="businessModel">
  <a href="#" onclick="loadAjax()"> <h3 class="busTitle" id="busModel">Seven minutes or a refund. Click <em style="color: #79F2BA"> here </em>to check our subscription models today.</h3></a>
   </div>
  <!--Ajax div-->
</section>



 <div id="Footer">
  <h4 class="socialstitle">TTI®</h4>

  <div class="rights">2022 Pedro, Pereira. All rights reserved.</div>
 </div>
</main>
</div>
<script src="./MainJavascript.js"></script>
 <!--redundante// 4.1.3 for button -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>