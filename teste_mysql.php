<?php

require_once('db.class.php');

$sql = "SELECT * FROM usuarios";
//$sql = "SELECT * FROM usuarios where id = 8";

//echo $sql;

$objDb = new db();
$link = $objDb -> conecta_mysql();

$resultado_id = mysqli_query($link, $sql);

if($resultado_id){
    $dados_usuario = array();

    while($linha = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
        $dados_usuario[] = $linha;
    }

    foreach($dados_usuario as $usuario){
        var_dump($usuario['email']);
        echo '<br/>';
        echo $usuario['email'];
        //var_dump($usuario);
        echo '<br/><br/><br/>';
    }

    //var_dump($dados_usuario);

}else{
    echo 'Erro na execução da consulta, favor entrar em contato com o admin do site';
}

//mysqli_fetch_array = retorna apenas uma ocorrencia.
//SEM NENHUM ÍNDICE = array(8) { [0]=> string(1) "1" ["id"]=> string(1) "1" [1]=> string(5) "João" ["usuario"]=> string(5) "João" [2]=> string(14) "joao@gmail.com" ["email"]=> string(14) "joao@gmail.com" [3]=> string(32) "698dc19d489c4e4db73e28a713eab07b" ["senha"]=> string(32) "698dc19d489c4e4db73e28a713eab07b" }
//MYSQLI_NUM = array(4) { [0]=> string(1) "1" [1]=> string(5) "João" [2]=> string(14) "joao@gmail.com" [3]=> string(32) "698dc19d489c4e4db73e28a713eab07b" }
//MYSQLI_ASSOC = array(4) { ["id"]=> string(1) "1" ["usuario"]=> string(5) "João" ["email"]=> string(14) "joao@gmail.com" ["senha"]=> string(32) "698dc19d489c4e4db73e28a713eab07b" }
//MYSQLI_BOTH = array(8) { [0]=> string(1) "1" ["id"]=> string(1) "1" [1]=> string(5) "João" ["usuario"]=> string(5) "João" [2]=> string(14) "joao@gmail.com" ["email"]=> string(14) "joao@gmail.com" [3]=> string(32) "698dc19d489c4e4db73e28a713eab07b" ["senha"]=> string(32) "698dc19d489c4e4db73e28a713eab07b" }

//RESULTADO FINAL
//array(3) { [0]=> array(4) { ["id"]=> string(1) "1" ["usuario"]=> string(5) "João" ["email"]=> string(14) "joao@gmail.com" ["senha"]=> string(32) "698dc19d489c4e4db73e28a713eab07b" } [1]=> array(4) { ["id"]=> string(1) "6" ["usuario"]=> string(6) "Marcio" ["email"]=> string(12) "marcio@fasfd" ["senha"]=> string(32) "698dc19d489c4e4db73e28a713eab07b" } [2]=> array(4) { ["id"]=> string(1) "7" ["usuario"]=> string(5) "Jorge" ["email"]=> string(18) "jorge@teste.com.br" ["senha"]=> string(32) "202cb962ac59075b964b07152d234b70" } }

?>

