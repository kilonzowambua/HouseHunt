<?php
session_start();

include('../Config/codeGen.php');
include('../Config/config.php');
include('../Helpers/auth.php');

$userID = $_SESSION['user_id'];

$query = "CALL GetUserByID('$userID'); ";
$results = mysqli_query($mysqli, $query);

if ($user = mysqli_fetch_object($results)) {
  $user_name = $user->user_name;
  $user_type = $user->user_type;
  // Check if there are multiple result sets
  if (mysqli_more_results($mysqli)) {
    // Move to the next result set
    mysqli_next_result($mysqli);
  }

  $results->free();
}
?>

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php $page = "Dashboard"; ?>
<?php include('../Partial/dashoard/head.php'); ?>



<body x-data class="is-header-blur" x-bind="$store.global.documentBody">
  <!-- App preloader-->
  <div class="app-preloader fixed z-50 grid h-full w-full place-content-center bg-slate-50 dark:bg-navy-900">
    <div class="app-preloader-inner relative inline-block h-48 w-48"></div>
  </div>

  <!-- Page Wrapper -->
  <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak>
    <!-- Sidebar -->
    <?php include('../Partial/dashoard/sidebar.php'); ?>

    <!-- App Header Wrapper-->
    <?php include('../Partial/dashoard/header.php'); ?>
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
      <div class="flex items-center justify-between py-5 lg:py-6">
        <div class="flex items-center space-x-1">
          <h2 class="text-xl font-medium text-slate-700 line-clamp-1 dark:text-navy-50 lg:text-2xl">
            Available Houses
          </h2>
         
        </div>
      </div>
      <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:gap-6">

      <?php
                   
 $sql = "CALL ManageHouse('get_available', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";
                  
                    $result = mysqli_query($mysqli, $sql);
                    // Fetch all rows and store them as objects
                    while ($house = $result->fetch_object()) {
                      
                    ?>
        <div class="card lg:flex-row">
          <img class="h-48 w-full shrink-0 rounded-t-lg bg-cover bg-center object-cover object-center lg:h-auto lg:w-48 lg:rounded-t-none lg:rounded-l-lg" src="../Public/Dashboard/images/house/<?php echo $house->house_image ?>" alt="image" />
          <div class="flex w-full grow flex-col px-4 py-3 sm:px-5">
          <div>
                <h1 class="text-lg font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light"><?php echo $house->house_title ?></h1>
              </div>
            <p class="mt-1 line-clamp-3">
            <?php echo $house->house_description ?>
            </p>
            <div class="grow">
              <div class="mt-2 flex items-center text-xs">
                <a href="#" class="flex items-center space-x-2 hover:text-slate-800 dark:hover:text-navy-100">
                  <div class="avatar h-6 w-6">
                    <img class="rounded-full" src="../Public/Dashboard/images/avatar/default.png" alt="avatar" />
                  </div>
                  <span class="line-clamp-1">John Doe</span>
                </a>
                <div class="mx-3 my-1 w-px self-stretch bg-slate-200 dark:bg-navy-500"></div>
                <span class="shrink-0 text-slate-400 dark:text-navy-300">June 23, 2021
                </span>
              </div>
            </div>
            <div class="mt-1 flex justify-middle">
           
            </div>
            <div class="mt-1 flex justify-end">
              <a href="pages-blog-details.html" class="btn px-2.5 py-1.5 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                READ ARTICLE
              </a>
            </div>
          </div>
        </div>
    <?php } ?>
      </div>
    </main>

  </div>

  <div id="x-teleport-target"></div>
  <?php include('../Partial/dashoard/script.php'); ?>
</body>

</html>