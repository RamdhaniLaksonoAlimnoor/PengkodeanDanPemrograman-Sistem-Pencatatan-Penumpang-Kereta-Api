<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Jika dataSiswa diklik maka
if (isset($_POST['dataSiswa'])) {
    $output = '';

    // mengambil data siswa dari nik yang berasal dari dataSiswa
    $sql = "SELECT * FROM siswa WHERE nik = '" . $_POST['dataSiswa'] . "'";
    $result = mysqli_query($koneksi, $sql);

    $output .= '<div class="table-responsive">
                        <table class="table table-bordered">';
    foreach ($result as $row) {
        $output .= '<tr align="center">
                            <td colspan="2"><img src="img/' . $row['gambar'] . '" width="50%"></td>
                        </tr>
                        <tr>
                            <th width="40%">NIK</th>
                            <td width="60%">' . $row['nik'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nama</th>
                            <td width="60%">' . $row['nama'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Tempat dan Tanggal Lahir</th>
                            <td width="60%">' . $row['tmpt_Lahir'] . ', ' . date("d M Y", strtotime($row['tgl_Lahir'])) . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Jenis Kelamin</th>
                            <td width="60%">' . $row['jekel'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Kereta</th>
                            <td width="60%">' . $row['kereta'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">E-Mail</th>
                            <td width="60%">' . $row['email'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Alamat</th>
                            <td width="60%">' . $row['alamat'] . '</td>
                        </tr>
                        ';
    }
    $output .= '</table></div>';
    // Tampilkan $output
    echo $output;
}
