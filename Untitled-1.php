<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/collection.css">
    
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
<script src="./js/main.js"></script>
    <div id="collection">
        <header>
        <header>
        <div id="navbar">
          <nav>
           <ul class="sidebar">
            <l onclick=hideSidebar() ><img src="./icon/Vérité.svg" alt="Brand_name"></a></l>
            <l><a href=""><img src="./icon/Search.svg" alt="Search"></a></l>
            <l><a href="./login.html"><img src="./icon/User.svg" alt="User"></a></l>
            <l><a href=""><img src="./icon/Bag.svg" alt="Bag"></a></l>
            <l><a href=""><img src="./icon/Frame 1.png" alt=""></a></l>
           </ul>
           <ul >
             <l class=""><a href=""><img src="./icon/Vérité.svg" alt="Brand_name"></a></l>
             <l class="hideOnMobie"><a href=""><img src="./icon/Search.svg" alt="Search"></a></l>
             <l class="hideOnMobie"><a href="./login.html"><img src="./icon/User.svg" alt="User"></a></l>
             <l class="hideOnMobie"><a href=""><img src="./icon/Bag.svg" alt="Bag"></a></l>
             <l class="menu-button" onclick=showSidebar()><img id="brand_logo" src="./icon/bee_menu.svg" alt="bee_menu"></a></l>
            </ul>
          </nav>
         </div>
      </header>
        </header>
        <main>
            <!-- breadcrumb -->
            <div id="collection-content">
                <div class="content-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" style="background-color: white;">
                            <li class="breadcrumb-item active" aria-current="page"><a href="./index.html">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="">Vérité collection</a></li>
                        </ol>
                    </nav>
                    <div class="title-header">VÉRITÉ Featured</div>
                </div>
            </div>
            <!-- sort btn -->
            <div class="sortFilter-content">
                <button class="btn-Sort">Sort by <img src="./icon/mdi_arrow-down-drop.png" alt=""></button>
                <div class="sort-Item">
                    <ul>
                        <li class="sort-list">new</li>
                        <li class="sort-list">best selling</li>
                        <li class="sort-list">low to high</li>
                    </ul>
                </div>
            </div>
            <!-- product list -->
            <div class="container product-list" id="product-list">
                <div class="row" id="product-list-container">
                    <?php
                    $sql = "SELECT * FROM products";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-md-4 mb-3">
                        <div class="product-list-item">
                            <img class="product-list-item__img" src="<?= $row['image']; ?>" alt="">
                            <p class="product-list-item__name"><?= $row['name']; ?></p>
                            <p class="product-list-item__detail"><?= $row['detail']; ?></p>
                            <p class="product-list-item__price"><?= $row['price']; ?></p>
                        </div>
                    </div>
                    <?php 
                        }
                    } else {
                        echo "<p>No products found.</p>";
                    }
                    ?>
                </div>
                <div class="bttn-load">
                    <button class="loadmore">Load More <img src="./icon/Vector.svg" alt=""></button>
                </div>
            </div>
            <!-- catalog-panel -->
            <div class="catalog-panel">
                <button class="panel-active">panel</button>
                <ul class="panel-list">
                    <li class="panel-list-item" data-brand="All">All</li>
                    <li class="panel-list-item" data-brand="Automatic">Automatic</li>
                    <li class="panel-list-item" data-brand="Digital">Digital</li>
                    <li class="panel-list-item" data-brand="Vintage">Vintage Insprite</li>
                </ul>
            </div>
            <script src="./js/collection.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    document.querySelectorAll('.panel-list-item').forEach(function (item) {
                        item.addEventListener('click', function () {
                            var brand = this.getAttribute('data-brand');
                            console.log(brand);
                            fetch('api_filter.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded'
                                },
                                body: new URLSearchParams({
                                    brand: brand
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                var productContainer = document.getElementById('product-list-container');
                                productContainer.innerHTML = '';

                                data.forEach(function (product) {
                                    var productHTML = `
                                        <div class="col-md-4 mb-3">
                                            <div class="product-list-item">
                                                <img class="product-list-item__img" src="${product.image}" alt="">
                                                <p class="product-list-item__name">${product.name}</p>
                                                <p class="product-list-item__detail">${product.detail}</p>
                                                <p class="product-list-item__price">${product.price}</p>
                                            </div>
                                        </div>
                                    `;
                                    productContainer.innerHTML += productHTML;
                                });
                            })
                            .catch(error => console.error('Error:', error));
                        });
                    });
                });
            </script>
        </main>
        <footer>
        </footer>
    </div>
</body>
</html>
