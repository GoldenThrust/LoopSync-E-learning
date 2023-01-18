<?php
if (isset($_POST['logout'])) {
  session_unset();
  session_destroy();
  header(
    "location: index.php"
  );
}
?>
<!-- loader start -->
<div id="load">
  <div class="text">LoopSync</div>
</div>
<!-- loader end -->
<header>
  <div class="head">
    <span class="hid">
      <div id="categories">Categories</div>
      <nav id="carte">
        <ul>
          <li><a href="">Web Development</a></li>
          <li><a href="">Mobile Development</a></li>
          <li><a href="">Game Development</a></li>
          <li><a href="">Graphic Design & Illustration</a></li>
          <li><a href="">Digital Marketing</a></li>
          <li><a href="">Social Media Marketing</a></li>
          <li><a href="">Business Analytic & Intelligence</a></li>
          <li><a href="">Entrepreneurship</a></li>
          <li><a href="">Video & Animation</a></li>
        </ul>
      </nav>
      <div class="hidd"><a href="">Instructor</a></div>
      <div class="form">
        <form action="" method="post">
          <input type="hidden" name="src" value="ks" />
          <input type="text" name="q" placeholder="Search for anything" autocomplete="off" id="q" />
          <button disabled tabindex="-1">
            <img src="img/search.svg" alt="search icon" />
          </button>
        </form>
      </div>
    </span>
    <a href="index.php">
      <h1>LoopSync</h1>
    </a>
    <span class="hid">
      <div>
        <a href="">My Learning</a>
      </div>
      <div class="hidd">
        <a href="">Contact US</a>
      </div>
      <div class="d border"><a href="login.php">Login</a></div>
      <div class="d border"><a href="signup.php">SignUp</a></div>
      <div class="note"><a href=""><img src="img/wishlist.svg" alt="wishlist"></a></div>
      <div class="note"><a href=""><img src="img/cart.svg" alt="cart"></a></div>
      <div class="note notify"><img src="img/notification.svg" alt="notification"></div>
      <span class="notification">
        <div><span>Notification</span>
          <hr><span>You have a message</span>
        </div> <span class="nothidden"></span>
      </span>
      <div class="note"><a href="" class="profile"> <?php
                                                    echo $data[0]['Fullname'][0];

                                                    ?></a>
        <span class="prodrop">
          <a href="">Profile</a>
          <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <button type="submit" name="logout">Log out</button>
          </form>
        </span>
      </div> <!--profile-->
      <span class="note ">

      </span>
    </span>
    <!-- mobile  -->
    <span class="mimage">
      <img src="img/search.svg" alt="search icon" class="search-icon" style="cursor: pointer" />
      <nav class="dropdown">
        <div class="cover" style="left: -100%"></div>
        <div class="cancel c">X</div>
        <ul>
          <li class="d">
            <a href="login.php" style="
                color: springgreen;
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial,
                  sans-serif;
              ">Login</a>
          </li>
          <li class="d">
            <a href="signup.php" style="
                color: springgreen;
                font-weight: 100;
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial,
                  sans-serif;
              ">SignUp</a>
          </li>
          <li class="note" style="display: flex;justify-content: center; align-items: center;">
            <div>
              <a href="" class="profile">
                <?php
                echo $data[0]['Fullname'][0];

                ?>
              </a>
              <span style="transform: translate(-8px, 10px); font-size:larger;font-weight: bolder;">
                <?php
                echo $data[0]['Fullname']
                ?>
              </span>
            </div>
          </li>
          <hr class="d" />
          <li class="disabled">Most Popular</li>
          <li><a href="">Web Development</a></li>
          <li><a href="">Mobile Development</a></li>
          <li><a href="">Game Development</a></li>
          <li><a href="">Graphic Design & Illustration</a></li>
          <li><a href="">Digital Marketing</a></li>
          <li><a href="">Social Media Marketing</a></li>
          <li><a href="">Business Analytic & Intelligence</a></li>
          <li><a href="">Entrepreneurship</a></li>
          <li><a href="">Video & Animation</a></li>
          <li class="disabled">More from LoopSync</li>
          <li><a href="">Teach in LoopSync</a></li>
          <li><a href="">About Us</a></li>
          <li><a href="">Contact Us</a></li>
          <li><a href="">Blog</a></li>
        </ul>
        <hr>
        <span class="note">
          <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <button type="submit" name="logout">Log out</button>
          </form>
        </span>
      </nav>
      <div class="search-container">
        <div class="cover"></div>
        <div class="log" style="display: none;">
          <input type="hidden" name="hidden" id="hiddden">
          <label for="hidden">kk</label>
        </div>
        <form action="" method="post" class="search">
          <input type="text" name="q" placeholder="Search for anything" autocomplete="off" value="" />
          <button disabled tabindex="-1">
            <img src="img/search.svg" alt="search icon" />
          </button>
        </form>
        <div class="c cancelt">X</div>
      </div>
      <img src="img/3dot.svg" alt="option dot" class="category" style="cursor: pointer" />
    </span>
    <!-- head -->
  </div>
  <div id="theme">
    <img src="./img/moon.svg" alt="">
  </div>
</header>