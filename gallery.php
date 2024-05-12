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
        <div id="imagePreview"></div>
    
        <script>
            // Ajax for image upload
            document.getElementById("uploadForm").addEventListener("submit", function(event){
                event.preventDefault(); // Prevent default form submission

                var formData = new FormData(this);

                // Send Ajax request
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "upload.php", true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Display uploaded image
                        document.getElementById("imagePreview").innerHTML = xhr.responseText;
                    }
                };
                xhr.send(formData);
            });
        </script>
    <?php else: ?>
        <p>You need to <a href="login.php">login</a> to upload images.</p>
    <?php endif; ?>
    <!-- Display uploaded images here -->
</body>
</html>
