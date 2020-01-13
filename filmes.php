<?php
    if ( $opc == "FIL" ) {
?>

		<div  class="p-2  btn-group" id="filmes" >
				<button type="button" class="btn btn-primary" onclick=location.replace("Index.php?opc=PES")>
                    Pesquisar
				</button>
				<button type="button" class="btn btn-primary" onclick=location.replace("Index.php?opc=EXB")>
                    Vizualizar Todos
				</button>	
		     </div>
<?php
	}
        
    elseif($opc == "PES"){
?>

    <h4 class="p-2 m-2 bg-primary text-white text-center">Buscar Filme </h4>
		<form action="Index.php?opc=BUS" method="post">
			<h6 class="text-center"> Nome: 
					<input type="text" name="nome" size="40" maxlength="40" />
			</h6>

			<h6 class="text-center" > Gênero: 
				<select name="genero">
					<option value=""  selected> </option> 
				    <option value="Ação">Ação</option> 
				    <option value="Terror">Terror</option>
				    <option value="Drama">Drama</option>
				    <option value="Comédia">Comédia</option>
				    <option value="Infantil">Infantil</option>
				</select> </h6>
                
				<h6 class="text-center"> Elenco: 
					<input type="text" name="elenco" size="40" maxlength="40" />
			</h6>

			<h6 class="text-center" > Classificação: 
				<select name="classificacao">
                   <option value=""  selected> </option>
					<option value="Livre">Livre</option> 
				    <option value="10"> 10 </option>
				    <option value="12"> 12 </option>
				    <option value="14"> 14 </option>
				    <option value="16"> 16 </option>
				    <option value="18"> 18 </option>
				</select> </h6>

          <h6 class="text-center"> Preço: R$
					<input type="number" name="preco" min="1" max="1000" /> ,00
			</h6>
            
        <h6 class="text-center"> Ano de lançamento: 
					<input type="number" name="lancamento" min="1000" max="10000" />
                    </h6>
            
			<h6 class="text-center"> <input class="btn btn-primary text-white" type="submit" value="Buscar" /> 
				<input class="btn btn-primary text-white" type="reset" value="Limpar" /> </h6>
		</form>
<?php
       
    }
        elseif($opc == "BUS"){
            
            
        $argumentos = "WHERE 1 = 1";

        if ( $_POST['nome'] != "" ) {
            $nome = $_POST['nome'];
            $argumentos = $argumentos . " AND NOME LIKE '%$nome%' ";
        }
        if ( $_POST['genero'] != "" ) {
            $genero = $_POST['genero'];
            $argumentos = $argumentos . " AND GENERO = '$genero' ";       
		}
		
		if ( $_POST['elenco'] != "" ) {
            $enlenco = $_POST['elenco'];
            $argumentos = $argumentos . " AND ELENCO LIKE '%$enlenco%' ";
        }

        if ( $_POST['classificacao'] != "" ) {
            $classificacao = $_POST['classificacao'];
            $argumentos = $argumentos . " AND CLASSIFICACAO = '$classificacao' "; 
        }
        if ( $_POST['preco'] != "" ) {
            $preco = $_POST['preco'];
            $argumentos = $argumentos . " AND PRECO = '$preco' "; 
        }
            
        if ( $_POST['lancamento'] != "" ) {
            $lancamento = $_POST['lancamento'];
            $argumentos = $argumentos . " AND YEAR(LANCAMENTO) = '$lancamento' "; 
        }
        
		$argumentos = $argumentos . " ORDER BY NOME";
		
		$tabela = funSelect("tb_film", "*", $argumentos);

        if(count($tabela) ==0){

            echo"<br/> <h2 class='text-center text-white bg-danger'>Nenhum Filme Encontrado </h2>";

        }else{
              echo "<h4 class='p-2 m-2 bg-primary text-white text-center'>Filmes Localizados</h4>";

                echo "<table>";			
                $i2 =0;
                        for($i=0; $i < count($tabela); $i++) {		
                            if($i2==0)
                                echo"<tr>";

                            echo "<th class='text-center'>
                                        <img src=' ". $tabela[$i]['FOTO'] ."' width='250' height='400'/>
                                        <br/> <br/>
                                        <a href='Index.php?opc=DET&codigo=". $tabela[$i]['CODIGO'] ."' > <span class='p-2 bg-primary text-white'> Saiba Mais </span> </a> <br/> <br/>
                                </th>";
                                $i2++;

                            if($i2 == 3){
                                echo"</tr>";
                                $i2 = 0;
                            }
                        }
                echo "</table>";	
        }
           echo "<input class='bg-primary text-white' type='submit' value='Voltar' onClick='history.go(-1)' />";
        }
		
		elseif( $opc == "EXB"){
        ?>
			<h4 class="p-2 m-2 bg-primary text-white text-center"> Ordem de exibição </h4>
			<form action="Index.php?opc=VIS" method="post" >
				<h6 class="text-center" > Selecione o critério utilizado: 
					<select name="ordem" required>
					<option value=""  selected disabled> Selecione </option>
						<option value="NOME"> nome</option> 
						<option value="PRECO"> preço </option>
						<option value="LANCAMENTO"> Ano de Lançamento </option>
					</select> </h6>
				<h6 class="text-center">
			<input class="btn btn-primary text-white" type="submit" value="Buscar" /> 
			</form> 

 <?php
		}

		elseif ( $opc == "VIS" ) {
			
		 $ordem = $_POST['ordem'];
		$tabela = funSelect("tb_film", "*", "ORDER BY $ordem");
		echo " <h5 class='p-2 m-2 bg-primary text-white text-center'>Filmes Disponíveis:</h5> <br/>";
		echo "<table>";			
		$i2 =0;
				for($i=0; $i < count($tabela); $i++) {		
					if($i2==0)
						echo"<tr>";

					echo "<th class='text-center'>
								<img src=' ". $tabela[$i]['FOTO'] ."' width='250' height='400'/>
								<br/> <br/>
								<a href='Index.php?opc=DET&codigo=". $tabela[$i]['CODIGO'] ."' > <span class='p-2 bg-primary text-white'> Saiba Mais </span> </a> <br/> <br/>
						</th>";
						$i2++;
						
					if($i2 == 3){
						echo"</tr>";
						$i2 = 0;
					}
				}
		echo "</table> <input class='bg-primary text-white' type='submit' value='Voltar' onClick='history.go(-1)' />  ";	
		
	}

	elseif ( $opc == "DET" ) {	
		$codigo = $_GET['codigo'];
		$argumentos = " WHERE CODIGO = '$codigo'";	
				
		$tabela = funSelect("tb_film", "*", $argumentos);	

		echo "			  
			  <div class='container'>
			  	<h1 class='font-weight-bold text-center'>". $tabela[0]['NOME'] ."</h1>
                <h4 class='text-center'> <img src='". $tabela[0]['FOTO'] ."' width='200' /></h4>
				<h4 class='text-center'> <spam class='font-weight-bold'> Gênero: </spam>". $tabela[0]['GENERO'] ."</h4>
				<h4 class='text-center'> <spam class='font-weight-bold'> Data de lançamento: </spam> ". date("d/m/Y", strtotime($tabela[0]['LANCAMENTO'])) ."</h4>
				<h4 class='text-center'> <spam class='font-weight-bold'> Elenco: </spam> ". $tabela[0]['ELENCO'] ."</h4>
				<h4 class='text-center'> <spam class='font-weight-bold'> Duração: </spam>". $tabela[0]['DURACAO'] ." min </h4>
				<h4 class='text-center'> <spam class='font-weight-bold'> Preço: </spam> R$ ". number_format($tabela[0]['PRECO'],2,',','.') ."</h4>
				<h4 class='text-center'> <spam class='font-weight-bold'> Classificação Indicativa: <spam/> <img src='Imagens/classificacao/".$tabela[0]['CLASSIFICACAO'] .".png' width='30' /></h4>
                <h4 class='text-center'> <spam class='font-weight-bold'> Enredo: </spam> ". $tabela[0]['ENREDO'] ."</h4> <br/>
				<h4 class='text-center'> <a href='Index.php?opc=PI&codigo=". $tabela[0]['CODIGO'] ."' > <span class='p-2 bg-primary text-white'> Adicionar ao Carrinho </span> </a> </h4>  
			</div>
			<br />
			<p> <input class='bg-primary text-white' type='submit' value='Voltar' onClick='history.go(-1)' /> </p>";	
	}
	?>