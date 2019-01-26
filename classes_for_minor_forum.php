<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    <?php include "includes/head.php" ?>
</head>
    
<body>
    <div id="sticky">
    <!-- adds navigation menu -->
    <?php include "includes/navbar.php" ?>
    </div>
    
    <link rel="stylesheet" type="text/css" href="/public/css/flex-layout-attribute.css">
    <div class="main">
        <div class = 'col-md-2 buttonContainer'>
                    <a class = 'button' href='main_course_page.php'><img class = 'buttonImage' src='images/backArrow.png' alt='Back Arrow' height = '20'/>Back</a>
                </div>
        <h1 class = "title">Course Review:</h1>
        <br>
        <?php 
            $classID = $_GET['id'];
            $reviewforclass = $mysqli->query("SELECT * FROM reviewsforclasses");
            $review = $mysqli->query("SELECT * FROM `reviews` INNER JOIN reviewsforclasses ON reviews.review_id = reviewsforclasses.review_id WHERE reviewsforclasses.class_id = $classID ORDER BY date");   
            while ( $row = $review->fetch_row() ) { 
                echo'<div class = "minor_card">';
                echo '<div class = "minorLeft">';
                    echo "Professor: $row[2] <br> 
                    Semester: $row[5] <br>
                    Grade: $row[3] <br>";
                    for($i = 0; $i<$row[6]; $i++ ){
                        echo'<span class="star">&#9733</span>';
                    }
                echo'</div>';
                echo "<div class = 'minorRight'>$row[4]</div></div>";  
            }   
        ?>
    </div>
</body>
