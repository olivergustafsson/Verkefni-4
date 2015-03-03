<?php 
	include 'include/config.php';
 ?>

<!doctype html>
<html>
<head>
<?php stylelink(); ?>
</head>
<body>

<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">
        <?php head(); ?>
    </div>

    <div id="main">
        <div class="header">
            <h1><?php echo $header['Efstasidu']; ?></h1>
            <h2><?php echo $header['Lysing']; ?></h2>
        </div>

        <div class="content">
        <?php
        $title = $row['title'];
            $query = 'SELECT * FROM `posts` WHERE postID > 0 ORDER BY postID DESC LIMIT 3 '; 

                        // strip tags to avoid breaking any html
                $title = strip_tags($title);
        
                if (strlen($title) > 10) {
        
                    // truncate string
                    $stringCut = substr($title, 0, 500);
        
                    // make sure it ends in a word so assassinate doesn't become ass...
                    $title = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="posts.php?postID="$postID"Read More"</a>"'; 
                }
            $result = mysqli_query($db, $query) or die("Nigga u dead");
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo "<h2 class='content-subhead'>";
                echo $row['title'];
                echo "</h2>";
                echo "<small> Dagsetning: ";
                echo $row['time'];
                echo "</small>";
                echo "<p>";
                echo $row['body'];
                // echo " <a href='posts.php?postID=";
                // echo $row['postID'];
                // echo "'>Lesa Meira >> </a>"; 
                echo "</p>";
            }
    ?>

            <!-- div class="pure-g">
                <div class="pure-u-1-4">
                    <img class="pure-img-responsive" src="http://farm3.staticflickr.com/2875/9069037713_1752f5daeb.jpg" alt="Peyto Lake">
                </div>
                <div class="pure-u-1-4">
                    <img class="pure-img-responsive" src="http://farm3.staticflickr.com/2813/9069585985_80da8db54f.jpg" alt="Train">
                </div>
                <div class="pure-u-1-4">
                    <img class="pure-img-responsive" src="http://farm6.staticflickr.com/5456/9121446012_c1640e42d0.jpg" alt="T-Shirt Store">
                </div>
                <div class="pure-u-1-4">
                    <img class="pure-img-responsive" src="http://farm8.staticflickr.com/7357/9086701425_fda3024927.jpg" alt="Mountain">
                </div>
            </div> -->

            
        </div>
    </div>
</div>





<script src="js/ui.js"></script>


</body>
</html>
