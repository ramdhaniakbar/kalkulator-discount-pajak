<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <title>Kalkulator Pajak</title>
</head>

<body>
   <div class="container mt-3">
      <h2 class="mb-3">Kalkulator Pajak</h2>
      <div class="row">
         <div class="col-8">
            <div class="card">
               <div class="card-body">
                  <?php 
                     if (isset($_POST['hitung'])) {
                        $nominal = $_POST['nominal'];
                        $operasi_pajak = $_POST['operasi_pajak'];
                        switch ($operasi_pajak) {
                           case 'PPn':
                              $total = ($nominal * 10 / 100) + $nominal;
                              break;
                           case 'UMKM':
                              $total = ($nominal * 10 / 100) + $nominal;
                              break;
                           case 'PPh':
                              $total = ($nominal * 2.5 / 100 ) + $nominal;
                              break;
                           case 'BPHTB':
                              $total = ($nominal * 5 / 100) + $nominal;
                              break;
                        }
                     }
                  ?>
                  <form action="index.php" method="POST">
                     <div class="mb-3">
                        <label for="inputHargaSemula" class="form-label">Nominal</label>
                        <input type="number" name="nominal" class="form-control" id="inputHargaSemula" value="<?php echo $_POST['nominal'] ?? ''; ?>" required>
                     </div>
                     <div class="mb-3">
                        <label for="selectPajak" class="form-label">Pilih Pajak</label>
                        <select class="form-select" name="operasi_pajak">
                           <option value="PPn" <?php if (isset($_POST['operasi_pajak']) && $_POST['operasi_pajak'] == 'PPn') { ?> selected="true" <?php }; ?>>PPn</option>
                           <option value="UMKM" <?php if (isset($_POST['operasi_pajak']) && $_POST['operasi_pajak'] == 'UMKM') { ?> selected="true" <?php }; ?>>UMKM</option>
                           <option value="PPh" <?php if (isset($_POST['operasi_pajak']) && $_POST['operasi_pajak'] == 'PPh') { ?> selected="true" <?php }; ?>>PPh</option>
                           <option value="BPHTB" <?php if (isset($_POST['operasi_pajak']) && $_POST['operasi_pajak'] == 'BPHTB') { ?> selected="true" <?php }; ?>>BPHTB</option>
                        </select>
                     </div>
                     <button type="submit" name="hitung" class="btn btn-primary">Hitung</button>
                     <a href="index.php" class="btn btn-danger">Reset</a>
                     <div class="mt-3">
                        <?php if (isset($_POST['hitung'])) { ?>
                           <p>Jenis Pajak : <span class="fw-normal"><?= $operasi_pajak; ?></span></p>
                           <p class="fs-4">Total : <span class="fw-normal">Rp <?= number_format($total, 0,',','.') ?></span></p>
                        <?php } ?>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <div class="col-4">
            <div class="card">
               <div class="card-body">
                  <p>
                     <span class="fw-bolder">PPn : </span> Pajak yang harus dibayarkan oleh pembeli kepada penjual atas konsumsi/pembelian barang atau jasa, besar pajak 10%.
                  </p>
                  <p>
                     <span class="fw-bolder">UMKM : </span> Adalah pajak yang harus dibayarkan oleh pengusaha kecil atau menengah kepada pemerintah. Besar pajaknya adalah 10%.
                  </p>
                  <p>
                     <span class="fw-bolder">PPh : </span> Pemungutan Pajak Penghasilan, besar pajak 2,5%.
                  </p>
                  <p>
                     <span class="fw-bolder">BPHTB : </span> Bea Perolehan Hak atas Tanah dan Bangunan, besar pajak yang harus dibayar adalah 5%
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>