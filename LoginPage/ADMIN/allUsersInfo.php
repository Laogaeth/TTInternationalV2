<?php
session_start();


if (isset($_SESSION["user_id"])) {
    $mysqli = require  "./../../RegistrationPage/database.php";
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION['user_id']}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
}
require '../../ShoppingCart/cardInfoCheck.php';


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
    <title>User Area</title>
    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <!--fonts-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://kit.fontawesome.com/9d05ceeaf4.js" crossorigin="anonymous"></script>
    <!--My css & JS-->
    <link rel="stylesheet" href="../../LoginPage/LoginCSS.css">
    <script src="../../LoginPage/loginJavascript.js"></script>


    <style>
        main {
            height: 100%;
        }

        .adminButton {
            padding: 1em 1em;
            border-radius: 5px;
            background: #3a3a3a;
            border: none;
            transition: background 500ms ease;
            float: right;
            margin-top: -20px;
            margin-right: 10px;
            margin-bottom: 10px
        }
    </style>

</head>


<body>

    <div class="menu__nav">
        <div class=" navbar">


            <?php if (isset($_SESSION["user_name"])) : ?>


            <?php endif; ?>

            <a class="menu--icon" href="../MainPage/MainPage.php"> <i class="fas  fa-home"></i> </a>
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

        <main class="col-12 main--glass--effect">



            <div class="row container--userarea main--glass--effect">

                <div class="col-sm">

                    <?php if (isset($user) && $user['id'] == 1) : ?>
                    <?php else : ?>
                        <p><a href=".././LoginPage.php">You must be logged in to acess. Click here.</a></p>

                    <?php endif; ?>

                    <?php if (isset($user)) : ?>


                </div>
                <h5>
                    Our clients
                </h5>
            <?php endif; ?>
            <div class="col-sm-5">

                <img src="../../RegistrationPage/images/panda.png" alt="Hello Panda" class="helloPanda">
            </div>
            <div class="col user--settings user--return--icon"> <a href="../../LoginPage/ADMIN/ADMIN.php"> <i class="fas fa-2x fa-long-arrow-alt-left"></i>
                    <p>Return</p>
                </a></div>



            </div>

            <?php if (isset($user) && $user['id'] == 1) : ?>

                <div class="container col-sm-12 container--client container--client--table">

                    <!-- <div class='filters--search--span'><input type'text' id='search--clients' placeholder='search bar' class='shadow--xs filters--search--bar'></div> -->


                    <?php
                    // Connect to the database
                    $servername = "localhost:3307";
                    $username = "root";
                    $password = "";
                    $dbname = "db_login";
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Fetch data from the database
                    $sql = "SELECT * FROM user JOIN personal_info ON user.id = personal_info.user_id";
                    $result = $conn->query($sql);

                    // Display data in a table
                    echo "<table class='table--all--users '>";
                    echo "<thead>
                <tr>
                <th class='table--all--users--top'>ID</th>
                <th class='table--all--users--middle'>Client</th>
                <th class='table--all--users--middle' >Birthday</th>
                <th class='table--all--users--middle'>Username</th>
                <th class='table--all--users--middle'>Email</th>
                <th class='table--all--users--middle'>Phone Number</th>
                <th class='table--all--users--bottom'>Address</th>
                </tr></thead>";
                    echo "<tbody>";
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['client']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['birthday']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['phone_number']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No data found.</td></tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";


                    ?>



                </div>

            <?php endif; ?>

            </section>
        </main>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>