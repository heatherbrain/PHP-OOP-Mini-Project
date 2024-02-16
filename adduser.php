<?php
// jalankan init.php (untuk session_start dan autoloader)
require 'init.php';

// buat object barang yang akan dipakai untuk proses input
$user = new User();

if (!empty($_POST)) {
  // jika terdeteksi form di submit, jalankan proses validasi
  $pesanError = $user->validasiInsert($_POST);
  if (empty($pesanError)) {
    // jika tidak ada error, proses insert barang
    $user->insert();
    header('Location:tableuser.php');
  }
}

// include head
include 'template/navbar.php'
?>

  <div class="container">
    <div class="row">
      <div class="col-6 py-4">
      <a href="adduser.php" class="p-2 flex justify-start items-start text-xl h-[50px] text-gray-500 font-bold rounded-[7px] dark:focus:ring-gray-800">Tambah Pengguna</a>


      <?php
        // jika ada error, tampilkan pesan error
        if (!empty($pesanError)):
      ?>

      <div id="">
        <div class="bg-red-100 text-red-500 w-[300px] p-3 mb-3">
          <div>
            <ul>
            <?php
             foreach ($pesanError as $pesan) {
               echo "<li>~$pesan</li>";
             }
            ?>
            </ul>
          </div>
        </div>
      </div>

      <?php
        endif;
      ?>

      <!-- Form untuk proses insert -->
        <form method="post" class="p-2">
          <div>
            <label for="username">Username</label>
            <br>
            <input type="text" 
            name="username" id="username" class="w-[250px] h-[30px]"
            value="<?php echo $user->getItem('username'); ?>">
          </div>
          <div class="mb-3">
            <label for="email">Email</label>
            <br>
            <input type="text" 
            name="email" id="email" class="w-[250px] h-[30px]"
            value="<?php echo $user->getItem('email'); ?>">
          </div>
          <div>
            <label for="password">Password</label>
            <br>
            <input type="password" 
            name="password" id="password" class="w-[250px] h-[30px]"
            value="<?php echo $user->getItem('password'); ?>">
          </div>
          <input type="submit" value="Add" class=" text-white bg-gray-500 mt-5 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
          <a href="tableuser.php" class=" text-white bg-gray-500 mt-5 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Cancel</a>
        </form>

      </div>
    </div>
  </div>

<?php
// include footer
include 'template/footer.php';
?>
