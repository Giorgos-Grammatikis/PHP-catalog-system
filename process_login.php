<head>
    <title>Process Login</title>
</head>
<?php
$host = "localhost";
$database = "web_development_login";
$user = "root";
$password = "";

$connection = mysqli_connect($host, $user, $password, $database);

$username = $_POST['username'];
$sql = "SELECT username FROM logintable WHERE username ='$username'";
$result = mysqli_query($connection, $sql);

if (isset($_POST['submit'])) {
    // Αν δεν υπάρχει ο χρ΄σητης
    if (mysqli_num_rows($result) == 0) {
        echo "<h1>Process Login</h1>";
        echo "<h3>User does not exist</h3><br>";
        echo "<h3>User is not authenticated.Go back and try again.</h3>";
    } else {
        //Αν υπάρχει ο χρ΄ήστης
        $sql = "SELECT * FROM logintable WHERE username='$username'";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);

        $user_password = $_POST['password'];

        // Γίνεται μπλοκ σε αυτούς που έχουν μόνο 3 αποτυχιμένες προσπάθειες
        if ($row['failed_attempts'] == 3 && (time() - $row['lockout_time']) < 30) {
            echo "<h1>Process Login</h1>";
            echo "<h3>User login is blocked</h3><br>";
            echo "<h3>User is not authenticated. Go back and try again.</h3>";
        } else {

            //Αν περασαν τα 30 δευτερόλεπτα,μηδενισμός προσπαθειών και χρόνου μπλοκαρίσματος
            if ($row['failed_attempts'] == 3 && (time() - $row['lockout_time']) >= 30) {
                $sql = "UPDATE logintable SET failed_attempts=0,lockout_time=0 WHERE username='$username'";
                mysqli_query($connection, $sql);

                //Νέα στοιχεία 
                $sql = "SELECT * FROM logintable WHERE username='$username'";
                $result = mysqli_query($connection, $sql);
                $row = mysqli_fetch_assoc($result);
            }
            if ($user_password != $row['password']) {
                $sql = "UPDATE logintable SET failed_attempts = failed_attempts + 1 WHERE username = '$username'";
                $result = mysqli_query($connection, $sql);

                //Εφάνιση ενημερωμένης τιμής
                $sql = "SELECT * FROM logintable WHERE username='$username'";
                $result = mysqli_query($connection, $sql);
                $row = mysqli_fetch_assoc($result);
                echo "<h1>Process Login</h1>";
                echo "<h3>Wrong password. Updating wrong attempts to " . $row['failed_attempts'] . ".</h3><br>";

                if ($row['failed_attempts'] == 3) {
                    $lockout_time = time();
                    $sql = "UPDATE logintable SET lockout_time='$lockout_time' WHERE username='$username'";
                    $result = mysqli_query($connection, $sql);
                    echo "<h3>Wrong password given for 3 times. Try again in 30 s.</h3><br>";
                }
                echo "<h3>User not authenticated. Go back and try again.";
            } else {
                //Αν είναι επιτυχής η σύνδεση του χρήστη
                $sql = "UPDATE logintable SET failed_attempts=0, lockout_time=0 WHERE username='$username'";
                mysqli_query($connection, $sql);

                echo "<h1>Process Login</h1>";
                echo "<h3>User '$username' authenticated</h3>";

                //Τα στοιχεία του χρήστη πάνε στο select_action αρχείο
                echo "<form method='POST' action='select_action.php'>";
                echo "<input type='hidden' name='username' value='$username'>";
                echo "<input type='hidden' name='password' value='$user_password'>";
                echo "<input type='submit' value='Next'>";
                echo "</form>";
            }
        }
    }
}
