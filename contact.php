<?php
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $user_name = isset($_SESSION['username']) ? $_SESSION['username'] : "Guest";

    $sql = "INSERT INTO messages (name, email, message, user_name, timestamp) VALUES (?, ?, ?, ?, GETDATE())";
    $params = array($name, $email, $message, $user_name);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $_SESSION['message'] = "Message sent successfully!";
    header("Location: index.php?menu=view_message");
    exit;
}
?>

<h2>Contact Us</h2>
<form id="contactForm" action="index.php?menu=contact" method="post">
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>
    </div>
    <div>
        <input type="submit" value="Send Message">
    </div>
</form>

<?php include 'footer.php'; ?>
