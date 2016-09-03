<?php
	function __autoload($class_name){
    	require_once 'classes/' . $class_name . '.php';
  	}

	$login = $_POST['usuario'];
	$senha = md5($_POST['senha']);

	$usuarioDAO = new UsuarioDAO();

	$resultado = $usuarioDAO->validaLogin($login, $senha);
	var_dump($resultado);

	if($resultado)
	{
		setcookie("login",$login);
		session_start(oid);
		header("location:index.php");	    
	}
	else
	{
		header("location:login.php?error=1");
	}	
?>