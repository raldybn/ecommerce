<h2>Tampil Barang</h2>

<?php
if(isset($_POST['btn_delete'])) {
    echo 'processing delete. . .<hr>';

    //delete file
    // select gambar dari tb_barang
    $s = "SELECT gambar FROM tb_barang WHERE kode_barang = '$_POST[btn_delete]'";
    $q = mysqli_query($cn, $s) or die(mysqli_error($cn));
    $d = mysqli_fetch_assoc($q);
    $filename = 'img/'.$d['gambar'];
    if(unlink($filename)) {
        //delete data
        $s = "DELETE FROM tb_barang WHERE kode_barang = '$_POST[btn_delete]'";
        $q = mysqli_query($cn, $s) or die(mysqli_error($cn));
        echo 'delete success. . .<hr>';
        echo "<a href='index.php'>KEMBALI</a>";
            // echo "<script>location.replace('index.php')</script>";
    } else {
        echo 'delete failed. . .<hr>';
    }
    

 exit;
}

$s = "SELECT a.*,
(SELECT COUNT(1) FROM tb_order WHERE kode_barang=a.kode_barang) jumlah_order
FROM tb_barang a
";
$q = mysqli_query($cn, $s) or die(mysqli_error($cn));

$jumlah_barang = mysqli_num_rows($q);

if(mysqli_num_rows($q)) {
    echo 'barang ada sebanyak '.$jumlah_barang;

    //looping dgn while
    $divs = '';
    while($d = mysqli_fetch_assoc($q)){

         //tekink debugging
        // echo '<pre';
        // print_r($d);
        // echo '</pre>';
        // exit;
        // echo '<br>barang zzz';

        // tampilkan form delete jika tidak ada order
        $form_delete = $d['jumlah_order'] ? "jumlah Order: $d[jumlah_order]" : "
        <form method=post>
        <button name=btn_delete value=$d[kode_barang]>DELETE
        </button>
        </form>
        ";


        $btn_edit = $username ? "<a href='?kode_barang=$d[kode_barang]'<button>EDIT</button>" : '';
        $btn_delete = $username ? $form_delete : '';

            //tampil sebagai card

            $divs .= "
            <div class=card>
                <div>$d[nama_barang]</div>
                <img src='img/$d[gambar]' class='gambar'>
                <div>$d[harga_jual]</div>
                <a href='order.php?kode_barang=$d[kode_barang]'>
                    <button>BELI</button>
                </a>
                $btn_edit
                $btn_delete
            </div>
            ";

    }

    echo "<div style='display: flex;'>$divs</div>";

        // tambah barang
        echo !$username ? '' : "
        <div class='card form-add'>
            <h3>TAMBAH BARANG</h3>
                <input type=text name=nama_barang placeholder='nama barang'>
                <input type=file name=gambar accept='.jpg, .png'>
                <input type=number name=harga_jual placeholder='harga jual'>
                <input type=number name=harga_beli placeholder='harga beli'>
                <input type=text name=satuan placeholder='satuan'>
                <input type=text name=kategori placeholder='kategori'>
            <button>ADD</button>
        </div>
        ";


    }else{
    echo 'barang kosong';
}
