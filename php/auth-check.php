    <?php
    session_start();
    require_once 'db-connection.php';

    if (isset($_POST['login']) && isset($_POST['password'])) {

    	function validate($data){
         $data = trim($data);
    	   $data = stripslashes($data);
    	   $data = htmlspecialchars($data);
    	   return $data;
    	}

    	$login = validate($_POST['login']);
    	$password = validate($_POST['password']);

    	if (empty($login)) {
    		header("Location: auth.php?error=Введите логин");
    	    exit();
    	}else if(empty($password)){
            header("Location: auth.php?error=Введите пароль");
    	    exit();
    	}else{
        $password = md5($password);

        $sql = "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'";

        $result = mysqli_query($connection, $sql);

    		if (mysqli_num_rows($result) === 1) {
    			$row = mysqli_fetch_assoc($result);
                if ($row['login'] === $login && $row['password'] === $password) {
                	$_SESSION['login'] = $row['login'];
                	$_SESSION['id'] = $row['id'];
                	header("Location: home.php");
    		        exit();
                }else{
    				header("Location: auth.php?error=Incorect User name or password");
    		        exit();
    			}
    		}else{
    			header("Location: auth.php?error=Incorect User name or password");
    	        exit();
    		}
    	}

    }else{
    	header("Location: auth.php");
    	exit();
    }
