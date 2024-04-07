<?php
// Get the 4 most recently added products
$stmt = $conn->prepare('SELECT id, name, description, price, img FROM products');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?=template_header('Home')?>

<div class="featured">
    <h2>Whatever you need</h2>
    <p>We might have it!</p>
</div>
<div class="recentlyadded content-wrapper">
    <h2>Popular Products</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $product): ?>
        <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
            <img src="../assets/imgs/<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
            <span class="name"><?=$product['name']?></span>
            <span class="price">
                &euro;<?=$product['price']?>
                <!-- <?/*php if ($product['rrp'] > 0):*/ ?>
                <span class="rrp">&euro;<?/*=$product['rrp']?></span>
                <?/*php endif; */?> -->
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<?=template_footer()?>