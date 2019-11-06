<?php
session_start();

      //inclue o arquivo onde contem dados da conexão
      include 'conexao.php';

     //nova variavel onde guarda o objeto criado na funcao getConnection()
     $conn = getConnection();

       $id= $_GET['id'];
       $nome= $_POST['nome_nov'];
       $sobrenome= $_POST['sobrenome_nov'];
       $email= $_POST['email_nov'];
       $senha= $_POST['senha_nov'];
       $cidade= $_POST['cidade_nov'];
       $estado= $_POST['estado_nov'];
       $participacao= $_POST['participacao_nov'];


       $sql_upd= 'UPDATE usuario set nome= :nome_nov, sobrenome= :sobrenome_nov, email = :email_nov, senha = :senha_nov, cidade = :cidade_nov, estado = :estado_nov, participacao = :participacao_nov WHERE id= :id';

       $sql = $sql_upd;

       $stmt = $conn -> prepare($sql);

       $stmt -> bindParam(':id', $id);
       $stmt -> bindParam(':nome_nov', $nome);
       $stmt -> bindParam(':sobrenome_nov', $sobrenome);
       $stmt -> bindParam(':email_nov', $email);
       $stmt -> bindParam(':senha_nov', $senha);
       $stmt -> bindParam(':cidade_nov', $cidade);
       $stmt -> bindParam(':estado_nov', $estado);
       $stmt -> bindParam(':participacao_nov', $participacao);
       $stmt -> execute();

       $_SESSION["email"] = $email;
       $_SESSION["senha"] = $senha;


     echo "<script>window.location='http://localhost/Anne_e_Ester/perfil.php' ;alert(Seus dados foram atualizados com sucesso');</script>";
     
?>