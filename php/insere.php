<?php
session_start();
/*   arquivo "insere.php" insere dados na tabela
     atraves de declarações pdo
*/

//inclue o arquivo onde contem dados da conexão
include 'conexao.php';

//   nova variavel onde guarda o objeto criado na funcao getConnection()
$conn = getConnection();


// Aqui capturamos através do metodo POST os valores passado lá no formulario pelo "name=''", lembra?
          $nome = $_POST["nome"];
          $dog = $_POST["dog"];
          $adotar = $_POST["adotar"];

//   Guardo na variavel $sql a minha consulta ao banco de dados com os place-holders
$sql_insert = "INSERT INTO adotar (nome, dog, adotar) VALUES (?, ?, ?)";

// nova variavel é criada recebendo os dados do objeto e do metodo "prepare"
$stmt = $conn->prepare($sql_insert);

/*   criamos uma variável que guarda o objeto "$conn". Como "stmt" agora é um objeto, então podemos
     também utilizar seus muitos metodos. um deles é o bindValue, onde podemos associar os valores de acordo com as posições que passamos com as interrogações.
*/   
$stmt->bindValue(1, $nome);        //Desse modo podemos chamar os métodos da classe. Uma delas é o bindValue
$stmt->bindValue(2, $dog);
$stmt->bindValue(3, $adotar);

//utilizamos o metodo "execute()" para rodar. caso não execute, cairá na segunda condição.
if($stmt->execute()){
     echo "<script>window.location='http://localhost/Anne_e_Ester/adotar.php' ;alert('Parabéns, agora você tem um novo amigo');</script>";
}else{
      echo "<script>window.location='http://localhost/Anne_e_Ester/confirmacao.php' ;alert('Algo deu errado, volte e faça novamente');</script>";
}
exit;
?>