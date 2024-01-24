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
<?php $page = "House Details"; ?>
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
    <?php
                   #Get user Id 
                   $house_id=$_GET['house'];
        
                   $sql = "CALL ManageHouse('get_by_house_id','$house_id', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";
                                    
                                      $result = mysqli_query($mysqli, $sql);
                                      // Fetch all rows and store them as objects
                                      while ($house_details = $result->fetch_object()) {
                                         // Check if there are multiple result sets
                    if (mysqli_more_results($mysqli)) {
                        // Move to the next result set
                        mysqli_next_result($mysqli);
                      }
                    
                  
                                      ?>
    <main class="main-content w-full px-[var(--margin-x)]">
        <div class="grid grid-cols-12 lg:gap-6">
          <div class="col-span-12 pt-6 lg:col-span-8 lg:pb-6">
            <div class="card p-4 lg:p-6">
              <!-- Author -->
              <div>
                <div class="flex items-center justify-between">
                  <div class="flex items-center space-x-3">
                    <div x-data="usePopper({
                       offset: 12,
                       placement: 'bottom',
                       modifiers: [
                          {name: 'preventOverflow', options: {padding: 10}}
                       ]                     
                    })" class="flex" @mouseleave="isShowPopper = false" @mouseenter="isShowPopper = true">
                      <div x-ref="popperRef" class="avatar h-12 w-12">
                        <img class="mask is-squircle" src="../Public/Dashboard/images/avatar/default.png" alt="avatar">
                      </div>
                      <div x-ref="popperRoot" class="popper-root" :class="isShowPopper &amp;&amp; 'show'" style="position: fixed; inset: 0px auto auto 0px; margin: 0px; transform: translate(96px, -384px);" data-popper-placement="bottom" data-popper-reference-hidden="" data-popper-escaped="">
                       
                      </div>
                    </div>
                    <div>
                      <a href="#" class="font-medium text-slate-700 line-clamp-1 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">
                        <?php echo $house_details->user_name ?>
                      </a>
                      
                    </div>
                  </div>
                </div>
                
              </div>

              <!-- Blog Post -->
              <div class="mt-6 font-inter text-base text-slate-600 dark:text-navy-200">
                <h1 class="text-xl font-medium text-slate-900 dark:text-navy-50 lg:text-2xl">
                <?php echo $house_details->house_no ?> <?php echo $house_details->house_title ?>
                </h1>
              
                <img class="mt-5 h-80 w-full rounded-lg object-cover object-center" src="../Public/Dashboard/images/house/<?php echo $house_details->house_image ?>" alt="image">
                
                <br>
                <div class="mt-1">
                <a href="#" class="text-lg font-medium text-slate-700 hover:text-info focus:text-info dark:text-navy-100 dark:hover:text-accent-info dark:focus:text-accent-info">House Type:<?php echo $house_details->house_type ?></a>
              </div>
                <p class="mt-1">
                <?php echo $house_details->house_description ?>
                </p>
             
              </div>

              <!-- Footer Blog Post -->
              <div class="mt-5 flex space-x-3">
                <button class="btn space-x-2 rounded-full border border-slate-300 px-4 text-xs+ font-medium text-slate-700 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-100 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                <svg version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="34px" height="34px" viewBox="0 0 32.00 32.00" xml:space="preserve" fill="#000000" stroke="#000000" stroke-width="0.576"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .puchipuchi_een{fill:#1c71d8;} </style> <path class="puchipuchi_een" d="M7,6c0-2.757,2.243-5,5-5s5,2.243,5,5c0,1.627-0.793,3.061-2,3.974V6c0-1.654-1.346-3-3-3 S9,4.346,9,6v3.974C7.793,9.061,7,7.627,7,6z M24,13c-1.104,0-2,0.896-2,2v-1c0-1.104-0.896-2-2-2s-2,0.896-2,2v-1 c0-1.104-0.896-2-2-2s-2,0.896-2,2V6c0-1.104-0.896-2-2-2s-2,0.896-2,2v10.277C9.705,16.106,9.366,16,9,16c-1.104,0-2,0.896-2,2v3 c0,0.454,0.155,0.895,0.438,1.249L11,28h12l2.293-3.293C25.682,24.318,26,23.55,26,23v-8C26,13.896,25.104,13,24,13z M11,29v1 c0,0.552,0.447,1,1,1h10c0.553,0,1-0.448,1-1v-1H11z"></path> </g></svg>

                  <span>Book Now</span>
                </button>
                
              </div>
            </div>
          </div>
          <div class="col-span-12 py-6 lg:fixed-top lg:bottom-0 lg:col-span-4 lg:self-start">
            <div class="card">
              <div class="h-24 rounded-t-lg bg-primary dark:bg-accent">
                <img class="h-full w-full rounded-t-lg object-cover object-center" src="../Public/Dashboard/images/avatar/Default_cover/cover.jpeg" alt="image">
              </div>
              <div class="px-4 pt-2 pb-5 sm:px-5">
                <div class="avatar -mt-12 h-20 w-20">
                  <img class="rounded-full border-2 border-white dark:border-navy-700" src="../Public/Dashboard/images/avatar/default.png" alt="avatar">
                </div>
                <h3 class="pt-2 text-lg font-medium text-slate-700 dark:text-navy-100">
                <?php echo $house_details->user_name ?>
                </h3>
                <h5 class="pt-2 text-lg font-medium text-slate-700 dark:text-navy-100">
               Since: 
               <?php echo date('d-M-Y',strtotime($house_details->user_created_at)); ?>
                </h5>
                <?php
                #Get House Owner Id
                $user_id= $house_details->user_id;
                $query = "SELECT CountHouses($user_id,'All') AS total";
                $results = mysqli_query($mysqli, $query);
                if ($house = mysqli_fetch_object($results)) {
                    $total = $house->total;
                    // Check if there are multiple result sets
                    if (mysqli_more_results($mysqli)) {
                      // Move to the next result set
                      mysqli_next_result($mysqli);
                    }
                  
                    $results->free();
                  }

                ?>
                <p class="text-dark">
                  Number of House(s) : <?php echo $total ?>
                </p>
            
              </div>
            </div>
            </div>
          </div>
        </div>
      </main>
<?php } ?>
  </div>

  <div id="x-teleport-target"></div>
  <?php include('../Partial/dashoard/script.php'); ?>
</body>

</html>