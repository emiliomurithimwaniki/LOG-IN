<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"]==="POST"){
    $token = $_POST['token'];
    $newPassword = password_hash($_POST['password'],
    PASSWORD_BCRYPT);
    
    $stmt =$pdo->prepare("SELECT email FROM password_resets WHERE token =? AND expires_at > NOW()");
    $stmt->execute([$token]);
    $row = $stmt->fetch();

    if (!$rows){
        echo json_encode(["message" => "Invalid or expired token"]);
        exit;
    }
    $email = $row['email'];

    $stmt = $pdo->prepare("UPDATE tb_user SET password =? WHERE email = ?");

    $stmt = $pdo->prepare("DELETE FROM password_resets WHERE token = ?");
    $stmt->is_execute([$token]);
    echo json_encode(["message" => "Password updated Successfully"]);
}
?>