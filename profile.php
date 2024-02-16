<?php 
require 'init.php';
require 'class/DB.php';
require 'class/Validate.php';
require 'class/Input.php';

$user = new User();
$user->cekUserSession();

// $user->generate($_SESSION['username']);

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

        <p>
            <button type="button" data-bs-target="#formPassword">Ubah Password</button>
        </p>

        <form method="post" id="formPassword" class="<?php if(!empty($_POST)) {echo "show";} ?>">

        <div>
            <label for="passwordlama">Password Lama</label>
            <input type="password" name="passwordlama" id="passwordlama">
        </div>

        <div>
            <label for="passwordbaru">Password Baru</label>
            <small>(Minimal 4 karakter huruf dan harus terdapat angka)</small>
            <input type="passwordbaru" name="passwordbaru" id="passwordbaru">
        </div>
            
        <div>
            <label for="ulangipasswordbaru">Ulangi Password Baru</label>
            <input type="password" name="ulangipasswordbaru">
        </div>

            <input type="submit" value="Update">

        </form>
    </div>
</div>