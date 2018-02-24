<!DOCTYPE html>
<html>
<head>
	<title>Deletar dados no banco</title>
</head>
<body>
	<?php  
		include 'conexao_banco.php'; //incluir a conexão com o banco de dados
		if (isset($_GET['id'])){ //verificar se a varaivel está setada
			//se a variavel está setada, então o pedido de deletar o dado na tabela foi executado
			//aqui vai executar o query para deletar o dado com o id que foi passado
			$sql = mysql_query("DELETE FROM `contatos`.`clientes` WHERE `clientes`.`id`=".$_GET['id']);
			//unset a variavel
			unset($_GET['id']);
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

				//mostrar os dados
				echo "Nome: ".@$nome."<br>";
				echo "Telefone: ".@$telefone."<br>";
				echo "E-Mail: ".@$email."<br>";
				//em baixo há um link para recarregar a página, enviando o id do objeto selecionado para o $_GET
				?>
				<a href="deletar.php?id=<?php echo($linha['id']) ?>">Deletar</a>
				<br> <br>
				<?php
			}
		}
	?>

	<a href="../main.php">Ir para tela principal </a>
</body>
</html>