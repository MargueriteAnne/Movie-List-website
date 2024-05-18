<?php
include 'header.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php?menu=login");
    exit;
}

$sql = "SELECT name, user_name, message, timestamp FROM messages ORDER BY timestamp DESC";
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>

<h2>Messages</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Time</th>
            <th>Name</th>
            <th>Message</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $row['timestamp']->format('Y-m-d H:i:s'); ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?><?php echo ($row['user_name'] == 'Guest' ? ' (Guest)' : ''); ?></td>
                <td><?php echo htmlspecialchars($row['message']); ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php include 'footer.php'; ?>
