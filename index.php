<?php 
    include("database.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="form-row">
                <div class="form-group">
                    <input type="text" name="firstname" required placeholder="First Name">
                </div>
                <div class="form-group">
                    <input type="text" name="lastname" required placeholder="Last Name">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <input type="text" name="gender" required placeholder="Gender">
                </div>
                <div class="form-group">
                    <input type="email" name="emailadress" required placeholder="Email Address">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <input type="tel" name="phone" required placeholder="Phone Number">
                </div>
                <div class="form-group">
                    <input type="password" name="password" required placeholder="Password">
                </div>
            </div>

            <button type="submit" class="register-btn">Register</button>

            <p class="login-text">Already Have An Account?<br>
            Click Below to Login In!</p>

            <button type="button" class="login-btn">Login</button>
        </form>
    </div>
</body>
</html>

<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'emailadress', FILTER_SANITIZE_EMAIL);
        $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_SPECIAL_CHARS);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usertable (firstname, lastname, emailadress, gender, phone, password) VALUES ('$firstname', '$lastname', '$email', '$gender', '$phone', '$hash')";

        try{
            mysqli_query($conn, $sql);
            echo "Registration Successful!";
            header("Location: login.php");
            exit();
        } 
        
        catch(mysqli_sql_exception){
            echo "Error: Not Successful Registration";
        }


    }

?>
