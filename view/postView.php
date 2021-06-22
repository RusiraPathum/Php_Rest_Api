<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->


</head>
<body>

<div class="container mt-5">
    <form>
        <div class="mb-4">
            <input type="text" class="form-control" id="title" placeholder="Post Title">
        </div>
        <div class="mb-4">
            <input type="text" class="form-control" id="body" placeholder="Post Body">
        </div>
        <div>
            <button class="btn btn-primary" id="submit">Submit</button>
        </div>
    </form>

    <div class="mt-5">
        <button class="btn btn-success" onclick="read()">read</button>
        <button class="btn btn-warning" onclick="readSingle()">read Single</button>
    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>

    function read() {
        // alert("hh");
        $.ajax({
            url: '../API/post/read.php',
            method: 'GET',
            success: function (data) {
                // alert(data);
                console.log(data);
            }

        });

    }

    var id = 3;

    function readSingle() {
        // alert("hh");
        $.ajax({
            url: '../API/post/read_single.php',
            method: 'GET',
            data: {id: id},
            success: function (data) {
                // alert(data);
                console.log(data);
            }

        });

    }

    $('#submit').click(function (){

        let title = $('#title').val();
        let body = $('#body').val();

        let dtObj = {
            title:title,
            body:body
        }

        let data = JSON.stringify(dtObj)
        // alert(data);

        $.ajax({
            url:'../API/post/create_post.php',
            method:'POST',
            data: data,
            success:function (data){
                alert(data);
            }
        })

    })

</script>

</body>
</html>