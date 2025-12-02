| Nama                     | Kelas    | NIM       | Mata Kuliah           | Pertemuan 7 |
|---------------------------|----------|------------|------------------------|--------|
| Friska Pebriana Lestari   | TI.24.A1 | 312410160  | Pemrograman Web 1      | Lab7Web.PHP   |


## Bagian HTML & CSS (Tampilan Form)

```
<style>
```
Ini bagian buat styling biar form lu keliatan aesthetic.
  1. body: background warna pink muda #ffeef5, font Poppins
  2. .container: kotak putih isi form, width 400px, tengah, rounded, shadow pink. 
  3. input, select: kotak input biar lembut (rounded, border pink pastel, background soft).
  4. button: tombol warna pink, hover jadi lebih gelap.
  5. .output: kotak hasil output setelah form dikirim.

Intinya bagian ini cuma buat ngehias, ga ada fungsi logic.

## Bagian Form Input
``` html
<form method="POST">
```
Artinya data dikirim lewat metode POST.

## Isi Form
1. Nama
   ``` html
   <input type="text" name="nama" required>
   ```

2. Tanggal lahir (date)
   ``` html
   <input type="date" name="tgl_lahir" required>
   ```

3. Pilihan pekerjaan (select)
   ``` html
   <select name="pekerjaan">
   ```

4. Tombol submit
   ``` html
   <button type="submit" name="submit">Tampilkan</button>
   ```
  
## Bagian PHP (logika Program)
A. Cek apakah tombol submit dipencet
``` php
if (isset($_POST['submit'])) {
```

B. Ambil input user
``` php
$nama = $_POST['nama'];
$tgl_lahir = $_POST['tgl_lahir'];
$pekerjaan = $_POST['pekerjaan'];
```

C. Hitung umur
``` php
$lahir = new DateTime($tgl_lahir);
$today = new DateTime();
$umur = $today->diff($lahir)->y;
```

Penjelasan:
- $lahir = tanggal input
- $today = tanggal hari ini
- $today->diff($lahir) = selisih kedua tanggal
- ->y = ambil tahun saja → itulah umur user

D. Daftar gaji
``` php
$gajiList = [
    "Programmer" => 8000000,
    "Designer" => 6000000,
    "Manager" => 12000000,
    "Admin" => 5000000
];
```
Ini array berisi gaji sesuai pekerjaan.

Lalu ambil gajinya:
``` php
$gaji = $gajiList[$pekerjaan];
```

E. Tampilkan hasil
``` php
echo "<div class='output'>
...
</div>";
```
Output yang ditampilkan:
- Nama
- Tanggal lahir
- Umur (hasil hitung PHP)
- Pekerjaan
- Gaji (diformat jadi “Rp 8.000.000” pakai `number_format)`

## Ringkasannya
     a. Form ini ngambil: nama, tanggal lahir, pekerjaan
     b. PHP menghitung: umur + gaji sesuai pekerjaan
     c. Hasilnya ditampilin dalam kotak pink pastel


## Input Code
``` html
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
```
```php
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
```
``` html
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
<img width="1036" height="860" alt="form_output" src="https://github.com/user-attachments/assets/d9cb14f6-a392-47a2-87ca-98699a31e0ba" />
</html>
```

## Output
<img width="1036" height="860" alt="form_output" src="https://github.com/user-attachments/assets/2d04f16e-bb7e-4ece-9a92-2be6ca557226" />
