<?php

require_once '../database.php';

if(isset($_POST['btnSubmit'])) {
    //echo "<pre>".print_r($_POST, true)."</pre>"; 

    foreach($_POST as $veld=>$waarde)  $$veld = $waarde;

    $sql = "UPDATE products SET name = '$name', `type` = '$type', description = '$description', price = '$price' WHERE id = :id";
    $stmt = $conn->prepare($sql);

    $stmt->execute([
        "id" => $id
    ]);

    // keer terug naar admin.php
    header("location: admin.php");
}

if(isset($_GET['id'])) {
    // haal het record

    $sql = "SELECT * FROM products WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(["id" => $_GET['id']]);

    $data = $stmt->fetch(PDO::FETCH_OBJ);
    //echo "<pre>".print_r($data, true)."</pre>"; 

    ?>
<h2>Edit Product</h2>
<hr>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $data->id; ?>">
        <div>
            <label>Name</label>
            <input type="text" name="name" value="<?php echo $data->name; ?>">
            <!-- <span><?php echo $name_err; ?></span> -->
        </div>    
        <div>
            <label>Type</label>
            <textarea type="text" name="type"><?php echo $data->type; ?></textarea>
        </div>
        <div>
            <label>Description</label>
            <textarea name="description"><?php echo $data->description; ?></textarea>
        </div>
        <div>
            <label>Price</label>
            <input type="text" name="price" value="<?php echo $data->price; ?>">
            <!-- <span><?php echo $price_err; ?></span> -->
        </div>
        <div>
            <input type="submit" name="btnSubmit" value="Submit">
            <a href="admin.php">Cancel</a>
        </div>
    </form>
    <?php

}