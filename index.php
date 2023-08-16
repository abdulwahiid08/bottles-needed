<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Bootstrap CDN -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

   <title>Test Case Soal 3 | PT. Garuda Cyber Security</title>
</head>

<body>
   <div class="container mt-5">
      <div class="title-form">
         <h1>Mencari Total Botol paling sedikit</h1>
      </div>
      <div class="row">
         <div class="col-md-4">
            <form action="" method="post" class="mb-3">
               <div class="form-group">
                  <label for="jmlAir">Targer Kapasitas (Liter)</label>
                  <input type="text" class="form-control" id="jmlAir" name="jmlAir" placeholder="masukkan target kapasitas">
               </div>
               <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
            <?php
            // Pencarian bilangan prima
            function bilanganPrima($num)
            {
               if ($num <= 1) {
                  return false;
               }
               if ($num <= 3) {
                  return true;
               }
               if ($num % 2 == 0 || $num % 3 == 0) {
                  return false;
               }
               $i = 5;
               while ($i * $i <= $num) {
                  if ($num % $i == 0 || $num % ($i + 2) == 0) {
                     return false;
                  }
                  $i += 6;
               }
               return true;
            }

            // Hitung Botol
            function hitungBotol($x)
            {
               $kapasistasBotol = [];

               // Menampung kapasistas botol berdasarkan bilangan prima
               for ($i = 0; $i < 30; $i++) {
                  if (bilanganPrima($i)) {
                     $kapasistasBotol[] = $i;
                  }
               }

               $jumlahBotol = array_fill(0, count($kapasistasBotol), 0);

               for ($i = count($kapasistasBotol) - 1; $i >= 0; $i--) {
                  while ($x >= $kapasistasBotol[$i]) {
                     $x -= $kapasistasBotol[$i];
                     $jumlahBotol[$i]++;
                  }
               }

               return array($kapasistasBotol, $jumlahBotol);
            }

            // Cek submit itu ada atau tidak
            if (isset($_POST['submit'])) {
               $targetKapasitas = $_POST['jmlAir'];

               list($kapasistasBotol, $jumlahBotol) = hitungBotol($targetKapasitas);

               $totalBotol = 0;

               for ($i = 0; $i < count($jumlahBotol); $i++) {
                  echo "Botol " . ($i + 1) . " = " . $kapasistasBotol[$i] . " liter, Jumlah botol = " . $jumlahBotol[$i] . " botol" . '<br>';
                  $totalBotol += $jumlahBotol[$i];
               }

               echo "Jumlah total botol yang dibutuhkan: " . $totalBotol . " botol";
            }
            ?>
         </div>
      </div>
   </div>

   <!-- Script Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>