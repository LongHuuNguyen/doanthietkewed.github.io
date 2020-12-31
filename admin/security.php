<?php
session_start();
include('dbconfigres.php');

if($connection)
{
     //echo "Database Connected";
}
else
{
    header("Location: dbconfigres.php");
}

if(!$_SESSION['username'])
{
    header('Location: login.php');
}
?>