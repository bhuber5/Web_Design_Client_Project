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
    
    <div class="main">
    <div id="container">
    <div id="content" class = "gameDesignMinor">
    <div class="title">Game Design Minor Courses</div>
    <br>
    <div class = 'addReview button'><a href="write_course_review.php">Add Course Review</a></div>
    <br>    
    <?php
        $courses = $mysqli->query('SELECT * FROM classes');
        while ( $row = $courses->fetch_assoc()) {
            error_reporting( error_reporting() & ~E_NOTICE ); /* hides error messages about inputs*/
            $id = $row['class_id'];
            $numb = $row['class_num'];
	    $name = $row['class_name'];
	    $rating = $mysqli->query("SELECT AVG(rating) FROM `reviews` INNER JOIN `reviewsforclasses` ON reviews.review_id = reviewsforclasses.review_id WHERE reviewsforclasses.class_id = $id");
	    $rating = $rating->fetch_row()[0];
	    $rating = round($rating);
            echo "<p><a href='classes_for_minor_forum.php?id=$id'>$numb: $name</a>     ";
	    for($i=0;$i<$rating;$i++){echo '<span class="star">&#9733</span>';}
	    echo "</p>";  
        }
    ?>
    </div>
    </div>
    </div>
</body>
