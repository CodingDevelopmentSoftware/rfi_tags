<?php

const IMAGE_PATH_OF_PROJECT_FOR_UPLOAD = 'public_html/front_end/upload/projects/';
const IMAGE_PATH_OF_PROJECT_FOR_DELETE = "..\public_html\\front_end\\upload\\projects\\";

const IMAGE_PATH_OF_SLIDESHOW_FOR_UPLOAD = 'public_html/front_end/upload/slide/';
const IMAGE_PATH_OF_SLIDESHOW_FOR_DELETE = "..\public_html\\front_end\\upload\\slide\\";

// imageCategory = slideshow or project  



function uploadSingleImage(string $imageName = null, string $imageTempName = null, $imageCategory = 'project')
{
    if (empty($imageName) || empty($imageTempName) || empty($imageCategory)) {
        return FALSE;
    }

    if ($imageCategory == 'slideshow') {
        $originalPath = IMAGE_PATH_OF_SLIDESHOW_FOR_UPLOAD;
    } else {
        $originalPath = IMAGE_PATH_OF_PROJECT_FOR_UPLOAD;
    }

    $compressPath = $originalPath . 'compress/';

    $RandomAccountNumber = uniqid();
    $upload = $RandomAccountNumber . $imageName;
    $source = $imageTempName;
    $target = $originalPath . $upload;

    if (move_uploaded_file($source, $target)) {

        copy($target,  $compressPath . $upload);        // upload orginal file to compress folder
        // compress($compressPath . $upload, $compressPath . $upload, 20);  // replace and compress same file in the compress folder 
        resize_image($compressPath . $upload, 500,500); // replace and Resize same file in the compress 
        return $upload;
    } else {
        return FALSE;
    }
}

function uploadMultiImage(array $arrayOfImages = [], $imageCategory = 'project')
{
    if (empty($arrayOfImages)) {
        return FALSE;
    }

    $totalImages = count($arrayOfImages['name']);
    $returnImages = [];

    if ($imageCategory == 'slideshow') {
        $originalPath = IMAGE_PATH_OF_SLIDESHOW_FOR_UPLOAD;
    } else {
        $originalPath = IMAGE_PATH_OF_PROJECT_FOR_UPLOAD;
    }

    $compressPath = $originalPath . 'compress/';

    for ($i = 0; $i < $totalImages; $i++) {
        $RandomAccountNumber = uniqid();
        $upload = $RandomAccountNumber . $arrayOfImages['name'][$i];
        $source = $arrayOfImages['tmp_name'][$i];
        $target = $originalPath . $upload;
        move_uploaded_file($source, $target);           // upload original file
        copy($target,  $compressPath . $upload);        // upload orginal file to compress folder
        // compress($compressPath . $upload, $compressPath . $upload, 10);  // replace and compress same file in the compress folder 

        resize_image($compressPath . $upload, 500, 500);  // replace and Resize same file in the compress 
        array_push($returnImages, $upload);
    }
    $returnImages = implode(',', $returnImages);
    return $returnImages;
}

function deleteImage(string $imageName = null, $imageCategory = 'project')
{
    if ($imageCategory == 'slideshow') {
        $originalPath = APPPATH . IMAGE_PATH_OF_SLIDESHOW_FOR_DELETE;
    } else {
        $originalPath = APPPATH . IMAGE_PATH_OF_PROJECT_FOR_DELETE;
    }

    $compressPath = $originalPath . 'compress/';

    if (unlink($originalPath . $imageName) && unlink($compressPath . $imageName)) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function compress($source, $destination, $quality)
{
    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);

    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source);

    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);

    imagejpeg($image, $destination, $quality);

    return $destination;
}

function resize_image($file, $w, $h)
{   
    
    list($width, $height) = getimagesize($file);
    $r = $width / $height;
    if ($w / $h > $r) {
        $newwidth = $h * $r;
        $newheight = $h;
    } else {
        $newheight = $w / $r;
        $newwidth = $w;
    }
    $dst = imagecreatetruecolor($newwidth, $newheight);
    $src = imagecreatefromjpeg($file);
    imagecopyresized($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    imagejpeg($dst, $file);

    return $dst;
}
