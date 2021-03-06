<?php

class db{
    //host
    private $host = 'localhost';

    //usuario
    private $usuario = 'root';

    //senha
    private $senha = '';

    //banco de dados
    private $database  = 'twitter_clone';

    public function conecta_mysql()
    {
        //criar a conexão mysqli_connect(localizacao do bd, usuario de acesso, senha, banco de dados)
        $con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);
        //Ajustar o charset de comunicação entre a aplicação e o banco de dados.
        mysqli_set_charset($con, 'utf-8');
        
        //verificar se houve erro de conexão
        if(mysqli_connect_errno()){
            echo 'Erro ao tentar se conectar com o banco de dados MySQL: '.mysqli_connect_error();
        }
        
        return $con;
    }

}

//CREATE DATABASE twitter_clone;

?>
