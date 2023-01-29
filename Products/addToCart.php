<?php
    session_start();  //start the session
    //check if the cart session variable is set
    if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
    }
    if(!empty($_REQUEST['id'])){
    array_push($_SESSION['cart'], $_REQUEST['id']);
}

?>
