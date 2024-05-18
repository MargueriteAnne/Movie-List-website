<?php
include 'config.php';
include 'header.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php?menu=login");
    exit;
}

$username = $_SESSION['username'];

$sql = "SELECT title, category FROM movies WHERE user_name = ?";
$params = array($username);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>

<div class="container">
    <h2>My Movie List</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['category']); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>
