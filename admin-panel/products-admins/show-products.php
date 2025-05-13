<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php
if (!isset($_SESSION['admin_name'])) {
    header("location: " . ADMINURL . "/admins/login-admins.php");
    exit;
}

$products = $conn->query("SELECT * FROM products");
$products->execute();

$allProducts = $products->fetchAll(PDO::FETCH_OBJ);
?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4 d-inline">Products</h5>
                <a href="create-products.php" class="btn btn-primary mb-4 text-center float-right">Create Products</a>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">Type</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($allProducts as $product) : ?>
                        <tr>
                            <th scope="row"><?php echo $product->id; ?></th>
                            <td><?php echo htmlspecialchars($product->name); ?></td>
                            <td><img src="images/<?php echo htmlspecialchars($product->image); ?>" style="width: 60px; height: 60px;"></td>
                            <td>$<?php echo htmlspecialchars($product->price); ?></td>
                            <td><?php echo htmlspecialchars($product->type); ?></td>
                            <td>
                                <a href="edit-products.php?id=<?php echo $product->id; ?>" class="btn btn-warning text-center">Edit</a>
                            </td>
                            <td>
                                <a href="delete-products.php?id=<?php echo $product->id; ?>" class="btn btn-danger text-center">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require "../layouts/footer.php"; ?>
