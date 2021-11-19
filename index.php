<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'component/style.php'; ?>
</head>
<style>
  #bg {
    height: 100%;
    background-image: url("asset/img/bck1.jpg");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }

  /* #cari {
    margin-left: 5px;
    height: 50px;
    width: 100px;
    border-radius: 20px;
  } */

  #cari {
    width: 3000%;
    height: 50px;
    border-radius: 20px;
    text-align: left;
  }

  marquee {
    font-size: xx-large;
    animation: 2s linear infinite;
    color: blue;
  }
</style>

<body id="bg" onload="viewdata()">
  <!-- jQuery -->
  <script src="asset/plugins/jquery/jquery.min.js"></script>
 
  <!-- label marqeee -->
  <section style="margin-top:10px; margin-bottom:10px;">
    <div class="container py-3">
      <marquee id="blink" behavior="" direction="">SELAMAT DATANG DI TOKO KAMI</marquee>
    </div>
  </section>
  <!-- content -->
  <section style="margin-top:10px; margin-bottom:10px;">
    <div style="margin-left:20px; margin-right:20px">

      <div class="row">
        <div class="col-md-6 mx-auto">

         
            <div class="form-inline">
              <input type="text" id="cari" name="cari" class="form-control" placeholder="Pencarian">
              <!-- <button type="submit" id="cari" name="cari" class="btn btn-primary"><i style="width:40px; font-size:22px" class="fas fa-search"></i></button> -->
            </div>
         

        </div>
        <div style="margin-top:30px; margin-bottom:10px;" class="col-md-12">
          <div class="card card-outline card-primary">
            <div class="card-body">
              <div class="card-header">
                <h4>Hasil Pencarian</h4>
              </div>
              <table id="tabel1" class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>ISBN / Kode</th>
                    <th>Judul</th>
                    <th>Penggarang</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Jumlah Stok</th>
                    <th>Harga</th>
                  </tr>
                </thead>
                <tbody>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php include 'component/script.php'; ?>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <script>
      $(document).ready(function() {
        $('#example1').DataTable();
      });
    </script>
    

<script>
  function viewdata(){
    $.ajax({
      url : "cari.php",
      method : "GET",
      success : function(data){
        $('tbody').html(data);
      }
    });
  }

  $(document).ready(function(){
    $('#cari').keyup(function(){
      var cari = $('#cari').val();

      $.ajax({
        url : "cari.php",
        method : "POST",
        data : {cari : cari},
        success : function(data){
          $('tbody').html(data);
        }
      });

    });
  });
</script>