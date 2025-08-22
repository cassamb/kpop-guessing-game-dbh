<?php

declare(strict_types=1); // Enabling type declarations

// Database helper variable
$dsn = "mysql:host=localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "flashcards";

try {

    // Establishing a connection to the server and exception handling
    $conn = new PDO($dsn, $dbusername, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Checking if the given database has already been instantiated
    if (!check_db_status($conn, $dbname)) {

        

        // Database instantiation and initialization
        create_db($conn, $dbname);      // Creating the database
        create_table($conn, $dbname);   // Creating a table
        insert_data($conn, $dbname);    // Populating the table



    }

    echo "<h2>You can now run the Kpop Guessing Game program</h2>";

    $conn = null;

} catch (PDOException $e) { // This is a PDOException type which will be referenced as $e in the code block
    echo "Connection failed: " . $e->getMessage(); // Displaying the error message associated with the exception
}

/* HELPER FUNCTION */

// Checks if the given database has already been created
function check_db_status(object $conn, string $dbname) {

    $query = $conn->prepare("SHOW DATABASES like '" . $dbname . "';");
    $query->execute();

    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($results != null) {
        echo "<h2>The " . $dbname . " Database already exists</h2>";
        return true;
    } else {
        echo "<h2>The " . $dbname . " Database does not currently exist</h2>";
        return false;
    }

}

/* DATABASE INSTANTIATION FUNCTIONS */

// Creates a new database to hold the 'flashcards'
function create_db(object $conn, string $dbname) {

    $query = "CREATE DATABASE $dbname;";
    $conn->exec($query); 

    echo "<p>" . $dbname . " database is now instantiated </p>";


}

// Creates new database table to hold the groups data (name, url)
function create_table(object $conn, string $dbname) {

    $query = "USE $dbname;
    CREATE TABLE Groups(
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(31) NOT NULL,
    url VARCHAR(255),
    PRIMARY KEY (id)
    );";

    $conn->exec($query);

    echo "<p>groups table has been instantiated.</p>";

}

// Populates data into groups table from .csv file
function insert_data(object $conn, string $dbname) {

    $file = fopen("../groups.csv", "r");
    $entries = [];
    $count = 0;

    while(!feof($file)) { // While there is still data to read in the file

        $entries = fgetcsv($file); // Store the data in the array so we can reference it

        $query = "USE $dbname; INSERT INTO groups (name, url) VALUES (:name, :url);";

        // Submitting the query to the database and binding the data to the parameters (separately)
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $entries[0]);
        $stmt->bindParam(":url", $entries[1]);

        $stmt->execute();

        $stmt = null;   // Reset for the next entry
        $count++;       // Incrementing the row counter
        
    }

    echo "<p>" . $count . " rows have been inserted into the groups table.</p>";

}