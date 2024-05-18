<?php
include 'header.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php?menu=login");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $username = $_SESSION['username'];

    $sql = "INSERT INTO movies (title, category, user_name) VALUES (?, ?, ?)";
    $params = array($title, $category, $username);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    header("Location: index.php?menu=movie_list");
    exit;
}
?>

<h2>Add Movie</h2>
<form action="index.php?menu=add_movie" method="post">
    <div>
        <label for="title">Movie Title:</label>
        <input type="text" id="title" name="title" required>
    </div>
    <div>
        <label for="category">Category:</label>
        <select id="category" name="category" required>
            <option value="Watching">Watching</option>
            <option value="Watched">Watched</option>
            <option value="To Watch">To Watch</option>
        </select>
    </div>
    <div>
        <input type="submit" value="Add Movie">
    </div>
</form>

<?php include 'footer.php'; ?>
