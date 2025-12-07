<?php
$title = "Home Page";
require 'templates/header.php';
include 'data.php';

print_r($products);
?>

<div>
    <?php foreach($products as $key => $product) { ?>
        <div class="product_info">
            <p class="product_name"><?php echo $product['name']; ?></p>
            <img src="<?php echo $product ['image']; ?>" alt="Image" width="200px" height="auto">
        </div>  
    <?php } ?>
</div>

<div>
    <div class="product_info">
        <p>ABC XYZ</p>
        <img src="uploads/image.png" alt="Image" width="200px" height="auto">
        <p class = "description">
            <?php echo $product['description']; ?>
        </p>

        <p class="price">Rs. <?php echo $product ['price']; ?></p>

    </div>
</div>

<?php
require 'templates/footer.php';
?>