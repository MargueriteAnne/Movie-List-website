<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Connect to database
$servername = "(localdb)\mssqllocaldb";
$username = "";//I used windows authentication
$password = "";//I used windows authentication
$dbname = "agencydata";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch messages from the database
$sql = "SELECT * FROM messages ORDER BY sent_time DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <!-- Add CSS styles for table if needed -->
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h2>Messages</h2>
    <table>
        <tr>
            <th>Sent Time</th>
            <th>Sender</th>
            <th>Message</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Fetch sender details from users table
                $sender_id = $row['sender_id'];
                $sender_sql = "SELECT first_name, last_name, user_name FROM users WHERE id = $sender_id";
                $sender_result = $conn->query($sender_sql);
                $sender_row = $sender_result->fetch_assoc();
                
                // Display sender's name
                $sender_name = $sender_row['first_name'] . " " . $sender_row['last_name'];
                if ($_SESSION['username'] == $sender_row['user_name']) {
                    $sender_name .= " (You)";
                }
                ?>
                <tr>
                    <td><?php echo $row['sent_time']; ?></td>
                    <td><?php echo $sender_name; ?></td>
                    <td><?php echo $row['message']; ?></td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="3">No messages found.</td>
            </tr>
            <?php
        }
        ?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
$conn->close();
?>
