<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    function chuanHoaMaTraCuu($matracuu)
    {
        $matracuu = substr($matracuu, 0, 5) . "-" . substr($matracuu, 5, 5) . "-" . substr($matracuu, 10, 4);
        return $matracuu;
    }

    function chuanHoaMaChuyenHang($machuyenhang)
    {
        $machuyenhang = substr($machuyenhang, 0, 3)."-".substr($machuyenhang, 3, 5)."-".substr($machuyenhang, 8, 5);
        return $machuyenhang;
    }

    ?>
</body>

</html>