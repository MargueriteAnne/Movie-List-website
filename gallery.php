<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
