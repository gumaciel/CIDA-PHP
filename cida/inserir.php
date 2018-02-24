<!DOCTYPE html>
<html>
<head>
	<title>Inserir dados no banco</title>
</head>
<body>
	<form name="inserir" method="post" action="inserindo.php">
		Nome: <input type="text" maxlength="50" name="nome"> <br>
		Telefone: <input type="number" max="999999999" name="telefone"> <br>
		E-Mail: <input id ="id3" oninput="validarEmail()" type="email" maxlength="100" name="email">
		<p id="msg_error"></p>

		<input type="submit" name="enviar"> <br>
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
	<a href="../main.php">Ir para tela principal </a>
</body>
</html>