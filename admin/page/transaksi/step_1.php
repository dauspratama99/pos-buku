<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sales / Penjualan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
                        <li class="breadcrumb-item active">Sales</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="container-fluid">
        <form action="" method="POST">

            <?php

            if (isset($_POST['addcart'])) {

                $barcode = $_POST['barcode'];
                $judul = $_POST['judul'];
                $harga = $_POST['harga'];
                $qty = $_POST['qty'];
                $total1 = $_POST['total1'];

                $simpan = $koneksi->query("INSERT INTO tb_temp (kode_temp, nama_temp, harga_temp,
                    qty_temp, total_temp)
                    VALUES ('$barcode','$judul','$harga','$qty',' $total1')");

                if ($simpan == True) {
                    echo "<script>
                    toastr.success('Sucess Add to Cart')
                    setInterval(function(){
                        window.location='?page=page/transaksi/step_1'
                    },3000)
                   
                    </script>";
                } else {
                    echo "<script>
                    toastr.error('Failed Add to Cart')

                    setInterval(function(){
                        window.location='?page=page/transaksi/step_1'
                    },3000)
                    </script>";
                }
            }

            ?>

            <?php
            
                if(isset($_POST['payment'])){
                    
                    $invoice = $_POST['invoice'];
                    $tanggal = $_POST['tanggal'];
                    $totalharga = $_POST['totalharga'];

                    $simpanPenjualan = $koneksi->query("INSERT INTO tb_penjualan (nota_penjualan,           tanggal_penjualan, total_penjualan) VALUES ('$invoice','$tanggal','$totalharga')");
                    
                        if($simpanPenjualan == True){

                            $dataTemp = mysqli_query($koneksi,"SELECT * FROM tb_temp ORDER BY kode_temp ASC");

                            // var_dump($dataTemp);
                            
                            while($data = $dataTemp->fetch_array()){
                                // var_dump($data);
                                
                              mysqli_query($koneksi,"INSERT INTO tb_penjualandetail (nota_detail,kode_detail,nama_detail,harga_detail,qty_detail,total_detail) VALUES ('$invoice','$data[kode_temp]','$data[nama_temp]','$data[harga_temp]','$data[qty_temp]','$data[total_temp]')");
                                
                              mysqli_query($koneksi,"UPDATE tb_buku SET jumlah_buku = jumlah_buku-$data[qty_temp] WHERE kode_buku='$data[kode_temp]'");
                            }
                        }
                    
                        $hapusTemp = $koneksi->query("DELETE FROM tb_temp");
                    
                        if($hapusTemp == True){
                            echo"<script>
                                alert('Transaksi Berhasil')
                                window.location='?page=page/transaksi/index'
                            </script>";
                        }else{
                            echo"<script>
                                alert('Transaksi Gagal')
                                window.location='?page=page/transaksi/step_1'
                            </script>";
                        }
                }
            ?>

           
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                       
                        <div class="col-lg-4 col-6">
                            <div class="small-box box-outline box-success">
                                <div class="inner">
                                </div>
                                <div class="card-body ">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">Kode Buku</label>
                                        <div class="input-group col-sm-8">
                                            <input type="text" class="form-control" name="barcode" id="barcode" placeholder="Kode" readonly>
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-sm btn-info" data-target="#tambah" data-toggle="modal"> <i class="fas fa-search"></i> </button>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" class="form-control" name="judul" id="judul" placeholder="">
                                    <input type="hidden" class="form-control" name="harga" id="harga" placeholder="">

                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Quantity</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="qty" id="qty" placeholder="" x>
                                        </div>
                                    </div>

                                    <input type="hidden" class="form-control" name="total1" id="total1" placeholder="">

                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-9 col-form-label"></label>
                                        <div class="col-sm-3">
                                            <button type="submit" name="addcart" class="btn btn-warning">Add <i class="fas fa-cart-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                            $tgl = date('Y-m-d');
                            $nota = $koneksi->query("SELECT * FROM tb_penjualan ORDER BY nota_penjualan DESC LIMIT 1");
                            $no = $nota->fetch_assoc();
                            $angka = $no['nota_penjualan']+1; 
                        ?>
                        <div class="col-lg-4 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Date</label>
                                        <div class="col-sm-9">
                                            <input type="text" readonly class="form-control" name="tanggal" value="<?php echo $tgl; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-3 col-form-label">Kasir</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="kasir" value="<?= $_SESSION['admin']['username'] ?>" readonly>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Invoice</label>
                                        <div class="col-sm-9">
                                          <input type="text" readonly class="form-control" name="invoice" id="invoice" value="<?php echo $angka; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <label for="" class="col-sm-12 col-form-label" style="color: red; text-align:right;">
                                                <h1></h1>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-striped" id="">
                                <thead class="table table-success">
                                    <tr>
                                        <!-- <th>#</th> -->
                                        <th>Barcode</th>
                                        <th>Product Item</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $harga = 0;
                                    $temp = $koneksi->query("SELECT * FROM tb_temp ORDER BY kode_temp ASC");
                                    while ($data = $temp->fetch_assoc()) { 
                                        $harga += $data["total_temp"];
                                        ?>
                                        <tr>
                                           
                                            <td><?= $data["kode_temp"] ?></td>
                                            <td><?= $data["nama_temp"] ?></td>
                                            <td>Rp. <?= number_format($data["harga_temp"]) ?></td>
                                            <td><?= $data["qty_temp"] ?></td>
                                            <td>Rp. <?= number_format($data["total_temp"]) ?></td>
                                            <td>
                                                <a href="?page=page/transaksi/hapus_temp&idhapus=<?= $data["kode_temp"] ?>" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-5">
                            <div class="small-box">
                                <div class="inner">
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Total Belanja</label>
                                        <div class="col-sm-9">
                                            <input type="text" readonly class="form-control" name="totalbawah" id="totalbawah" value="Rp.<?= number_format($harga) ?>">
                                            <input type="hidden" name="totalharga" id="totalharga" value="<?= $harga ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <input type="hidden" class="form-control" name="kasir_t" placeholder="" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="small-box">
                                <div class="inner">
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Uang Bayar</label>
                                        <div class="col-sm-9">
                                            <input type="text" onkeyup="kembalian()" class="form-control" id="bayar" value="">
                                            <input type="hidden" name="bayar" id="bayar1">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-3 col-form-label">Uang Kembali</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="kembali" placeholder="" readonly>
                                            <input type="hidden" name="kembali" value="kembali1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="small-box">
                                <div class="inner">
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <button type="submit" class="btn btn-success form-control" name="payment"> <i class="fas fa-cash-register"></i> Process Payment</button>
                                    </div>
                                    <div class="form-group row">
                                        <button type="reset" class="btn btn-secondary form-control"><i class="fas fa-ban"></i> Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>

        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Data Buku</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <table class="table table-striped" id="example1">
                            <thead>
                                <th>No</th>
                                <th>ISBN / Kode</th>
                                <th>Judul</th>
                                <th>Penggarang</th>
                                <th>Penerbit</th>
                                <th>Tahun</th>
                                <th>Jumlah Stok</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $tampil_Buku = $koneksi->query("SELECT * FROM tb_buku ORDER BY id_buku ASC");
                                while ($data = $tampil_Buku->fetch_assoc()) { ?>
                                    <tr>
                                        <td> <?= $no++; ?> </td>
                                        <td><?= $data["kode_buku"]; ?></td>
                                        <td><?= $data["judul_buku"]; ?></td>
                                        <td><?= $data["penggarang_buku"]; ?></td>
                                        <td><?= $data["penerbit_buku"]; ?></td>
                                        <td><?= $data["tahun_buku"]; ?></td>
                                        <td><?= $data["jumlah_buku"]; ?></td>
                                        <td>Rp. <?= number_format($data["harga_buku"]);  ?></td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" onclick="pilihbuku('<?= $data['kode_buku']; ?>','<?= $data['judul_buku']; ?>','<?= $data['harga_buku']; ?>',)">
                                                <i class="fas fa-mouse-pointer"></i></button>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/4.1.0/autoNumeric.min.js" integrity="sha512-U0/lvRgEOjWpS5e0JqXK6psnAToLecl7pR+c7EEnndsVkWq3qGdqIGQGN2qxSjrRnCyBJhoaktKXTVceVG2fTw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    var bayar = new AutoNumeric('#bayar', {
                    currencySymbol : 'Rp.',
                    decimalCharacter : ',',
                    digitGroupSeparator : '.',
                });
    var kembali = new AutoNumeric('#kembali', {
                    currencySymbol : 'Rp.',
                    decimalCharacter : ',',
                    digitGroupSeparator : '.',
                });

    function kembalian()
    {
        $('#bayar1').val(bayar.getNumber())   
        var totalharga = $('#totalharga').val()

        var hasil =  bayar.getNumber() - parseInt(totalharga)
        kembali.set(hasil)
        $('#kembali1').val(hasil)

    }

    $(document).ready(function() {

        $('#qty').keyup(total);
        $('#example1').DataTable();
    });


    function pilihbuku(barcode, judul, harga) {
        $('#barcode').val(barcode);
        $('#judul').val(judul);
        $('#harga').val(harga);
        $('#tambah').modal('hide');
        $('.modal-backdrop').hide();
    }

    function total() {

        var qty = $('#qty').val();
        var harga = $('#harga').val();

        var hitung = qty * harga;

        $('#total1').val(hitung);
    }
</script>