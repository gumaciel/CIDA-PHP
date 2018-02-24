<!DOCTYPE html>
<html>
<head>
	<title>Alterar dados no banco</title>
</head>
<body>
	<?php
		include 'conexao_banco.php'; //incluir a conexao com o banco de dados
		if (isset($_POST['alterar'])) { //verificar se a variavel do $_POST está setada
			$nome = $_POST['nome']; 
			$telefone = $_POST['telefone']; 
			$email = $_POST['email'];
			$id = $_GET['id']; //armazenar os valores nas variaveis para organização do código

			//se algum dos campos estiver em branco, não vai ser possivel dar o sql_query
			if ($nome == "" || $telefone == "" || $email == "") {
				echo"Um ou mais campos estao vazios, erro na alteracao dos dados.
				<br>-----------------------------<br>";
			}
			else{
				echo"Sucesso na alteracao dos dados do ID ".$id.".
				<br>-----------------------------<br>";
				//comando de atualizar os valores da tabela
				$sql = mysql_query("UPDATE clientes SET nome='$nome', telefone='$telefone', email='$email' WHERE id='$id'");
			}
			//unset os valores 
			unset($_GET['id']);
			unset($_POST['alterar']);
			unset($_POST['nome']);
			unset($_POST['telefone']);
			unset($_POST['email']);
		}	
		if (isset($_GET['id'])){ //verificar se a variavel do $_POST está setada
			?>
			<h7>CAMPO PARA ATUALIZAR OS DADOS DO ID <?php echo $_GET['id'] ?></h7>
			<form name="alterar" method="post" action="">
				Nome: <input type="text" maxlength="50" name="nome"> <br>
				Telefone: <input type="number" max="999999999" name="telefone"> <br>
				E-Mail: <input id ="id3" oninput="validarEmail()" type="email" maxlength="100" name="email">
				<p id="msg_error"></p>
		
				<input type="submit" name="alterar"> <br>
			</form>		
			<script type="text/javascript">
				//quando o usuario estiver digitando o e-mail dele, esta função será executada
				function validarEmail(){
					//pegar o objeto com id3 (E-Mail)
				   	var inpObj = document.getElementById("id3");
				   	//se o objeto não for valido, vai mostrar uma mensagem dizendo o motivo do erro
				    if (!inpObj.checkValidity()) {
				        document.getElementById("msg_error").innerHTML = inpObj.validationMessage;
				    } else {
				    	//se o e-mail estiver correto, vai mostrar está mensagem no span com id"msg"
				        document.getElementById("msg_error").innerHTML = "E-mail correto.";
				    } 		
				}
			</script>
			-----------------------------------------------------------
			<br>
			<?php
		}
		//executar o comanddo de pegar os dados da tabela clientes
		$sql = mysql_query("SELECT * FROM `clientes`") or die (mysql_error());
		//pegar o numero de linhas que a tabela possui (quantos contatos possui)
		$row = mysql_num_rows($sql);
		//condicional if para verificar se possui mais de uma linha
		if ($row > 0) {
			//enquanto houver linha, os dados da tabela irá ser exibido no site
			while ($linha = mysql_fetch_array($sql)) {
				//guardar as variaveis da tabela em variaveis locais para organização do código
				$nome = $linha['nome'];
				$telefone = $linha['telefone'];
				$email = $linha['email'];
				$id = $linha['id'];
				//mostrar os dados
				echo "Nome: ".@$nome."<br>";
				echo "Telefone: ".@$telefone."<br>";
				echo "E-Mail: ".@$email."<br>";
				echo "ID: ".@$id."<br>";
				//em baixo há um link para recarregar a página, enviando o id do objeto selecionado para o $_GET
				?>
				<a href="alterar.php?id=<?php echo($linha['id']) ?>">Alterar</a>
				<br>
				<?php
				echo "----------------------------------<br>";
			}
		}
	?>

	<a href="../main.php">Ir para tela principal </a></body>
</html>