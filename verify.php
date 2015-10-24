<?php 

if(isset($_POST['Submit'])){ 
    $dbHost     = "localhost";  //Location Of Database usually its localhost 
    $dbUser     = "root";   //Database User Name 
    $dbPass     = "root";   //Database Password 
    $dbDatabase = "FlipDatabase"; //Database Name 
    //Connect to the databasse 
    $db         = new PDO("mysql:dbname=$dbDatabase;host=$dbHost;port=3306", $dbUser, $dbPass); 

    $sql = $db->prepare("SELECT * FROM FlipUsers 
        WHERE username = ? AND 
        password = ? 
        LIMIT 1"); 

    //Lets search the databse for the user name and password 
    //Choose some sort of password encryption, I choose sha256 
    //Password function (Not In all versions of MySQL). 
    $pas = $_POST['password'];
     
    $sql->bindValue(1, $_POST["username"]); 
    $sql->bindValue(2, $pas); 

    $sql->execute(); 

    // Row count is different for different databases 
    // Mysql currently returns the number of rows found 
    // this could change in the future. 
    if($sql->rowCount() == 1){ 
        $row                  = $sql->fetch($sql); 
        session_start(); 
        $_SESSION['username'] = $row['username']; 
        $_SESSION['fname']    = $row['first_name']; 
        $_SESSION['lname']    = $row['last_name']; 
        $_SESSION['logged']   = TRUE; 
        header("Location: firstpage.html"); // Modify to go to the page you would like 
        exit; 
    }else{ 
        header("Location: index.html"); 
        exit; 
    } 
}else{ //If the form button wasn't submitted go to the index page, or login page 
    //header("Location: firstpage.html");
    echo "Database Connection Error";
    exit; 
}
?>