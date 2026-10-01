<?php
session_start();
    include "../config/database.php";

    // only admin can access this page.
    if(!isset($_SESSION ["role"]) || $_SESSION["role"] != "admin"){
        header("Location: ../index.php");
        exit();
    }
    $id = (isset($_GET['id'])) ? Intval ($_GET['id']) :0;

    mysqli_query($conn, "DELETE FROM users 
    WHERE id=$id AND role='student'");
    header("location: index.php");
    exit();
    
?>
