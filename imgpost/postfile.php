<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-5">
        <form action="movefile.php" method="post" enctype="multipart/form-data"> 
            <input id="file" name="file" type="file" hidden>
            <img id="img" class=" rounded-circle" src="./img/Deafult PFP _ @davy3k.jpg" alt="" width="100px" height="100px"><br>
            <button name="btnSubmit" type="submit" class="btn btn-primary mt-2">Post</button>
        </form>
    </div>
<script>
    const file = document.getElementById('file');
    const img = document.getElementById('img');

    img.addEventListener('click', ()=>{
        file.click();
    });

    file.addEventListener('change', function(){
        
        const showImg = this.files[0];


        if(showImg){
            img.src = URL.createObjectURL(showImg);
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>