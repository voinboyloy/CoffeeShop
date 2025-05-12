<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php
if (!isset($_SESSION['admin_name'])) {
    header("location: " . ADMINURL . "/admins/login-admins.php");
    exit;
}

if (!isset($_GET['id'])) {
    echo "No product ID provided.";
    exit;
}

$id = $_GET['id'];

$product = $conn->query("SELECT * FROM products WHERE id = $id");
$product->execute();
$singleProduct = $product->fetch(PDO::FETCH_OBJ);

if (isset($_POST['submit'])) {
    if (empty($_POST['name']) || empty($_POST['price']) || empty($_POST['description']) || empty($_POST['type'])) {
        echo "<script>alert('One or more fields are empty');</script>";
    } else {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $type = $_POST['type'];

        if (!empty($_FILES['image']['name'])) {
            $image = $_FILES['image']['name'];
            $dir = "images/" . basename($image);
            move_uploaded_file($_FILES['image']['tmp_name'], $dir);
        } else {
            $image = $singleProduct->image;
        }

        $update = $conn->prepare("UPDATE products SET name = :name, price = :price, description = :description, type = :type, image = :image WHERE id = :id");

        $update->execute([
            ":name" => $name,
            ":price" => $price,
            ":description" => $description,
            ":type" => $type,
            ":image" => $image,
            ":id" => $id,
        ]);

        header("location: show-products.php");
        exit;
    }
}
?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Edit Product</h5>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($singleProduct->name); ?>" />
                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="price" class="form-control" value="<?= htmlspecialchars($singleProduct->price); ?>" />
                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <input type="file" name="image" class="form-control" />
                        <small>Current: <?= $singleProduct->image; ?></small>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3"><?= htmlspecialchars($singleProduct->description); ?></textarea>
                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <select name="type" class="form-select form-control">
                            <option value="drink" <?= $singleProduct->type === 'drink' ? 'selected' : ''; ?>>drink</option>
                            <option value="dessert" <?= $singleProduct->type === 'dessert' ? 'selected' : ''; ?>>dessert</option>
                        </select>
                    </div>
                    <br>
                    <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require "../layouts/footer.php"; ?>
