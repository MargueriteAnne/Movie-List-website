<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form is submitted
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['first_name']) && isset($_POST['last_name'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];

        // Connect to database
        $servername = "(localdb)\\mssqllocaldb";
        $username_db = "";
        $password_db = "";
        $dbname = "agencydata";

        $conn = new mysqli($servername, $username_db, $password_db, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if username already exists
        $sql_check = "SELECT id FROM users WHERE user_name='$username'";
        $result_check = $conn->query($sql_check);
        if ($result_check->num_rows > 0) {
            $error = "Username already exists.";
        } else {
            // Insert new user
            $sql = "INSERT INTO users (first_name, last_name, user_name, password) VALUES ('$first_name', '$last_name', '$username', HASHBYTES('SHA1', '$password'))";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['username'] = $username;
                header("Location: index.php");
                exit;
            } else {
                $error = "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required>
        </div>
        <div>
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>
        </div>
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <input type="submit" value="Register">
        </div>
    </form>
    <?php
    if (isset($error)) {
        echo "<p>$error</p>";
    }
    ?>
</body>
</html>
