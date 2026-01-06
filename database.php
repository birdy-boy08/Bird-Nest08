 <?php 
    $db_server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "sib_db";
    $conn = "";
    
    try{ 
        $conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);

        
    }
    
    catch(mysqli_sql_exception $e){
        echo"Could not connect to database: ";
    }
    
    

?>
    
