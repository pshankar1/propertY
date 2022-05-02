<html>
    <head>
        <title>My Wishlist</title>
    </head>
    <link rel ="stylesheet" href = "../css/buyer.css">
    <bdoy>
        <h2>My Wishlist</h2>
        <?php
             $servername = "localhost";
             $username = "dwekesa1";
             $password = "dwekesa1";
             $dbname = "dwekesa1";
     
             $conn = new mysqli($host, $username, $password,$dbname);
             if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
             } 
             include 'buyer.php';
             $list = $_POST[$name];

             $sql = "SELECT Pname, price, location, beds, road, built, parking, owns, img FROM Property 
             WHERE Pname=$list";
             $result = $conn->query($sql);

            if($result->num_rows > 0){
                echo "<div class = bdy>";
                echo "<table class = ''>";
                while($row = mysqli_fetch_array($result)){
                    $picture = $row[8];
                    echo "<dl class = 'contain'>";
                        echo "<img class = 'image' src = '../img/$picture.jpg'>";
                        echo "<div class = 'overlay'>";
                        echo "<dt class = 'title'>Name:<dt>";
                        echo " <dd class = 'text'> ".($row['Pname'])."</td>";
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
                    }
                    echo "</table>";
                    echo "</div>";
                } else {
                    echo "0 results";
                }
        ?>
    </bdoy>
</html>