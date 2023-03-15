
<!-- Compiled and minified Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<!-- Minified JS library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false" >
    <!-- Indicators -->
    <!--<ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>-->

    <!-- Wrapper for slides -->
    
    <div class="carousel-inner" width="300">
    <?php
     $dir = "";
     $bandera = 0;
    $photo = glob($dir . "*.jpg");
    foreach ($photo as $photos) {
    ?>
        <?php
        if ($bandera==0)
        {
        ?>
            <div class="item active" align="center">
            <img src="<?php print_r($photos) ?> " width="800"><br>
            <strong><?php echo $photos ?></strong><br>
            <a style="background:#DE6B6C;color:white" class="btn btn-light" href="borra_foto.php?foto=<?php echo $photos ?>">Borrar</a>
            </div>
            <?php
            $bandera=1;
        }
        else
        {
        ?>
            <div class="item" align="center">
            <img src="<?php print_r($photos) ?> " width="800">  
            <strong><?php echo $photos ?></strong><br>
            <a style="background:#DE6B6C;color:white" class="btn btn-light" href="borra_foto.php?foto=<?php echo $photos ?>">Borrar</a>
            </div>
    <?php }} ?> 
    </div>
    
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>