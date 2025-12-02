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
