<?php

require_once '../database.php';

if(isset($_POST['btnSubmit'])) {

    foreach($_POST as $field=>$edit_value)  $$field = $edit_value;

    $sql = "UPDATE products SET name = '$name', `type` = '$type', description = '$description', quantity = '$quantity', price = '$price' WHERE id = :id";
    $stmt = $conn->prepare($sql);

    $stmt->execute([
        "id" => $id
    ]);

    // back to admin.php
    header("location: ../admin.php");
}

if(isset($_GET['id'])) {
    // bring the record over to the admin

    $sql = "SELECT * FROM products WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(["id" => $_GET['id']]);

    $data = $stmt->fetch(PDO::FETCH_OBJ);
    //echo "<pre>".print_r($data, true)."</pre>"; 

    ?>
<title>Edit</title>
<link rel="stylesheet" href="../Assets/Styles/admin-style.css">
<div class="container">
    <div class="form">
        <h2>Edit Product</h2>
        <hr>
        <p>Edit current data.</p>
        <form action="" method="post">

            <input type="hidden" name="id" value="<?php echo $data->id; ?>">
            <div>              
                <label>Name:</label><br>
                <input type="text" name="name" value="<?php echo $data->name; ?>" required>
                <!-- <span><?php echo $name_err; ?></span> -->
            </div>    
            <div>
                <label>Type:</label><br>
                <input type="text" name="type" value="<?php echo $data->type; ?>" required>
            </div>
            <div>
                <label>Description:</label><br>
                <input class="admin-description" name="description" value="<?php echo $data->description; ?>">
            </div>
            <div>
                <label>Quantity: (Zero by default)</label><br>
                <input type="text" name="quantity" value="<?php echo $data->quantity; ?>" required>
            </div>
            <div>
                <label>Price: (€/Euro will be added automatically!)</label><br>
                <input type="text" name="price" value="<?php echo $data->price; ?>" required>
                <!-- <span><?php echo $price_err; ?></span> -->
            </div>
            <div>
                <br>
                <input type="submit" name="btnSubmit" value="Submit" id="postButton">
                <a href="../admin.php">Cancel</a>
            </div>
    </div>
</div>
    </form>
    <?php

}