<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Manage</title>
    <link rel="icon" href="resource/logo.png" />
</head>
<body>

<?php

include "connection.php";
session_start();

if (isset($_SESSION["au"])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Product</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Icons (optional, from Bootstrap Icons) -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="icon" href="resource/logo.png" />
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
                    <div class="position-sticky">
                        <h2 class="text-center text-white py-3">Jewelry Admin</h2>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="admindashbord.php">
                                    <i class="bi bi-house-door-fill"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="stockmanage.php">
                                    <i class="bi bi-bag-fill"></i> Stock Manage
                                </a>
                            </li>
                            </ul>
                       
                    </div>
                </nav>

                <!-- Main Content -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Stock Manage</h1>
                    </div>

                    <!-- Add Product Form -->
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title bg-info">Product Details</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        
                                        <div class="mb-3">
                                            <label for="productname" class="form-label bg-success">Product Name</label>
                                            <select class="form-select" id="productname">
                                                <option value="0">Select Product</option>
                                                <?php

                                                $c_rs = Database::search("SELECT * FROM `product`");
                                                $c_num = $c_rs->num_rows;

                                                for ($a = 0; $a < $c_num; $a++) {
                                                    $c_data = $c_rs->fetch_assoc();
                                                ?>

                                                    <option value="<?php echo $c_data["p_id"]; ?>"><?php echo $c_data["p_name"]; ?></option>

                                                <?php
                                                }

                                                ?>
                                            </select>
                                        </div>

                                       
                                         <div class="mb-3">
                                            <label for="productPrice" class="form-label bg-success">Price</label>
                                            <input type="number" class="form-control" id="productPrice" placeholder="Enter product price">
                                        </div>
                                        <div class="mb-3">
                                            <label for="productStock" class="form-label bg-success" >Stock Quantity</label>
                                            <input type="number" class="form-control" id="productStock" placeholder="Enter stock quantity">
                                        </div>
                                        
                                       



                                        <button type="submit" class="btn btn-primary" onclick="updatestock();">Update Stock</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <!-- Bootstrap JS and dependencies -->
        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    </body>

    </html>

<?php
} else {
    echo "Not valid admin";
}
?>
    
</body>
</html>