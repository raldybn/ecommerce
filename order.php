 <h2>Order Barang</h2>

 <?php
 // koneksi
 include 'conn.php';
 include 'style.php';


 //ambil data dari URL
 
 $kode_barang = $_GET['kode_barang'] ?? die ('Page ini membutuhkan parameter kode barang.');

 include 'order-handler.php';

 $s = "SELECT * FROM tb_barang  WHERE 
 kode_barang = '$kode_barang'";

 $q = mysqli_query($cn, $s) or die(mysqli_error($cn));

 $d = mysqli_fetch_assoc($q);
 

echo "
        <form 
            method=post
            class='card form-order'>
            <div>$d[nama_barang]</div>
            <img src =' img/$d[gambar]' 
            class='gambar' />
            <div>$d[harga_jual]</div>

            <input 
            type=text 
                name= nama_pembeli
                placeholder='nama pembeli'
                required
                minlength=3
                maxlength=30
            >

            <input 
            type=text 
                name= nomor_whatsapp
                placeholder='Nomor WhatsApp'
                required
                minlength=10
                maxlength=16
            >

            <input 
                required
                type=number 
                min=1 
                max=999 
                name= jumlah_pesanan
                placeholder='Jumlah Pesanan'
                value=1
            >
            
            
                <button name=btn_order>ORDER VIA WHATSAPP</button>
            </a>
        </form>
";