<?php

//Procedural style
$connection = mysqli_connect('localhost:3309', 'root', '', 'assignment1'); // servername, username, password, db_name



$total = 0;
$products = isset($_SESSION['products'])? $_SESSION['products']:[];

foreach($products as $name => $product){
  $subtotal = (int)$product['unit_price']*(int)$product['count'];
  $total += $subtotal;
  }

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit;
  }
  
//   $categoryName = $_GET['category_name'] ?? ''; // Use null coalescing operator to handle cases where variable is not set

// $subCategory = $_GET['subCategory'] ?? '';

// Query to fetch all products

$query = "SELECT * FROM products";

// $query = "SELECT * FROM products WHERE categoryName = '$categoryName' AND subCategory = '$subCategory'";

// Execute the query and get the result

$result = mysqli_query($connection, $query);


session_start();

?>

<?php

$name = isset($_POST['product_name'])? htmlspecialchars($_POST['product_name'], ENT_QUOTES, 'utf-8') : '';
$unit_price = isset($_POST['unit_price'])? htmlspecialchars($_POST['unit_price'], ENT_QUOTES, 'utf-8') : '';
$count = isset($_POST['count'])? htmlspecialchars($_POST['count'], ENT_QUOTES, 'utf-8') : '';

 if (isset($_SESSION['products'])) {
  $products = $_SESSION['products'];
  foreach($products as $key => $product){

    if($key == $name){
   $count = (int)$count + (int)$product['count'];
    } 
  }
}


if($name!=''&&$count!=''&&$unit_price!=''){
  $_SESSION['products'][$name]=[
    'count' => $count,
    'unit_price' => $unit_price
    ];
}

$products = isset($_SESSION['products'])? $_SESSION['products']:[];
$products = isset($_SESSION['products'])? $_SESSION['products']:[];


