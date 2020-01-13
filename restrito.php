<?php

if ( $opc == "VER" ) {
?>
    <br/>
	<form action="Index.php?opc=RES" method="post">
	<h5 class="text-center"> Digite a senha para poder entrar na área restrita 
		<br/> <br/>
		<input type="password" name="senha" size="10" required/> 
	</h5>
	<h5 class="text-center"> <input class="bg-primary text-white" type="submit" value="entrar na area restrita "/> </h5>
	</form>

<?php
}
elseif($opc == "RES")	{
	 if(isset($_POST['senha'])){
		$senha = $_POST['senha'];
	 }else{
		 $senha="4587";
	 }
	if($senha == "4587"){
?>
	<div class="p-2 btn-group" id="restrito">
		<button type="button" class="btn btn-primary" onclick=location.replace("Index.php?opc=CAD")> 
            Cadastrar
		</button>
		<button type='button' class='btn btn-primary' onclick=location.replace("Index.php?opc=ALT")>
            Editar ou Excluir
		</button>
	</div>
<?php	
	 }else{
?>
		<form action="Index.php?opc=RES" method="post">
		<h5 class="text-center"> Digite a senha para poder entrar na área restrita 
			<br/> <br/>
			<input type="password" name="senha" size="10" required/> 
		</h5>
		<h5 class="text-center"> <input class="bg-primary text-white" type="submit" value="entrar na area restrita "/> </h5>
		</form>
		<h5 class="text-center text-danger "> Senha Incorreta  </h5>
<?php         
	 }

	}	

	elseif ( $opc == "CAD" ) {
    ?>
		  <h5 class="p-2 m-2 bg-primary text-white text-center">Cadastrar</h5>
		  <form action="Index.php?opc=INC" method="post">
			<h5 class="text-center"> Nome: <input type="text" name="nome" size="40" maxlength="40" required /> </h5>
			<h5 class="text-center"> Foto: <input type="text" name="foto" size="50" maxlength="50" value="Imagens/filmes/" required /> </h5>
			<h5 class="text-center" > Gênero: 
			<select name="genero" required >
				<option value="" disabled selected>Selecione...</option> 
				<option value="Ação">Ação</option> 
				<option value="Terror">Terror</option>
				<option value="Drama">Drama</option>
				<option value="Comédia">Comédia</option>
				<option value="Infantil">Infantil</option>
			</select> </h5>
			<h5 class="text-center"> Lançamento <input type="date" name="lancamento" required /> </h5>
			<h5 class="text-center"> Elenco <input type='text' name='elenco' size="40" maxlength="300" required/> </h5>
			<h5 class="text-center"> Duração <input type="number" name="duracao" min="20" max="300" required/> min </h5>
			<h5 class="text-center"> Classificação: 
			<select name='classificacao' required >
				<option value="" disabled selected>Selecione...</option> 
				<option value="Livre">Livre</option> 
				<option value="10"> 10 </option>
				<option value="12"> 12 </option>
				<option value="14"> 14 </option>
				<option value="16"> 16 </option>
				<option value="18"> 18 </option>
				</select> </h5>
            <h5 class="text-center"> Enredo <input type="text" name="enredo" size="40" maxlength="200" required/> </h5>
			<h5 class="text-center"> Preço: R$ <input type="number" name="preco" min="1" max="1000" value="0" required />,00 </h5>
			<h5 class="text-center"> <input class="bg-primary text-white" type="submit" value="Cadastrar" /> </h5>
		</form>
		<input class="bg-primary text-white" type="submit" value="Voltar" onclick=location.replace('Index.php?opc=RES') />
<?php
	}

	elseif ( $opc == "INC" ) {	
		$nome = $_POST['nome'];
		$foto = $_POST['foto'];
		$genero = $_POST['genero'];
		$lancamento = $_POST['lancamento'];
		$elenco = $_POST['elenco'];
		$duracao = $_POST['duracao'];
		$preco = $_POST['preco'];
		$classificacao = $_POST['classificacao'];
        $enredo = $_POST['enredo'];

		$campos = "NOME, FOTO, GENERO, LANCAMENTO, ELENCO, DURACAO, PRECO, CLASSIFICACAO, ENREDO";
		$valores = "'$nome', '$foto', '$genero', '$lancamento', '$elenco', '$duracao', '$preco', '$classificacao', '$enredo' ";
	
		if ( funInsert("tb_film", $campos, $valores)) 
			echo "<p class='p-2 m-2 bg-success text-white'>Produto cadastrado com sucesso!</p>";
		else 
			echo "<p class='p-2 m-2 bg-warning text-white'>Erro ao cadastrar Produto!</p>";

		echo "<p class='m-2'><input class='bg-primary text-white ' type='submit' value='Voltar' onclick=location.replace('Index.php?opc=RES') /></p>";
	}

	
	elseif ( $opc == "ALT" ) {
		
		$tabela = funSelect("tb_film", "*", "ORDER BY NOME");
		echo " <h5 class='p-2 m-2 bg-primary text-white text-center'>Filmes Cadastrados:</h5>";			
			for($i=0; $i < count($tabela); $i++) {		
				echo "			  
			  <div class='container'>
					<div class='row'>
					<div class='col text-center font-weight-bold my-auto'>". $tabela[$i]['NOME'] ." </div>
                    	<div class='col text-center my-auto'><img src='". $tabela[$i]['FOTO'] ."' width='100' /></div>
						<div class='col text-center my-auto'> <spam class='font-weight-bold'> Gênero: </spam>". $tabela[$i]['GENERO'] ."</div>
						<div class='col text-center my-auto'> <spam class='font-weight-bold'> Data de lançamento: </spam>". date("d/m/Y", strtotime($tabela[$i]['LANCAMENTO'])) ."</div>
						<div class='col text-center my-auto'> <spam class='font-weight-bold'> Elenco: </spam>". $tabela[$i]['ELENCO'] ."</div>
						<div class='col text-center my-auto'> <spam class='font-weight-bold'> Duração: </spam>". $tabela[$i]['DURACAO'] ." min </div>
						<div class='col text-center my-auto'> <spam class='font-weight-bold'> Preço: </spam> R$ ". number_format($tabela[$i]['PRECO'],2,',','.') ."</div>
						<div class='col text-center my-auto'><img src='Imagens/classificacao/".$tabela[$i]['CLASSIFICACAO'] .".png' width='25' /></div>
						<div class='col text-center my-auto'><a href='Index.php?opc=MOD&codigo=". $tabela[$i]['CODIGO'] ."' ><img src='Imagens/modify.png' width='25' title='Editar' /></a></div>
						<div class='col text-center my-auto' ><a href='Index.php?opc=DEL&codigo=". $tabela[$i]['CODIGO'] ."' ><img src='Imagens/erase.png' width'25' title='Excluir' /></a></div>
					</div>
			  </div> <br/>
			  ";
		}
			echo"<input class='bg-primary text-white' type='submit' value='Voltar' onClick=location.replace('Index.php?opc=RES')";				
	}

	elseif ( $opc == "MOD" ) {
		$codigo = $_GET['codigo'];
		$argumentos = "WHERE CODIGO = '$codigo' ";
		
		$tabela = funSelect("tb_film", "*", $argumentos);
		
		echo "<h5 class='p-2 m-2 bg-primary text-white text-center'>Atualizar</h5>
			<form action='Index.php?opc=UPD&codigo=". $tabela[0]['CODIGO'] ."' method='post'>
				<h5 class='text-center'> Nome: <input type='text' name='nome' value='".$tabela[0]['NOME']."' size='40' maxlength='40' required /> </h5>
				<h5 class='text-center'> Foto: <input type='text' name='foto' size='50' maxlength='50' value='".$tabela[0]['FOTO']."' required /> </h5>
				<h5 class='text-center' > Gênero: 
				<select name='genero' required >
					<option value='".$tabela[0]['GENERO']."'  selected>".$tabela[0]['GENERO']."</option> 
					<option value='Ação'>Ação</option> 
					<option value='Terror'>Terror</option>
					<option value='Drama'>Drama</option>
					<option value='Comédia'>Comédia</option>
					<option value='Infantil'>Infantil</option>
					</select> </h5>
				<h5 class='text-center'> Lançamento <input type='date' name='lancamento' value='".$tabela[0]['LANCAMENTO']."' required /> </h5>
				<h5 class='text-center'> Elenco <input type='text' name='elenco' value='".$tabela[0]['ELENCO']."' size='40' maxlength='300' required/> </h5>
				<h5 class='text-center'> Duração <input type='number' name='duracao' value='".$tabela[0]['DURACAO']."' min='20' max'300' required/> min </h5>
				<h5 class='text-center' > Classificação: 
				<select name='classificacao' required >
					<option value='".$tabela[0]['CLASSIFICACAO']."' selected>".$tabela[0]['CLASSIFICACAO']."</option> 
					<option value='Livre'>Livre</option> 
					<option value='10'>10 </option>
					<option value='12'>12 </option>
					<option value='14'>14 </option>
					<option value='16'>16 </option>
					<option value='18'>18 </option>
				</select> </h5>
                <h5 class='text-center'> Enredo <input type='text' name='enredo' size='40' maxlength='300' value='". $tabela[0]['ENREDO']."' required/> </h5>
				<h5 class='text-center'> Preço: R$ <input type='number' name='preco' min='1' max='1000' value='".$tabela[0]['PRECO']."' required />,00 </h5>
					<h5 class='text-center'> <input class='bg-primary text-white' type='submit' value='Atualizar' /> </h5>
			</form>";
	}

	elseif ( $opc == "UPD" ) {
		$codigo = $_GET['codigo'];	
	
		$nome = $_POST['nome'];
		$foto = $_POST['foto'];
		$genero = $_POST['genero'];
		$lancamento = $_POST['lancamento'];
		$elenco = $_POST['elenco'];
		$duracao = $_POST['duracao'];
		$preco = $_POST['preco'];
		$classificacao = $_POST['classificacao'];
        $enredo = $_POST['enredo'];

		$alteracoes = " NOME = '$nome', 
						FOTO = '$foto',  
						GENERO = '$genero',
						LANCAMENTO = '$lancamento', 
						ELENCO = '$elenco',  
						DURACAO = '$duracao',
						PRECO = '$preco',  
						CLASSIFICACAO = '$classificacao', 
                        ENREDO = '$enredo'";

		$argumentos = " WHERE CODIGO = '$codigo'";
		
		if (funUpdate("tb_film", $alteracoes, $argumentos)) 
			echo "<p class='p-2 m-2 bg-success text-white'>Produto alterado com sucesso!</p>";
		else 
			echo "<p class='p-2 m-2 bg-warning text-white'>Erro ao alterar Produto!</p>";
		
		echo "<p class='m-2'><input class='bg-primary text-white' type='submit' value='Voltar' onclick=location.replace('Index.php?opc=ALT') /></p>";
	}

	elseif ( $opc == "DEL" ) {	
		$codigo = $_GET['codigo'];			
		$argumentos = " WHERE CODIGO = '$codigo'";
		if ( funDelete("tb_film", $argumentos)) 
			echo "<p class='p-2 m-2 bg-success text-white'>Produto excluído com sucesso!</p>";			  
		else 
			echo "<p class='p-2 m-2 bg-warning text-white'>Erro ao excluir Produto!</p>";

		echo "<p class='m-2'><input class='bg-primary text-white' type='submit' value='Voltar' onclick=location.replace('Index.php?opc=ALT') /></p>";		
	}
?>