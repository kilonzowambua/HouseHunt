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
                  <div class="avatar h-8 w-8">
                    <img class="rounded-full" src="../Public/Dashboard/images/avatar/default.png" alt="avatar" />
                  </div>
                  <span class="line-clamp-1"><?php echo $house->user_name ?></span>
                </a>
                <div class="mx-2 my-1 w-px self-stretch bg-slate-200 dark:bg-navy-500"></div>
                <svg fill="#1c71d8" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32px" height="32px" viewBox="0 0 300 300" enable-background="new 0 0 300 300" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M287.991,131.752L158.449,20.347c-4.861-4.175-12.036-4.175-16.897,0L12.009,131.752 c-5.424,4.667-6.042,12.846-1.379,18.271c4.676,5.421,12.852,6.036,18.27,1.376L150,47.257l121.1,104.141 c2.449,2.103,5.449,3.129,8.436,3.129c3.649,0,7.273-1.527,9.834-4.505C294.034,144.598,293.415,136.418,287.991,131.752z"></path> <path d="M150,137.043c-16.075,0-29.149,13.075-29.149,29.149c0,16.074,13.075,29.152,29.149,29.152s29.149-13.078,29.149-29.152 C179.149,150.118,166.075,137.043,150,137.043z"></path> <path d="M154.23,65.419c-2.437-2.093-6.024-2.093-8.461,0l-97.622,84.208c-1.423,1.228-2.245,3.018-2.245,4.901v121.781 c0,3.575,2.9,6.476,6.476,6.476h195.244c3.575,0,6.476-2.901,6.476-6.476V154.528c0-1.883-0.822-3.674-2.245-4.901L154.23,65.419z M155.103,259.241c-1.225,1.574-3.105,2.496-5.103,2.496s-3.878-0.921-5.103-2.496c-5.115-6.547-49.955-64.799-49.955-93.048 c0-30.362,24.702-55.058,55.058-55.058s55.058,24.696,55.058,55.058C205.058,194.442,160.217,252.694,155.103,259.241z"></path> </g> </g></svg> 
                 <span class="line-clamp-1"><div class="mx-2"><?php echo $house-> house_location ?></div></span>
              </div>
            </div>
            
            <div class="mt-1 flex justify-end">
              <a href="house_avaliable_details?house=<?php echo $house-> house_id ?>" class="btn px-2.5 py-1.5 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                View
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