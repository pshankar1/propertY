<html>
    <head>
        <title>Welcome Customer</title>
    </head>
    <link rel = "stylesheet" href = "../css/buyer.css">
    <body>
        <div class = "header">
        <h1>Welcome To "In Your Head Rent Free"!</h1>
        </div>
        <form method="POST" action = "search.php">
            <div class = "navbar">
                <a class="active" href="../../">Logout</a>
                <input type="text" name = "search" placeholder="Search Price or Owner">
            </div>
        </form>
        <div class = "">
            <div class = "">
                <h2>Buy A House With Us</h2>
            </div>
        </div>
        <?php

        $servername = "localhost";
        $username = "dwekesa1";
        $password = "dwekesa1";
        $dbname = "dwekesa1";

        $conn = new mysqli($host, $username, $password,$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "SELECT Pname, price, location, beds, road, built, parking, owns FROM Property";
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
            echo "0 results";
        }
        ?>
    </body>
</html>
