<?php
include 'header.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php?menu=login");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image 
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo '<p class="white-text">Sorry, file already exists.</p>';
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 3145728) {
        echo '<p class="white-text">Sorry, your file is too large.</p>';
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo '<p class="white-text">Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>';
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo '<p class="white-text">Sorry, your file was not uploaded.</p>';
    
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO images (user_name, file_name) VALUES (?, ?)";
            $params = array($_SESSION['username'], basename($_FILES["fileToUpload"]["name"]));
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $_SESSION['username'], basename($_FILES["fileToUpload"]["name"]));

            if ($stmt->execute() === FALSE) {
                die("Error: " . $sql . "<br>" . $conn->error);
            }

            echo '<p class="white-text"> The file ' . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). ' has been uploaded.;</p>';
        } else {
            echo '<p class="white-text">Sorry, there was an error uploading your file.</p>';
        }
    }
}
?>

<h2>Upload Image</h2>
<form action="index.php?menu=upload_image" method="post" enctype="multipart/form-data" style="color:white">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload" >
    <br>
    <br>
    <input type="submit" value="Upload Image" name="submit">
    
   
</form>
<br>
<button onclick="window.location.href='index.php'">Go to Home Page</button>
<?php include 'footer.php'; ?>
