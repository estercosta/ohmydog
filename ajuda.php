
<!DOCTYPE html>
<html>
<head>
  <title>OMD</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/doarcss.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
     <link rel="shortcut icon" href="img/simbolo8.png" type="image/x-jpg">

    <script type="text/javascript" defer src="libs/jQuery/jquery-3.3.1.js"></script>
    <script type="text/javascript" defer src="libs/Bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" defer src="js/doarjs.js"></script>
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
         <li class="nav-item dropdown text-white">
                <a class="nav-link dropdown-toggle text-white" href="https://example.com" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            <?php foreach($usuario as $user): ?>
            <?php echo $user->nome; ?>
            <?php endforeach; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdown07">
                  <a class="dropdown-item" href="perfil.php">Perfil</a>
                  <!--Página de gerenciamento do cadastro-->
                  <a class="dropdown-item" href="php/imprimir.php">Voluntários</a>
                  <a class="dropdown-item" href="php/logout.php">Sair</a>
                </div>
              </li>
        </ul>
      </div>
      </div>
    </nav>

  <section id="barra-doar">
    <div id="texto">
      <h1>A J U D A R</h1> 
    </div>

    <form name="form" method="POST" action="./php/insere1.php" onsubmit="return validacao();">

     <div class="form-row">


    <div class="col-md-6 mb-3">
           <label>Confirme seu Nome</label>
             <input type="text" class="form-control" name="nome" placeholder="Digite seu nome">
         </div>

          <div class="form-group col-md-6">
                 <label for="inputState">Ajuda</label>
                    <select id="inputState" class="form-control" name="ajuda" placeholder="Selecione a ajuda">
                        <option selected>Tratamento medico</option>
                        <option>Manutencao do canil</option>
                        <option>Alimentacao</option>
                     </select>
              </div>

              <div class="form-row">
        <div class="col mb-3">
             <label>Valor da doacao:</label>
              <input type="text" class="form-control" name="doar" placeholder="Digite o valor">
        </div>
       </div> 

    </div>
            
       <p align="center">  <button  class="btn btn-dark" type="submit" name="submit"> Enviar </button></p>
  </form>
 </section>

  </section>
    
 </section>

 <section id="rodape">
        <div class="rodape-02">
          <h4>Sobre Nós</h4><hr>
          <p>Fale com a gente! Quer saber mais sobre nosso trabalho? Mande um email que nós respondemos!</p>
            <p>Email: meudog.mg@gmailcom</p>
        </div>
        <div class="rodape-02">
          <h4>Endereço e Agência</h4><hr>
            <p>Caixa postal: 4555 46360-00</p>
            <p>Conta corrente: 8890-1</p>
            <p>Rua: Plinio Salgado Nº145</p>  
            <p>Cidade: Guanambi-BA</p>
        </div>

         <div class="rodape-02">
          <h4>Inspire-se</h4><hr>
            <a href="https://www.petlove.com.br/dicas/lista-de-ongs-animais-para-ajudar-como-puder">Petlove</a>
            <a href="http://www.caosemdono.com.br/">Cão sem Dono</a> 
            <a href="http://browniepetfood.com.br/importancia-das-ongs-de-animais-2/">Brownie Pet Food</a>
            <a href="https://www.ameamoroso.org.br/?gclid=Cj0KCQjw4-XlBRDuARIsAK96p3D9r4HL1V-rwqZIY5w89IOjuODWe_yRdxFDaGcZIm__QDCVpTmosvcaAjZlEALw_wcB">Construindo cidadania</a>
        </div>
        <div class="rodape-02">
          <hr><h3><img src="img/simbolo8.png" height="35px" width="35px">Oh My Dog</h3><hr>
         <p align="center"> <a href="https://www.instagram.com/?hl=pt-br"><img src="img/rede1.jpg" height="35px" width="35px"></a> @OhMyDog</p>
        <p align="center"> <a href="https://pt-br.facebook.com/r.php/"><img src="img/rede2.jpg" height="30px" width="35px"></a> @OhMyDog</p>
        </div>

     </section>

     <section id="sobre">
      <hr width="60%">
        <p>2019 Função de caridade| Amor pelos animais </p>
        <p>Toda forma de amar</p>
      </section>

</body>
</html>