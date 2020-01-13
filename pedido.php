<?php
if ( $opc == "CAR" ) {	
		if (isset($_COOKIE['ck_carr']))	{
			$carr = $_COOKIE['ck_carr']; 
			$carr = unserialize($carr); 
			$total =0;		
            for ($i = 0; $i < count($carr); $i++) {
				$codigo = $carr[$i][0];			
				$argumentos = " WHERE CODIGO = '$codigo' ";			
							$antigo_preco = 0;
							$desconto_dias = NULL;
						$tabela = funSelect('tb_film', '*', $argumentos);	
						if($carr[$i][1] > 5 ){
							$antigo_preco = $tabela[0]['PRECO'] * $carr[$i][1]; 
							$preco = $tabela[0]['PRECO'] * ($carr[$i][1] -1 );
							$desconto_dias = "text-success";	  
						  }else{
							$preco = $tabela[0]['PRECO'] * $carr[$i][1];
						  }	
						echo "			  
						<div class='container'>
							  <div class='row'>
							   <div class='col text-center font-weight-bold my-auto'>". $tabela[0]['NOME'] ." </div>
								  <div class='col text-center my-auto'><img src='". $tabela[0]['FOTO'] ."' width='100' /></div>
								  <div class='col text-center my-auto'> <spam class='font-weight-bold'> Preço: </spam> R$ ". number_format($tabela[0]['PRECO'],2,',','.') ."</div>
								  <form class='col text-center my-auto' action='Index.php?opc=PA&i=$i' method='post'>
								     <h6> Nº de dias </h6>
									<input type='number' name='ndias' value='". $carr[$i][1] ."' min='1' max='10' />
									<input type='image' src='Imagens/att.png' width='25' title ='Atualizar Nº de dias'  />
								  </form>
								  ";
								  if($antigo_preco != 0){
								    echo "<div class='col text-center text-danger my-auto'> <strike> <spam class='font-weight-bold'> Valor Final: </spam> R$ ". number_format($antigo_preco,2,',','.') ." </strike> </div>";
								 
								  }
						echo "
							   <div class='col text-center $desconto_dias my-auto'> <spam class='font-weight-bold'> Valor Final: </spam> R$ ". number_format($preco,2,',','.') ."</div>
								  <div class='col text-center my-auto'><a href='Index.php?opc=PR&i=$i'><img src='Imagens/erase.png' alt='Remover' /></a></div>
							   </div>
						      </div> <br/>";
						$total = $total + $preco;
			}
			        $desconto_tot = NULL;
					if($total > 100){
						$antigo_total = $total;
						$total = $total * 0.9;
						$desconto_tot = "text-success";
					}elseif($total >50){
						$antigo_total = $total;
						$total = $total * 0.95;
						$desconto_tot = "text-success";
					}
					if(isset($antigo_total)){
						echo "<div class='col text-center text-danger my-auto'>  <h3> <strike> Total: R$ ".number_format($antigo_total,2,',','.')." </strike> </h3> </div> <br/>";
					}		 
			
					echo "<div class='col text-center $desconto_tot my-auto'>  <h3>Total: R$ ".number_format($total,2,',','.')." </h3> </div> <br/>
						  <div class='col text-center my-auto'> <h4> <a href='Index.php?opc=COM&tot=$total'> <span class='p-2 bg-info text-white'> Confirmar Compra </span> </a> </h4> </div> ";
						
		}
		else {
			echo "<h6 class='p-2 m-2 bg-danger text-white text-center'>Carrinho Vazio!</h6>";
		}
		
		echo "<p class='m-2'><input class='btn btn-primary' type='submit' value='Esvaziar Carrinho' onClick=location.replace('Index.php?opc=PX') /> </p>";
		
	}


	elseif ( $opc == "PI" ) {	
		$codigo = $_GET['codigo'];	
        $ndias = 0;   
			
			if (isset($_COOKIE['ck_carr'])) {
				$carr = $_COOKIE['ck_carr']; 
				$carr = unserialize($carr); 
				$i = count($carr); 
			
				for ( $j = 0; $j < $i; $j++  ) {
					if ( $codigo == $carr[$j][0] ) {
						echo "<script>alert('Aviso: Produto já existia no Carrinho!');</script>";
						$i = $j;
						echo "<script>location.replace('Index.php?opc=CAR');</script>";
                    }
                }
			}
			else {
				$i = 0;
			}
            $ndias++;                 
			$carr[$i][0] = $codigo;		
			$carr[$i][1] = $ndias;		
			$carr = serialize($carr);	
			setcookie('ck_carr', $carr);	
		  			
			echo "<script>alert('Produto incluído no Carrinho!');</script>";
				
			echo "<script>location.replace('Index.php?opc=CAR');</script>";
	}


	elseif ( $opc == "PR" ) {
            $i = $_GET['i'];	

            $carr = $_COOKIE['ck_carr'];
            $carr = unserialize($carr);

			unset($carr[$i]);	

			$carr = array_values($carr);
        
			$carr = serialize($carr); 
			setcookie('ck_carr', $carr); 

			echo "<script>alert('Produto excluído do Carrinho!');</script>";
			
			echo "<script>location.replace('Index.php?opc=CAR');</script>";			

	}


	elseif ( $opc == "PA" ) {		
		$i = $_GET['i'];	
        $ndias = $_POST['ndias'];

		$carr = $_COOKIE['ck_carr'];	
        $carr = unserialize($carr);
		$carr[$i][1] = $ndias;	  		
			 
		$carr = serialize($carr);
        setcookie('ck_carr', $carr);

			echo "<script>alert('Nº de dias  Atualizado!');</script>";
			
			echo "<script>location.replace('Index.php?opc=CAR');</script>";				

	}


	elseif ( $opc == "PX" ) {
			
			setcookie('ck_carr', '', time()-1);
			
			echo "<script>alert('Carrinho Esvaziado!');</script>";
			echo "<script>location.replace('Index.php?opc=CAR');</script>";			

	}

	elseif ($opc == "COM"){
		 $total = $_GET['tot'];
			if(isset($_COOKIE['saldo'])){
				$saldo = $_COOKIE['saldo'];
			}else{
				$saldo = 100;
			}

			if($saldo >= $total){

			   $saldo = $saldo - $total;
				echo "<div class='container'>
					<div class='text-center'>
						<img src='Imagens/sucesso.png' width=300 />
						<h1> Compra efetuada com sucesso!<br/>Saldo Restante = R$$saldo,00 </h1>
					</div>
				</div>";
				setcookie('ck_carr', '', time()-1);
				setcookie('saldo', $saldo);
			}
			else{
				echo "<div class='container'>
				<div class='text-center'>
					<img src='Imagens/fracasso.png' width=300 />
					<h1> Erro ao efetuar a compra.<br/>Saldo Insuficiente</h1>
				</div>
			</div>";

            }
            echo  "<br/> <h4 class='text-center'> <a href='Index.php?opc=HOME'> <span class='p-2 bg-primary text-white'> Voltar ao Inicio </span> </a> </h4>";

	}

    ?>