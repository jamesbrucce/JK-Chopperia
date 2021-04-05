<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8"/>
    <meta name="keywords" content="jk">
    <meta name="author" content="James">
    <meta name="description" content="Projeto JK">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JK CHOPERIA</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Essses scripts coloquei para funcionar o Dropdown   -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </head>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php">JK</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="cadastroCliente.php">Cadastro Clientes </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="cadastroProduto.php">Cadastro Produtos </a>
          </li>
          <!-- deixo active para permanecer branco e nao apagdo a descrição -->
          <li class="nav-item active dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Locação
            </a>
            <div class="dropdown-menu"  aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="agendamentoLocacao.php">Agendar Locações</a>
              <a class="dropdown-item" href="agendamentoRealizado.php">Agendamento de Locações</a>
              <a class="dropdown-item" href="locacoesFinalizadas.php">Locações Finalizadas</a>
            </div>
          </li>
           <li class="nav-item active dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Venda
              </a>
              <div class="dropdown-menu"  aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="realizarVenda.php">Realizar Vendas</a>
                <a class="dropdown-item" href="#">Vendas em Aberto</a>
                <a class="dropdown-item" href="#">Vendas Finalizadas</a>
              </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
          <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
      </div>
    </nav>
  </head>
</html>
<?php
  //abro uma sessao
      session_start();
      // pega uma variavel chamada $user e atravez de $_SESSION['user'] que estava no login.php recebendo o usuario, atribuo a ela o nome do usuario que esta logado
      $user = $_SESSION['user'];
      // aqui escrevendo nome do usuario.
      echo  "Bem vindo, <h5>$user</h5> " ;
      //pegando fuso desejado (no caso do brasil)
       $fuso = new DateTimeZone("America/Sao_Paulo");
       //crio o varialvel date e estancio ela pra pegar a data.
       $date = new DateTime();
       // enquadro a data no de acordo co o fuso desejado.
       $date->setTimezone($fuso);
       //aqui escrevo a data do formato que quero
       echo $date->format('d-m-y');
       //coloco um link que vai redirecionar para encerrarSessao.php para finalizar sessao.
       echo "<br><a href='encerrarSessao.php'>Encerrar Sessão</a>";
       
?>
