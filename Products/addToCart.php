<?php
    session_start();  //start the session
    //check if the cart session variable is set
    if(!empty($_REQUEST['id'])){
    array_push($_SESSION['cart'], $_REQUEST['id']);
}

?>
