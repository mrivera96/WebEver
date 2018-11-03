<!DOCTYPE html>
<html  lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        if (!isset($titulo) || empty($titulo)) {
            $titulo = 'Agenda Electroníca Oriental';
        }
        echo "<title>$titulo</title>";
        ?>
        <title>Agenda Electrónica Oriental</title>

        <link rel="shortcut icon" href="../imagenes/aeo.ico" />
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/estilos.css" rel="stylesheet">
    </head>
    <body>
    <script src="../js/jquery-2.2.4.min.js"></script>