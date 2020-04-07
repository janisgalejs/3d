<?php
include('layout/head.php');
include('partials/header.php');

$numberOfCells = 50;
$cellWidth = 200;
$radius =  round( ( $cellWidth / 2) / tan( M_PI / $numberOfCells ) );

?>

<style>

    .carousel {
        transform: translateZ(-<?= $radius?>px);
    }

</style>

<div id="scene1">
    <div class="cube spin">
        <a href="" class="face top cocacola" data-value="cola"></a>
        <a href="" class="face right donut" data-value="donut"></a>
        <a href="" class="face bottom"></a>
        <a href="" class="face left"></a>
        <a href="" class="face front"></a>
        <a href="" class="face back"></a>
    </div>
</div>

<div id="scene2">
    <div class="carousel">
        <?php
        $i=1;
        while ($i <= $numberOfCells) {
            echo '<a href="" class="carousel__cell">'. $i .'</a>';
            $i++;
        }
        ?>
    </div>
</div>

<div class="carousel-options">
    <p>
        <button class="previous-button">Previous</button>
        <button class="next-button">Next</button>
    </p>

</div>

<script>
    var carousel = document.querySelector('.carousel');
    var cells = carousel.querySelectorAll('.carousel__cell');
    var cellCount; // cellCount set from cells-range input value
    var selectedIndex = 0;
    var cellWidth = carousel.offsetWidth;
    var cellHeight = carousel.offsetHeight;
    var rotateFn = 'rotateY';
    var radius, theta;
    // console.log( cellWidth, cellHeight );

    function rotateCarousel() {
        var angle = theta * selectedIndex * -1;
        carousel.style.transform = 'translateZ(' + -radius + 'px) ' + rotateFn + '(' + angle + 'deg)';
    }

    var prevButton = document.querySelector('.previous-button');
    prevButton.addEventListener( 'click', function() {
        selectedIndex--;
        rotateCarousel();
    });

    var nextButton = document.querySelector('.next-button');
    nextButton.addEventListener( 'click', function() {
        selectedIndex++;
        rotateCarousel();
    });

    function initCarousel() {
        cellCount = <?= $numberOfCells ?>;
        theta = 360 / cellCount;
        radius = <?= $radius ?>;
        console.log(radius);
        for ( var i=0; i < cells.length; i++ ) {
            var cell = cells[i];
            if ( i < cellCount ) {
                // visible cell
                cell.style.opacity = 1;
                var cellAngle = theta * i;
                cell.style.transform = rotateFn + '(' + cellAngle + 'deg) translateZ(' + radius + 'px)';
            } else {
                // hidden cell
                cell.style.opacity = 0;
                cell.style.transform = 'none';
            }
        }
    }

    initCarousel();

</script>

<?php include('layout/foot.php'); ?>
