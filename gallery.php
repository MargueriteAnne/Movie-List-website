<?php
include 'header.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php?menu=login");
    exit;
}


$sql = "SELECT * FROM images WHERE user_name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_SESSION['username']);

if ($stmt->execute() === FALSE) {
    die("Error: " . $sql . "<br>" . $conn->error);
}

$result = $stmt->get_result();

?>

<h2>Image Gallery</h2>
<div class="gallery">
    <?php while ($row = $result->fetch_assoc()) : ?>
        <div class="gallery-item">
            <img src="uploads/<?php echo htmlspecialchars($row['file_name']); ?>" alt="Image">
        </div>
    <?php endwhile; ?>
</div>
<br>
<button onclick="window.location.href='index.php'">Go to Home Page</button>
<?php include 'footer.php'; ?>
