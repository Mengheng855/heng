<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<?php
    include('function.php');
?>
<body>
    <div class="container bg-dark p-3">
        <h1 class="text-center text-light">Product CRUD</h1>
        <button type="button" class="btn btn-primary" id="btn-open-add" data-bs-toggle="modal" data-bs-target="#exampleModal">
            + Add
        </button>
        <table class="table table-hover table-dark text-center">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Discount</th>
                <th>Action</th>
            </tr>
            <?php getProduct(); ?>
        </table>
        
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Insert Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <input type="hidden" name="update_id" id="update_id_txt">
                        <div class="row">
                            <div class="col-6 mt-2 ">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" id="name_txt" placeholder="name" aria-label="name">
                            </div>
                            <div class="col-6 mt-2">
                                <label for="">Price</label>
                                <input type="text" name="price" class="form-control" id="price_txt" placeholder="price" aria-label="price">
                            </div>
                            <div class="col-6 mt-2">
                                <label for="">Qty</label>
                                <input type="text" name="qty" class="form-control" id="qty_txt" placeholder="qty" aria-label="qty">
                            </div>
                            <div class="col-6 mt-2">
                                <label for="">Discount</label>
                                <input type="text" name="discount" class="form-control" id="discount_txt" placeholder="discount" aria-label="discount">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="btn-save" id="btn-save" class="btn btn-success">Save</button>
                            <button type="submit" name="btn-update" id="btn-update" class="btn btn-warning">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</body>
</html>
<script>
    $(document).ready(function(){
        $('#btn-open-add').click(function(){
            $('#btn-update').addClass('d-none')
            $('#btn-save').removeClass('d-none')

            $('#name_txt').val('');
            $('#pricegender_txt').val('');
            $('#qty_txt').val('');
            $('#discount_txt').val('');
            $('.modal-title').text('Insert Product')
        });
        $('body').on('click','#btn-open-update',function(){
            $('#btn-save').addClass('d-none')
            $('#btn-update').removeClass('d-none')
            $('.modal-title').text('Update Product')

            var row = $(this).parents('tr').find('td').eq(0).text();
            console.log(row);
            var id = $(this).parents('tr').find('td').eq(0).text();
            var name = $(this).parents('tr').find('td').eq(1).text();
            var price = $(this).parents('tr').find('td').eq(2).text();
            var qty = $(this).parents('tr').find('td').eq(3).text();
            var discount = $(this).parents('tr').find('td').eq(4).text();
            
            
            console.log(id+" "+name+" "+price+" "+qty+" "+discount+" ");

            $('#update_id_txt').val(id);
            $('#name_txt').val(name);
            $('#price_txt').val(price);
            $('#qty_txt').val(qty);
            $('#discount_txt').val(discount);
                
        })
    });
</script>