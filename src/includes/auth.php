<?php

session_start();

if (isset($_POST['u'])){
    include_once "connect.php";

    $user = mysqli_real_escape_string($mysqli, $_POST['u']);
    $pass = mysqli_real_escape_string($mysqli, $_POST['p']);

    if (empty($user) || empty($pass)) {

        echo "please enter usrname and password";

    }else{
        $accountFound = $mysqli->query("SELECT * FROM Accounts WHERE username = '$user'");

        $accountCheck = mysqli_num_rows($accountFound);

        if ($accountCheck = 1){

            $account = mysqli_fetch_assoc($accountFound);

            if ($user == $account['username']){
            
                if ($pass == $account['password']){
                    $_SESSION['username'] = $account['username'];
                    echo true;
                    setcookie ("isLoggedIn", 'true', time()+3600*24*31, '/', NULL, 0 ); 
                    exit();
                }
        }
    }
        
    }
}else{
    echo "bad";
    header("Location: ../index.html");
    exit();
}


?>