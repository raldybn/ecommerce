<?php

if(isset($_POST['btn_order'])) {
    echo 'Anda Mengetik Tombol Order';

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    echo "kode_barang: $kode_barang ";

    $s = "INSERT INTO tb_order (
        kode_barang, 
        nama_pembeli, 
        nomor_whatsapp, 
        jumlah_pesanan
    ) VALUES (
        '$kode_barang', 
        '$_POST[nama_pembeli]', 
        '$_POST[nomor_whatsapp]',
        '$_POST[jumlah_pesanan]'
        )";

    echo $s;

    $q = mysqli_query($cn, $s) or die(mysqli_error($cn));

    echo 'Data berhasil disimpan.';

    exit;
} else {
    echo 'tampil awal form';
}
