<?php
$upload_dir = './res/img/produktBilder/'; // Set the directory where the uploaded files will be stored
$allowed_types = array('jpg', 'jpeg', 'png'); // Set the allowed file types

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION)); // Get the file extension
    if (in_array($ext, $allowed_types)) {
        if($_POST['filename']) {
            $filename = $_POST['filename'] . '.' . $ext;
        }
        else {
            $filename = $file['name'];
        }
        $uploaded_file_path = $upload_dir . $filename;
        // Get image information
        list($width, $height) = getimagesize($file['tmp_name']);
        // Set the maximum image width and height
        $max_width = 800;
        $max_height = 600;
        // Calculate the new image dimensions
        $new_width = $width;
        $new_height = $height;
        if ($width > $max_width || $height > $max_height) {
            if ($width > $height) {
                $new_width = $max_width;
                $new_height = intval($height * ($max_width / $width));
            } else {
                $new_height = $max_height;
                $new_width = intval($width * ($max_height / $height));
            }
        }
        // Create a new image from the file
        switch ($ext) {
            case 'jpg':
            case 'jpeg':
                $img = imagecreatefromjpeg($file['tmp_name']);
                break;
            case 'png':
                $img = imagecreatefrompng($file['tmp_name']);
                break;
        }
        // Create a new, resized image
        $new_img = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($new_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        // Compress the image
        switch ($ext) {
            case 'jpg':
            case 'jpeg':
                imagejpeg($new_img, $uploaded_file_path, 80);
                break;
            case 'png':
                imagepng($new_img, $uploaded_file_path, 8);
                break;
            case 'gif':
                imagegif($new_img, $uploaded_file_path);
                break;
        }
        imagedestroy($img);
        imagedestroy($new_img);
        header("Location: ./produktVerwaltung.php");
    }
}
?>