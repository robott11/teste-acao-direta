<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/toastr.min.css">

    <title>Empresa XXX | <?php echo $title ?? 'Document' ?></title>
</head>
<body class="bg-light bg-gradient">

<?php echo $content ?>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/toastr.min.js"></script>
<script>
    let userId = <?php echo $user->id ?>;

    $('#clock-btn').click(function (e) {
        e.preventDefault();

        $.ajax({
            url: 'point',
            data: {
                user: userId
            },
            success: function (data) {
                console.log(data);
            }
        });
    });
</script>
</body>
</html>