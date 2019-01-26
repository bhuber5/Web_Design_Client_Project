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
            <div class = 'col-md-2 buttonContainer'>
                    <a class = 'button' href='game_projects.php'><img class = 'buttonImage' src='images/backArrow.png' alt='Back Arrow' height = '20'/>Back</a>
                </div>
            <div class="col-10 col-md-10 center-block game-project-description">
            </div>
            <div class="col-1 col-md-1"></div>
        </div>
    </div>
        
   <div>
       <?php
    if(isset($_SESSION['logged_user'])){
        
        echo "<div id = \"add_head\"> <h2>Add a New Game (All Fields Required):</h2> </div>";
        
        

        if(isset($_POST["game_submit"])){
            //check to see that all data fields have something written in them//
            if(!empty($_POST["gametitle"]) && !empty($_POST["gamedevelopers"]) && !empty($_POST["gamegenre"]) && !empty($_POST["gamedescription"]) 
               && !empty($_POST["gamelink"]) && !empty($_POST["gameengine"]) && !empty($_FILES["cover"]["name"]) && !empty($_FILES["upload1"]["name"])
               && !empty($_FILES["upload2"]["name"]) && !empty($_FILES["upload3"]["name"])){
                
                //clean all the inputs of html tags and extra spaces
                    $gametitle_input = trim(filter_var($_POST['gametitle'], FILTER_SANITIZE_STRING));
                    $gamedev_input = trim(filter_var($_POST['gamedevelopers'], FILTER_SANITIZE_STRING)); 
                    $gamegenre_input = trim(filter_var($_POST['gamegenre'], FILTER_SANITIZE_STRING)); 
                    $gamedesc_input = trim(filter_var($_POST['gamedescription'], FILTER_SANITIZE_STRING));         
                    $gamelink_input = trim($_POST['gamelink']);
                    $gameengine_input = trim($_POST['gameengine']);
                    
                $validUpload = false;
                
                
                //make sure link gives a valid URL
                $validLink = true;
                if (filter_var($gamelink_input,FILTER_VALIDATE_URL) === false) {
                    echo("$gamelink_input is not a valid URL. <br> ");
                    $validLink = false;
                }
                
                
                //uploads the Cover and Demo Images to the server's directory
                if($validLink == true){
                
                $target_dir = "images/";
                
                $target_file_cover  = $target_dir . basename($_FILES["cover"]["name"]);
                $target_file_upload1  = $target_dir . basename($_FILES["upload1"]["name"]);
                $target_file_upload2  = $target_dir . basename($_FILES["upload2"]["name"]);
                $target_file_upload3  = $target_dir . basename($_FILES["upload3"]["name"]);
                
                $imageFileTypec = pathinfo($target_file_cover,PATHINFO_EXTENSION);    
                $imageFileType1 = pathinfo($target_file_upload1,PATHINFO_EXTENSION);    
                $imageFileType2 = pathinfo($target_file_upload2,PATHINFO_EXTENSION);    
                $imageFileType3 = pathinfo($target_file_upload3,PATHINFO_EXTENSION);    
                    
                    
                    
                $uploadOk = 1;
                    
                    
                // Check if file already exists
                if (file_exists($target_file_cover)) {
                    echo "Cover image using that name already exists, please use another";
                    $uploadOk = 0;
                }    
                 
                if (file_exists($target_file_upload1)) {
                    echo "Your first demo image $target_file_upload1 already exists, please use another";
                    $uploadOk = 0;
                } 
                    
                if (file_exists($target_file_upload2)) {
                    echo "Your second demo image $target_file_upload2 already exists, please use another";
                    $uploadOk = 0;
                }    
                
                if (file_exists($target_file_upload3)) {
                    echo "Your third demo image $target_file_upload3 already exists, please use another";
                    $uploadOk = 0;
                }    
                    
                    
                // Check if image file is a actual image or fake image
                $checkc = getimagesize($_FILES["cover"]["tmp_name"]);
                if($checkc == false) {
                    echo "Cover Image File is not an image.";
                    $uploadOk = 0; 
                } 
                
                $check1 = getimagesize($_FILES["upload1"]["tmp_name"]);
                if($check1 == false) {
                    echo "Demo Image 1 File is not an image.";
                    $uploadOk = 0; 
                }    
                
                $check2 = getimagesize($_FILES["upload2"]["tmp_name"]);
                if($check2 == false) {
                    echo "Demo Image 2 File is not an image.";
                    $uploadOk = 0; 
                }
                    
                $check3 = getimagesize($_FILES["cover"]["tmp_name"]);
                if($check3 == false) {
                    echo "Demo Image 3 File is not an image.";
                    $uploadOk = 0; 
                }    
                    
                
                // Check file size
                if ($_FILES["cover"]["size"] > 2000000) {
                    echo "Please use a smaller image file for your cover image.";
                    $uploadOk = 0;
                }  
                    
                if ($_FILES["upload1"]["size"] > 2000000) {
                    echo "Please use a smaller image file for your first demo image.";
                    $uploadOk = 0;
                }    
                    
                if ($_FILES["upload2"]["size"] > 2000000) {
                    echo "Please use a smaller image file for your second demo image.";
                    $uploadOk = 0;
                }    
                    
                if ($_FILES["upload3"]["size"] > 2000000) {
                    echo "Please use a smaller image file for your third demo image.";
                    $uploadOk = 0;
                }    
                    
                
                
                // Allow certain file formats
                if($imageFileTypec != "jpg" && $imageFileTypec != "png" && $imageFileTypec != "jpeg"
                   && $imageFileTypec != "gif" && $imageFileTypec != "JPG" && $imageFileTypec != "PNG" && $imageFileTypec != "JPEG") {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed, please change your cover image to one of those types.";
                    $uploadOk = 0;
                }
                    
                if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg"
                   && $imageFileType1 != "gif" && $imageFileType1 != "JPG" && $imageFileType1 != "PNG" && $imageFileType1 != "JPEG") {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed, please change your first demo image to one of those types.";
                    $uploadOk = 0;
                }
                
                if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
                   && $imageFileType2 != "gif" && $imageFileType2 != "JPG" && $imageFileType2 != "PNG" && $imageFileType2 != "JPEG") {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed, please change your second demo image to one of those types.";
                    $uploadOk = 0;
                }    
                    
                if($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg"
                   && $imageFileType3 != "gif" && $imageFileType3 != "JPG" && $imageFileType3 != "PNG" && $imageFileType3 != "JPEG") {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed, please change your third demo image to one of those types.";
                    $uploadOk = 0;
                }    
                    
                // Check if $uploadOk is set to 0 by an error, then invalidate the upload if so
                if ($uploadOk == 0) {
                    echo "Sorry, your files could not be uploaded.";
                    $validUpload = false;
                    
                }
                    // if everything is ok, try to upload files
                    
                if ($uploadOk == 1) {
                    if (move_uploaded_file($_FILES["cover"]["tmp_name"], $target_file_cover)) {
                        $validUpload = true;
                    } 
                    else {
                        echo "Sorry, there was an error uploading your Cover Image file.";
                        $validUpload = false;
                        }
                
                    
                    if (move_uploaded_file($_FILES["upload1"]["tmp_name"], $target_file_upload1)) {
                        $validUpload = true;
                    } 
                    else {
                        echo "Sorry, there was an error uploading your $target_file_upload1 file.";
                        $validUpload = false;
                        }
                    
                
                
                    if (move_uploaded_file($_FILES["upload2"]["tmp_name"], $target_file_upload2)) {
                        $validUpload = true;
                    } 
                    else {
                        echo "Sorry, there was an error uploading your $target_file_upload2 file.";
                        $validUpload = false;
                        }
                    
            
            
                    if (move_uploaded_file($_FILES["upload3"]["tmp_name"], $target_file_upload3)) {
                        $validUpload = true;
                    } 
                    else {
                        echo "Sorry, there was an error uploading your $target_file_upload3 file.";
                        $validUpload = false;
                        }
                    }
            }

                    
                    
                    
                    
                    
                    
                    //Once the game inputs have been cleaned and confirmed, as well as approving the cover image and demo images, we can add them to the database 
                    if($validUpload == true && $validLink == true && $uploadOk == 1){
                    echo "File uploading... ";
                    
                    $uploadc = "images/".basename($_FILES["cover"]["name"]);
                    $upload1 = "images/".basename($_FILES["upload1"]["name"]);
                    $upload2 = "images/".basename($_FILES["upload2"]["name"]);
                    $upload3 = "images/".basename($_FILES["upload3"]["name"]);

                    

                    $values = array (
                        'title' => "'$gametitle_input'",
                        'creator' => "'$gamedev_input'",
                        'genre' => "'$gamegenre_input'",
                        'description' => "'$gamedesc_input'",
                        'link' => "'$gamelink_input'",
                        'engine' => "'$gameengine_input'",
                        'cover_image' => "'$uploadc'",
                        );

                    $field_name_array = array_keys($values);
                    $field_list = implode(',', $field_name_array);
                    $value_list = implode(",", $values);
                        
                        

                    $field_name_array = array_keys($values);
                    $field_list = implode(',', $field_name_array);
                    $value_list = implode(",", $values);    
                        

                    
                    //upload information and cover image into the games table
                    $mysqli->query("INSERT INTO games ($field_list) VALUES($value_list)");
                    echo "Game successfully uploaded <br>";
                        
                    //upload information and cover image into the games table
                    $mysqli->query("INSERT INTO images (file) VALUES('$upload1')");
                    echo "Image 1 successfully uploaded: $upload1 <br>";
                    
                    $mysqli->query("INSERT INTO images (file) VALUES('$upload2')");
                    echo "Image 2 successfully uploaded:  $upload2 <br>";    
                        
                    $mysqli->query("INSERT INTO images (file) VALUES('$upload3')");
                    echo "Image 3 successfully uploaded:  $upload3 <br>"; 
                        
                        
                    //find the game and images we just uploaded so we can link them to the game they are associated with    
                    $add_game =  $mysqli->query("SELECT game_id FROM games WHERE cover_image = '$uploadc'");
                    $add_demo1 = $mysqli->query("SELECT image_id FROM images WHERE file = '$upload1'");
                    $add_demo2 = $mysqli->query("SELECT image_id FROM images WHERE file = '$upload2'");
                    $add_demo3 = $mysqli->query("SELECT image_id FROM images WHERE file = '$upload3'");
                    
                    while( $rowg = $add_game->fetch_assoc()){
                            $gameID = $rowg['game_id'];
                            }    
                    
                    while( $rowd1 = $add_demo1->fetch_assoc()){
                            $demo1 = $rowd1['image_id'];
                            }
                
                    while( $rowd2 = $add_demo2->fetch_assoc()){
                            $demo2 = $rowd2['image_id'];
                            }
                    
                    while( $rowd3 = $add_demo3->fetch_assoc()){
                            $demo3 = $rowd3['image_id'];
                            }    
                    
                    $mysqli->query("INSERT INTO gameimages (game_id, image_id) VALUES('$gameID', '$demo1');");    
                    $mysqli->query("INSERT INTO gameimages (game_id, image_id) VALUES('$gameID', '$demo2');");    
                    $mysqli->query("INSERT INTO gameimages (game_id, image_id) VALUES('$gameID', '$demo3');");    
                        
                        
                    }
                            
    
    
    
            }
            
            
            else{
                echo "<p> Error, all data fields must be filled out</p>";
            }
        
        }
        
        echo "<div class = \"add_form\">";
        
        echo "<form id=EntryForm method = \"post\" enctype=\"multipart/form-data\">
            <strong>Game Title</strong>: 
                <input type=\"text\" name=\"gametitle\" class = 'formInput' maxlength = \"50\" required> <br><br>

            <strong>Developer(s)</strong>: 
                <input type=\"text\" name=\"gamedevelopers\"  class = 'formInput'  maxlength = \"100\" required> <br><br>
                
            <strong>Genre</strong>: 
                <input type=\"text\" name=\"gamegenre\"  class = 'formInput' maxlength = \"30\" required> <br><br>                

            <strong>Game Description</strong>: <br>
                <textarea name=\"gamedescription\"  class = 'formInput' rows = \"4\" cols = \"20\" maxlength = \"255\" required></textarea> <br><br>
                
            <strong>Link to Game</strong>: 
                <input type=\"text\" name=\"gamelink\"  class = 'formInput' maxlength = \"255\" required> <br><br>

            <strong>Engine</strong>: 
                <input type=\"text\" name=\"gameengine\" class = 'formInput' maxlength = \"60\" required> <br><br>";
                
                        
            //Get image and image source

            echo "<strong>Images to Upload (make sure there are no spaces in the file name)</strong>:  <br><br>
                
                <strong>Cover Image</strong>
                <input type=\"file\" name=\"cover\" id=\"cover\" required> <br> <br>
                
                <strong>Demo Image 1</strong>
                <input type=\"file\" name=\"upload1\" id=\"upload1\" required> <br> <br>
                
                <strong>Demo Image 2</strong>
                <input type=\"file\" name=\"upload2\" id=\"upload2\" required> <br> <br>
                
                <strong>Demo Image 3</strong>
                <input type=\"file\" name=\"upload3\" id=\"upload3\" required> <br>

                <input type=\"submit\" class = 'button' name = \"game_submit\" value=\"  Add  \">";

        echo "</form>";    
        
        }
        
        
    else{
        echo "please login to use this feature";
    }  
            
        echo "</div>" 
       ?>
    </div>
        
        
        
        
    </div>
</body>


</html>
    
