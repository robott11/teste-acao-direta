<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="<?php echo asset('/assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo asset('/assets/css/toastr.min.css') ?>">
    <link rel="stylesheet" href="<?php echo asset('/assets/css/fontawesome.min.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <title>Painel Admin | <?php echo $title ?? 'Document' ?></title>
</head>
<body>

<?php echo $content ?>

<script src="<?php echo asset('/assets/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?php echo asset('/assets/js/jquery.min.js') ?>"></script>
<script src="<?php echo asset('/assets/js/fontawesome.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    $('#filter-start').flatpickr({
        enableTime: true,
        defaultDate: new Date(),
        dateFormat: 'd/m/Y H:i'
    });

    $('#filter-end').flatpickr({
        enableTime: true,
        defaultDate: new Date(),
        dateFormat: 'd/m/Y H:i'
    });
</script>
</body>
</html>