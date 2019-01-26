<!DOCTYPE html>
<html lang="en">
<!--NOTE: CHANGE THE CONFIG AND HEAD FILES DEPENDING ON WHETHER YOU ARE USING THE COURSE SITE OR LOCAL HOST-->

<head>
    <?php include "includes/head.php" ?>
    <script src='js/main.js'></script>
</head>

<?php
  $game_id = filter_input( INPUT_GET, 'game_id', FILTER_SANITIZE_NUMBER_INT );  
    
?>
    
<body>
    <div id="sticky">
    <!-- adds navigation menu -->
    <?php include "includes/navbar.php" ?>
    </div>
    
    <div class='main'>
    <div class='wrapper'>
        <?php 
        $result = $mysqli->query("SELECT * FROM games WHERE games.game_id = $game_id");
        while( $row = $result->fetch_assoc()){
            $title = $row['title'];
            $developer = $row['creator'];
            $genre = $row['genre'];
            $description = $row['description'];
            $engine = $row['engine'];
            $link = $row['link'];
        echo "<div class='wrapperHeader cf'> 
            <div class = 'slideLeft'>
                <div class = 'slide'>
                    <div class = 'card-title'> $title </div>
                    <div class = 'card-developer'> $developer </div>
                    <div class = 'card-gameInfo game'><span class = 'card-gameInfoLabel'> Genre: </span> $genre </div>
                    <div class = 'card-gameInfo game last'> <span class = 'card-gameInfoLabel'>Engine: </span> $engine </div>
                    <div class = 'card-description-expanded'> $description </div>
                    <div class = 'card-footer'>
                        <div class = 'card-footer-wrapper' layout = 'row bottom-left'>
                            <div class = 'card-gameInfo left'><span class = 'card-gameInfoLabel'> Link: </span> <a href = $link> $link </a> </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class='slideRight'>
                <div class = 'slideShowWrapper'>
                    <div class = 'allgimages' >";
                        $images = $mysqli->query("SELECT DISTINCT file FROM gameimages 
                                    INNER JOIN games ON gameimages.game_id = $game_id 
                                    INNER JOIN images ON gameimages.image_id = images.image_id");
                        while( $imgRow = $images->fetch_assoc()){
                            $file = $imgRow['file'];
                            echo
                            "<img class = 'slide-image' src=$file alt='Game Image'/>
                            <a class='prev' onclick='plusSlides(-1)'><img src='images/arrowLeft.png' alt='Left Button' width = '50' height = '50' ></a>
                            <a class='next' onclick='plusSlides(1)'><img src='images/arrowRight.png' alt='Right Button' width = '50' height = '50' ></a>";
                        }
            echo "</div>
                </div>
                    
            </div>
        </div>";
        }
    echo  "<script type='text/javascript'>
            var imagenum = 1;
            showSlides(imagenum);

            function plusSlides(n) {
                showSlides(imagenum += n);
            }
            function currentSlide(n) {
                showSlides(imagenum = n);
            }
            function showSlides(n) {
              var i;
              var slides = document.getElementsByClassName('slide-image');
              if (n > slides.length) {imagenum = 1};
              if (n < 1) {imagenum = slides.length};
              for (i = 0; i < slides.length; i++) {
                  //removes images not being used
                  slides[i].style.display = 'none'; 
              }
              slides[imagenum-1].style.display = 'inline'; 
            }
            </script>";
    ?>
    </div>
    </div> 
</body>
</html>
    
