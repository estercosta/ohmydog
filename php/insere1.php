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
          $ajuda = $_POST["ajuda"];
          $doar = $_POST["doar"];

//   Guardo na variavel $sql a minha consulta ao banco de dados com os place-holders
$sql_insert = "INSERT INTO doar (nome, ajuda, doar) VALUES (?, ?, ?)";

// nova variavel é criada recebendo os dados do objeto e do metodo "prepare"
$stmt = $conn->prepare($sql_insert);

/*   criamos uma variável que guarda o objeto "$conn". Como "stmt" agora é um objeto, então podemos
     também utilizar seus muitos metodos. um deles é o bindValue, onde podemos associar os valores de acordo com as posições que passamos com as interrogações.
*/   
$stmt->bindValue(1, $nome);        //Desse modo podemos chamar os métodos da classe. Uma delas é o bindValue
$stmt->bindValue(2, $ajuda);
$stmt->bindValue(3, $doar);

//utilizamos o metodo "execute()" para rodar. caso não execute, cairá na segunda condição.
if($stmt->execute()){
     echo "<script>window.location='http://localhost/Anne_e_Ester/home.php' ;alert('Obrigada pela sua colaboracao');</script>";
}else{
      echo "<script>window.location='http://localhost/Anne_e_Ester/ajuda.php' ;alert('Algo deu errado, volte e faça novamente');</script>";
}
exit;
?>