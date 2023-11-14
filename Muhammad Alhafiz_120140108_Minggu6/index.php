<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konvert Angka Romawi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container p-5">
        <h1>Konvert Angka Romawi</h1>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="mb-3">
                <label for="angka" class="form-label">Masukkan Angka yang akan diubah:</label>
                <input type="number" class="form-control" name="angka" id="angka" required>
                <button type="submit" class="btn btn-primary mt-3">Konversi</button>
            </div>
        </form>

        <div class="container fs-5 mt-5">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $angka = $_POST["angka"];

                function konversiRomawi($angka)
                {
                    $romawi = '';
                    $nilai = array(1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1);
                    $simbol = array('M', 'CM', 'D', 'CD', 'C', 'XC', 'L', 'XL', 'X', 'IX', 'V', 'IV', 'I');

                    for ($i = 0; $i < count($nilai); $i++) {
                        while ($angka >= $nilai[$i]) {
                            $angka -= $nilai[$i];
                            $romawi .= $simbol[$i];
                        }
                    }

                    return $romawi;
                }

                $angkaRomawi = konversiRomawi($angka);

                echo "<p>Hasil : $angkaRomawi</p>";
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>