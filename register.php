<?php
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    $sql = "SELECT id FROM users WHERE user_name = ?";
    $params = array($username);
    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if (sqlsrv_fetch($stmt)) {
        $error = "Username already exists.";
    } else {
        $sql = "INSERT INTO users (first_name, last_name, user_name, password) VALUES (?, ?, ?, HASHBYTES('SHA1', ?))";
        $params = array($first_name, $last_name, $username, $password);
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
    }
}
?>

<h2>Register</h2>
<form action="index.php?menu=register" method="post">
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
<?php if (isset($error)) : ?>
    <p><?php echo $error; ?></p>
<?php endif; ?>

<?php include 'footer.php'; ?>
