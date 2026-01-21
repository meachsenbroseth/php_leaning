<?php
require "connection.php";
$select = mysqli_query($conn, "select * from tbl_products");
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous" />
</head>

<body>
  <div class="container mt-4">
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-end mb-2">
      <button
        type="button"
        class="btn btn-primary"
        data-toggle="modal"
        data-target="#exampleModalCenter">
        Add Products
      </button>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Product Name</th>
          <th>QTY</th>
          <th>Price</th>
          <th>Total</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($select)) {
        ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['pname'] ?></td>
            <td><?= $row['qty'] ?></td>
            <td><?= $row['price'] ?></td>
            <td><?= $row['total'] ?></td>
            <td>
              <div class=" card text-center">
                <div class=" card-img-top d-flex align-items-center justify-content-center" style="height:100px;">
                  <img
                    class=" img-fluid"
                    src="./image/<?= $row['img'] ?>"
                    alt="<?= $row['img'] ?>" 
                    style="max-height:100%;"
                    />
                </div>
              </div>
            </td>
            <td>
              <div class="d-flex gap-2">
                <button class="btn btn-warning me-3" data-id="<?= $row['id'] ?>">Edit</button>
                <form class="ml-2" action="delete.php" method="post">
                  <input type="hidden" name="id" value="<?= $row['id'] ?>">
                  <button type="submit" name="btnDelete" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
              </div>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Modal -->
  <div
    class="modal fade"
    id="exampleModalCenter"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add Products</h5>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="insert.php" method="post" enctype="multipart/form-data">
            <label class="form-label" for="pname">Product Name</label>
            <input class="form-control" type="text" name="pname" id="pname">
            <label class="form-label" for="qty">QTY</label>
            <input class="form-control" type="number" name="qty" id="qty">
            <label class="form-label" for="price">Price</label>
            <input class="form-control" type="number" name="price" id="price" step="0.01">
            <label class="form-label" for="img">Product Image</label><br>
            <div class=" d-flex justify-content-center">
              <img id="img" src="https://img.freepik.com/free-vector/soda-drink-can-cartoon-vector-icon-illustration-drink-object-icon-isolated-flat-vector_138676-13697.jpg?semt=ais_hybrid&w=740&q=80" alt="" width="100">
            </div>
            <input type="file" name="file" id="file" hidden>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-dismiss="modal">
            Close
          </button>
          <button type="submit" name="btnSubmit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    const img = document.getElementById('img');
    const file = document.getElementById('file');

    img.addEventListener('click', () => {
      file.click();
    })
    file.addEventListener('change', function() {
      const showImg = this.files[0];
      if (showImg) {
        img.src = URL.createObjectURL(showImg);
      }
    })
  </script>
  <script
    src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>

</html>