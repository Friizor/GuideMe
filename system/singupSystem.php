<?php
require('../connect.php');
    $userName = $_POST['username'];
    $email = $_POST['singUpEmail'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    //MAGIC, Don't touch 
    //Please Work
    function generateUniqueID(int $timestampLength = 10): string {
        $timestamp = time();

        $saltLength = 2;
        $salt = bin2hex(random_bytes($saltLength));


        $combined = $timestamp . $salt;
        $combinedLength = strlen($combined);
        if ($combinedLength < 12) {
            $combined .= str_pad('', 12 - $combinedLength, '0', STR_PAD_LEFT);
        }

        $id = hash('sha256', $combined);

        return substr($id, 0, 20);
    }

    $uniqueID = generateUniqueID();
    //echo "Generated ID: $uniqueID";


    $rep = $bdd->prepare("INSERT INTO user(id, username, email, password) VALUES (:id, :username, email, :password)");

    $rep->execute(array(
        "id"=>$uniqueID,
        "username"=>$userName,
        "email"=>$email,
        "password"=>$hashedPassword
    ));
    header('Location: login.html');

?>