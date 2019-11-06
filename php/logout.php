<?php
  //iniciando a sessao
   session_start();

   //destruido a sessao
   session_destroy();

   //sai da pagina do usuario e leva para login
   echo "<script>window.location='http://localhost/Anne_e_Ester/login.html' ;</script>";

?>