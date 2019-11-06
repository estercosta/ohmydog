<?php 
/* esse bloco de código em php verifica se existe a sessão*/
session_start();
if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  echo "<script>window.location='http://localhost/Anne_e_Ester/login.html' ;</script>";
  }
 
$logado = $_SESSION['email'] and $_SESSION['senha'];
?>