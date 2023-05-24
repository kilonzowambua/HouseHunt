<?php
include('../Config/codeGen.php');
include('../Config/config.php');
include('../Helpers/auth.php');

?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php $page = $_GET['page'] ?>
<?php include('../Partial/dashoard/head.php'); ?>

<body x-data class="is-header-blur" x-bind="$store.global.documentBody">
  <!-- App preloader-->
  <div class="app-preloader fixed z-50 grid h-full w-full place-content-center bg-slate-50 dark:bg-navy-900">
    <div class="app-preloader-inner relative inline-block h-48 w-48"></div>
  </div>

  <!-- Page Wrapper -->
  <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak>
    <div class="fixed top-0 hidden p-6 lg:block lg:px-12">
      <a href="#" class="flex items-center space-x-2">

        <p class="text-xl font-semibold uppercase text-slate-700 dark:text-navy-100">
          House Hunt
        </p>
      </a>
    </div>
    <div class="hidden w-full place-items-center lg:grid">
      <div class="w-full max-w-lg p-6">
        <img class="w-full" x-show="!$store.global.isDarkModeEnabled" src="../Public/Dashboard/images/illustrations/dashboard-meet.svg" alt="image" />
        <img class="w-full" x-show="$store.global.isDarkModeEnabled" src="../Public/Dashboard/images/illustrations/dashboard-meet-dark.svg" alt="image" />
      </div>
    </div>
    <main class="flex w-full flex-col items-center bg-white dark:bg-navy-700 lg:max-w-md">
      <div class="flex w-full max-w-sm grow flex-col justify-center p-5">
        <div class="text-center">
          
          <div class="mt-4">
            <h2 class="text-2xl font-semibold text-slate-600 dark:text-navy-100">
              Welcome To House Hunt
            </h2>
            <p class="text-slate-400 dark:text-navy-300">
              Please sign up to continue
            </p>
          </div>
        </div>

        <div class="mt-10 flex space-x-4">
          <button class="btn w-full space-x-3 border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
            <img class="h-5.5 w-5.5" src="../Public/Dashboard/images/logos/google.svg" alt="logo" />
            <span>Google</span>
          </button>
          <button class="btn w-full space-x-3 border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
            <img class="h-5.5 w-5.5" src="../Public/Dashboard/images/logos/github.svg" alt="logo" />
            <span>Github</span>
          </button>
        </div>

 
        <div class="my-7 flex items-center space-x-3">
          <div class="h-px flex-1 bg-slate-200 dark:bg-navy-500"></div>
          <p class="text-tiny+ uppercase">or sign up with email</p>

          <div class="h-px flex-1 bg-slate-200 dark:bg-navy-500"></div>
        </div>
        <form method="post">
        <div class="mt-4 space-y-4">
        
          <label class="relative flex">
            <input type="text" class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900" name="user_name"  />
            <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
            </span>
          </label>
          <label class="relative flex">
            <input type="email" class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900" name="user_email"  />
            <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
            </span>
          </label>
          <label class="relative flex">
            <input type="password"  class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900" name="user_password"  />
            <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
              </svg>
            </span>
          </label>
          <label class="relative flex">
            <input type="password"  class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900" name="user_password_confirmation"  type="password" />
            <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
              </svg>
            </span>
          </label>
         
        </div>
        <button type="submit" name="sign_up" class="btn mt-10 h-10 w-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
        Sign In
        </button>
        </form>
        <div class="mt-4 text-center text-xs+">
          <p class="line-clamp-1">
            <span>Already have an account? </span>
            <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent" href="pages-login-2.html">Sign In</a>
          </p>
        </div>
      </div>
    </main>
  </div>

  <!-- 
        This is a place for Alpine.js Teleport feature 
        @see https://alpinejs.dev/directives/teleport
      -->
  <div id="x-teleport-target"></div>
  <?php include('../Partial/dashoard/script.php'); ?>
</body>


</html>