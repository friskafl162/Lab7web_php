<!DOCTYPE html>
<html>
<head>
    <title>Form Data Pink Pastel</title>
    <style>
        body {
            background: #ffeef5;
            font-family: "Poppins", sans-serif;
        }
        .container {
            width: 400px;
            background: white;
            padding: 25px;
            margin: 40px auto;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(255, 145, 175, 0.3);
            border: 2px solid #ffb6d9;
        }
        h2 {
            text-align: center;
            color: #ff5e99;
            margin-bottom: 20px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 2px solid #ffc7dd;
            margin-bottom: 15px;
            background: #fff5fa;
        }
        input:focus, select:focus {
            border-color: #ff7fbf;
            outline: none;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #ff7fbf;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
        }
        button:hover {
            background: #ff5da8;
        }

        .output {
            background: white;
            padding: 20px;
            margin-top: 20px;
            border-radius: 15px;
            border: 2px solid #ffb6d9;
            box-shadow: 0 4px 10px rgba(255, 145, 175, 0.3);
        }
        .label {
            font-weight: bold;
            color: #ff5e99;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Form Pink Pastel</h2>

    <form method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" required>

        <label>Tanggal Lahir:</label>
        <input type="date" name="tgl_lahir" required>

        <label>Pekerjaan:</label>
        <select name="pekerjaan" required>
            <option value="Programmer">Programmer</option>
            <option value="Designer">Designer</option>
            <option value="Manager">Manager</option>
            <option value="Admin">Admin</option>
        </select>

        <button type="submit" name="submit">Tampilkan</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {

        $nama = $_POST['nama'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $pekerjaan = $_POST['pekerjaan'];

        // Hitung umur
        $lahir = new DateTime($tgl_lahir);
        $today = new DateTime();
        $umur = $today->diff($lahir)->y;

        // Gaji
        $gajiList = [
            "Programmer" => 8000000,
            "Designer" => 6000000,
            "Manager" => 12000000,
            "Admin" => 5000000
        ];

        $gaji = $gajiList[$pekerjaan];

        echo "<div class='output'>
                <p><span class='label'>Nama:</span> $nama</p>
                <p><span class='label'>Tanggal Lahir:</span> $tgl_lahir</p>
                <p><span class='label'>Umur:</span> $umur tahun</p>
                <p><span class='label'>Pekerjaan:</span> $pekerjaan</p>
                <p><span class='label'>Gaji:</span> Rp " . number_format($gaji, 0, ',', '.') . "</p>
              </div>";
    }
    ?>
</div>

</body>
</html>
