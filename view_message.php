<?php
include 'header.php';

$servername = "localhost"; 
$username = "id22186937_mozilista24";
$password = "Mozilista2024.";
$database = "id22186937_mozilista";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['username'])) {
    header("Location: index.php?menu=login");
    exit;
}

$sql = "SELECT name, user_name, message, timestamp FROM messages ORDER BY timestamp DESC";
$stmt = $conn->query($sql);

if ($stmt === false) {
    die("Error: " . $sql . "<br>" . $conn->error);
}
?>

<h2>Messages</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th style="color:white"><?>Time</th>
            <th style="color:white"><?>Name</th>
            <th style="color:white"><?>Message</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $stmt->fetch_assoc()) : ?>
            <tr>
                <td style="color:white"><?php echo $row['timestamp']; ?></td>
                <td style="color:white"><?><?php echo htmlspecialchars($row['name']); ?><?php echo ($row['user_name'] == 'Guest' ? ' (Guest)' : ''); ?></td>
                <td style="color:white"><?><?php echo htmlspecialchars($row['message']); ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<br>
<button onclick="window.location.href='index.php'">Go to Home Page</button>

<?php include 'footer.php'; ?>
