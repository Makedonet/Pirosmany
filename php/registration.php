<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta content="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Форма регистрации</title>

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
      <h1>Регистрация</h1>
    </div>
    <form action="check.php" method="post">
      <input type="text" class="form-control" name="fio" id="fio" placeholder="ФИО"><br>
      <input type="text" class="form-control" name="birth" id="birth" placeholder="Дата рождения"><br>
      <input type="text" class="form-control" name="login" id="login" placeholder="Логин"><br>
      <input type="password" class="form-control" name="password" id="password" placeholder="Пароль"><br>
      <a href="auth.php" class="rightpic">Авторизация</a>
      <a href="../index.html" class="secondpic">Вернуться</a>
      <button class="btn btn-sucsess" type="submit" style="float: right;">Зарегистрироваться</button>
    </form>
  </body>
</html>
