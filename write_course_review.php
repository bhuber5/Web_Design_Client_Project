<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    <?php include "includes/head.php" ?>
</head>
    
<body>
	<?php include "includes/navbar.php" ?>
    <div class="main">
    <div id="container">
    <div id="content">
    <?php 
        error_reporting( error_reporting() & ~E_NOTICE ); /* hides error messages about inputs*/
        $classes =  $mysqli->query('SELECT class_id, class_num from classes');
        echo "<form class = 'reviewForm' action ='' method='post'>
            <div class = 'login title'> Write a Course Review</div>
    <div class = 'formBody'>
            <label>Game Design Minor Course:</label>
            <select name='classes'>";
            while ($row = $classes ->fetch_assoc()) {
                $id = $row['class_id'];
                $name = $row['class_num'];
                echo "<option value=$id> $name </option>";
            }
        echo "</select> <br>
        <label>Professor:</label>
        <input type='text' name='prof_name'>
	<br>
        <label>Semester Taken:</label>
        <input type='text' name='semester'>
	<br>
        <label>Grade Received:</label>
        <select name='grade'>
            <option value='A'>A</option>
            <option value='B'>B</option>
            <option value='C'>C</option>
            <option value='D'>D</option>
            <option value='F'>F</option>           
        </select>
	<br>
	<label>Course Review:</label>
        <textarea class = 'reviewTextBox' rows='4' cols='50' name='comments'></textarea>
	<br>
	
	<label>*Star Rating:</label>

	1 <input type='radio' id='star1' name='rating' value='1' /><label class = 'full' for='star1' title='Very bad - 1 star'></label>
    	2 <input type='radio' id='star2' name='rating' value='2' /><label class = 'full' for='star2' title='Kinda bad - 2 stars'></label>
	3 <input type='radio' id='star3' name='rating' value='3' /><label class = 'full' for='star3' title='Meh - 3 stars'></label>
	4 <input type='radio' id='star4' name='rating' value='4' /><label class = 'full' for='star4' title='Pretty good - 4 stars'></label>
	5 <input type='radio' id='star5' name='rating' value='5' /><label class = 'full' for='star5' title='Awesome - 5 stars'></label>
    	
	<br>
        <div class = 'center'><input class = 'button' type='submit' name='reviewSubmit' value='Submit Review'></div>
	<br>
    </div>
        </form>";
    
        $classes = $_POST['classes'];
        $comments = $_POST['comments'];
        $grade = $_POST['grade'];
        $prof_name = $_POST['prof_name'];
        $semester = $_POST['semester'];
	$rating = $_POST['rating'];
        
        if(!empty($_POST['reviewSubmit'])) {
	  if(!is_null($rating)){
	   if(preg_match("/^[A-Z]{1}[A-Za-z '-]{0,28}[a-z]{1}$/",$prof_name)&&preg_match("/^[A-Z0-9]{1}[A-Za-z0-9 '-]{0,9}[a-z0-9]{1}$/",$semester)){
            $sql = "INSERT INTO `reviews`(`date`, `instructor`, `grade`, `review`, `review_id`, `semester`, `rating`) VALUES (CURRENT_DATE(), '$prof_name', '$grade', '$comments', NULL, '$semester', '$rating')";
            if ($mysqli->query($sql) === TRUE) {
                echo "<p>New record created successfully!</p>";
                $reviewID = $mysqli->query("SELECT MAX(review_id) FROM `reviews`");
                $reviewID = $reviewID->fetch_row()[0];
                $mysqli->query("INSERT INTO `reviewsforclasses`(`review_id`, `class_id`) VALUES ('$reviewID',  '$classes')");
                } else {
                echo "Error: " . $sql . "<br>" . $mysqli->error;
                }
	}
	else{echo"<br>Invalid user input!";}
	}
	else{
		echo"<br>Please give this course a rating!";
	}
        }
   ?>
</div>
</div>
</div>
</body>
