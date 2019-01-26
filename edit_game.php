<?php session_start(); ?>
<!DOCTYPE html>
<html lang='en'>
<!--NOTE: CHANGE THE CONFIG AND HEAD FILES DEPENDING ON WHETHER YOU ARE USING THE COURSE SITE OR LOCAL HOST-->

<head>
    <?php include 'includes/head.php' ?>
</head>
    
<?php
  $game_id = filter_input( INPUT_GET, 'game_id', FILTER_SANITIZE_NUMBER_INT );  
    
?>

<body>
    <div id='sticky'>
    <!-- adds navigation menu -->
    <?php include 'includes/navbar.php' ?>
    </div>
    
    <div class = 'main'>
         <div class = 'container-fluid'>
            <div id='content' class = 'row justify-content-center'>
                <div class = 'col-md-2 buttonContainer'>
                    <a class = 'button' href='game_projects.php'><img class = 'buttonImage' src='images/backArrow.png' alt='Back Arrow' height = '20'/>Back</a>
                </div>
                <div class='col-md-8 center-block formContainer'>
                    <?php
                    if(isset($_SESSION['logged_user'])){
                        $editresult = $mysqli->query("SELECT * FROM games WHERE games.game_id = $game_id");
                        while($erow = $editresult->fetch_assoc()){
                            $title = $erow['title'];
                            $developer = $erow['creator'];
                            $genre = $erow['genre'];
                            $engine = $erow['engine'];
                            $link = $erow['link'];
                        }
                        echo 
                    "<form id='edit_game_form' method = 'post' enctype='multipart/form-data'>
                        <div class = 'login title'> Edit $title</div>
                        <div class = 'inputCell first'>
                            <span class = 'inputTitle'>Title </span><input class = 'formInput' type='text' name='Title' maxlength = '50' placeholder='$title'>
                        </div>
                        <div class = 'inputCell'>
                            <span class = 'inputTitle'>Developer </span><input class = 'formInput' type='text' name='Developer' maxlength = '100' placeholder='$developer'>
                        </div>
                        <div class = 'inputCell'>
                            <span class = 'inputTitle'>Genre </span><input class = 'formInput' type='text' name='Genre' maxlength = '30' placeholder='$genre'> 
                        </div>
                        <div class = 'inputCell'>
                            <span class = 'inputTitle'>Engine </span><input class = 'formInput' type='text' name='Engine' maxlength = '60' placeholder='$engine'>
                        </div>
                        <div class = 'inputCell last'>
                            <span class = 'inputTitle'>Link </span><input class = 'formInput' type='text' name='Link' maxlength = '255' placeholder='$link'>
                        </div>
                        <div>
                            <input class = 'button' type='submit' name = 'Game_Edit' value='Update'>
                        </div>
                    </form>";
                    }
                    else{
                        echo "<div class ='message'>Please <a class ='button' href='login.php'>login</a> to use this feature</div>";
                    }
        
                    if(isset($_POST["Game_Edit"])){
                        //make sure at least one form is filled out
                        if(!empty($_POST["Title"]) || !empty($_POST["Developer"]) ||  !empty($_POST["Genre"]) || !empty($_POST["Engine"]) || !empty($_POST["Link"])){
                            //check over each text box to see if it is empty. If it is not, run an update. 

                            if(!empty($_POST["Title"])){
                                //Sanitize strings to prevent "Bobby Tables" 
                                $title_input = trim(filter_var($_POST['Title'], FILTER_SANITIZE_STRING));
                                $mysqli->query("UPDATE games SET title = '$title_input' WHERE game_id = $game_id");
                                }

                            if(!empty($_POST["Developer"])){
                                //Sanitize strings to prevent "Bobby Tables" 
                                $dev_input = trim(filter_var($_POST['Developer'], FILTER_SANITIZE_STRING));
                                $mysqli->query("UPDATE games SET creator = '$dev_input' WHERE game_id = $game_id");
                                }

                            if(!empty($_POST["Genre"])){
                                //Sanitize strings to prevent "Bobby Tables" 
                                $genre_input = trim(filter_var($_POST['Genre'], FILTER_SANITIZE_STRING));
                                $mysqli->query("UPDATE games SET genre = '$genre_input' WHERE game_id = $game_id");
                                }

                            if(!empty($_POST["Engine"])){
                                //Sanitize strings to prevent "Bobby Tables" 
                                $engine_input = trim(filter_var($_POST['Engine'], FILTER_SANITIZE_STRING));
                                $mysqli->query("UPDATE games SET engine = '$engine_input' WHERE game_id = $game_id");
                                }

                            if(!empty($_POST["Link"])){
                                //Sanitize strings to prevent "Bobby Tables" 
                                $link_input = trim(filter_var($_POST['Link'], FILTER_SANITIZE_STRING));
                                $mysqli->query("UPDATE games SET link = '$link_input' WHERE game_id = $game_id");
                                }
                            echo "<div class ='message'> The game project was updated successfully!</div>";
                            }
                            else{
                                echo "<div class ='message'>Please Fill Out at Least One Field to Perform an Update</div>";
                            }
                        }
                    ?>
                    
                    
                </div> <!---Closes col md 8 div--->
                <div class = 'col-md-2'></div>
            </div> <!---Closes row div--->
        </div> <!---Closes container div--->
    </div>
</body>


</html>
    
