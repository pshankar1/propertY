<html>
    <head>
        <title>Results!</title>
    </head>
    <link rel = "stylesheet" href = "../css/buyer.css">
    <body>
        <form method="POST" action = "search.php">
                <div class = "navbar">
                    <a class="active" href="../../">Logout</a>
                    <input type="text" name = "search" placeholder="Search Price or owner">
                </div>
        </form>
            <div class = "">
                <div class = "">
                    <h2>Buy A House With Us, Please?</h2>
                </div>
            </div>
    <?php
    $servername = "localhost";
    $username = "dwekesa1";
    $password = "dwekesa1";
    $dbname = "dwekesa1";




    // Step -1 : Create DB connection
    $conn = new mysqli($host, $username, $password,$dbname);
    // Step-2 : check if the DB connection is established or not
    if ($conn-> connect_error){
        echo "Could not connect to server\n";
        die("Connection failed: " . $conn->connect_error);
    }
    $search = $_POST['search'];
    //$search = explode(' ', $searching);
    //$search[1]= intval($search[1]);

    $sql = "SELECT price FROM Property WHERE price < $search";
    $result = $conn->query($sql);

            if($result->num_rows > 0){

                echo "<table class = bdy>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr class = 'contain'>";
                    echo " <td> Name: ".($row[0])."</td>";
                    echo " <td>Price: $".($row[1])."</td>";
                    echo " <td>Location: ".($row[2])."</td>";
                    echo " <td>Beds: ".($row[3])."</td>";
                    echo " <td> Distance from street: ".($row[4])."</td>";
                    echo " <td>Built in: ".($row[5])."</td>";
                    echo " <td>Parking: ".($row[6])."</td>";
                    echo " <td>Owner: ".($row[7])."</td>";
                    echo '</tr>';
                }
                echo "</table>";
            } else {
                echo "<p>Bro... Is there even a house like that???</p>";
            }
    ?>
    </body>
</html>