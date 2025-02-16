<?php
$hostname = 'localhost'; #127.0.0.1;
$username = 'root';
$password = '';
$database = 'tb_product';
$connection = new mysqli($hostname, $username, $password, $database);
function product()
{
    global $connection;
    if (isset($_POST['btn-save'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $discount = $_POST['discount'];

        $sql = "INSERT INTO `products` (`name`, `price`, `qty`, `discount`) VALUES ('$name', '$price', '$qty', '$discount')";
        $result = $connection->query($sql);
        if ($result) {
            echo '
                <script>
                $(document).ready(function(){
                    Swal.fire({
                    title: "Success",
                    text: "Product Insert successfully",
                    icon: "success"
                    });
                })
            </script>
            ';
        }
    }
}
product();
function getProduct()
{
    global $connection;
    $sql = "SELECT * FROM `products`";
    $result = $connection->query($sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '
            <tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['name'] . '</td>
                <td>' . $row['price'] . '$</td>
                <td>' . $row['qty'] . '</td>
                <td>' . $row['discount'] . '%</td>
                <td class="d-flex justify-content-center" >
                    <button type="button" class="btn btn-outline-warning me-2" id="btn-open-update" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Update
                     </button>
                    <form action="" method="post">
                        <input type="hidden" name="removeId" value="' . $row['id'] . '">
                        <button class="btn btn-outline-danger" name="btn-delete"><i class="bi bi-trash3"></i>Delete</button>
                    </form>
                </td>
            </tr>';
        }
    }
}
function deleteProduct()
{
    global $connection;
    if (isset($_POST['btn-delete'])) {
        $removeId = $_POST['removeId'];
        $sql = "DELETE FROM products WHERE id = $removeId";
        $result = $connection->query($sql);
        if ($result) {
            echo '
                <script>
                $(document).ready(function(){
                    Swal.fire({
                    title: "Success",
                    text: "Employee Delete successfully",
                    icon: "success"
                    });
                })
            </script>
            ';
        }
    }
}
deleteProduct();
function updateProduct()
{
    global $connection;
    if (isset($_POST['btn-update'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $discount = $_POST['discount'];
        $id = $_POST['update_id'];
        
        $sql = "UPDATE `products` SET `name`='$name',`price`='$price',`qty`='$qty',`discount`='$discount' WHERE `id`='$id'";

        $result = $connection->query($sql);
        if ($result) {
            echo '
                <script>
                $(document).ready(function(){
                    Swal.fire({
                    title: "Success",
                    text: "Employee Update successfully",
                    icon: "success"
                    });
                })
            </script>
            ';
        }
    }
}
updateProduct();
