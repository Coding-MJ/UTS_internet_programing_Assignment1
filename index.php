<?php

//Procedural style
$connection = mysqli_connect('localhost:3309', 'root', '', 'assignment'); // servername, username, password, db_name



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
  
// search filtering
$categoryName = $_GET['category_name'] ?? ''; // Use null coalescing operator to handle cases where variable is not set

$subCategory = $_GET['subcategory_name'] ?? '';


$query = "SELECT * FROM products";

// $query = "SELECT * FROM products WHERE categoryName = '$categoryName' AND subCategory = '$subCategory'";



$result = mysqli_query($connection, $query);


if (!empty($categoryName) && !empty($subCategory)) {
  $query = "SELECT * FROM products WHERE categoryName = '$categoryName' AND subCategory = '$subCategory'";
  } elseif (!empty($categoryName)) {
      $query = "SELECT * FROM products WHERE categoryName = '$categoryName'";
  } elseif (!empty($subCategory)) {
      $query = "SELECT * FROM products WHERE subcategory = '$subCategory'";
  } else {
    $query = "SELECT * FROM products";
  }


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







?>

<!-- search script -->
<script>
  document.querySelector('.search-button').addEventListener('click', function(event) {
  event.preventDefault();
  
  const searchInput = document.querySelector('#mySearch');
  const searchTerm = searchInput.value;
  
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        const productsContainer = document.querySelector('#products');
        productsContainer.innerHTML = xhr.responseText;
      } else {
        console.error('Error: ' + xhr.status);
      }
    }
  };
  xhr.open('GET', 'search.php?q=' + searchTerm);
  xhr.send();
});
</script>

<!-- side bar -->
<script>
  const topLevelItems = document.querySelectorAll('.main__top-level-item');
  topLevelItems.forEach(function(topLevelItem) {
    topLevelItem.addEventListener('click', function() {
      const categoryName = topLevelItem.textContent;
      const xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            const mainSection = document.querySelector('#main');
            mainSection.innerHTML = xhr.responseText;
          } else {
            console.error('Error: ' + xhr.status);
          }
        }
      };
      xhr.open('GET', 'category.php?category_name=' + categoryName);
      xhr.send();
    });
  });
</script>
<!-- Expanded Sidebar -->
<script>
  const subMenuItems = document.querySelectorAll('.main__sub-menu-item');

  subMenuItems.forEach(function(subMenuItem) {
    subMenuItem.addEventListener('click', function() {
      const subcategoryName = subMenuItem.textContent;
      const xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            const mainSection = document.querySelector('#main');
            mainSection.innerHTML = xhr.responseText;
          } else {
            console.error('Error: ' + xhr.status);
          }
        }
      };
      xhr.open('GET', 'subcategory.php?subcategory_name=' + subcategoryName);
      xhr.send();
    });
  });
