<?php
session_start();

include('../Config/codeGen.php');
include('../Config/config.php');
include('../Helpers/auth.php');
include('../Helpers/analysis.php');
$userID = mysqli_real_escape_string($mysqli,$_SESSION['user_id']);

?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php $page="Dashboard"; ?>
<?php include('../Partial/dashoard/head.php'); 


$query = "CALL GetUserByID('$userID'); ";
$results=mysqli_query($mysqli,$query);
  if ($user=mysqli_fetch_object($results)) {
    $user_name=$user->user_name;
    $user_type=$user->user_type;
    
    #Make Global variable
    Global $user_name;
    Global $user_type;
  
    
?>

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


  

    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
      <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
        <div class="col-span-12 lg:col-span-8 xl:col-span-9">
          <div :class="$store.breakpoints.smAndUp && 'via-blue-300'" class="card mt-12 bg-gradient-to-l from-pink-300 to-indigo-400 p-5 sm:mt-0 sm:flex-row">
            <div class="flex justify-center sm:order-last">
              <img class="-mt-16 h-40 sm:mt-0" src="images/illustrations/teacher.svg" alt="" />
            </div>
            <div class="mt-2 flex-1 pt-2 text-center text-white sm:mt-0 sm:text-left">
              <h3 class="text-xl">
                Welcome Back, <span class="font-semibold"><?php echo$user_name ?></span>
              </h3>
              <p class="mt-2 leading-relaxed">
                Your have logged as 
                <span class="font-semibold text-navy-700"><?php echo $user_type ?></span> 
              </p>
            

              <button class="btn mt-6 bg-slate-50 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80">
                View  Bookings
              </button>
            </div>
          </div>

        
          <div class="flex items-center justify-between py-3 px-4">
              <h2 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
              Overall Analytics
              </h2>
             
            </div>

            <div class="grid grid-cols-1 gap-y-4 pb-2 sm:grid-cols-3">
              
              <div class="flex flex-col justify-between border-4 border-transparent border-l-info px-4">
                <div>
                  <p class="text-base font-medium text-slate-600 dark:text-navy-100">
                    Users
                  </p>
                  
                  <h2 class="text-base font-medium text-slate-600 dark:text-navy-100">
                    House Owners : <?php echo $user_owners->total ?>
                  </h2>
                  
                
                  <h2 class="text-base font-medium text-slate-600 dark:text-navy-100">
                    House Seeks : <?php echo $user_seekers->total ?>
                  </h2>
                </div>
                <div>
                  <div class="mt-2">
                    <p class="font-inter">
                      <span class="text-2xl font-medium text-slate-600 dark:text-navy-100">Total : <?php  echo $total= $user_owners->total + $user_seekers->total ?></span>
                    </p>
                  
                  </div>
                 
                </div>
              </div>
       
              <div class="flex flex-col justify-between border-4 border-transparent border-l-secondary px-4">
                <div>
                  <p class="text-base font-medium text-slate-600 dark:text-navy-100">
                    Houses
                  </p>
                  <h2 class="text-base font-medium text-slate-600 dark:text-navy-100">
                    House Available : <?php echo  $available_house->total ?>
                  </h2>
                  <h2 class="text-base font-medium text-slate-600 dark:text-navy-100">
                    House Occupied : <?php echo  $occupied_house->total ?>
                  </h2>
                </div>
                <div>
                  <div class="mt-2">
                    <p class="font-inter">
                      <span class="text-2xl font-medium text-slate-600 dark:text-navy-100">Total:<?php echo $total= $available_house->total + $occupied_house->total ?> </span><span class="text-xs"></span>
                    </p>
                  
                  </div>
                 
                </div>
              </div>
              <div class="flex flex-col justify-between border-4 border-transparent border-l-warning px-4">
                <div>
                  <p class="text-base font-medium text-slate-600 dark:text-navy-100">
                    Bookings
                  </p>
                  <h2 class="text-base font-medium text-slate-600 dark:text-navy-100">
                    Concelled : <?php echo $cancelled_booking->total ?>
                  </h2>
                  <h2 class="text-base font-medium text-slate-600 dark:text-navy-100">
                    Completed : <?php echo $completed_booking->total ?>
                  </h2>
                </div>
                <div>
                  <div class="mt-2">
                    <p class="font-inter">
                      <span class="text-2xl font-medium text-slate-600 dark:text-navy-100">Total : <?php echo $total=$cancelled_booking->total+$completed_booking->total ?></span><span class="text-xs"></span>
                    </p>
                  
                  </div>
                 
                </div>
              </div>
            </div>
          

        
        </div>
        <div class="col-span-12 lg:col-span-4 xl:col-span-3">
          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-1 lg:gap-6">
            <div class="sm:col-span-2 lg:col-span-1">
              <div class="flex h-8 items-center justify-between">
                <h2 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                  Top House Owners
                </h2>
                <a href="#" class="border-b border-dotted border-current pb-0.5 text-xs+ font-medium text-primary outline-none transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">View All</a>
              </div>
              <div class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-x-5 lg:grid-cols-1">
                <?php

                 $query="CALL GetHouseOwners('5')";
                $results1=mysqli_query($mysqli2,$query);
                if($house_onwers=mysqli_fetch_object($results1)){
                ?>
                <div class="card p-3">
                  <div class="flex items-center justify-between space-x-2">
                    <div class="flex items-center space-x-3">
                      <div class="avatar h-10 w-10">
                        <img class="rounded-full" src="../Public/Dashboard/images/avatar/default.png" alt="avatar" />
                        <div class="absolute right-0 h-3 w-3 rounded-full border-2 border-white bg-primary dark:border-navy-700 dark:bg-accent"></div>
                      </div>
                      <div>
                        <p class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                       <?php echo $house_onwers->user_name;?>
                        </p>
                        <p class="mt-0.5 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                          No of Houses :  <?php echo $house_onwers->total_houses;?>
                        </p>
                      </div>
                    </div>
                   
                  </div>
                </div>
          <?php } }?>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>

  <div id="x-teleport-target"></div>
  <?php include('../Partial/dashoard/script.php'); ?>
</body>


</html>