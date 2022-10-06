<?php 
    $mysql = new mysqli('localhost','root','','blog');
    $mysql->set_charset('utf8');

    if($mysql == true){
        //echo 'Banco conectado';
    }else{
        echo 'Erro de conexão';
    }
?>