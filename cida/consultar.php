<!DOCTYPE html>
<html>
<head>
	<title>Consultar dados no banco</title>
</head>
<body>
	<?php  
		include 'conexao_banco.php';
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
				//mostrar o resultado da busca
				echo "Nome: ".@$nome."<br>";
				echo "Telefone: ".@$telefone."<br>";
				echo "E-Mail: ".@$email."<br>";
				echo "ID: ".@$id."<br>";
				echo "----------------------------------";
				echo "<br>";
			}
		}
	?>

	<a href="../main.php">Ir para tela principal </a>
</body>
</html>