</script> 

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
          <a href="index.php"><i class="fa-solid fa-cart-shopping"></i> Market</a>
        </div>

        <!-- search bar -->
        <div class="navbar__search">
          <form id="search-form">
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
        <?php
        if (!empty($categoryName) && !empty($subCategory)) {
          $query = "SELECT * FROM products WHERE category_name = '$categoryName' AND subcategory_name = '$subCategory'";
          } elseif (!empty($categoryName)) {
              $query = "SELECT * FROM products WHERE subcategory_name = '$categoryName'";
          } elseif (!empty($subCategory)) {
              $query = "SELECT * FROM products WHERE subcategory_name = '$subCategory'";
          } else {
            $query = "SELECT * FROM products";
          }
          ?>
          <!-- Navbar top level menu -->
            <div class="side__menu">
              <?php
              // Get all categories
              $query = "SELECT DISTINCT category_name FROM products";
              $result = mysqli_query($connection, $query);
              while ($row = mysqli_fetch_assoc($result)) {
                  $category_name = $row['category_name'];
                  // Get all subcategories for this category
                  $query = "SELECT DISTINCT subcategory_name FROM products WHERE category_name='$category_name'";
                  $sub_result = mysqli_query($connection, $query);
                  $has_subcategories = mysqli_num_rows($sub_result) > 0;
                  ?>
                  <button class="category-btn <?php if ($has_subcategories) echo 'has-subcategories'; ?>"><?php echo $category_name; ?></button>
                  <?php if ($has_subcategories) { ?>
                      <div class="subcategories">
                          <?php while ($sub_row = mysqli_fetch_assoc($sub_result)) { ?>
                              <a href="index.php?subcategory_name=<?php echo $sub_row['subcategory_name']; ?>"><?php echo $sub_row['subcategory_name']; ?></a>
                          <?php } ?>
                      </div>
                  <?php } ?>
              <?php } ?>
          </div>          
        </section>
  
        <!-- Main -->

       </script>

        <section id="main">
          <div class="section__container">

          <div class="main__top-level">
            <?php
              

                // search function
                  $searchTerm = $_GET['q'] ?? '';

                if (!empty($searchTerm)) {
                  $query = "SELECT * FROM products WHERE product_name LIKE '%$searchTerm%'";
                  $result = mysqli_query($connection, $query);

                  while ($row = mysqli_fetch_array($result)) {
                    echo '<div class="product__item">';
                    echo '<img class="product__img" src="image/products/' . $row['product_id'] . '.jpg" alt="img" class="card-img-top card-image" >';
                      
                        echo '<div class="product__menu">';
                          echo '<h4 class="card-title">' . $row['product_name'] . '</h4>';
                          echo '<p class="card-price">' . $row['unit_price'] . '</p>';
                          echo '<p class="card-text">' . 'Number of Stock: '. $row['in_stock'] . '</p>';
                          if ($row['in_stock'] > 0) {
                            echo '<form action="index.php" method="POST" class="item-form">';
                            echo '<input type="hidden" name="product_name" value="' . $row['product_name'] . '">';
                            echo '<input type="hidden" name="unit_price" value="' . $row['unit_price'] . '">';
                            echo '<input type="text" value="1" name="count">';
                            echo '<button type="submit" class="add-item">Add to Cart</button>';
                            echo '</form>';
                          } else {
                            echo '<p class="card-text">Out of Stock</p>';
                          }
                          echo '<a href="item_details.php?id=' . $row['product_id'] . '" class="add-item">Product Details</a>';
                        echo '</div>';
                      
                    echo '</div>';
                  } 
                } else {
                  if (mysqli_num_rows($result) > 0) {  
                
                  $query = "SELECT * FROM products";
                  $result = mysqli_query($connection, $query);

                  while ($row = mysqli_fetch_array($result)) {
                    echo '<div class="product__item">';
                    echo '<img class="product__img" src="image/products/' . $row['product_id'] . '.jpg" alt="img" class="card-img-top card-image" >';
                      
                        echo '<div class="product__menu">';
                          echo '<h4 class="card-title">' . $row['product_name'] . '</h4>';
                          echo '<p class="card-price">' . $row['unit_price'] . '</p>';
                          echo '<p class="card-text">' . 'Number of Stock: '. $row['in_stock'] . '</p>';
                          if ($row['in_stock'] > 0) {
                            echo '<form action="index.php" method="POST" class="item-form">';
                            echo '<input type="hidden" name="product_name" value="' . $row['product_name'] . '">';
                            echo '<input type="hidden" name="unit_price" value="' . $row['unit_price'] . '">';
                            echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                            echo '<input type="text" value="1" name="count">';
                            echo '<button type="submit" class="add-item">Add to Cart</button>';
                            echo '</form>';
                          } else {
                            echo '<p class="card-text">Out of Stock</p>';
                          }
                          echo '<a href="item_details.php?id=' . $row['product_id'] . '" target="view" class="add-item">Product Details</a>';

                        echo '</div>';
                      echo '</div>';
                      } 
                  } else {
                    echo '<p> no result </p>';
                  }
              }
           

              

                
              
              mysqli_close($connection);
            ?>

        </div>
        </div>
      </section>





        <!-- Product Detail -->
        <section id="detail">
          <iframe name="view" src="item_details.php" frameborder=0 width="80%" height="80%"></iframe>
        </section>

      <!-- Shopping Cart -->      
      <section id="cart">
        <iframe name="view" src="cart.php" frameborder=0 width="100%" height="50%"></iframe>
      </section>  
    </section>
    </body>


</html>




