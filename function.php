<?php
include "db.php";
if(isset($_POST["register"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repassword = $_POST["repassword"];



    if(!($repassword == $password)){
        echo "Şifreler Uyuşmuyor";
    }else{
        $selectQuery =  $db->prepare("SELECT * FROM users WHERE email = ?" );
        $selectQuery->execute([$email]);

        if($selectQuery->rowCount() > 0){
            echo "Email zaten kayıtlı!";
        }else{
            $insertQuery = $db->prepare("INSERT INTO users (name,email,password) VALUES (?,?,?)");
            $insertQuery->execute(array($name,$email,$password));
        }
            if ($insertQuery) {
                echo "Kayıt Başarılı";
                header("location: login.php");
        }else{echo "Bir Sorun Oluştu!";}
    }
}

if(isset($_POST["login"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $loginQuery = $db->prepare("SELECT * FROM users WHERE email = ? and password = ? ");
    $loginPerson = $loginQuery->execute(array($email,$password));


    if($loginQuery->rowCount() > 0){
        $_SESSION["isLogin"] = "OK";
        header("location: index.php");

    }else{echo "Böyle Bir Kullanıcı Bulunmamakta!";}

}
