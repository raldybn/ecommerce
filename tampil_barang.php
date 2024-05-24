<h2>Tampil Barang</h2>

<?php
$s = "SELECT * FROM tb_barang";
$q = mysqli_query( $cn, $s) or die(mysqli_error($cn));

$jumlah_barang = mysqli_num_rows($q);

if(mysqli_num_rows($q)) {
    echo 'barang ada sebanyak '.$jumlah_barang;

    //looping dgn while
    while($d = mysqli_fetch_assoc($q)){

         //tekink debugging
        // echo '<pre';
        // print_r($d);
        // echo '</pre>';
        // exit;
        // echo '<br>barang zzz';
    
        echo "
        <div class=card>
            <div>$d[nama_barang]</div>
            <img src='img/$d[gambar]' class='gambar'>
            <div>$d[harga_jual]</div>
            <a href='order.php?kode_barang=$d[kode_barang]'>
                <button>BELI</button>
            </a>
            <button>HAPUS</button>
            <button>EDIT</button>
            <br>
        </div>
        ";
        // tambah barang
        echo "
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


    }
}else{
    echo 'barang kosong';
}
