<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <?php include('includes/head.php'); ?>
    <title>Login</title>
</head>
    
<body>
    <?php include "includes/navbar.php" ?>
    
    <div class="main">
        <div class = "container-fluid">
            <div id="content" class = "row justify-content-center">
                <div class="col-1 col-md-2"></div>
                <div class="col-10 col-md-8 center-block">
                    <div class = "login title">Login</div>

                        <?php
                        //If already logged in, show log out button
                        if(isset($_SESSION['logged_user'])){
                            echo "<form class = 'loginForm' method = 'post' enctype='multipart/form-data'>
                                <div class = 'message' >You Have Successfully Logged in.</div>
                                <input class = 'logOut button' type = 'submit' name= 'Logoutsub' value='Log Out'>
                                </form>";

                            //If click log out, show log out message
                            if(isset($_POST["Logoutsub"])){    
                                unset($_SESSION['logged_user']);
                                echo "<meta http-equiv='refresh' content='0'>";
                            }
                            
                            
                        }
                        //Else, if not logged in, show log in form
                        else{
                            echo "<form class = 'loginForm' method = 'post' enctype='multipart/form-data'>
                                    <span class = 'label'>Username:</span> <input class = 'loginFields' type='text' name='username' required><br>
                                    <span class = 'label'>Password:</span> <input class = 'loginFields' type='password' name='password' required><br>
                                    <input  class = 'button' type = 'submit' name= 'Logsub' value='LOG IN'>
                                </form>";
                        }
    
                        //If user hits login button, verify entered username & passowrd
                        //Login successfully if username & password matches. Else, return error message
                        if(isset($_POST["Logsub"])){
                            if(!empty($_POST["username"]) && !empty($_POST["password"])){
                                $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);

                                $password_sanitized = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
                                $password = hash( "tiger192,3", $password_sanitized ); //"sha256" is a type of hashing algorithm 
                                
                                if(preg_match("/^[a-zA-Z0-9]+$/", $username)&& preg_match("/^[a-zA-Z0-9]+$/", $password)){
                                    //Insert a question mark (?) where we want to substitute a certain string value
                                    $query = "SELECT * FROM login WHERE username = ? AND password = ?";
                                    $stmt = $mysqli->stmt_init();

                                    //Prepares the SQL query. Query must consist of a single SQL statement.
                                    if ($stmt->prepare($query)) {
                                        //Binds parameters, $username and $password, to the SQL query and tells the database that parameters are type strings
                                        $stmt->bind_param('ss', $username, $password );
                                        $stmt->execute();
                                        //Returns a resultset for successful SELECT queries, or FALSE
                                        $result = $stmt->fetch();
                                        //If results (query for username and password that was entered) returns false
                                        if($result == TRUE) {
                                             echo "<div class = 'message'> You Have Been Successfully Logged In. </div>";
                                             echo "<meta http-equiv='refresh' content='0'>";
                                            //Set logged user
                                            $_SESSION['logged_user'] = $username;
                                        } else {
                                            echo "<div class = 'message'> Invalid username or password. Please try again </div>";
                                        }
                                    }
                                    //Close statement
                                    $stmt->close();
                                } 
                            }
                        }
                        ?>
                </div>
                <div class="col-1 col-md-2"></div>
            </div> <!---Closes row div--->
        </div> <!---Closes container div--->
    </div> <!---Closes main div--->
</body>