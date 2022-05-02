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

        $errors = "";

        $conn = new mysqli($host, $username, $password,$dbname);

        if (isset($_POST['submit'])) {
            if (empty($_POST['task'])) {
                $errors = "You must fill in the task";
            }else{
                $task = $_POST['task'];
                $sql = "INSERT INTO WishList (Pname) VALUES ('$task')";
                mysqli_query($conn, $sql);
                header('location: buyer.php');
            }
        }	
        if (isset($_GET['del_task'])) {
            $id = $_GET['del_task'];
        
            mysqli_query($conn, "DELETE FROM WishList WHERE id=".$id);
            header('location: buyer.php');
        }
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
                echo "<dl class = 'contain'>";
                echo "<img class = 'image' src = '../img/$picture.jpg'>";
                echo "<div class = 'overlay'>";
                echo "<dt class = 'title'>Name:<dt>";
                echo " <dd class = 'text'> ".($row[0])."</td>";
                echo "<dt class = 'title'>Price:<dt>";
                echo " <dd class = 'text'> $".($row[1] * 1.07)."</td>";
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
        <div class="heading">
            <h2 style="font-style: 'Hervetica';">Wishlist</h2>
        </div>
        <form method="post" action="buyer.php" class="input_form">
            <?php if (isset($errors)) { ?>
                <p><?php echo $errors; ?></p>
            <?php } ?>
            <input type="text" name="task" class="task_input">
            <button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
        </form>
        <table class = "contain">
            <thead>
                <tr>
                    <th>N</th>
                    <th>Properties</th>
                    <th style="width: 60px;">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                // select all tasks if page is visited or refreshed
                $tasks = mysqli_query($conn, "SELECT * FROM WishList");

                $i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
                    <tr>
                        <td> <?php echo $i; ?> </td>
                        <td class="task"> <?php echo $row['Pname']; ?> </td>
                        <td class="delete"> 
                            <a href="buyer.php?del_task=<?php echo $row['id'] ?>">x</a> 
                        </td>
                    </tr>
                <?php $i++; } ?>	
            </tbody>
        </table>
    </body>
</html>