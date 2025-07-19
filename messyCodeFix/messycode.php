<?php 
 
// connection to database
$conn = mysqli_connect('localhost', 'root', '', 'bugtracker'); 

// check is connection success
if(!$conn) { 
    die("Connection failed: " . mysqli_connect_error()); 
}

// fetch bugs data from database
$sql = "SELECT * FROM Bugs WHERE Status = 'Resolved'"; 
$result = mysqli_query($conn, $sql);

// check if query was successful
if(!$result) {
    die("Query failed: " . mysqli_error($conn)); 
}

// loop through fetch resultss
while ($row = mysqli_fetch_assoc($result)) { 

    $bugDate = strtotime($row["Date"]);
    $sevenDaysAgo = strtotime("-7 days");

    $bgColor = ($bugDate > $sevenDaysAgo) ? 'red' : 'green';
 
    echo "<div style='background: ${bgColor}'>"
    
    // print title and description
    echo "<p><strong>" . htmlspecialchars($row['title']) . "</strong></p>"; 
    echo "<p>" . htmlspecialchars($row['description']) . "</p>"; 

    // Form to update bug status
    echo "<form method='POST' action='update.php'>"; 
    echo "<input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>"; 
    echo "<select name='status'>"; 
    echo "<option value='Open'>Open</option>";
    echo "<option value='In Progress'>In Progress</option>";
    echo "<option value='Resolved'>Resolved</option>"; 
    echo "</select>"; 
    echo "<button type='submit'>Update</button>"; 
    echo "</form>"; 

    echo "</div>"; 
} 
 
?> 