<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/script.js"></script>
</head>

<body>

    <header>
        <div class="navbar">
            <div class="account">
                <div class="account-dropdown">
                    <ul>
                        <?php
                            session_start();
                            if(isset($_SESSION["nome"])){
                                echo "<li><form method='POST'><input type='submit' name='Logout' value='Log-Out' /></form></li>";
                            }else{
                                echo "<li><a href='../pages/signin.php'>Log-In</a></li>";
                            }
                            if(isset($_POST["Logout"])){
                                unset($_SESSION["nome"]); 
                                header("Refresh:0");
                            }
                        ?>
                        <li><a href="../pages/signup.php">Register</a></li>
                        <li>
                            <?php
                                $pdo = new PDO("mysql:host=localhost;","root","mysql");
                                $dbName = "DefaultCube";
                                $verifica= $pdo->query("use $dbName");
                                if(isset($_SESSION["nome"])){
                                    $stmt=$pdo->query("select * from account where tipo='admin'");
                                    if($stmt->rowCount() > 0){
                                        foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row){
                                            if($row['username']==$_SESSION['nome']){
                                                echo "<li><a href='../pages/addProduct.php'>Sell</a></li>";
                                            }
                                        }
                                        $date = date("d/m/Y H:i:s");
                                        setcookie("ultimavisita", $date,  time() + (86400 * 30), "/");
                                    }
                                }
                            ?>
                        </li>
                        <li><a>Profile</a></li>
                        <li><a>Settings</a></li>
                        <li><a>Orders</a></li>
                    </ul>
                </div>
            </div>
            <div class="sections">
                <a href="../index.php">DefaultCube</a>
                <input id="burgermenu" type="checkbox" />
                <div class="burger">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
                <ul class="dropdown">
                    <li><a href="">Shop</a></li>
                    <li><a href="">Commission</a></li>
                    <li><a href="">News</a></li>
                </ul>
            </div>
            <div class="cart">
                <a class="cart-img" href="../pages/cart.php"></a>
            </div>
        </div>
    </header>

</body>

</html>