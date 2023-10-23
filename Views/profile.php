<?php
session_start();

include('../Config/codeGen.php');
include('../Config/config.php');
include('../Helpers/auth.php');
include('../Helpers/users_management.php');

$user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
$query = "CALL GetUserByID('$user_id'); ";
$results = mysqli_query($mysqli, $query);
if ($user = mysqli_fetch_object($results)) {
  $user_name = $user->user_name;
  $user_type = $user->user_type;
  $user_email = $user->user_email;
  $user_phone_no = $user->user_phone_no;
  $user_location = $user->user_location;

  #Make Global variable
  global $user_id;
  global $user_name;
  global $user_email;
  global $user_phone_no;
  global $user_location;
  global $user_type;

  // Check if there are multiple result sets
  if (mysqli_more_results($mysqli)) {
    // Move to the next result set
    mysqli_next_result($mysqli);
  }

  $results->free();
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
      <!-- Main Content Wrapper -->
      <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
          <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            Profile
          </h2>
          <div class="hidden h-full py-1 sm:flex">
            <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
          </div>
          <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
            <li class="flex items-center space-x-2">
              <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent" href="#">Settings</a>
              <svg x-ignore="" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
              </svg>
            </li>
            <li><?php echo $user_name ?></li>
          </ul>
        </div>

        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
          <div class="col-span-12 lg:col-span-4">
            <div class="card p-4 sm:p-5">
              <div class="flex items-center space-x-4">
                <div class="avatar h-14 w-14">
                  <img class="rounded-full" src="../Public/Dashboard/images/avatar/default.png" alt="avatar">
                </div>
                <div>
                  <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                    <?php echo $user_name ?>
                  </h3>
                  <p class="text-xs+"><?php echo $user_type ?></p>
                </div>
              </div>
              <ul class="mt-6 space-y-1.5 font-inter font-medium">
                <li>
                  <a class="flex items-center space-x-2 rounded-lg bg-primary px-4 py-2.5 tracking-wide text-white outline-none transition-all dark:bg-accent" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Account</span>
                  </a>
                </li>

                <li>
                  <a class="group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    <span>Password Management</span>
                  </a>
                </li>


              </ul>
            </div>
          </div>
          <div class="col-span-12 lg:col-span-8">
            <div class="card">
              <form method="post">
                <div class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 dark:border-navy-500 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5">
                  <h2 class="text-lg font-medium tracking-wide text-slate-700 dark:text-navy-100">
                    Account Setting
                  </h2>
                  <div class="flex justify-center space-x-2">
                    
                    <button type="submit" name="edit_user" class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                      Save
                    </button>
                  </div>
                </div>
                <div class="p-4 sm:p-5">
                  <div class="flex flex-col">

                    <div class="avatar mt-1.5 h-20 w-20">
                      <img class="mask is-squircle" src="../Public/Dashboard/images/avatar/default.png" alt="avatar">

                    </div>
                  </div>
                  <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
                  <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <label class="block">
                      <span>Full name </span>
                      <span class="relative mt-1.5 flex">
                        <input class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="user_id" value="<?php echo $user_id ?>" type="hidden">
                        <input class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="user_type" value="<?php echo $user_type ?>" type="hidden">
                        <input class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="user_name" value="<?php echo $user_name ?>" type="text">
                        <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                          <i class="fa-regular fa-user text-base"></i>
                        </span>
                      </span>
                    </label>
                    <label class="block">
                      <span>Email Address </span>
                      <span class="relative mt-1.5 flex">
                        <input class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="user_email" value="<?php echo $user_email ?>" type="email">
                        <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                          <i class="fa-regular fa-envelope text-base"></i>
                        </span>
                      </span>
                    </label>
                    <label class="block">
                      <span>Phone Number</span>
                      <span class="relative mt-1.5 flex">
                        <input class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="user_phone_no" value="<?php echo $user_phone_no ?>" type="text">
                        <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                          <i class="fa fa-phone"></i>
                        </span>
                      </span>
                    </label>
                    <label class="block">
                      <span>City </span>
                      <span class="relative mt-1.5 flex">
                        <input class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="user_location" value="<?php echo $user_location ?>" type="text">
                        <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                          <i class="fa-regular fa-city text-base"></i>
                        </span>
                      </span>
                    </label>


                  </div>
                </div>
              </form>
            </div>

          </div>
        </div>
      </main>
    </div>

    <div id="x-teleport-target"></div>
    <?php include('../Partial/dashoard/script.php'); ?>
   


    <?php } ?>
  </body>


  </html>