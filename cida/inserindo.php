<!DOCTYPE html>
<html>
<head>
	<title>Inserindo...</title>
</head>
<body>
	<?php
		include 'conexao_banco.php'; //incluir a conexão do banco de dados
		//guardar as variaveis do $_POST em variaveis locais para organização do código
		$nome = $_POST['nome'];
		$telefone = $_POST['telefone'];
		$email = $_POST['email'];
		//se algum dos campos estiver em branco, não vai ser possivel dar o sql_query
		if ($nome == "" || $telefone == "" || $email == "") {
			echo"Um ou mais campos estao vazios, erro na insersao dos dados.";
		}
		else{
			echo"Sucesso na insersao dos dados.";
			//comando de inserir os valores da tabela
			$sql = mysql_query("INSERT INTO clientes(nome, telefone, email) VALUES('$nome', '$telefone', '$email')");
		}
	?>
	
	<br>
	<a href="../main.php">Ir para tela principal </a>

</body>
</html>
