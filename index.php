<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <style>
          body{
               background-color: black;
          }
          .login-form {
            width: 400px;
            height: 250px;
            border: 2px solid rgb(3, 184, 255);
            border-radius: 5px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            gap: 10px;
            box-shadow: 10px 10px 10px rgba(0, 0, 255, 0.5);
        }

        .login-form h2 {
            color: aquamarine;
        }

        .login-form input {
            width: 90%;
            height: 30px;
            border: 1px solid greenyellow;
            border-radius: 3px;
            position: relative;
            left: 17px;
            margin: 10px 0px;
            background-color: black;
            opacity: 0.5;
            color: white;
        }

        .login-form h4 a {
            position: absolute;
            right: 0;
            right: 20px;
            color: rgb(2, 162, 254)
        }

        .login {
            padding: 7px 20px;
            border: 0px solid;
            border-radius: 3px;
            position: absolute;
            top: 75%;
            left: 40%;
            opacity: 0.5;
            cursor: pointer;
            background-color: black;
            color: white;
        }

        .login:hover {
            border-color: azure;
        }

        .signup-forgot {
            position: relative;
            display: flex;
            top: 25px;
            justify-content: space-between;
            margin: 0px 30px;
        }

        .signup-forgot a {
            text-decoration: none;
            color: rgb(2, 162, 254);
        }

        .signup-forgot {
            float: right;
        }

        .signup-btn {
            margin-right: 180px;
            border-color: rgb(62, 54, 44);
        }
     </style>
</head>
<body>
     <div class="login-form" id="login-form">
        <form action="" method="post">
            <h4><a href="#" id="close-login">close</a></h4>
            <h2 align="center">login here</h2>
            <label for="login-mail"></label>
            <input type="text" placeholder="Enter your email or username" class="login-mail" id="login-mail" required name="mail">
            <label for="login-password"></label>
            <input type="password" placeholder="Enter your password" class="login-password" id="login-password" required name="password">
            <button class="login" id="login" type="submit" name="loginButton">Login</button>
            <div class="signup-forgot">
                <h5><a href="signup.php" class="signup-btn">Sign up</a></h5>
                <h5><a href="#" class="forgot-password">forgot password?</a></h5>
            </div>
        </form>
    </div>

    <?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['loginButton'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'movie_db');
    if (!$conn) {
        echo "There is an error in the database connection";
    }
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $query = "SELECT * FROM login_db WHERE username = '$mail' AND password = '$password'";
    $query = mysqli_query($conn, $query);
    $rows = mysqli_num_rows($query);
    $data = mysqli_fetch_assoc($query);

    if ($rows == null) {
        echo "<script>alert('Your email and password are not in the database. Please sign up first')</script>";
    } else {
        $_SESSION['user_email'] = $mail;

        echo "<script>window.open('movie.php');</script>";
    }

    mysqli_close($conn);
}
?>

</body>
</html>