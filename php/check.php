<?php

    $fio = filter_var(trim($_POST['fio']), FILTER_SANITIZE_STRING);
    $birth = filter_var(trim($_POST['birth']), FILTER_SANITIZE_STRING);
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

    require_once 'db-connection.php';

    if(mb_strlen($fio) < 5 || mb_strlen($fio) > 90) {
      echo "Недопустимая длина ФИО";
      exit();
    } else if(mb_strlen($birth) < 6 || mb_strlen($birth) > 25) {
      echo "Недопустимая длина даты рождения";
      exit();
    } else if(mb_strlen($login) < 5 || mb_strlen($login) > 90) {
      echo "Недопустимая длина логина";
      exit();
    } else if (mb_strlen($password) < 4 || mb_strlen($password) > 25){
        echo "Поле пароль от 4 до 25 символов";
        exit();
    }

    $password = md5($password);

    $sql = "INSERT INTO users (login, birth, fio, password)
    VALUES ('$login', '$birth', '$fio', '$password')";

    if ($connection->query($sql) === TRUE) {
    header("Location: auth.php?success=Your account has been created successfully");
    } else {
    echo "Error: " . $sql . "<br>" . $connection->error;
    }

    $connection->close();

?>
