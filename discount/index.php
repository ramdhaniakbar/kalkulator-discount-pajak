<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <title>Kalkulator Discount</title>
</head>

<body>
   <div class="container mt-3">
      <h2 class="mb-3">Kalkulator Discount</h2>
      <div class="row">
         <div class="col-6">
            <div class="card">
               <div class="card-body">
                  <form action="index.php" method="POST">
                     <div class="mb-3">
                        <label for="inputHargaSemula" class="form-label">Harga Semula</label>
                        <input type="number" name="harga_semula" class="form-control" id="inputHargaSemula" value="<?php echo $_POST['harga_semula'] ?? ''; ?>" required>
                     </div>
                     <div class="mb-3">
                        <label for="inputDiscount" class="form-label">Besar Discount (%)</label>
                        <input type="number" min="1" max="100" name="discount" class="form-control" id="inputDiscount" value="<?php echo $_POST['discount'] ?? ''; ?>" required>
                     </div>
                     <button type="submit" name="hitung" class="btn btn-primary">Hitung</button>
                     <a href="index.php" class="btn btn-danger">Reset</a>
                  </form>
               </div>
            </div>
         </div>

         
         <div class="col-6">
            <div class="card">
               <div class="card-body">
                  <div class="mb-3">
                     <label class="form-label">Harga Semula : 
                        <?php 
                           if (isset($_POST['hitung'])) {
                           $harga_semula = $_POST['harga_semula'];
                           echo 'Rp ' .  number_format($harga_semula, 0,',','.');
                        }
                        ?>
                     </label>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Persentase Discount : 
                        <?php 
                           if (isset($_POST['hitung'])) {
                              $harga_semula = $_POST['harga_semula'];
                              $discount = $_POST['discount'];

                              $besar_discount = ($discount / 100) * $harga_semula;
                              $persentase_discount = ($besar_discount / $harga_semula) * 100;
                              echo $persentase_discount . '%';
                           }
                        ?>
                     </label>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Besar Discount : 
                        <?php
                           if (isset($_POST['hitung'])) {
                              $harga_semula = $_POST['harga_semula'];
                              $discount = $_POST['discount'];

                              $besar_discount = ($discount / 100) * $harga_semula;
                              echo 'Rp ' . number_format($besar_discount, 0,',','.');
                           }
                        ?>
                     </label>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Harga Setelah Discount : 
                        <?php 
                           if (isset($_POST['hitung'])) {
                              $harga_semula = $_POST['harga_semula'];
                              $discount = $_POST['discount'];

                              $besar_discount = ($discount / 100) * $harga_semula;
                              $harga_discount = $harga_semula - $besar_discount;
                              echo 'Rp ' . number_format($harga_discount, 0,',','.');
                           }
                        ?>
                     </label>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>