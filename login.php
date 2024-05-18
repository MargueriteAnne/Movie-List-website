<?php
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id FROM users WHERE user_name = ? AND password = HASHBYTES('SHA1', ?)";
    $params = array($username, $password);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if (sqlsrv_fetch($stmt)) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<h2>Log In</h2>
<form action="index.php?menu=login" method="post">
    <div>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <input type="submit" value="Log In">
    </div>
</form>
<?php if (isset($error)) : ?>
    <p><?php echo $error; ?></p>
<?php endif; ?>

<?php include 'footer.php'; ?>
