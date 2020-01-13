<!DOCTYPE html>
<html>
  <head>
     <meta charset='utf-8' />
	 <meta name="author" content="João Victor Araujo Bruzetti"/>
     <meta name="description" content="Projeto Final LP1, Locadora" />
     <meta name="keywords" content="Projeto, LP1" />
     <meta name="generator" content="Visual Code" />
     <title>Locadora</title>
     <link rel="icon" href="Imagens/logo.png" />
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
     <meta name="viewport" content="width=device-width, initial-scale=1" />
	 <style>
	  table{
		  margin-left:16%;
	  }
	  #filmes{
		  margin-left:15%;
	  }
	  #restrito{
		  margin-left:21%;
	  }
	  .info{
		  padding: 10px;
	  }
	 .info h5{
		text-indent: 4em;
		text-align:justify;
	  }
	 </style>
  </head>
<body>
  	<div class="container border m-2 mx-auto">		  
	  <h1 class="p-2 m-2 bg-primary text-white text-center">Locadora Miraje</h1>
	  <nav class="p-2 m-2 navbar navbar-expand-lg navbar-light bg-light">  
			<div class="navbar-expand" id="navbarNav">
			    <ul class="navbar-nav">
					<li class="nav-item"><a class="nav-link text-white btn-primary" href="Index.php?opc=HOME">Home</a></li>
					<li class="nav-item"><a class="nav-link text-white btn-primary" href="Index.php?opc=INF">Informações</a></li>
					<li class="nav-item"><a class="nav-link text-white btn-primary" href="Index.php?opc=FIL">Filmes</a></li>
					<li class="nav-item"><a class="nav-link text-white btn-primary" href="Index.php?opc=VER">Restrito</a></li>
					<li class="nav-item"><a class="nav-link text-white btn-primary" href="Index.php?opc=CAR">Carrinho </a> </li>
				</ul>
			</div>
	  </nav>		
<?php 	 
	include "DB.php";

	if ( isset($_GET['opc'])) {
		$opc = $_GET['opc'];
	} 
	else {
		$opc = "HOME";				
	}

	  if ( $opc == "HOME" ) { 
		  if(isset($_COOKIE['saldo'])){
			 $saldo = $_COOKIE['saldo']; 
		  }else{
			  $saldo  = 100;
		  }
?>		
  		 <div class="container">
				<div class="text-center">
					<img src="Imagens/logo.png" width="300" />
					<h1> Alugue seus filmes preferidos por um otimo preço </h1>
					<h2>  Saldo disponivel: R$<?=number_format($saldo,2,',','.')?> </h2> 
			 	</div>
			 </div>
		<br />
	<?php
	}

	include "info.php";
	 
	include "filmes.php";

	include "restrito.php";

	include "pedido.php";
	
?>
		</div>
		<br/>
		<h6 class="text-center ">Desenvolvido por João Victor Araujo Bruzetti - GU3006336</h6>
	</body>
</html>