<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-4">
        <div class=" d-flex justify-content-end mb-3">
            <!-- Button trigger modal -->
            <button id="addStudent" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Student
            </button>
        </div>
        <table class="table">
            <thead class=" table-dark">
                <tr>
                    <th>ID</th>
                    <th>Uername</th>
                    <th>Gender</th>
                    <th>Profile</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'connection.php';
                $select = mysqli_query($conn, "SELECT * from tbl_students");
                while ($row = mysqli_fetch_assoc($select)) {
                ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['gender'] ?></td>
                        <td>
                            <div class="card text-center w-50">
                                <div class="card-img-top d-flex align-items-center justify-content-center"
                                    style="height: 100px;">
                                    <img src="<?= $row['profile'] ?>"
                                        alt=""
                                        style="max-height:100%;
                                    width:100%
                                    " />
                                </div>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-warning btnEdit" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                            <button class="btn btn-danger btnDelete">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>



        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form" enctype="multipart/form-data" method="post">
                            <label class="form-label" for="username">Username</label>
                            <input class="form-control" id="username" name="username" type="text" placeholder="Enter username">
                            <label class="form-label" for="name">Username</label>
                            <select class="form-select" name="gender" id="gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <div class="d-flex justify-content-center mt-4">
                                <img id="img" src="https://i.pinimg.com/736x/9d/16/4e/9d164e4e074d11ce4de0a508914537a8.jpg" alt="" style="width: 200px;">

                            </div>
                            <input name="file" id="file" type="file">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button name="btnEdit" id="update" type="button" class="btn btn-warning"  data-bs-dismiss="modal">Update</button>
                                <button name="btnAdd" id="btnAdd" type="button" class="btn btn-primary" data-bs-dismiss="modal">Add</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('#file').hide();

            $('#img').click(function() {
                $('#file').click();
            });

            $('#file').change(function() {
                const file = this.files[0];
                if (file) {
                    $('#img').attr('src', URL.createObjectURL(file));
                }
            });

            // ADD STUDENT 
            $('#addStudent').click(function() {
                $('#update').hide();
                $('#btnAdd').show();
                $('#form')[0].reset();
                $('#img').attr('src', 'https://i.pinimg.com/736x/9d/16/4e/9d164e4e074d11ce4de0a508914537a8.jpg');
            });

            // INSERT
            $('#btnAdd').click(function() {
                const file = $('#file')[0].files[0];
                const username = $('#username').val();
                const gender = $('#gender').val();

                let formData = new FormData();
                formData.append('username', username);
                formData.append('gender', gender);
                formData.append('file', file);

                $.ajax({
                    url: "insert.php",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(id) {
                        const imgUrl = URL.createObjectURL(file);

                        $('tbody').append(`
                    <tr>
                        <td>${id}</td>
                        <td>${username}</td>
                        <td>${gender}</td>
                        <td>
                            <div class="card text-center w-50">
                                <div class="card-img-top d-flex align-items-center justify-content-center" style="height:100px;">
                                    <img src="${imgUrl}" style="max-height:100%; width:100%;">
                                </div>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-warning btnEdit" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                            <button class="btn btn-danger btnDelete">Delete</button>
                        </td>
                    </tr>
                `);

                        $('#exampleModal').modal('hide');
                        $('#form')[0].reset();
                    }
                });
            });

            // DELETE
            $(document).on('click', '.btnDelete', function() {
                if (!confirm('Are you sure?')) return;

                const row = $(this).closest('tr');
                const id = row.find('td:eq(0)').text().trim();

                let formData = new FormData();
                formData.append('id', id);

                $.ajax({
                    url: "delete.php",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function() {
                        row.remove();
                    }
                });
            });

            // EDIT 
            $(document).on('click', '.btnEdit', function() {
                $('#btnAdd').hide();
                $('#update').show();

                const row = $(this).closest('tr');

                const id = row.find('td:eq(0)').text().trim();
                const username = row.find('td:eq(1)').text().trim();
                const gender = row.find('td:eq(2)').text().trim();
                const imgSrc = row.find('td:eq(3) img').attr('src');

                $('#username').val(username);
                $('#gender').val(gender);
                $('#img').attr('src', imgSrc);

                $('#update').data('row', row);
                $('#update').data('id', id);
            });

            // UPDATE
            $('#update').click(function() {
                const row = $(this).data('row');
                const id = $(this).data('id');

                const username = $('#username').val();
                const gender = $('#gender').val();
                const file = $('#file')[0].files[0];

                let formData = new FormData();
                formData.append('id', id);
                formData.append('username', username);
                formData.append('gender', gender);

                if (file) {
                    formData.append('file', file);
                }

                $.ajax({
                    url: "update.php",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function() {
                        row.find('td:eq(1)').text(username);
                        row.find('td:eq(2)').text(gender);

                        if (file) {
                            row.find('td:eq(3) img').attr('src', URL.createObjectURL(file));
                        }
                        alert('Update success');
                    }
                });
            });

        });
    </script>

</body>

</html>