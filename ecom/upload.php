<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $file = $_FILES['profie'];

    $file_to_move = $file['tmp_name'];
    $file_name = $file['name'];

    $allowed_extensions = array("jpg","jpeg","png");
    $file_ext = strtolower(pathinfo($file_name,PATHINFO_EXTENSION)); // FIXED

    if(in_array($file_ext,$allowed_extensions)){
        
        $permitted_size = 56320; // 55 KB

        // checking file size
        if($file['size'] > $permitted_size){
            echo "File size too big. Must be less than 55KB";
            exit; // stop process
        }

        $destination = 'uploads/' . time() . "_" . $file_name;

        if(move_uploaded_file($file_to_move, $destination)){
            echo "File uploaded successfully!";
        } else {
            echo "Error uploading file!";
        }

    } else {
        echo "File is not an image (jpg, jpeg, png)";
    }

    // Debug info
    // print_r($file);
}
?>

<form action="" method="post" enctype="multipart/form-data">
    Profile Picture: <input type="file" name="profie" id="profile"><br><br>
    <input type="submit" value="Upload">
</form>