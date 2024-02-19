<?php 
require 'init.php';

$user = new User();

if(!empty($_POST)) {
    $pesanError = $user->validasiLogin($_POST);
    if (empty($pesanError)) {
        $user->login();
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
    <div class="bg-white flex-col flex justify-center items-center">
        <div class="p-10 items-center flex flex-col justify-center">
        <h1 class="p-2 text-xl text-center font-semibold bg-gray-800 text-white w-[400px] rounded-t-[7px]"><a href="login.php">Account Login</a></h1>
            <div class="bg-gray-100 shadow-md flex flex-col justify-center items-center h-[250px] w-[400px]">
    
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
          <form method="post" autocomplete="off">
            <div class="p-5">
    
            <br>
              <div class="p-3">
                <label for="username">Username</label>
                <br>
                <input type="text" class="border-[1px] border-gray-200 h-[25px] w-[300px]" name="username" id="username"
                value="<?php echo $user->getItem('username'); ?>">
              </div>
      
              <div class="p-3">
                <label for="password" class="">Password</label>
                <br>
                <input type="password" class="border-[1px] border-gray-200 h-[25px] w-[300px]" name="password" id="password">
              </div>
    
    
                <input type="submit" value="Login" class=" text-white w-[400px] bg-gray-500 mt-5 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
    
            </div>
    
          </form>
          <p class="p-2">
            <small>Belum terdaftar? silahkan <a href="registeruser.php" class="text-blue-700 underline">daftar</a> dulu</small>
          </p>
            </div>
        </div>
    </div>
</body>
</html>