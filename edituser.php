<?php 
require 'init.php';

// if(empty(input::get('id'))){
//     die ("Maaf halaman ini tidak bisa diakses langsung");
// }

$user = new User();
$user->generate(Input::get('id'));


if(!empty($_POST)){
    $pesanError = $user->validasi($_POST);
    if(empty($pesanError)) {
        $user->update($user->getItem('id'));
        header("Location:tableuser.php");
    }
}

include 'template/navbar.php';
?>

<!doctype html>

<div class="container">
    <div class="row">
      <div class="col-6 py-4">
      <a href="edituser.php" class="p-2 flex justify-start items-start text-xl h-[50px] text-gray-500 font-bold rounded-[7px] dark:focus:ring-gray-800">Edit Pengguna</a>


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

      <!-- Form untuk proses update -->
        <form method="post" class="p-2">
        <div>
            <label for="id">ID</label>
            <br>
            <input type="number" 
            disabled name="id" id="id" class="w-[250px] h-[30px]"
            value="<?php echo $user->getItem('id'); ?>" class="form-control">
            <small class="text-gray-300">ID user tidak bisa diubah</small>
          </div>
          <div>
            <label for="username">Username</label>
            <br>
            <input type="text" 
            name="username" id="username" class="w-[250px] h-[30px]"
            value="<?php echo $user->getItem('username'); ?>" class="form-control">
          </div>
          <div class="mb-3">
            <label for="email">Email</label>
            <br>
            <input type="text" 
            name="email" id="email" class="w-[250px] h-[30px]"
            value="<?php echo $user->getItem('email'); ?>" class="form-control">
          </div>
          <div>
            <label for="password">Password</label>
            <br>
            <input type="password" 
            name="password" id="password" class="w-[250px] h-[30px]"
            value="<?php echo $user->getItem('password'); ?>" class="form-control">
          </div>
          <input type="submit" value="Update" class=" text-white bg-gray-500 mt-5 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
          <a href="tableuser.php" class=" text-white bg-gray-500 mt-5 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Cancel</a>
        </form>

      </div>
    </div>
  </div>
