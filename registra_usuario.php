<?php

require_once('db.class.php');

//$_POST[]
//$_GET[]

//echo $_POST['usuario'];
//echo '<br/>';
//echo $_POST['email'];
//echo '<br/>';
//echo $_POST['senha'];
//echo '<br/>';

$usuario = $_POST['usuario'];
$email = $_POST['email'];
$senha = md5($_POST['senha']);

$objDb = new db();

$link = $objDb->conecta_mysql();

$usuario_existe = false;
$email_existe = false;

//Verificar se o usuário já existe.
$sql = "select * from usuarios where usuario = '$usuario'";
if($resultado_id = mysqli_query($link, $sql)){
    $dados_usuario =  mysqli_fetch_array($resultado_id);
    if(isset($dados_usuario['usuario'])){
        $usuario_existe = true;
    }
    //else{
    //    echo 'Usuário não cadastrado, ok, pode cadastrar!';
    //}
}else{
    echo 'Erro ao tentar localizar o registro de usuário!';
}

//Verificar se o email já existe.
$sql = "select * from usuarios where email = '$email'";
if($resultado_id = mysqli_query($link, $sql)){
    $dados_usuario =  mysqli_fetch_array($resultado_id);
    if(isset($dados_usuario['email'])){
        $email_existe = true;
    }
    //else{
    //    echo 'Email não cadastrado, ok, pode cadastrar!';
    //}
}else{
    echo 'Erro ao tentar localizar o registro de Email!';
}

if($usuario_existe || $email_existe){
    $retorno_get = '';

    if($usuario_existe){
        $retorno_get.= "erro_usuario=1&";
    }

    if($email_existe){
        $retorno_get.= "erro_email=1&";
    }

    header('Location: inscrevase.php?'.$retorno_get);
    die();
}

$sql = "insert into usuarios(usuario, email, senha) values('$usuario','$email','$senha')";

//CREATE TABLE usuarios(
//	id int not null	PRIMARY KEY AUTO_INCREMENT,
//    usuario VARCHAR(50) not null,
//    email VARCHAR(100) not null,
//    senha VARCHAR(32) not null
//);

//executar a query
//mysqli_query(conexão, $sql)

if(mysqli_query($link, $sql)){
    echo 'Usuário registrado com sucesso!';
}else{
    echo "Erro ao registrar o usuário!";
}


?>


