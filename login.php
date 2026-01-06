<!DOCTYPE html>
<html lang="en">
<?php 
    include("database.php");
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <input type="email" id="email" name = 'emailadress' required placeholder="Enter your email">
            </div>

            <div class="form-group">
                <input type="password" id="password" name="password" required placeholder="Enter your password">
            </div>

            <button type="submit" class="login-btn" >Login</button>

            <p class="register-text">Don't Have An Account Yet?<br>
            Register Below!</p>

            <button type="button" class="register-btn"><a href="http://localhost/website/" class="link">Register</a></button>
        </form>
    </div>
</body>
</html>


<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = filter_input(INPUT_POST, 'emailadress', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
        $hash = password_hash($password, PASSWORD_DEFAULT);

        if($email != "" && $password != ""){
            $query = "SELECT * FROM usertable WHERE emailadress = '$email'";
            $result = mysqli_query($conn, $query);
            $user = mysqli_fetch_assoc($result);

            if($user){
                if(password_verify($password, $user['password'])){
                    echo "Login successful!";
                    header("Location: dashboard.php");
                    exit();
                } else {
                    echo "Invalid password.";
                }
            } else {
                echo "No user found with that email address.";
            }
        } else {
            echo "Please fill in all fields.";
        }

    }



?>
