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
                        $deleteresult = $mysqli->query("SELECT * FROM games WHERE games.game_id = $game_id");
                        if($row = $deleteresult->fetch_assoc()){
                            $name = $row['title'];
                            $cover = $row['cover_image'];
                        }
                        
                        
                        if(isset($_POST["Delete"])){
                            
                            //deletes the images stored in the database correspondin to that game
                            $images = $mysqli->query("SELECT DISTINCT images.file, images.image_id FROM gameimages 
                                    INNER JOIN games ON gameimages.game_id = $game_id 
                                    INNER JOIN images ON gameimages.image_id = images.image_id");
                            while($imgRow = $images->fetch_assoc()){
                                $file = $imgRow['file'];
                                $img = $imgRow['image_id'];
                                echo "$file <br> deleted";
                                unlink ("$file");
                                $mysqli->query("DELETE FROM images WHERE image_id = $img");
                            }
                            
                            //deletes the game info from the data base
                            $mysqli->query("DELETE FROM games WHERE game_id = $game_id");
                            //deletes connection between deleted game and deleted images
                            $mysqli->query("DELETE FROM gameimages WHERE game_id = $game_id");
                            
                            unlink ("$cover");
                            
                            echo "<div class ='deleteForm message'>Game Successfully Deleted, <a href='game_projects.php'> Click Here to Return </a><div class ='message'>";
                        }

                        elseif(isset($_POST["Save"])){
                                echo "<div class ='deleteForm message'>Game Deletion cancelled. <a href='game_projects.php'> Click Here to Return </a><div class ='message'>";
                            }

                        else{
                            echo "<form id='del_img' method = 'post' enctype='multipart/form-data'>
                                    <div class = 'login title'> Do You Really Want to Delete $name? </div>
                                    <input class = 'button' type='submit' name = 'Delete' value='Delete'>
                                    <input class = 'button cancel' type='submit' name = 'Save' value='Cancel'>
                                </form>";
                            }
                     }
                     else{
                         echo "please login to use this feature";
                     }   
                        
                        
                        
                    ?>
                    
                    
                </div> <!---Closes col md 8 div--->
                <div class = 'col-md-2'></div>
            </div> <!---Closes row div--->
        </div> <!---Closes container div--->
    </div>
</body>


</html>
    
