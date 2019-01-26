<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<!--NOTE: CHANGE THE CONFIG AND HEAD FILES DEPENDING ON WHETHER YOU ARE USING THE COURSE SITE OR LOCAL HOST-->

<head>
    <?php include "includes/head.php" ?>
</head>


<body>
    <?php include "includes/navbar.php" ?>
    <div class = "main">
    <div class = "container-fluid" >
        <div id="content" class = "row justify-content-center">
            <div class="col-1 col-md-1"></div>
            <div class="col-10 col-md-10 center-block game-project-description">
                Interested to see what DGA members have created? Take a look through this catalog of games produced by game design classes, weekly game design meetups, or passion projects at Cornell. You can click on an individual game to see a more information about it. If you have your own game you would like to submit for others to play, feel free to contact one of the DGA leaders found on the home page.
            </div>
            <div class="col-1 col-md-1"></div>
        </div>
    </div>
    
    <?php
    
    if(isset($_SESSION['logged_user'])){ 
        
        echo "<div id = 'add_game_button'>";
        echo "<a href = add_game.php> <input class = 'button' type='submit' name = 'Add Game' value='Add Game'> </a>";
        echo "</div>";
    
    }
    ?>
        
        
    <div class = "container-fluid projects">
        <div class="container--grid">
            <ul layout = "rows top-left">
                <?php 
                    $result = $mysqli->query("SELECT * FROM games");
                    while( $row = $result->fetch_assoc()){
                        $title = $row['title'];
                        $developer = $row['creator'];
                        $genre = $row['genre'];
                        $description = $row['description'];
                        $engine = $row['engine'];
                        $link = $row['link'];
                        $game_id = $row['game_id'];
                        $href = "game.php?game_id=$game_id";
                        $imageFilePath = $row['cover_image'];
                       
                        echo "<li>
                            <a href=$href>
                                <div class = 'card'>
                                    <div class = 'card-image' style = 'background-image: url($imageFilePath);'>
                                    
                                    </div>
                                    <div class = 'card-body'>
                                        <div class = 'card-title'> $title</div>
                                        <div class = 'card-developer'> $developer </div>
                                        <div class = 'card-description'> $description </div>
                                    </div>";
                        
                                    //If user is logged in, show edit & delete button
                                     if(isset($_SESSION['logged_user'])){
                                        $edit = "edit_game.php?game_id=$game_id";
                                        $delete = "delete_game.php?game_id=$game_id";
                                        echo "<div class = 'card-buttons'> 
                                                <div class = 'card-buttons-wrapper'>
                                                    <a class = 'edit left' href = $edit>Edit</a>
                                                    <a class = 'delete right' href = $delete> Delete</a>
                                                </div>
                                            </div>";
                                    }

                                echo "<div class = 'card-footer'>
                                        <div class = 'card-footer-wrapper' layout = 'row bottom-left'>
                                            <div class = 'card-gameInfo left'><span class = 'card-gameInfoLabel'> Genre: </span> $genre </div>
                                            <div class = 'card-gameInfo right'> <span class = 'card-gameInfoLabel'>Engine: </span> $engine </div>
                                    </div>
                                </div>
                            </a>
                        </li>";
                    }
                ?>
            </ul>
            
        </div>
    </div>   
    </div>
</body>


</html>
    
