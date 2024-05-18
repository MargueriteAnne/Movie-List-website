<?php
include 'header.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php?menu=login");
    exit;
}

$sql = "SELECT * FROM images WHERE user_name = ?";
$params = array($_SESSION['username']);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>

<h2>Image Gallery</h2>
<div class="gallery">
    <?php while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) : ?>
        <div class="gallery-item">
            <img src="uploads/<?php echo htmlspecialchars($row['file_name']); ?>" alt="Image">
        </div>
    <?php endwhile; ?>
</div>

<?php include 'footer.php'; ?>
