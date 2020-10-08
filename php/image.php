<?php
extract($_REQUEST);
// Content type
$arrs = explode(".", $src);
$extension = end($arrs);

switch ($extension) {
    case "webp":
        header('Content-Type: image/webp');
        break;
    case "png":
        header('Content-Type: image/png');
        break;
    case "gif":
        header('Content-Type: image/gif');
        break;

    default:
        header('Content-Type: image/jpeg');
        break;
}



// Load
$thumb = imagecreatetruecolor($w, $h);
switch ($extension) {
    case "webp":
        $source = imagecreatefromwebp($src);
        break;
    case "png":
        $source = imagecreatefrompng($src);
        break;
    case "gif":
        $source = imagecreatefromgif($src);
        break;

    default:
        $source = imagecreatefromjpeg($src);
        break;
}

$width = imagesx($source);
$height = imagesy($source);

// Resize
imagecopyresized($thumb, $source, 0, 0, 0, 0, $w, $h, $width, $height);

// Output

switch ($extension) {
    case "webp":
        imagewebp($thumb);
        break;
    case "png":
        imagepng($thumb);
        break;
    case "gif":
        imagegif($thumb);
        break;

    default:
        imagejpeg($thumb);
        break;
}
