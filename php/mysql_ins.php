
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
          $sobrenome = $_POST["sobrenome"];
          $email = $_POST["email"];
          $senha = $_POST["senha"];
          $cidade = $_POST["cidade"];
          $estado = $_POST["estado"];
          $participacao = $_POST["participacao"];

//   Guardo na variavel $sql a minha consulta ao banco de dados com os place-holders
$sql_insert = "INSERT INTO usuario (nome, sobrenome, email, senha, cidade, estado, participacao) VALUES (?, ?, ?, ?, ?, ?, ?)";

// nova variavel é criada recebendo os dados do objeto e do metodo "prepare"
$stmt = $conn->prepare($sql_insert);

/*   criamos uma variável que guarda o objeto "$conn". Como "stmt" agora é um objeto, então podemos
     também utilizar seus muitos metodos. um deles é o bindValue, onde podemos associar os valores de acordo com as posições que passamos com as interrogações.
*/   
$stmt->bindValue(1, $nome);        //Desse modo podemos chamar os métodos da classe. Uma delas é o bindValue
$stmt->bindValue(2, $sobrenome);
$stmt->bindValue(3, $email);
$stmt->bindValue(4, $senha);
$stmt->bindValue(5, $cidade);
$stmt->bindValue(6, $estado);
$stmt->bindValue(7, $participacao);



//utilizamos o metodo "execute()" para rodar. caso não execute, cairá na segunda condição.
if($stmt->execute()){
     echo "<script>window.location='http://localhost/Anne_e_Ester/login.html' ;alert('Você foi cadastrado com sucesso');</script>";
}else{
      echo "<script>window.location='http://localhost/Anne_e_Ester/cadastro.php' ;alert(Seu cadastro não foi efetuado com sucesso');</script>";
}
exit;
?>