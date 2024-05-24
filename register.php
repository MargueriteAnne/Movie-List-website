<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    
    $sql = "SELECT id FROM users WHERE user_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error = "Username already exists.";
    } else {
        // Hash the password using PHP's built-in password_hash function
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (first_name, last_name, user_name, password_hash) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $first_name, $last_name, $username, $hashedPassword);

        if ($stmt->execute()) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit;
        } else {
            die("Error: " . $conn->error);
        }
    }
}
Include 'header.php';
?>

<h2>Register</h2>
<form action="index.php?menu=register" method="post">
    <div>
        <label for="first_name" style="color:white">First Name:</label>
        <input type="text" id="first_name" name="first_name" required>
    </div>
    <br>
    <div>
        <label for="last_name"style="color:white">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required>
    </div>
    <br>
    <div>
        <label for="username"style="color:white">Username:</label>
        <input type="text" id="username" name="username" required>
    </div>
    <br>
    <div>
        <label for="password"style="color:white">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <br>
    <div>
        <input type="submit" value="Register">
        <button onclick="window.location.href='index.php'">Go to Home Page</button>
    </div>
</form>
<?php if (isset($error)) : ?>
    <p><?php echo $error; ?></p>
<?php endif; ?>

<?php include 'footer.php'; ?>
