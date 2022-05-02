<html>
    <head>
        <title>Results!</title>
    </head>
    <link rel = "stylesheet" href = "../css/buyer.css">
    <body>
        <form method="POST" action = "search.php">
                <div class = "navbar">
                    <a class="active" href="../../">Logout</a>
                    <input type="text" name = "search" placeholder="Search Owner and price range ">
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
    $searching = explode(" ", $search);
    $searching[1]= intval($searching[1]);

    $sql = "SELECT * FROM Property
    LEFT JOIN users ON Property.owns = users.username
    WHERE Property.price < $searching[1]";
    
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
            echo "<p>Bro... Is This a real house?</p>";
        }
            
    ?>
    </body>
</html>