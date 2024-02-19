<?php 
require 'init.php';
require_once 'class/DB.php';
require 'class/Validate.php';
require 'class/Input.php';

$user = new User();
$user->cekUserSession();
$user->generate($_SESSION["username"]);


if(!empty($_POST)) {
  $pesanError = $user->validasiUbahPassword($_POST);
  if(empty($pesanError)) {
    $user->ubahPassword();
    header('Location:ubahpasswordberhasil.php');
  }
}

include 'template/navbar.php'
?>

<div>
    <div>

    <h1 class="p-2 text-xl text-center font-semibold"><a href="profile.php"><?php echo $_SESSION['username'] ?>'s Profile</a></h1>
    <p class="text-center">
     <?php echo $user->getItem('username')." (".$user->getItem('email').")"; ?>
    </p>
    <p class="text-xl font-semibold">
        <button type="button" data-bs-target="#formPassword">Ubah Password</button>
    </p>
            <div>
    
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

          <!-- proses update -->


        <form method="post" id="formPassword" class="<?php if(!empty($_POST)) {echo "show";} ?>">

        <div class="p-5">

          <div>
              <label for="passwordlama">Password Lama</label>
              <br>
              <input type="password" name="passwordlama" id="passwordlama">
          </div>
  
          <div>
              <label for="passwordbaru">Password Baru</label>
              <small>(Minimal 4 karakter huruf dan harus terdapat angka)</small>
              <br>
              <input type="password" name="passwordbaru" id="passwordbaru">
          </div>
              
          <div>
              <label for="ulangipasswordbaru">Ulangi Password Baru</label>
              <br>
              <input type="password" name="ulangipasswordbaru" id="ulangipasswordbaru">
          </div>
  
              <input type="submit" value="Update" type="submit" class="p-2 w-[150px] flex justify-center items-center text-sm h-[40px] ml-5 mt-5 text-white bg-gray-500 font-semibold rounded-[7px] dark:hover:bg-gray-600 dark:focus:ring-gray-800">

        </div>

        </form>
    </div>
</div>

<?php  
include('./template/footer.php');
?>
