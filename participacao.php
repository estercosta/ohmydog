<!DOCTYPE html>
<html>
<head>
  <title>OMD</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/participacaocss.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="shortcut icon" href="img/simbolo8.png" type="image/x-jpg">

    <script type="text/javascript" defer src="libs/jQuery/jquery-3.3.1.js"></script>
    <script type="text/javascript" defer src="libs/Bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" defer src="js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>    
</head>

<body>

 <nav id="mainNav" class="navbar navbar-expand-lg fixed-top bg-secundario">
     <div class="container">
      <button id="botao-nav" class="navbar-toggler navbar-toggler-right text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
      </button>
      <div id="junto">
      <img src="img/pet2.png" height="35px" width="35px">
      <a class="navbar-brand" href="home.php">Oh My Dog</a>
      </div>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="participacao.php">participacao</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="adotar.php">Adotar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="doar.php">Doar</a>
          </li>
        </ul>
      </div>
      </div>
    </nav>
    
    <?php 
        include 'php/conexao.php';

        //  nova variavel onde guarda o objeto criado na funcao getConnection()
        $conn = getConnection();

     	// Consulta SQL que irá retornar valores do DB
        $sql_show = "SELECT * FROM usuario";
        $stmt = $conn->prepare($sql_show);
        $stmt->execute();

        #Aqui criamos uma variavel chamada "funcionarios" onde ele recebe o resultado do objeto "stmt". com a função fatchALL, retornamos a lista de nomes, um array, mas como objetos, onde chamaremos mais abaixo no foreach
        $usuario = $stmt->fetchAll(PDO::FETCH_OBJ);

    ?>

<br>
<br>
<br>
<br>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Gerenciar</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nome</th>
                    <th>id</th>
                    <th>Sobrenome</th>
                    <th>Email</th>
                    <th>Senha</th>
                    <th>Participacao</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Opcoes</th>
                </tr>
                <?php foreach($usuario as $user): ?>
                    <tr>
                        <td><?= $user->nome; ?></td>
                        <td><?= $user->id; ?></td>
                        <td><?= $user->sobrenome; ?></td>
                        <td><?= $user->email; ?></td>
                        <td><?= $user->senha; ?></td>
                        <td><?= $user->participacao; ?></td>
                        <td><?= $user->cidade; ?></td>
                        <td><?= $user->estado; ?></td>


                    </tr>
                <?php endforeach; ?>
                
            </table>
            
        </div>
        
    </div>    
</div>

</body>
</html>