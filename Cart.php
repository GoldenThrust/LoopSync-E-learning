<?php
require_once("db_config.php");
if (isset($_SESSION['email'])) {
    $session = $_SESSION['email'];
    $cart = $database->read('cart', 'AddBy =' . "'$session'");
    if (isset($_GET['prodname']) && isset($_GET['prodemail'])) {
        $email = $_GET['prodemail'];
        $name = $_GET['prodname'];
        if($database->delete('cart', 'AddBy = "' . $session . '"')){
            echo $email . " productname " . $name;
        }
        echo "REspond";
        foreach ($cart as $key => $value) {
            $cartcourse[] = $database->read('courses', 'AuthorEmail ="' . $value['ProductEmail'] . '" AND Name = "' . $value['ProductName'] . '"');
        }
        $val = 0;
        for ($i = 0; $i < count($cartcourse); $i++) {
            foreach ($cartcourse[$i] as $key => $value) {
                echo '<div class="cartcontainer">';
                echo '<span><img src="' . $value['Thumbnail'] . '"></span>';
                echo '<span>';
                echo '<div style="font-weight: bolder;margin-bottom:10px;font-size: 20px;">' . $value['Name'] . '</div>';
                echo '<div style="display: none;">' . $value['AuthorEmail'] . '</div>';
                foreach ($database->read('users', "Email ='" . $value['AuthorEmail'] . "'") as $user) {
                    echo '<div class="name"> By ' . $user['Fullname'] . '</div>';
                }
                ;
                echo '<div> &#8358;' . $value['Price'] . '</div>';
                echo '</span>';
                echo '<span style="color: red;float:right;" class="removecart">Remove</span>';
                echo '</div>';
                $val += $value['Price'];
            }
        }

    } else {

        foreach ($cart as $key => $value) {
            $cartcourse[] = $database->read('courses', 'AuthorEmail ="' . $value['ProductEmail'] . '" AND Name = "' . $value['ProductName'] . '"');
        }
        $val = 0;
        if (isset($cartcourse)) {
            for ($i = 0; $i < count($cartcourse); $i++) {
                foreach ($cartcourse[$i] as $key => $value) {
                    echo '<div class="cartcontainer">';
                    echo '<span><img src="' . $value['Thumbnail'] . '"></span>';
                    echo '<span>';
                    echo '<div style="font-weight: bolder;margin-bottom:10px;font-size: 20px;">' . $value['Name'] . '</div>';
                    echo '<div style="display: none;">' . $value['AuthorEmail'] . '</div>';
                    foreach ($database->read('users', "Email ='" . $value['AuthorEmail'] . "'") as $user) {
                        echo '<div class="name"> By ' . $user['Fullname'] . '</div>';
                    }
                    ;
                    echo '<div> &#8358;' . $value['Price'] . '</div>';
                    echo '</span>';
                    echo '<span style="color: red;float:right;" class="removecart">Remove</span>';
                    echo '</div>';
                    $val += $value['Price'];
                }
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
            <?php echo $val; ?>
        </div>
        <button type="submit">
            CheckOut
        </button>
    </div>
    <?php
}
?>