<?php

session_start();

require_once('db.class.php');

$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);

$sql = "SELECT id, usuario, email FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";

//echo $sql;

$objDb = new db();
$link = $objDb -> conecta_mysql();

$resultado_id = mysqli_query($link, $sql);

if($resultado_id){
    $dados_usuario = mysqli_fetch_array($resultado_id);

    if(isset($dados_usuario['usuario'])){
        $_SESSION['id_usuario'] = $dados_usuario['id'];
        $_SESSION['usuario'] = $dados_usuario['usuario'];
        $_SESSION['email'] = $dados_usuario['email'];
        header('Location: home.php');
        //echo 'usuário existe';
    }else{
        header('Location: index.php?erro=1');
        //echo 'usuário não existe';
    }

    //var_dump($dados_usuario);
}else{
    echo 'Erro na execução da consulta, favor entrar em contato com o admin do site';
}

//$dados_usuario = mysqli_fetch_array($resultado_id);



//update retorna true/false
//insert retorna true/false
//select retorna false/resource
//delete retorna true/false

//echo $usuario;
//echo '<br/>';
//echo $senha;


?>