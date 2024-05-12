<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
</head>
<body>
    <?php if(isset($_SESSION['username'])): ?>
        <!-- Image upload form -->
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
    <?php else: ?>
        <p>You need to <a href="login.php">login</a> to upload images.</p>
    <?php endif; ?>
    <!-- Display uploaded images here -->
</body>
</html>
