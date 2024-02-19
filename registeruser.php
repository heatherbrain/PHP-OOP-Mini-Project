<?php 
require 'init.php';
require 'class/User.php';
require_once 'class/DB.php';
require 'class/Validate.php';
require 'class/input.php';

$user = new User();

if(!empty($_POST)) {
    $pesanError = $user->validasi($_POST);
    if (empty($pesanError)) {
        $user->insert();
        header('Location:registerberhasil.php');
    }
}

include ('template/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User OOP</title>
</head>
<body>
    <div>
        <div>
            <h1 class="p-2 text-xl font-semibold"><a href="registeruser.php">Register User</a></h1>

            <?php
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

      <!-- form insert -->
      <form method="post">
        <div class="p-2">

          <div>
            <label for="username" class="">Username</label>
            <small>(Minimal 4 karakter huruf)</small>
            <br>
            <input type="text" class="border-[1px] border-gray-200 h-[25px] w-[300px]" name="username" id="username"
            value="<?php echo $user->getItem('username'); ?>">
          </div>
  
          <div>
            <label for="password" class="">Password</label>
            <small>(Minimal 4 karakter huruf dan harus terdapat angka)</small>
            <br>
            <input type="password" class="border-[1px] border-gray-200 h-[25px] w-[300px]" name="password" id="password">
          </div>

          <div>
            <label for="ulangipassword" class="">Ulangi Password</label>
            <br>
            <input type="password" class="border-[1px] w-[300px] h-[25px] border-gray-200" name="ulangipassword" id="ulangipassword">
          </div>

          <div>
            <label for="email" class="">Email</label>
            <br>
            <input type="email" class="border-[1px] border-gray-200 h-[25px] w-[300px]" name="email" id="email"
            value="<?php echo $user->getItem('email'); ?>">
          </div>
          <br>

          <div class="gap-5 items-center">
            <input type="submit" value="Daftar" class=" text-white bg-gray-500 mt-5 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
            <a href="login.php" class=" text-white items-center bg-gray-500 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Batal</a>
          </div>

        </div>

      </form>
        </div>
    </div>
</body>
</html>