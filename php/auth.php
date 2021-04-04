<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta content="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Форма авторизации</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">

  <style>
    .rightpic {
      float: left;
      margin: 0 0 10px 5px;
    }

    .secondpic {
      float: left;
      margin: 0 0 10px 15px;
    }
  </style>

</head>

<body>

  <div class="conteiner mt-4">
    <h1>Авторизация</h1>
  </div>

  <form action="php/auth-check.php" method="post">

    <?php if (isset($_GET['error'])) { ?>
    <p class="error">
      <?php echo $_GET['error']; ?>
    </p>
    <?php } ?>

    <input type="text" class="form-control" name="login" id="login" placeholder="Логин"><br>
    <input type="password" class="form-control" name="password" id="password" placeholder="Пароль"><br>
    <a href="registration.php" class="rightpic">Еще не зарегестрированы?</a>
    <a href="../index.html" class="secondpic">Вернуться</a>
    <button class="btn btn-sucsess" type="submit" style="float: right;">Войти</button>
  </form>
</body>

</html>