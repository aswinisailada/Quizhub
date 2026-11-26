<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    echo "Unauthorized access";
    exit;
}
?>

<form action="process-upload.php" method="post" enctype="multipart/form-data">
    <h2>Upload New Quiz Topic (XML)</h2>
    <input type="file" name="quizfile" required>
    <br><br>
    <button type="submit">Upload</button>
</form>