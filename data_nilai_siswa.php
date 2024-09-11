<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Rata-rata Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Hitung Rata-rata Nilai Siswa</h1>

    <?php
    // Data siswa
    $siswa = [
        ["nama" => "Andi", "matematika" => 85, "bahasa_inggris" => 70, "ipa" => 80],
        ["nama" => "Budi", "matematika" => 60, "bahasa_inggris" => 50, "ipa" => 65],
        ["nama" => "Cici", "matematika" => 75, "bahasa_inggris" => 80, "ipa" => 70],
        ["nama" => "Dodi", "matematika" => 95, "bahasa_inggris" => 85, "ipa" => 90],
        ["nama" => "Eka", "matematika" => 50, "bahasa_inggris" => 60, "ipa" => 55],
    ];

    // Cek apakah tombol 'Hitung Rata-rata' telah ditekan
    if (isset($_POST['hitung'])) {
        echo "<table>
            <tr>
                <th>Nama</th>
                <th>Matematika</th>
                <th>Bahasa Inggris</th>
                <th>IPA</th>
                <th>Rata-rata</th>
                <th>Status</th>
                <th>Perbaikan</th>
            </tr>";

        $lulus = 0;
        $tidak_lulus = 0;

        // Loop untuk menghitung rata-rata dan status kelulusan
        foreach ($siswa as $key => $data) {
            $rata_rata = ($data['matematika'] + $data['bahasa_inggris'] + $data['ipa']) / 3;
            $status = ($rata_rata >= 75) ? 'Lulus' : 'Tidak Lulus';

            if ($status == 'Lulus') {
                $perbaiki = '-';
                $lulus++;
            } else {
                // Cari mata pelajaran yang perlu diperbaiki (nilai terendah)
                $nilai_terendah = min($data['matematika'], $data['bahasa_inggris'], $data['ipa']);
                if ($nilai_terendah == $data['matematika']) {
                    $perbaiki = 'Matematika';
                } elseif ($nilai_terendah == $data['bahasa_inggris']) {
                    $perbaiki = 'Bahasa Inggris';
                } else {
                    $perbaiki = 'IPA';
                }
                $tidak_lulus++;
            }

            // Tampilkan data siswa dalam bentuk tabel
            echo "<tr>
                    <td>{$data['nama']}</td>
                    <td>{$data['matematika']}</td>
                    <td>{$data['bahasa_inggris']}</td>
                    <td>{$data['ipa']}</td>
                    <td>" . number_format($rata_rata, 2) . "</td>
                    <td>$status</td>
                    <td>$perbaiki</td>
                </tr>";
        }

        echo "</table>";

        // Tampilkan jumlah siswa yang lulus dan tidak lulus
        echo "<p>Jumlah siswa yang lulus: $lulus</p>";
        echo "<p>Jumlah siswa yang tidak lulus: $tidak_lulus</p>";
    }
    ?>

    <form method="post">
        <button type="submit" name="hitung">Hitung Rata-rata</button>
    </form>
</div>

</body>
</html>
