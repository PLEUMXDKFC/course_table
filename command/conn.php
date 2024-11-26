<?php

    $dns = 'mysql:host=localhost;dbname=subject_management;charset=Utf8'; 
    $username = 'root';
    $password = '';

    try{

        $conn =  new PDO($dns,$username,$password);
    }catch(PDOException $e){
        $e ->getMessage();
    }


?>