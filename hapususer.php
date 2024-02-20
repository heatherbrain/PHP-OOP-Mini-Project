<?php 
require 'init.php';

$user = new User();
$userDetail = $user->getItemById(Input::get('id'));

if(!empty($_POST)) {
    $user->delete(Input::get('id'));
    header('Location:tableuser.php');
}

include 'template/navbar.php';
?>

        <!-- modal penghapusan -->
        <div class="flex justify-center items-center">

            <div class="flex flex-col justify-center items-center gap-5 bg-white w-[500px] h-[500px]">
                <div>
                 <h1 class="border-b-[1px] border-gray-300 text-xl">Konfirmasi</h1>
                </div>
                <div>
                    <h1>Apakah anda yakin ingin menghapus <b><?= $userDetail->username; ?>?</b></h1>
                </div>
                <div class="flex gap-3">
                    <a href="tableuser.php" class="bg-green-500 text-center w-[50px] text-white font-semibold rounded-[7px]">Tidak</a>
    
                    <form method="post">
                        <input type="hidden" name="id"
                        value="<?php echo $user->getItem('id'); ?>">
                        <input type="submit" class="bg-red-500 w-[50px] text-white font-semibold rounded-[7px]" value="Ya">
                    </form>
                </div>
            </div>
        
        </div>