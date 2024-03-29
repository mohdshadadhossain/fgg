<?php
if (isset($message)) {
    foreach ($message as $message) {
        echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
    }
}
?>

<header class="header">

    <div class="flex">

        <a href="home.php" class="logo">Flowers and Gift Galore</a>

        <nav class="navbar">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="shop.php">Flower & Gifts</a></li>
                <li><a href="orders.php">Orders</a></li>
                <?php if($_SESSION['user_name'] ==''){ ?>
                <li><a href="#">Account</a>
                    <ul>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                    </ul>
                </li>
                <?php } ?>
            </ul>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>
            <?php
            $select_wishlist_count = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id = '$user_id'") or die('query failed');
            $wishlist_num_rows = mysqli_num_rows($select_wishlist_count);
            ?>
            <a href="wishlist.php"><i class="fas fa-heart"></i><span>(
                    <?php echo $wishlist_num_rows; ?>)
                </span></a>
            <?php
            $select_cart_count = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            $cart_num_rows = mysqli_num_rows($select_cart_count);
            ?>
            <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(
                    <?php echo $cart_num_rows; ?>)
                </span></a>
        </div>

        <div class="account-box">
            <table class="table">
                <tr><th><span style="font-size:1.0rem;">Username :</span></th><td> <?php echo $_SESSION['user_name']; ?></td></tr>
                <tr><th>Email-Id :</th><td> <?php echo $_SESSION['user_email']; ?></td></tr>
            </table>
            <span style="margin-left:0px;"><a href="logout.php" class="delete-btn" >logout</a></span>
        </div>
    </div>

</header>