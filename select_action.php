<head>
    <title>Select Action</title>
</head>
<h1>Select Action</h1>
<?php
$host = "localhost";
$database = "web_development";
$user = $_POST['username'];
$password = $_POST['password'];

$connection = mysqli_connect($host, $user, $password, $database);
echo "<p>Current user: " . $user . "</p><br>";
?>
<form method="POST" action="process_action.php">
    <?php
    echo "<input type='hidden' name='username' value='" . $user . "'>";
    echo "<input type='hidden' name='password' value='" . $password . "'>";
    ?>
    <label>Select Action</label><br>
    <select name="action">
        <option value="search">Search</option>
        <option value="insert">Insert</option>
    </select><br><br>

    <label>Select Table</label><br>
    <select name="table">
        <option value="authors">Authors</option>
        <option value="books">Books</option>
    </select><br><br><br>
    <input type="submit" value="Next">
</form>