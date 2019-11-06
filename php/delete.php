<?php
       
       include 'conexao.php';
       $conn = getConnection();

       $id= $_GET['id'];

       $sql='DELETE FROM usuario where id=:id';

       $stmt= $conn-> prepare($sql);

       if ($stmt->execute([':id' => $id])) {
         	echo "<script>window.location='http://localhost/Anne_e_Ester/home.html' ;alert('Sua conta foi excluída com sucesso!');</script>";
         }  
?>