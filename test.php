<?php
// echo "Seth <br>";
// echo "M <br>";
// echo "20 year old <br>";
// echo "meachsenbroseth1@gmail.com <br>";
// echo "0966890979 <br>";
// echo "Phnom Penh";

//varaiable
$product_name = 'Bacon';
$Inventory = 240;
$Unit_Price = 9.64 . '$';
$quantity_Sold = 1594;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=home" />
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }
    </style>

</head>

<body>
    <header class="text-center">
        <img src="./img/Selfcare_self_care_Banner_6ea2f20364.png" class="img-fluid w-100" alt="ads image" style="height:250px; object-fit:cover;">
    </header>
    <nav class="bg-danger text-white p-3 d-flex justify-content-center ">
        <ul class="d-flex list-unstyled mb-0 gap-4">
            <li><a class="px-3 text-white text-decoration-none nav-link" href="#"><span class="material-symbols-outlined">home</span></a></li>
            <li><a class="px-3 text-white text-decoration-none nav-link" href="#">កម្សាន្ក</a></li>
            <li><a class="px-3 text-white text-decoration-none nav-link" href="#">បច្ចេកវិទ្យា</a></li>
            <li><a class="px-3 text-white text-decoration-none nav-link" href="#">ជិវិតនិងសង្គម</a></li>
            <li><a class="px-3 text-white text-decoration-none nav-link" href="#">កីឡា</a></li>
            <li><a class="px-3 text-white text-decoration-none nav-link" href="#">ផ្លូវទៅស្រុក</a></li>
            <li><a class="px-3 text-white text-decoration-none nav-link" href="#">Auto Talk</a></li>
            <li><a class="px-3 text-white text-decoration-none nav-link" href="#">Podcast</a></li>
            <li><a class="px-3 text-white text-decoration-none nav-link" href="#">Deal</a></li>
        </ul>
    </nav>
    <main>
        <div class="container my-4">
            <div class="row">
                <div class="col-md-4">
                    <img src="./img/Screenshot 2025-12-16 192015.png" class="img-fluid mb-3" alt="">
                    <img src="./img/Screenshot 2025-12-16 192102.png" class="img-fluid" alt="">
                </div>
                <div class="col-md-8">
                    <h2>Best Selling Products</h2>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <button class="btn btn-secondary btn-sm">Download CSV</button>
                            <button class="btn btn-secondary btn-sm">Email Report</button>
                        </div>

                        <div class="d-flex align-items-center">
                            <label class="mb-0 mr-2">Search:</label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Product Name</th>
                                <th>Inventory</th>
                                <th>Unit Price</th>
                                <th>Quantity Sold</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $product_name; ?></td>
                                <td><?php echo $Inventory; ?></td>
                                <td><?php echo $Unit_Price; ?></td>
                                <td><?php echo $quantity_Sold; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </main>

    <footer class="footer bg-dark text-white py-4">
        <div class="container-fluid d-flex justify-content-between px-5">
            <div>អំពីយើង</div>
            <div>គោលការណ៍ឯកជនភាព</div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>