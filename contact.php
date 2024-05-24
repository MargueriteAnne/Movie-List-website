<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $user_name = isset($_SESSION['username']) ? $_SESSION['username'] : "Guest";

    
    $sql = "INSERT INTO messages (name, email, message, user_name, timestamp) VALUES (?, ?, ?, ?, NOW())"; // NOW() for current timestamp in MySQL
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $message, $user_name);

    if ($stmt->execute() === FALSE) {
        die("Error: " . $sql . "<br>" . $conn->error);
    }

    $_SESSION['message'] = "Message sent successfully!";
    header("Location: index.php?menu=view_message");
    exit;
}
include 'header.php';
?>

<h2>Contact Us</h2>
<form id="contactForm" action="index.php?menu=contact" method="post">
    <div>
        <label for="name" style="color:white">Name:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="email" style="color:white">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="message" style="color:white">Message:</label>
        <textarea id="message" name="message" required></textarea>
    </div>
    <div>
        <input type="submit" value="Send Message">
        <button onclick="window.location.href='index.php'">Go to Home Page</button>
    </div>
</form>

<?php include 'footer.php'; ?>
