<head>
    <title>Search Results</title>
</head>

<h1>Search Results</h1>
<?php
$host = "localhost";
$database = "web_development";
$user = $_POST['username'];
$password = $_POST['password'];

$connection = mysqli_connect($host, $user, $password, $database);

$table = $_POST['table'];
$type = $_POST['type'];
$search_term = $_POST['search_term'];

if ($table == 'authors') {
    $sql = "SELECT * FROM authors WHERE $type LIKE '%$search_term%'";
    $result = mysqli_query($connection, $sql);
    $count = mysqli_num_rows($result);
    echo "<h3>Number of authors found: " . $count . "</h3>";

    if ($result) {
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<strong>" . $i . " Author ID: " . $row['ID'] . "</strong><br>";
            echo "Name: " . $row['Name'] . "<br>";
            echo "Surname: " . $row['Surname'] . "<br>";
            echo "Nationality: " . $row['Nationality'] . "<br>";
            echo "Date of Birth: " . $row['DateOfBirth'] . "<br>";
            echo "<br>";
            $i++;
        }
    }
    echo "<br>";
    echo "<form method='POST' action='select_action.php' style='display:inline'>";
    echo '<input type="submit" value="New Action">';
    echo "<input type='hidden' name='username' value='" . $user . "'>";
    echo "<input type='hidden' name='password' value='" . $password . "'>";
    echo "</form>";
    echo "<form method='POST' action='LoginForm.html' style='display:inline'>";
    echo '<input type="submit" name="logout" value="Logout">';
    echo "</form>";

    if (isset($_POST['logout'])) {
        mysqli_free_result($result);
        mysqli_close($connection);
    }
} else {
    $sql = "SELECT * FROM books WHERE $type LIKE '%$search_term%'";
    $result = mysqli_query($connection, $sql);
    $count = mysqli_num_rows($result);
    echo "<h3>Number of books found: " . $count . "</h3>";

    if ($result) {
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<strong>" . $i . " ISBN: " . $row['ISBN'] . "</strong><br>";
            echo "Title: " . $row['Title'] . "<br>";
            echo "Author ID: " . $row['AuthorID'] . "<br>";
            echo "CopyrightYear: " . $row['CopyrightYear'] . "<br>";
            echo "Publisher: " . $row['Publisher'] . "<br>";
            echo "<br>";
            $i++;
        }
    }
    echo "<br>";
    echo "<form method='POST' action='select_action.php' style='display:inline'>";
    echo '<input type="submit" value="New Action">';
    echo "<input type='hidden' name='username' value='" . $user . "'>";
    echo "<input type='hidden' name='password' value='" . $password . "'>";
    echo "</form>";
    echo "<form method='POST' action='LoginForm.html' style='display:inline'>";
    echo '<input type="submit" name="logout" value="Logout">';
    echo "</form>";

    if (isset($_POST['logout'])) {
        mysqli_free_result($result);
        mysqli_close($connection);
    }
}
?>