?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' href='style.css'>
        <script src="https://kit.fontawesome.com/e5ece60744.js" crossorigin="anonymous"></script>  
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
        <title>Market</title>  
        <link rel="icon" type="image/png" href="image/favicon.png" />
        <link rel="stylesheet" href="style.css">
        <script src="main.js" defer></script>        
    </head>
    
    <body>
    <section class="all">
      <!-- Navbar -->
      <nav id="navbar">
        <div class="navbar__logo">
          <a href="#"><i class="fa-solid fa-cart-shopping"></i> Market</a>
        </div>

        <!-- search bar -->
        <div class="navbar__search">
          <form>
            <div class="searchbar">
              <input
                type="search"
                id="mySearch"
                name="q"
                placeholder="Search the site…" />
              <button class="search-button">Search</button>
            </div>
          </form>
        </div>
      </nav>

      <!-- container -->
      <section class="container">
        <!-- Side bar -->  
        <section id="side">
        <!-- Navbar top level menu -->
        <div class="side__menu">
          <ul class="side__top-menu">
            <button class="side__top-menu-item" data-filter="top-menu"> Home </button>
            <button class="side__top-menu-item frozenFood" data-filter="frozen" >Frozen Food</button>
            <button class="side__top-menu-item second-menu" data-filter="frozen-product">ICE Cream</button>
            <button class="side__top-menu-item" data-filter="fresh">Fresh Food</button>
            <button class="side__top-menu-item" data-filter="beverage">Beverages</button>
            <button class="side__top-menu-item" data-filter="health">Home Health</button>
            <button class="side__top-menu-item"data-filter="pet">Pet Food</button>
          </ul>
        </div>
  
        </section>
  
        <!-- Main -->
        <section id="main">
          <div class="section__container">

          <div class="main__top-level">
            <?php
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                  echo '<div class="col-md-4">';
                    echo '<div class="card my-2">';
                    echo '<img src="image/products/' . $row['product_id'] . '.jpg" alt="img" class="card-img-top card-image">';
                      echo '<div class="card-body">';
                        echo '<h4 class="card-title">' . $row['product_name'] . '</h4>';
                        echo '<p class="card-price">' . $row['unit_price'] . '</p>';
                        echo '<p class="card-text">' . 'Number of Stock: '. $row['in_stock'] . '</p>';
                        if ($row['in_stock'] > 0) {
                          echo '<form action="index.php" method="POST" class="item-form">';
                          echo '<input type="hidden" name="product_name" value="' . $row['product_name'] . '">';
                          echo '<input type="hidden" name="unit_price" value="' . $row['unit_price'] . '">';
                          echo '<input type="text" value="1" name="count">';
                          echo '<button type="submit" class="btn-sm btn-blue">Add to Cart</button>';
                          echo '</form>';
                        } else {
                          echo '<p class="card-text">Out of Stock</p>';
                        }
                        echo '<a href="item_details.php?id=' . $row['product_id'] . '" class="btn-sm">Product Details</a>';
                      echo '</div>';
                    echo '</div>';
                  echo '</div>';
                }

              } else {
                echo "No products found";

              }
              mysqli_close($connection);
            ?>






            <!-- square image 1 -->
            <div class="product" data-type="top-menu">
              <img src="image/products/1000.jpg" class="product__img">
              <div class="main__menu">
                <button class="side__top-menu-item" data-filter="frozen">
                  Frozen Food
                </button>
              </div>
            </div>

            <!-- Second level item -->
            <div class="product invisible" data-type="frozen">
              <img src="image/products/1004.jpg" class="product__img">
              <div class="second__menu">
                <button class="side__top-menu-item" data-filter="frozen-product">
                  ICE Cream
                </button>
              </div>
            </div>


            <!-- third level item -->
            <div class="product product__item" data-type="frozen-product">
              <img src="image/products/1004.jpg" class="product__img" alt="icecream">
              <div class="product__menu">
                <h4 #item-name>ICE Cream</h4>
                <p item-quantity>Quantity: 1L</p>
                <p #item-price>Price: 1.80</p>
                <form action='index.php' method="POST">
                <button class="add-item" 
                type="submit" onclick="addItemToCart()">Add</button>  
              </div>
            </div>

            
            <!-- square image 2 -->
            <a href="http://www.google.com" class="product" target="blank" data-type="top-menu">
                <img src="image/products/2000.jpg" class="product__img" alt="Youtube">


                <div class="product__name">
                  <h4>Fresh Food</h4>
                </div>
                <div class="product__description">
                  <p>Very Fresh Food</p>
              </div>
            </a>

            <!-- square image 3 -->
            <a href="http://www.google.com" class="product" target="blank" data-type="top-menu">
                <img src="image/products/3000.jpg" class="product__img" alt="Youtube">
                  <div class="product__name">
                    <h3>Beverages</h3>
                  </div>
                  <div class="product__description">
                    <p>Are you thirsty?</p>
                    <button class="side__top-menu-item" data-filter="beverage">Beverages</button>
                </div>
            </a>

            <!-- square image 4 -->
            <a href="http://www.google.com" class="product" target="blank" data-type="top-menu">
                <img src="image/products/4000.jpg" class="product__img" alt="Youtube">

                <div class="product__name">
                  <h3>Home Health</h3>
                </div>
                <div class="product__description">
                  <p>Please stay healthy</p>
              </div>
            </a>

            <!-- square image 5 -->
            <a href="http://www.google.com" class="product" target="blank" data-type="top-menu">
                <img src="image/products/5000.jpg" class="product__img" alt="Youtube">


                <div class="product__name">
                  <h3>Pet Food</h3>
                </div>
                <div class="product__description">
                  <p>MEeeeeowwww</p>
              </div>

            </a>            
        </div>
        </div>

        </section>





        <!-- Shopping Cart -->
        <div class="right">
          <iframe name="view" src="checkout.php" frameborder=0 width="100%" height="400px"></iframe>
          <!-- <iframe name="view" src="cart.php" frameborder=0 width="100%" height="400px"></iframe> -->
        </div>

        <!-- <section id="right">
          detail
          
           <iframe name="view" src="cart.php" frameborder=0></iframe> -->
          <!-- </div>
          </section> -->



          <!-- <iframe class = "detail" name="view" src="cart.php" frameborder=0 width="100%" height="350px"></iframe>
          <iframe class = "cart" name="view" src="cart.php" frameborder=0 width="100%" height="350px"></iframe> -->

          <!-- <section id="detail">
            <div>This is item details</div>
            <iframe name="view" src="cart.php" frameborder=0 width="100%" ></iframe>
          </section>
            

          <section id="cart"> 
            <div>this is cart</div> 
            <iframe name="view" src="cart.php" frameborder=0 width="100%" ></iframe>

            <table border=0 width="100%" height="100%">

            <tr class="cart">
                <td>
                  <iframe name="view" src="cart.php" frameborder=0 width="100%" height="50%"></iframe>
                </a>
              </td>
              <tr class="cart">
                <td>
                  <iframe name="view" src="cart.php" frameborder=0 width="100%" height="50%"></iframe>
                </a>
              </td>
            </tr>
           </table> -->

          <!-- </section> -->

        

      </section>
      <section id="cart">
        <iframe name="view" src="cart.php" frameborder=0 width="100%" height="50%"></iframe>
      </section>  
    </section>
    </body>
    <footer>
  
    </footer>

</html>




