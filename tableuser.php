<?php   
require 'init.php';

$user = new User();
$user->cekUserSession();

$DB = DB::getInstance();

$search = Input::get('search');
if (!empty($search)) {
    $search = '%' . $search . '%';
    $tableuser = $DB->getLike('user', 'username', $search);
} else {
    $tableuser = $DB->get('user');
}
include('template/navbar.php');
?>

<div class="flex flex-col justify-center">
    <div class="row">
      <div class="col-12">

      <!-- form pencarian -->

<form method="GET">   
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0  0  20  20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19  19-4-4m0-7A7  7  0  1  1  1  8a7  7  0  0  1  14  0Z"/>
            </svg>

        </div>
        
        <input type="search" name="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Username" required>
        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Search</button>
    </div>
</form>


      <!-- tabel user -->
      <?php  
      if (!empty($tableuser)) :
      ?>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No.
                </th>
                <th scope="col" class="px-6 py-3">
                    Username
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php  
            foreach ($tableuser as $user) {
                 echo "<tr class=\"odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700\">";
                 echo "<th scope=\"row\" class=\"px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white\">{$user->id}</th>";
                 echo "<td class=\"px-6 py-4\">{$user->username}</td>";
                 echo "<td class=\"px-6 py-4\">{$user->email}</td>";
                 echo "<td class=\"px-6 py-4 gap-2 flex\">";
                 echo "<a href=\"edituser.php?id={$user->id}\" class=\"font-medium text-blue-600 dark:text-blue-500 hover:underline\">Edit</a>";
                 echo "<a href=\"hapususer.php?id={$user->id}\" class=\"font-medium text-red-600 dark:text-red-500 hover:underline\">Hapus</a>";
                 echo "</td>";
            }
            ?>
      </tbody>
    </table>
</div>

<?php  
endif;
?>
      </div>
    </div>
<a href="adduser.php" class="p-2 w-[150px] flex justify-center items-center text-sm h-[40px] ml-5 mt-5 text-white bg-gray-500 font-semibold rounded-[7px] dark:hover:bg-gray-600 dark:focus:ring-gray-800">Tambah Pengguna</a>
</div>

<?php  
include('./template/footer.php');
?>
