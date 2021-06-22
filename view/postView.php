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

<button onclick="read()">
    read
</button>
<button onclick="readSingle()">
    read Single
</button>

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
                alert(data);
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
                alert(data);
                console.log(data);
            }

        });

    }

</script>

</body>
</html>