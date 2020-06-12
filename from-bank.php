<?php
require_once "autoload.php";

if( $_GET["action"]=='success')
{
    unset($_SESSION['cart']);
    header('Location: index.php');
}
else if( $_GET["action"]=='cancel')
{
    header('Location: cart.php');
}