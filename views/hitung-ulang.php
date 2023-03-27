<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Ulang</title>
</head>
<body>
    <a href="./data.php">Kembali</a>
    <h2>Hitung Ulang</h2>
    <form action="../controllers/HitungUlangController.php" method="POST">
        <div>
            <label for="">Blok ke</label>
            <input type="text" name="blok_ke"><br>
            <label for="">Baris ke</label>
            <input type="text" name="baris_ke"><br>
            <label for="">Keterangan</label>
            <input type="text" name="keterangan"><br>
            <label for="">Jumlah</label>
            <h2 id="jumlah">0</h2>
            <button type="button" onclick="tambah()">Hitung</button>
            <button type="submit">Simpan</button>
        </div>
    </form>

    <script>
        let jumlah = 0;

        function tambah() {
            jumlah++;
            document.getElementById("jumlah").innerHTML = jumlah;
        }

        const simpanButton = document.querySelector("button[type='submit']");
        simpanButton.addEventListener("click", function() {
            const jumlahInput = document.createElement("input");
            jumlahInput.type = "hidden";
            jumlahInput.name = "jumlah";
            jumlahInput.value = jumlah;
            document.querySelector("form").appendChild(jumlahInput);
        });
    </script>
</body>
</html>
