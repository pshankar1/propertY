<html>
    <head>
        <title>Boss Man</title>
    </head>
    <link rel="stylesheet" href="manager.css">
    <body>
        <h1>Start Being A Better Manager Today!</h1>
        <?php
            $servername = "localhost";
            $username = "dwekesa1";
            $password = "dwekesa1";
            $dbname = "dwekesa1";
    
            $conn = new mysqli($host, $username, $password,$dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT username, Bos FROM users WHERE users.Bos=0";
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                echo "<div class = 'contain'>";
                echo "<img class = 'image' src = ../img/buyer.png>";
                echo "<div class = 'overlay'>";
                echo "<h2>Buyers</h2>";
                while($row = mysqli_fetch_array($result)){
                    echo "<p>".$row[0]."</p>";
                }
                echo "</div>";
                echo "</div>";
            } else {
                echo "0 results";
            }

            $sql = "SELECT username, Bos FROM users WHERE users.Bos=1";
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                echo "<div class = 'contain2'>";
                echo "<img class = 'image' src = ../img/seller.jpg>";
                echo "<div class = 'overlay'>";
                echo "<h2>Sellers</h2>";
                while($row = mysqli_fetch_array($result)){
                    echo "<p>".$row[0]."</p>";
                    
                }
                echo "</div>";
                echo "</div>";
            } else {
                echo "0 results";
            }

            $sql = "SELECT * FROM Property";
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                echo "<div class = 'contain3'>";
                echo "<img class = 'image' src = ../img/properties.jpg>";
                echo "<div class = 'overlay'>";
                echo "<h2>Properties</h2>";
                while($row = mysqli_fetch_array($result)){
                    echo "<p>".$row[0]."</p>";
                }
                echo "</div>";
                echo "</div>";
            } else {
                echo "0 results";
            }

            $sql = "SELECT * FROM Property ORDER BY price DESC";
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                echo "<div class = 'contain'>";
                echo "<img class = 'image' src = ../img/expensive.jpg>";
                echo "<div class = 'overlay'>";
                echo "<h2>Most Expensive to Least</h2>";
                while($row = mysqli_fetch_array($result)){
                    echo "<p>".$row[0].": $ ".$row['price']."</p>";
                }
                echo "</div>";
                echo "</div>";
            } else {
                echo "0 results";
            }
            $sql = "SELECT * FROM Property ORDER BY built ASC";
            $result = $conn->query($sql);

            if($result->num_rows >0){
            echo "<div class = 'contain'>";
                echo "<img class = 'image' src = ../img/OldHomes.jpg>";
                echo "<div class = 'overlay'>";
                echo "<h2>Eldest Properties</h2>";
                while($row = mysqli_fetch_array($result)){
                    echo "<p>Built in ".$row['built']."</p>";
                    echo "<p>Name: ".$row[0]."</p>";
                }
                echo "</div>";
                echo "</div>";
            } else {
                echo "0 results";
            }

        ?>

    </body>
</html>