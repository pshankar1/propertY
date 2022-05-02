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
                <input type="text" name = "search" placeholder="Search Owner and price range">
            </div>
        </form>
        <div class = "">
            <div class = "">
                <h2>Buy A House With Us!</h2>
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

        $sql = "SELECT Pname, price, location, beds, road, built, parking, owns, img FROM Property";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            echo "<div class = bdy>";
            echo "<table class = ''>";
            while($row = mysqli_fetch_array($result)){
                $picture = $row[8];
                $name = $row[0];
                echo "<form action= 'wishlist.php' method = 'POST'>";
                echo "<dl class = 'contain'>";
                echo "<img class = 'image' src = '../img/$picture.jpg'>";
                echo "<div class = 'overlay'>";
                echo "<dt class = 'title'>Name:<dt>";
                echo " <dd class = 'text'> ".($row[0])."</td>";
                echo "<dt class = 'title'>Price:<dt>";
                echo " <dd class = 'text'> $".($row[1])."</td>";
                echo "<dt class = 'title'>Location:<dt>";
                echo " <dd class = 'text'> ".($row[2])."</td>";
                echo "<dt class = 'title'>Beds<dt>";
                echo " <dd class = 'text'> ".($row[3])."</td>";
                echo "<dt class = 'title'>Distance from street:<dt>";
                echo " <dd class = 'text'> ".($row[4])." feet </td>";
                echo "<dt class = 'title'>Built in:<dt>";
                echo " <dd class = 'text'> ".($row[5])."</td>";
                echo "<dt class = 'title'>Parking spaces:<dt>";
                echo " <dd class = 'text'> ".($row[6])."</td>";
                echo "<dt class = 'title'>Owned by:<dt>";
                echo " <dd class = 'text'> ".($row[7])."</td>"; 
                echo '</dl>';
                echo " <input class = 'button' type='checkbox'  name='$name' >";
                echo "<input class = 'button' type='submit' value='ADD?'>";
                echo "</form>";
            }
            echo "</table>";
            echo "</div>";
            
        } else {
            echo "0 results";
        }
        ?>
    </body>
</html>