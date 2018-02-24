<?php
	$host = "localhost";	//nome do host (localhost, servidor local)
	$user = "root";			//nome do usuario (padrão)
	$pass = "123";			//nome da senha (está alterada)
	$banco = "contatos";	//nome do banco de dados

	//conectar no mysql		servidor, usuario, senha
	$conexao = mysql_connect($host, $user, $pass) or die (mysql_error());
	//selecionar o banco de dados
	mysql_select_db($banco) or die (mysql_error());
?>