
<html>
<head>
	<title>OMD</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/perfilcss.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
     <link rel="shortcut icon" href="img/simbolo8.png" type="image/x-jpg">

    <script type="text/javascript" defer src="libs/jQuery/jquery-3.3.1.js"></script>
    <script type="text/javascript" defer src="libs/Bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" defer src="js/cadastrojs.js"></script>
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
            <a class="nav-link" href="participacao.php">Participantes</a>
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
    </header>



  <section id="barra-cadastro">

      <?php 
	       include 'php/certificando.php';
		     include 'php/conexao.php';	


		      //  nova variavel onde guarda o objeto criado na funcao getConnection()
		      $conn = getConnection();
			    $email = $_SESSION['email'];
          $senha = $_SESSION['senha'];
  

		     	// Consulta SQL que irá retornar valores do DB
				$sql_show = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";

				$stmt = $conn->prepare($sql_show);
				 $stmt->execute();

				#Aqui criamos uma variavel chamada "funcionarios" onde ele recebe o resultado do objeto "stmt". com a função fatchALL, retornamos a lista de nomes, um array, mas como objetos, onde chamaremos mais abaixo no foreach
				$usuario = $stmt->fetchAll(PDO::FETCH_OBJ);

			?>
			<!--Formulário de cadastro-->
			<div class="barra">
				<h2 class="text-center">Meus Dados:</h2>
				<?php foreach($usuario as $user): ?>
					<h5><b>Nome:</b> &nbsp;<?= $user->nome; ?></h5><br>
					<h5><b>Sobrenome:</b>&nbsp;<?= $user->sobrenome; ?></h5><br>
					<h5><b>Email:</b>&nbsp;<?= $user->email; ?></h5><br>
					<h5><b>Cidade:</b>&nbsp;<?= $user->cidade; ?></h5><br>
					<h5><b>Estado:</b>&nbsp;<?= $user->estado; ?></h5><br>
					<h5><b>Participacao:</b>&nbsp;<?= $user->participacao; ?></h5><br>
				<?php endforeach; ?>

       
        <a href="update.php?id=<?= $user->id ?>" class="btn btn-info">Atualizar Dados</a>
         <a onclick="return confirm('Tem certeza que deseja excluir usuario?')" href="./php/delete.php?id=<?= $user->id ?>" class="btn btn-danger">Excluir Dados</a>
         <a class="btn btn-danger" href="php/logout.php">Sair</font></a>
			</div>
    </section>
  </body>
  </html>