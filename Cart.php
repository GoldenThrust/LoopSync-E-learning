<?php
require_once("db_config.php");
$session = $_SESSION['email'];
unset($_SESSION['checkout']);
$cart = $database->read('cart', 'AddBy =' . "'$session'");
    foreach ($cart as $key => $value) {
        $cartcourse[] = $database->read('courses', 'AuthorEmail ="' . $value['ProductEmail'] . '" AND Name = "' . $value['ProductName'] . '"');
    }
    $val = 0;
    if(isset($cartcourse)){
    for ($i = 0; $i < count($cartcourse); $i++) {
        foreach ($cartcourse[$i] as $key => $value) {
            echo '<div class="cartcontainer">';
            echo '<span><img src="' . $value['Thumbnail'] . '"></span>';
            echo '<span>';
            echo '<div style="font-weight: bolder;margin-bottom:10px;font-size: 20px;">' . $value['Name'] . '</div>';
            echo '<div style="display: none;">'. $value['AuthorEmail'] .'</div>';
            foreach ($database->read('users', "Email ='" . $value['AuthorEmail'] . "'") as $user) {
                echo '<div class="name"> By ' . $user['Fullname'] . '</div>';
            }
            ;
            echo '<div> &#8358;' . $value['Price'] . '</div>';
            echo '</span>';
            echo '<span style="color: red;float:right;" class="removecart">Remove</span>';
            echo '</div>';
            $val += $value['Price'];
            $_SESSION['checkout'][] = $value['Trailer'];
        }
    }
}
?>

<div class="calccart">
    <div>
    Total :
    </div>
    <div>
        &#8358;
        <?php echo $val;
        $_SESSION['checkprice'] = $val;
        ?>
    </div>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <button type="submit" onclick="createpayment()" style="cursor:pointer;" name="checkout">
        CheckOut
    </button>
    </form>
</div>
<?php 
?>
<!--TODO: add to cart in productdetailpage -->