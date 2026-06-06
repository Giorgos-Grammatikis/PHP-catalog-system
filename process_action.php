<head>
    <title>Process Action</title>
</head>
<?php
$host = "localhost";
$database = "web_development";
$user = $_POST['username'];
$password = $_POST['password'];

$connection = mysqli_connect($host, $user, $password, $database);

$table = isset($_POST['table']) ? $_POST['table'] : '';
$action = isset($_POST['action']) ? $_POST['action'] : '';

// Αν ο χρήστης θέλει να κάνει αναζήτηση
if ($action == 'search' && $table == 'authors') { ?>
    <h1>Catalog search for table "<?php echo $table ?>"</h1>
    <form method='POST' action='search_results.php'>
        <label>Choose search type:</label><br>
        <select name='type'>
            <option value='ID'>ID</option>
            <option value='Name'>Name</option>
            <option value='Surname'>Surname</option>
            <option value='Nationality'>Nationality</option>
            <option value='DateOfBirth'>DateOfBirth</option>
        </select><br><br>

        <label>Enter search term:</label><br>
        <input type="text" name="search_term" id="search"><br></br><br>
        <style>
            #search {
                width: 23em;
            }
        </style>
        <input type="submit" value="Search">
        <?php
        echo "<input type='hidden' name='username' value='" . $user . "'>";
        echo "<input type='hidden' name='password' value='" . $password . "'>";
        echo "<input type='hidden' name='table' value='" . $table . "'>";
        ?>
    </form>

    <?php
    // Αν ο χτήστης θέλει να προσθέσει μια νέα εγγραφή, να γινει στο ιδιο αρχειο
} elseif ($action == 'insert' && $table == 'authors') {
    if (isset($_POST['register'])) {
        //Εντολές SQL για να μπουν αυτά που έδωσε ο χρ΄σητης στη βάση δεδομένων
        $id = $_POST['ID'];
        $name = $_POST['Name'];
        $surname = $_POST['Surname'];
        $nationality = $_POST['Nationality'];
        $dateofbirth = $_POST['DateOfBirth'];
        $sql = "INSERT INTO authors (ID, Name, Surname, Nationality, DateOfBirth) VALUES 
        ('$id', '$name', '$surname', '$nationality', '$dateofbirth')";
        mysqli_query($connection, $sql);
        echo "<h1>Insert</h1>";
        echo "<h3>1 Author inserted into database</h3><br><br>";
        echo "<form method='POST' action='select_action.php' style='display:inline'>";
        echo '<input type="submit" value="New Action">';
        echo "<input type='hidden' name='username' value='" . $user . "'>";
        echo "<input type='hidden' name='password' value='" . $password . "'>";
        echo "</form>";
        echo "<form method='POST' action='LoginForm.html' style='display:inline'>";
        echo '<input type="submit" name="logout" value="Logout">';
        echo "</form>";

        if (isset($_POST['logout'])) {
            mysqli_close($connection);
        }
    } else { ?>
        <form method="POST" action="process_action.php">
            <h1>Catalog Insert for table "<?php echo $table ?>"</h1>
            <label>ID</label>
            <input type="text" name="ID"><br><br>

            <label>Name</label>
            <input type="text" name="Name"><br><br>

            <label>Surname</label>
            <input type="text" name="Surname"><br><br>

            <label>Nationality</label>
            <input type="text" name="Nationality"><br><br>

            <label>Date of birth</label>
            <input type="date" name="DateOfBirth"><br><br>

            <input type="submit" name="register" value="Register">
            <?php
            echo "<input type='hidden' name='username' value='" . $user . "'>";
            echo "<input type='hidden' name='password' value='" . $password . "'>";
            echo "<input type='hidden' name='table' value='" . $table . "'>";
            echo "<input type='hidden' name='action' value='insert'>";
            ?>
        </form>

    <?php
    }
    ?>
<?php
} elseif ($action == 'search' && $table == 'books') { ?>
    <h1>Catalog search for table "<?php echo $table ?>"</h1>
    <form method='POST' action='search_results.php'>
        <label>Choose search type:</label><br>
        <select name='type'>
            <option value='isbn'>ISBN</option>
            <option value='title'>Title</option>
            <option value='authorID'>AuthorID</option>
            <option value='copyrightYear'>CopyrightYear</option>
            <option value='publisher'>Publisher</option>
        </select><br><br>

        <label>Enter search term:</label><br>
        <input type="text" name="search_term" id="search"><br></br><br>
        <style>
            #search {
                width: 23em;
            }
        </style>
        <input type="submit" value="Search">
        <?php
        echo "<input type='hidden' name='username' value='" . $user . "'>";
        echo "<input type='hidden' name='password' value='" . $password . "'>";
        echo "<input type='hidden' name='table' value='" . $table . "'>";
        ?>
    </form>
    <?php
} else {
    if (isset($_POST['register'])) {
        //Εντολές SQL για να μπουν αυτά που έδωσε ο χρ΄σητης στη βάση δεδομένων
        $isbn = $_POST['isbn'];
        $title = $_POST['title'];
        $authorID = $_POST['authorID'];
        $copyrightYear = $_POST['copyrightYear'];
        $publisher = $_POST['publisher'];
        $sql = "INSERT INTO books (ISBN, Title, AuthorID, CopyrightYear, Publisher) VALUES 
        ('$isbn', '$title', '$authorID', '$copyrightYear', '$publisher')";
        mysqli_query($connection, $sql);
        echo "<h1>Insert</h1>";
        echo "<h3>1 Book inserted into database</h3><br><br>";
        echo "<form method='POST' action='select_action.php' style='display:inline'>";
        echo '<input type="submit" value="New Action">';
        echo "<input type='hidden' name='username' value='" . $user . "'>";
        echo "<input type='hidden' name='password' value='" . $password . "'>";
        echo "</form>";
        echo "<form method='POST' action='LoginForm.html' style='display:inline'>";
        echo '<input type="submit" name="logout" value="Logout">';
        echo "</form>";

        if (isset($_POST['logout'])) {
            mysqli_close($connection);
        }
    } else {
    ?>
        <form method="POST" action="process_action.php">
            <h1>Catalog Insert for table "<?php echo $table ?>"</h1>
            <label>ISBN</label>
            <input type="text" name="isbn"><br><br>

            <label>Title</label>
            <input type="text" name="title"><br><br>

            <label>AuthorID</label>
            <input type="text" name="authorID"><br><br>

            <label>CopyrightYear</label>
            <input type="text" name="copyrightYear"><br><br>

            <label>Publisher</label>
            <input type="text" name="publisher"><br><br>

            <input type="submit" name="register" value="Register">
            <?php
            echo "<input type='hidden' name='username' value='" . $user . "'>";
            echo "<input type='hidden' name='password' value='" . $password . "'>";
            echo "<input type='hidden' name='table' value='" . $table . "'>";
            //πηγαίνει στην επόμενη φόρμα όταν πατηθεί το κουμπί register
            echo "<input type='hidden' name='action' value='insert'>";
            ?>
        </form>
<?php
    }
}
?>