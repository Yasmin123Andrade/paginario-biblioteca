<?php 
$dsn = "mysql:host=localhost;dbname=biblioteca_paginario";

try{
    $conexao = new PDO($dsn, "root", "1401");
    $conexao -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $erro){
    print $erro -> getMessage();
}

?>