<html>
    <head>
        <title>Welcome Customer</title>
    </head>
    <link rel = "stylesheet" href = "../css/buyer.css">
    <body>
        <div class = "header">
        <h1>Welcome To "In Your Head Rent Free"!</h1>
        </div>
        <div class = "navbar">
            <a class="active" href="../../">Logout</a>
            <input type="text" placeholder="Search...">
        </div>
        <div class = "bdy" onload="myFunction">
            <div class = "contain">
                <span id=" myPopup" class = "popuptext">Hi</span>
                <h2>Buy A House With Us</h2>
            </div>
            <script>
                // When the user clicks on div, open the popup
                function myFunction() {
                  var popup = document.getElementById("myPopup");
                  popup.classList.toggle("show");
                }
                </script>
        </div>
    </body>
</html>