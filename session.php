<?php 
session_start();
if(!isset($_SESSION['rol']) && !isset($_SESSION['nombre']))
  header("Location: ./index.php");
