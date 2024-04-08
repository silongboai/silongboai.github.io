<?php

$images = array_diff(scandir('./images'), ['.', '..', '.DS_Store']);

foreach ($images as $image) {
    f1($image);
    // exit;
}

function f1($imageName){
    $image = @imagecreatefromjpeg("./images/$imageName");
    $width = imagesx($image);
    $height = imagesy($image);
    // var_dump($image, $height, $width);
    // sleep(2);
    for ($y=0; $y < $height; $y++) {
        for ($x=0; $x < $width; $x++) {
            // $rgb = imagecolorat($image, $x, $y);
            // $r = ($rgb >> 16) & 0xFF;
            // $g = ($rgb >> 8) & 0xFF;
            // $b = $rgb & 0xFF;
            if(
                0!=$x%rand(2,3)
                ||
                0!=$y%rand(2,3)
            ){
                // sleep(1);
                // echo "y: $y, x: $x\n";
                $color = imagecolorallocate($image, rand(0,255), rand(0,255), rand(0,255));
                imagesetpixel($image, $x, $y, $color);
            }
    
            // echo "height: $y, width: $x, rgb: $rgb, r: $r, g: $g, b: $b\n";
            // usleep(100000);
        }
    }
    
    imagejpeg($image, "./images/new_$imageName");
    
    // Free up memory
    imagedestroy($image);
}
