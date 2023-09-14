<?php
session_start();

include('../Config/codeGen.php');
include('../Config/config.php');
include('../Helpers/auth.php');
$userID = mysqli_real_escape_string($mysqli,$_SESSION['user_id']);

?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php $page="Dashboard"; ?>
<?php include('../Partial/dashoard/head.php'); 

#Get Current Loged in  User

$query = "CALL GetUserByID($userID)";
$result = mysqli_query($mysqli, $query);

if ($result) {
    // Fetch the user data
    $user = mysqli_fetch_object($result);
    if ($user) {
      
      $user_name=$user->user_name;
      $user_type=$user->user_type;
      
      #Make Global variable
      Global $user_name;
      Global $user_type;

}}
?>

<body x-data class="is-header-blur" x-bind="$store.global.documentBody">
  <!-- App preloader-->
  <div class="app-preloader fixed z-50 grid h-full w-full place-content-center bg-slate-50 dark:bg-navy-900">
    <div class="app-preloader-inner relative inline-block h-48 w-48"></div>
  </div>

  <!-- Page Wrapper -->
  <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak>
    <!-- Sidebar -->
    <div class="sidebar print:hidden">
      <!-- Main Sidebar -->
      <div class="main-sidebar">
        <div class="flex h-full w-full flex-col items-center border-r border-slate-150 bg-white dark:border-navy-700 dark:bg-navy-800">
         

          <!-- Main Sections Links -->
          <div class="is-scrollbar-hidden flex grow flex-col space-y-4 overflow-y-auto pt-6">
            <!-- Dashobards -->
            <a href="dashboards-crm-analytics.html" class="flex h-11 w-11 items-center justify-center rounded-lg bg-primary/10 text-primary outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90" x-tooltip.placement.right="'Dashboards'">
            <svg height="151px" width="151px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#1c71d8;} </style> <g> <path class="st0" d="M491.896,264.561c-19.448-45.944-51.883-84.992-92.734-112.589C358.311,124.367,308.96,108.214,256,108.214 c-35.29,0-69,7.169-99.633,20.129C110.4,147.786,71.351,180.23,43.75,221.076C16.154,261.899,0,311.287,0,364.214 c0,4.427,0.109,8.814,0.331,13.185h80.202v-26.371H37.775c1.512-25.395,7.338-49.589,16.766-71.895 c9.315-22.04,22.174-42.25,37.819-59.903l30.234,30.242l18.656-18.661l-30.214-30.218c7.186-6.363,14.766-12.307,22.746-17.677 c31.508-21.274,68.754-34.501,109.033-36.896v42.734h26.37v-42.766c25.423,1.524,49.617,7.338,71.92,16.774 c22.044,9.315,42.258,22.17,59.903,37.814l-30.234,30.234l18.632,18.661l30.238-30.218c6.371,7.186,12.279,14.766,17.69,22.75 c21.266,31.509,34.5,68.758,36.891,109.024h-42.738v26.371h80.162c0.242-4.371,0.35-8.758,0.35-13.185 C512.025,328.931,504.838,295.222,491.896,264.561z"></path> <path class="st0" d="M329.375,199.471c-1.415-0.621-3.169,0.073-4.133,1.653l-75.383,124.072c-18.915,2.96-33.4,19.291-33.4,39.033 c0,21.847,17.706,39.556,39.553,39.556c21.842,0,39.553-17.709,39.553-39.556c0-7.395-2.064-14.282-5.593-20.202l40.968-140.396 C331.46,201.859,330.791,200.093,329.375,199.471z M256.012,384.004c-10.924,0-19.778-8.847-19.778-19.774 c0-10.927,8.854-19.782,19.778-19.782c10.92,0,19.774,8.855,19.774,19.782C275.786,375.157,266.932,384.004,256.012,384.004z"></path> </g> </g></svg>
            </a>

            <!-- Apps -->
            <a href="apps-list.html" class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25" x-tooltip.placement.right="'Applications'">
           <svg width="151px" height="151px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15.5 7.5C15.5 9.433 13.933 11 12 11C10.067 11 8.5 9.433 8.5 7.5C8.5 5.567 10.067 4 12 4C13.933 4 15.5 5.567 15.5 7.5Z" fill="#2ec27e"></path> <path d="M18 16.5C18 18.433 15.3137 20 12 20C8.68629 20 6 18.433 6 16.5C6 14.567 8.68629 13 12 13C15.3137 13 18 14.567 18 16.5Z" fill="#2ec27e"></path> <path d="M7.12205 5C7.29951 5 7.47276 5.01741 7.64005 5.05056C7.23249 5.77446 7 6.61008 7 7.5C7 8.36825 7.22131 9.18482 7.61059 9.89636C7.45245 9.92583 7.28912 9.94126 7.12205 9.94126C5.70763 9.94126 4.56102 8.83512 4.56102 7.47063C4.56102 6.10614 5.70763 5 7.12205 5Z" fill="#2ec27e"></path> <path d="M5.44734 18.986C4.87942 18.3071 4.5 17.474 4.5 16.5C4.5 15.5558 4.85657 14.744 5.39578 14.0767C3.4911 14.2245 2 15.2662 2 16.5294C2 17.8044 3.5173 18.8538 5.44734 18.986Z" fill="#2ec27e"></path> <path d="M16.9999 7.5C16.9999 8.36825 16.7786 9.18482 16.3893 9.89636C16.5475 9.92583 16.7108 9.94126 16.8779 9.94126C18.2923 9.94126 19.4389 8.83512 19.4389 7.47063C19.4389 6.10614 18.2923 5 16.8779 5C16.7004 5 16.5272 5.01741 16.3599 5.05056C16.7674 5.77446 16.9999 6.61008 16.9999 7.5Z" fill="#2ec27e"></path> <path d="M18.5526 18.986C20.4826 18.8538 21.9999 17.8044 21.9999 16.5294C21.9999 15.2662 20.5088 14.2245 18.6041 14.0767C19.1433 14.744 19.4999 15.5558 19.4999 16.5C19.4999 17.474 19.1205 18.3071 18.5526 18.986Z" fill="#2ec27e"></path> </g></svg>
            </a>

            <!-- Pages And Layouts -->
            <a href="pages-card-user-1.html" class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25" x-tooltip.placement.right="'Pages & Layouts'">
             <svg height="150px" width="150px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.335 512.335" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g transform="translate(1 1)"> <g> <polygon style="fill:#1a5fb4;" points="365.933,101.567 289.133,143.381 289.133,272.234 442.733,272.234 442.733,143.381 "></polygon> <polygon style="fill:#1a5fb4;" points="144.067,101.567 67.267,143.381 67.267,272.234 220.867,272.234 220.867,143.381 "></polygon> <polygon style="fill:#1a5fb4;" points="502.467,203.967 468.333,16.234 41.667,16.234 7.533,203.967 67.267,203.967 67.267,143.381 144.067,101.567 220.867,143.381 220.867,203.967 289.133,203.967 289.133,143.381 365.933,101.567 442.733,143.381 442.733,203.967 "></polygon> </g> <g> <path style="fill:#54C9FD;" d="M186.733,212.501H101.4v-8.533c0-23.893,18.773-42.667,42.667-42.667s42.667,18.773,42.667,42.667 V212.501z"></path> <path style="fill:#54C9FD;" d="M408.6,212.501h-85.333v-8.533c0-23.893,18.773-42.667,42.667-42.667 c23.893,0,42.667,18.773,42.667,42.667V212.501z"></path> </g> <g> <polygon style="fill:#1a5fb4;" points="7.533,238.101 67.267,238.101 67.267,203.967 7.533,203.967 "></polygon> <polygon style="fill:#1a5fb4;" points="442.733,238.101 502.467,238.101 502.467,203.967 442.733,203.967 "></polygon> </g> <g> <polygon style="fill:#FD9808;" points="365.933,58.901 272.067,110.101 272.067,152.767 365.933,101.567 459.8,152.767 459.8,110.101 "></polygon> <polygon style="fill:#FD9808;" points="144.067,58.901 50.2,110.101 50.2,152.767 144.067,101.567 237.933,152.767 237.933,110.101 "></polygon> <polygon style="fill:#FD9808;" points="365.933,494.101 485.4,494.101 485.4,442.901 365.933,442.901 "></polygon> </g> <polygon style="fill:#FFFFFF;" points="24.6,494.101 144.067,494.101 144.067,442.901 24.6,442.901 "></polygon> <g> <polygon style="fill:#1a5fb4;" points="50.2,494.101 459.8,494.101 459.8,442.901 50.2,442.901 "></polygon> <polygon style="fill:#1a5fb4;" points="442.733,238.101 442.733,272.234 289.133,272.234 289.133,238.101 220.867,238.101 220.867,272.234 67.267,272.234 67.267,238.101 24.6,238.101 24.6,442.901 485.4,442.901 485.4,238.101 "></polygon> </g> <g> <polygon style="fill:#54C9FD;" points="144.067,442.901 178.2,442.901 178.2,272.234 144.067,272.234 "></polygon> <polygon style="fill:#54C9FD;" points="331.8,442.901 365.933,442.901 365.933,272.234 331.8,272.234 "></polygon> <polygon style="fill:#54C9FD;" points="50.2,408.767 118.467,408.767 118.467,306.367 50.2,306.367 "></polygon> <polygon style="fill:#54C9FD;" points="391.533,408.767 459.8,408.767 459.8,306.367 391.533,306.367 "></polygon> <polygon style="fill:#54C9FD;" points="212.333,442.901 297.667,442.901 297.667,306.367 212.333,306.367 "></polygon> </g> <path d="M118.467,417.301H50.2c-5.12,0-8.533-3.413-8.533-8.533v-102.4c0-5.12,3.413-8.533,8.533-8.533h68.267 c5.12,0,8.533,3.413,8.533,8.533v102.4C127,413.887,123.587,417.301,118.467,417.301z M58.733,400.234h51.2v-85.333h-51.2V400.234z "></path> <path d="M84.333,417.301c-5.12,0-8.533-3.413-8.533-8.533v-102.4c0-5.12,3.413-8.533,8.533-8.533s8.533,3.413,8.533,8.533v102.4 C92.867,413.887,89.453,417.301,84.333,417.301z"></path> <path d="M459.8,417.301h-68.267c-5.12,0-8.533-3.413-8.533-8.533v-102.4c0-5.12,3.413-8.533,8.533-8.533H459.8 c5.12,0,8.533,3.413,8.533,8.533v102.4C468.333,413.887,464.92,417.301,459.8,417.301z M400.067,400.234h51.2v-85.333h-51.2 V400.234z"></path> <path d="M425.667,417.301c-5.12,0-8.533-3.413-8.533-8.533v-102.4c0-5.12,3.413-8.533,8.533-8.533s8.533,3.413,8.533,8.533v102.4 C434.2,413.887,430.787,417.301,425.667,417.301z"></path> <path d="M485.4,502.634H24.6c-5.12,0-8.533-3.413-8.533-8.533v-51.2c0-5.12,3.413-8.533,8.533-8.533h460.8 c5.12,0,8.533,3.413,8.533,8.533v51.2C493.933,499.221,490.52,502.634,485.4,502.634z M33.133,485.567h443.733v-34.133H33.133 V485.567z"></path> <path d="M67.267,246.634H7.533c-5.12,0-8.533-3.413-8.533-8.533v-34.133c0-5.12,3.413-8.533,8.533-8.533h59.733 c5.12,0,8.533,3.413,8.533,8.533v34.133C75.8,243.221,72.387,246.634,67.267,246.634z M16.067,229.567h42.667v-17.067H16.067 V229.567z"></path> <polygon style="fill:#1a5fb4;" points="220.867,238.101 289.133,238.101 289.133,203.967 220.867,203.967 "></polygon> <path d="M502.467,246.634h-59.733c-5.12,0-8.533-3.413-8.533-8.533v-34.133c0-5.12,3.413-8.533,8.533-8.533h59.733 c5.12,0,8.533,3.413,8.533,8.533v34.133C511,243.221,507.587,246.634,502.467,246.634z M451.267,229.567h42.667v-17.067h-42.667 V229.567z"></path> <path d="M178.2,451.434h-34.133c-5.12,0-8.533-3.413-8.533-8.533V272.234c0-5.12,3.413-8.533,8.533-8.533H178.2 c5.12,0,8.533,3.413,8.533,8.533v170.667C186.733,448.021,183.32,451.434,178.2,451.434z M152.6,434.367h17.067v-153.6H152.6 V434.367z"></path> <path d="M365.933,451.434H331.8c-5.12,0-8.533-3.413-8.533-8.533V272.234c0-5.12,3.413-8.533,8.533-8.533h34.133 c5.12,0,8.533,3.413,8.533,8.533v170.667C374.467,448.021,371.053,451.434,365.933,451.434z M340.333,434.367H357.4v-153.6h-17.067 V434.367z"></path> <path d="M297.667,451.434h-85.333c-5.12,0-8.533-3.413-8.533-8.533V306.367c0-5.12,3.413-8.533,8.533-8.533h85.333 c5.12,0,8.533,3.413,8.533,8.533v136.533C306.2,448.021,302.787,451.434,297.667,451.434z M220.867,434.367h68.267V314.901h-68.267 V434.367z"></path> <path d="M272.067,383.167h-8.533c-5.12,0-8.533-3.413-8.533-8.533s3.413-8.533,8.533-8.533h8.533c5.12,0,8.533,3.413,8.533,8.533 S277.187,383.167,272.067,383.167z"></path> <path d="M314.733,502.634H195.267c-5.12,0-8.533-3.413-8.533-8.533v-51.2c0-5.12,3.413-8.533,8.533-8.533h119.467 c5.12,0,8.533,3.413,8.533,8.533v51.2C323.267,499.221,319.853,502.634,314.733,502.634z M203.8,485.567h102.4v-34.133H203.8 V485.567z"></path> <path d="M459.8,161.301c-1.707,0-2.56,0-4.267-0.853l-89.6-49.493l-89.6,48.64c-2.56,1.707-5.973,1.707-8.533,0 c-2.56-0.853-4.267-3.413-4.267-6.827v-42.667c0-3.413,1.707-5.973,4.267-7.68l93.867-51.2c2.56-1.707,5.973-1.707,8.533,0 l93.867,51.2c2.56,1.707,4.267,4.267,4.267,7.68v42.667c0,3.413-1.707,5.973-4.267,7.68 C463.213,161.301,461.507,161.301,459.8,161.301z M365.933,93.034c1.707,0,2.56,0,4.267,0.853l81.067,44.373v-23.04l-85.333-46.933 L280.6,115.221v23.04l81.067-44.373C363.373,93.034,364.227,93.034,365.933,93.034z"></path> <path d="M442.733,280.767h-153.6c-5.12,0-8.533-3.413-8.533-8.533V143.381c0-3.413,1.707-5.973,4.267-7.68l76.8-41.813 c2.56-1.707,5.973-1.707,8.533,0l76.8,41.813c2.56,1.707,4.267,4.267,4.267,7.68v128.853 C451.267,277.354,447.853,280.767,442.733,280.767z M297.667,263.701H434.2v-115.2l-68.267-37.547l-68.267,37.547V263.701z"></path> <path d="M237.933,161.301c-1.707,0-2.56,0-4.267-0.853l-89.6-49.493l-89.6,49.493c-2.56,1.707-5.973,1.707-8.533,0 s-4.267-4.267-4.267-7.68v-42.667c0-3.413,1.707-5.973,4.267-7.68l93.867-51.2c2.56-1.707,5.973-1.707,8.533,0l93.867,51.2 c2.56,1.707,4.267,4.267,4.267,7.68v42.667c0,3.413-1.707,5.973-4.267,7.68C241.347,161.301,239.64,161.301,237.933,161.301z M144.067,93.034c1.707,0,2.56,0,4.267,0.853l81.067,44.373v-23.04l-85.333-46.933l-85.333,46.933v23.04L139.8,93.887 C141.507,93.034,142.36,93.034,144.067,93.034z"></path> <path d="M220.867,280.767h-153.6c-5.12,0-8.533-3.413-8.533-8.533V143.381c0-3.413,1.707-5.973,4.267-7.68l76.8-41.813 c2.56-1.707,5.973-1.707,8.533,0l76.8,41.813c2.56,1.707,4.267,4.267,4.267,7.68v128.853 C229.4,277.354,225.987,280.767,220.867,280.767z M75.8,263.701h136.533v-115.2l-68.267-37.547L75.8,148.501V263.701z"></path> <path d="M502.467,212.501h-59.733c-5.12,0-8.533-3.413-8.533-8.533v-55.467l-68.267-37.547l-68.267,37.547v55.467 c0,5.12-3.413,8.533-8.533,8.533h-68.267c-5.12,0-8.533-3.413-8.533-8.533v-55.467l-68.267-37.547L75.8,148.501v55.467 c0,5.12-3.413,8.533-8.533,8.533H7.533c-2.56,0-5.12-0.853-6.827-3.413C-1,206.527-1,204.821-1,202.261L33.133,14.527 c0.853-4.267,4.267-6.827,8.533-6.827h426.667c4.267,0,7.68,2.56,8.533,6.827L511,202.261c0.853,2.56,0,5.12-1.707,6.827 C507.587,211.647,505.027,212.501,502.467,212.501z M451.267,195.434h40.96l-30.72-170.667H48.493l-30.72,170.667h40.96v-52.053 c0-3.413,1.707-5.973,4.267-7.68l76.8-41.813c2.56-1.707,5.973-1.707,8.533,0l76.8,41.813c2.56,1.707,4.267,4.267,4.267,7.68 v52.053h51.2v-52.053c0-3.413,1.707-5.973,4.267-7.68l76.8-41.813c2.56-1.707,5.973-1.707,8.533,0l76.8,41.813 c2.56,1.707,4.267,4.267,4.267,7.68V195.434z"></path> <path d="M485.4,451.434H24.6c-5.12,0-8.533-3.413-8.533-8.533v-204.8c0-5.12,3.413-8.533,8.533-8.533h42.667 c5.12,0,8.533,3.413,8.533,8.533v25.6h136.533v-25.6c0-5.12,3.413-8.533,8.533-8.533h68.267c5.12,0,8.533,3.413,8.533,8.533v25.6 H434.2v-25.6c0-5.12,3.413-8.533,8.533-8.533H485.4c5.12,0,8.533,3.413,8.533,8.533v204.8 C493.933,448.021,490.52,451.434,485.4,451.434z M33.133,434.367h443.733V246.634h-25.6v25.6c0,5.12-3.413,8.533-8.533,8.533 h-153.6c-5.12,0-8.533-3.413-8.533-8.533v-25.6h-51.2v25.6c0,5.12-3.413,8.533-8.533,8.533h-153.6c-5.12,0-8.533-3.413-8.533-8.533 v-25.6h-25.6V434.367z"></path> <path d="M186.733,221.034H101.4c-5.12,0-8.533-3.413-8.533-8.533v-8.533c0-28.16,23.04-51.2,51.2-51.2s51.2,23.04,51.2,51.2v8.533 C195.267,217.621,191.853,221.034,186.733,221.034z M109.933,203.967H178.2c0-18.773-15.36-34.133-34.133-34.133 S109.933,185.194,109.933,203.967z"></path> <path d="M408.6,221.034h-85.333c-5.12,0-8.533-3.413-8.533-8.533v-8.533c0-28.16,23.04-51.2,51.2-51.2s51.2,23.04,51.2,51.2v8.533 C417.133,217.621,413.72,221.034,408.6,221.034z M331.8,203.967h68.267c0-18.773-15.36-34.133-34.133-34.133 S331.8,185.194,331.8,203.967z"></path> <path d="M195.267,221.034h-102.4c-5.12,0-8.533-3.413-8.533-8.533c0-5.12,3.413-8.533,8.533-8.533h102.4 c5.12,0,8.533,3.413,8.533,8.533C203.8,217.621,200.387,221.034,195.267,221.034z"></path> <path d="M417.133,221.034h-102.4c-5.12,0-8.533-3.413-8.533-8.533c0-5.12,3.413-8.533,8.533-8.533h102.4 c5.12,0,8.533,3.413,8.533,8.533C425.667,217.621,422.253,221.034,417.133,221.034z"></path> </g> </g></svg>
            </a>

            <!-- Forms -->
            <a href="form-input-text.html" class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25" x-tooltip.placement.right="'Forms'">
            <svg width="151px" height="151px" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#26a269;stroke:#26a269;stroke-width:3;" d="M 4,36 C 8,42 26,73 31,93 38,82 44,63 98,12 78,22 51,44 33,60 26,55 18,44 4,36 z"></path> </g></svg>
            </a>

            <!-- Components -->
            <a href="components-accordion.html" class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25" x-tooltip.placement.right="'Components'">
              <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" width="151px" height="151px" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle style="fill:#2ec27e;" cx="256" cy="256" r="256"></circle> <path style="fill:#121149;" d="M498.112,339.347L316.49,157.727l-12.048,4.494L256,113.778l-26.145,75.852l-11.24,39.209 l100.397,100.397l-2.45,2.45l-34.569-34.568l-69.953,2.269h-37.064l-60.95,112.387l96.128,96.128C225.03,510.59,240.35,512,256,512 C368.202,512,463.534,439.811,498.112,339.347z"></path> <path style="fill:#FFEDB5;" d="M401.606,278.219c-3.303-4.591-9.307-6.397-14.601-4.41c-0.076,0.029-0.152,0.055-0.228,0.081 l-89.619,29.836c0.019,0.721,0.005,1.445-0.043,2.174c-0.748,11.445-9.599,20.639-20.971,21.792l-54.01,5.61 c-3.417,0.357-6.472-2.126-6.827-5.541c-0.357-3.417,2.126-6.551,5.541-6.827l54.01-5.61c5.33-0.581,9.495-4.86,9.847-10.235 c0.191-2.934-0.772-5.766-2.712-7.975c-1.939-2.21-4.624-3.532-7.558-3.724l-71.711-4.675c-8.054-0.522-16.05,1.255-23.121,5.148 l-94.575,52.079l25.612,51.645l23.757-20.725c10.09-8.801,23.455-12.593,36.667-10.397l79.41,13.196 c14.551,1.934,29.139-1.695,41.088-10.218l108.118-74.461C404.513,290.763,405.371,283.45,401.606,278.219z"></path> <g> <path style="fill:#FEE187;" d="M274.856,315.326c5.33-0.581,9.495-4.86,9.847-10.235c0.191-2.934-0.772-5.766-2.712-7.975 c-1.939-2.21-4.624-3.532-7.558-3.724l-15.948-1.04v24.673L274.856,315.326z"></path> <path style="fill:#FEE187;" d="M401.606,278.219c-3.303-4.591-9.307-6.397-14.601-4.41c-0.076,0.029-0.152,0.055-0.228,0.081 l-89.619,29.836c0.019,0.721,0.005,1.445-0.043,2.174c-0.748,11.445-9.599,20.639-20.971,21.792l-17.653,1.834v50.641 c11.812-0.072,23.323-3.765,33.073-10.721l108.118-74.459C404.513,290.763,405.371,283.45,401.606,278.219z"></path> </g> <polygon style="fill:#FFC61B;" points="256,113.778 277.278,148.094 316.49,157.727 290.43,188.568 293.385,228.838 256,213.583 218.615,228.838 221.57,188.568 195.51,157.727 234.722,148.094 "></polygon> <polygon style="fill:#EAA22F;" points="256,113.778 277.278,148.094 316.49,157.727 290.43,188.568 293.385,228.838 256,213.583 "></polygon> <rect x="88.927" y="330.54" transform="matrix(0.8256 -0.5643 0.5643 0.8256 -189.2337 125.6507)" style="fill:#D35933;" width="39.418" height="76.78"></rect> <polygon style="fill:#B54324;" points="146.568,389.529 124.947,357.897 92.307,379.997 114.026,411.772 "></polygon> </g></svg>
            </a>

            <!-- Elements -->
            <a href="elements-avatar.html" class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25" x-tooltip.placement.right="'Elements'">
              <svg height="151px" width="151px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#C3E678;" d="M238.345,189.773h247.172c14.626,0,26.483,11.857,26.483,26.483v158.897 c0,14.626-11.857,26.483-26.483,26.483H344.276v29.116c0,5.544-6.702,8.32-10.622,4.399l-33.516-33.515h-61.793 c-14.626,0-26.483-11.857-26.483-26.483V216.256C211.862,201.63,223.719,189.773,238.345,189.773z"></path> <path style="fill:#A5D76E;" d="M211.862,216.256v158.897c0,1.9,0.218,3.746,0.599,5.534 c61.705-24.77,105.332-85.043,105.332-155.603c0-12.122-1.353-23.918-3.795-35.31h-75.654 C223.719,189.773,211.862,201.63,211.862,216.256z"></path> <path style="fill:#FF6464;" d="M300.138,225.083c0-82.881-67.188-150.069-150.069-150.069S0,142.202,0,225.083 c0,72.598,51.555,133.146,120.05,147.054l45.199,45.199c4.171,4.171,11.303,1.217,11.303-4.682v-39.978 C246.78,360.151,300.138,298.912,300.138,225.083z"></path> <circle style="fill:#D2555A;" cx="150.069" cy="225.125" r="114.759"></circle> <g> <path style="fill:#FFFFFF;" d="M150.074,304.582c-0.003,0-0.008,0.001-0.011,0c-4.875,0-8.833-3.957-8.833-8.833 c0-0.001,0-0.003,0-0.006s0-0.003,0-0.006c0-4.875,3.957-8.833,8.833-8.833c0.002,0,0.007-0.001,0.011,0 c4.875,0,8.833,3.957,8.833,8.833c0,0.001,0,0.002,0,0.003c0,0.002,0,0.004,0,0.007 C158.908,300.625,154.95,304.582,150.074,304.582z"></path> <path style="fill:#FFFFFF;" d="M361.931,348.67c-2.259,0-4.519-0.862-6.242-2.585l-44.138-44.138 c-3.448-3.447-3.448-9.036,0-12.483c3.447-3.447,9.036-3.447,12.483,0l37.897,37.895l82.034-82.034 c3.447-3.447,9.036-3.447,12.483,0c3.448,3.447,3.448,9.036,0,12.483l-88.276,88.276C366.45,347.808,364.19,348.67,361.931,348.67z "></path> <path style="fill:#FFFFFF;" d="M150.069,269.261c-4.875,0-8.828-3.953-8.828-8.828v-2.637c0-11.743,7.631-21.921,18.989-25.327 c14.806-4.44,25.148-18.349,25.149-33.826c0.001-9.183-3.741-17.983-10.536-24.778c-6.794-6.794-15.592-10.536-24.775-10.536 c-0.001,0-0.001,0-0.003,0c-19.469,0.001-35.308,15.841-35.308,35.31c0,4.875-3.953,8.828-8.828,8.828 c-4.875,0-8.828-3.953-8.828-8.828c0-29.203,23.758-52.963,52.962-52.966c0,0,0.003,0,0.004,0c13.898,0,27.128,5.578,37.258,15.706 c10.13,10.13,15.708,23.363,15.706,37.262c-0.002,23.211-15.518,44.074-37.732,50.735c-3.831,1.149-6.406,4.531-6.406,8.416v2.637 C158.897,265.31,154.944,269.261,150.069,269.261z"></path> </g> </g></svg>
            </a>
          </div>

          <!-- Bottom Links -->
          <div class="flex flex-col items-center space-y-3 py-3">
          

            <!-- Profile -->
            <div x-data="usePopper({placement:'right-end',offset:12})" @click.outside="isShowPopper && (isShowPopper = false)" class="flex">
              <button @click="isShowPopper = !isShowPopper" x-ref="popperRef" class="avatar h-12 w-12">
                <img class="rounded-full" src="../Public/Dashboard/images/avatar/default.png" alt="avatar" />
                <span class="absolute right-0 h-3.5 w-3.5 rounded-full border-2 border-white bg-success dark:border-navy-700"></span>
              </button>

              <div :class="isShowPopper && 'show'" class="popper-root fixed" x-ref="popperRoot">
                <div class="popper-box w-64 rounded-lg border border-slate-150 bg-white shadow-soft dark:border-navy-600 dark:bg-navy-700">
                  <div class="flex items-center space-x-4 rounded-t-lg bg-slate-100 py-5 px-4 dark:bg-navy-800">
                    <div class="avatar h-14 w-14">
                      <img class="rounded-full" src="../Public/Dashboard/images/avatar/default.png" alt="avatar" />
                    </div>
                    <div>
                      <a href="#" class="text-base font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">
                        <?php echo  $user_name ?>
                      </a>
                      <p class="text-xs text-slate-400 dark:text-navy-300">
                      <?php echo  $user_type ?>
                      </p>
                    </div>
                  </div>
                  <div class="flex flex-col pt-2 pb-5">
                    <a href="#" class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                      <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-warning text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                      </div>

                      <div>
                        <h2 class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                          Profile
                        </h2>
                        <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                          Your profile setting
                        </div>
                      </div>
                    </a>
                    
                    
                    <a href="#" class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                      <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-error text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                      </div>

                      <div>
                        <h2 class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                          Activity
                        </h2>
                        <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                          Your activity and events
                        </div>
                      </div>
                    </a>
                    <a href="#" class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                      <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-success text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                          <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                      </div>

                      <div>
                        <h2 class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                          Settings
                        </h2>
                        <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                          Webapp settings
                        </div>
                      </div>
                    </a>
                    <div class="mt-3 px-4">
                      <button class="btn h-9 w-full space-x-2 bg-primary text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span>Logout</span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Sidebar Panel -->
      <div class="sidebar-panel">
        <div class="flex h-full grow flex-col bg-white pl-[var(--main-sidebar-width)] dark:bg-navy-750">
          <!-- Sidebar Panel Header -->
          <div class="flex h-18 w-full items-center justify-between pl-4 pr-1">
            <p class="text-base tracking-wider text-slate-800 dark:text-navy-100">
              Dashboards
            </p>
            <button @click="$store.global.isSidebarExpanded = false" class="btn h-7 w-7 rounded-full p-0 text-primary hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-accent-light/80 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 xl:hidden">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
              </svg>
            </button>
          </div>

          <!-- Sidebar Panel Body -->
          <div x-data="{expandedItem:null}" class="h-[calc(100%-4.5rem)] overflow-x-hidden pb-6" x-init="$el._x_simplebar = new SimpleBar($el);">
            <ul class="flex flex-1 flex-col px-4 font-inter">
              <li>
                <a x-data="navLink" href="dashboards-crm-analytics.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                  CRM Analytics
                </a>
              </li>
              <li>
                <a x-data="navLink" href="dashboards-orders.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                  Orders
                </a>
              </li>
            </ul>
            <div class="my-3 mx-4 h-px bg-slate-200 dark:bg-navy-500"></div>
            <ul class="flex flex-1 flex-col px-4 font-inter">
              <li x-data="accordionItem('menu-item-1')">
                <a :class="expanded ? 'text-slate-800 font-semibold dark:text-navy-50' : 'text-slate-600 dark:text-navy-200  hover:text-slate-800  dark:hover:text-navy-50'" @click="expanded = !expanded" class="flex items-center justify-between py-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out" href="javascript:void(0);">
                  <span>Cryptocurrency</span>
                  <svg :class="expanded && 'rotate-90'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400 transition-transform ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
                <ul x-collapse x-show="expanded">
                  <li>
                    <a x-data="navLink" href="dashboards-crypto-1.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4">
                      <div class="flex items-center space-x-2">
                        <div class="h-1.5 w-1.5 rounded-full border border-current opacity-40"></div>
                        <span>Cryptocurrency v1</span>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a x-data="navLink" href="dashboards-crypto-2.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4">
                      <div class="flex items-center space-x-2">
                        <div class="h-1.5 w-1.5 rounded-full border border-current opacity-40"></div>
                        <span>Cryptocurrency v2</span>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
              <li x-data="accordionItem('menu-item-2')">
                <a :class="expanded ? 'text-slate-800 font-semibold dark:text-navy-50' : 'text-slate-600 dark:text-navy-200  hover:text-slate-800  dark:hover:text-navy-50'" @click="expanded = !expanded" class="flex items-center justify-between py-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out" href="javascript:void(0);">
                  <span>Banking</span>
                  <svg :class="expanded && 'rotate-90'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400 transition-transform ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
                <ul x-collapse x-show="expanded">
                  <li>
                    <a x-data="navLink" href="dashboards-banking-1.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4">
                      <div class="flex items-center space-x-2">
                        <div class="h-1.5 w-1.5 rounded-full border border-current opacity-40"></div>
                        <span>Banking v1</span>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a x-data="navLink" href="dashboards-banking-2.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4">
                      <div class="flex items-center space-x-2">
                        <div class="h-1.5 w-1.5 rounded-full border border-current opacity-40"></div>
                        <span>Banking v2</span>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a x-data="navLink" href="dashboards-personal.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                  Personal
                </a>
              </li>
              <li>
                <a x-data="navLink" href="dashboards-cms-analytics.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                  CMS Analytics
                </a>
              </li>
              <li>
                <a x-data="navLink" href="dashboards-influencer.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                  Influencer
                </a>
              </li>
              <li>
                <a x-data="navLink" href="dashboards-travel.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                  Travel
                </a>
              </li>
              <li>
                <a x-data="navLink" href="dashboards-teacher.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                  Teacher
                </a>
              </li>
              <li>
                <a x-data="navLink" href="dashboards-education.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                  Education
                </a>
              </li>
              <li>
                <a x-data="navLink" href="dashboards-authors.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                  Authors
                </a>
              </li>
              <li>
                <a x-data="navLink" href="dashboards-doctor.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                  Doctors
                </a>
              </li>
              <li>
                <a x-data="navLink" href="dashboards-employees.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                  Employees
                </a>
              </li>
              <li>
                <a x-data="navLink" href="dashboards-workspace.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                  Workspaces
                </a>
              </li>
              <li>
                <a x-data="navLink" href="dashboards-meeting.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                  Meetings
                </a>
              </li>
              <li>
                <a x-data="navLink" href="dashboards-project-boards.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                  Project Boards
                </a>
              </li>
            </ul>
            <div class="my-3 mx-4 h-px bg-slate-200 dark:bg-navy-500"></div>
            <ul class="flex flex-1 flex-col px-4 font-inter">
              <li>
                <a x-data="navLink" href="dashboards-widget-ui.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                  Widget UI
                </a>
              </li>
              <li>
                <a x-data="navLink" href="dashboards-widget-contacts.html" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out">
                  Widget Contacts
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- App Header Wrapper-->
    <nav class="header before:bg-white dark:before:bg-navy-750 print:hidden">
      <!-- App Header  -->
      <div class="header-container relative flex w-full bg-white dark:bg-navy-750 print:hidden">
        <!-- Header Items -->
        <div class="flex w-full items-center justify-between">
          <!-- Left: Sidebar Toggle Button -->
          <div class="h-7 w-7">
            <button class="menu-toggle ml-0.5 flex h-7 w-7 flex-col justify-center space-y-1.5 text-primary outline-none focus:outline-none dark:text-accent-light/80" :class="$store.global.isSidebarExpanded && 'active'" @click="$store.global.isSidebarExpanded = !$store.global.isSidebarExpanded">
              <span></span>
              <span></span>
              <span></span>
            </button>
          </div>

          <!-- Right: Header buttons -->
          <div class="-mr-1.5 flex items-center space-x-2">
            <!-- Mobile Search Toggle -->
            <button @click="$store.global.isSearchbarActive = !$store.global.isSearchbarActive" class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:hidden">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5.5 w-5.5 text-slate-500 dark:text-navy-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </button>

            <!-- Main Searchbar -->
            <template x-if="$store.breakpoints.smAndUp">
              <div class="flex" x-data="usePopper({placement:'bottom-end',offset:12})" @click.outside="isShowPopper && (isShowPopper = false)">
                <div class="relative mr-4 flex h-8">
                  <input placeholder="Search here..." class="form-input peer h-full rounded-full bg-slate-150 px-4 pl-9 text-xs+ text-slate-800 ring-primary/50 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:text-navy-100 dark:placeholder-navy-300 dark:ring-accent/50 dark:hover:bg-navy-900 dark:focus:bg-navy-900" :class="isShowPopper ? 'w-80' : 'w-60'" @focus="isShowPopper= true" type="text" x-ref="popperRef" />
                  <div class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 transition-colors duration-200" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M3.316 13.781l.73-.171-.73.171zm0-5.457l.73.171-.73-.171zm15.473 0l.73-.171-.73.171zm0 5.457l.73.171-.73-.171zm-5.008 5.008l-.171-.73.171.73zm-5.457 0l-.171.73.171-.73zm0-15.473l-.171-.73.171.73zm5.457 0l.171-.73-.171.73zM20.47 21.53a.75.75 0 101.06-1.06l-1.06 1.06zM4.046 13.61a11.198 11.198 0 010-5.115l-1.46-.342a12.698 12.698 0 000 5.8l1.46-.343zm14.013-5.115a11.196 11.196 0 010 5.115l1.46.342a12.698 12.698 0 000-5.8l-1.46.343zm-4.45 9.564a11.196 11.196 0 01-5.114 0l-.342 1.46c1.907.448 3.892.448 5.8 0l-.343-1.46zM8.496 4.046a11.198 11.198 0 015.115 0l.342-1.46a12.698 12.698 0 00-5.8 0l.343 1.46zm0 14.013a5.97 5.97 0 01-4.45-4.45l-1.46.343a7.47 7.47 0 005.568 5.568l.342-1.46zm5.457 1.46a7.47 7.47 0 005.568-5.567l-1.46-.342a5.97 5.97 0 01-4.45 4.45l.342 1.46zM13.61 4.046a5.97 5.97 0 014.45 4.45l1.46-.343a7.47 7.47 0 00-5.568-5.567l-.342 1.46zm-5.457-1.46a7.47 7.47 0 00-5.567 5.567l1.46.342a5.97 5.97 0 014.45-4.45l-.343-1.46zm8.652 15.28l3.665 3.664 1.06-1.06-3.665-3.665-1.06 1.06z" />
                    </svg>
                  </div>
                </div>
                <div :class="isShowPopper && 'show'" class="popper-root" x-ref="popperRoot">
                  <div class="popper-box flex max-h-[calc(100vh-6rem)] w-80 flex-col rounded-lg border border-slate-150 bg-white shadow-soft dark:border-navy-800 dark:bg-navy-700 dark:shadow-soft-dark">
                    <div x-data="{activeTab:'tabAll'}" class="is-scrollbar-hidden flex shrink-0 overflow-x-auto rounded-t-lg bg-slate-100 px-2 text-slate-600 dark:bg-navy-800 dark:text-navy-200">
                      <button @click="activeTab = 'tabAll'" :class="activeTab === 'tabAll' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                        All
                      </button>
                      <button @click="activeTab = 'tabFiles'" :class="activeTab === 'tabFiles' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                        Files
                      </button>
                      <button @click="activeTab = 'tabChats'" :class="activeTab === 'tabChats' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                        Chats
                      </button>
                      <button @click="activeTab = 'tabEmails'" :class="activeTab === 'tabEmails' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                        Emails
                      </button>
                      <button @click="activeTab = 'tabProjects'" :class="activeTab === 'tabProjects' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                        Projects
                      </button>
                      <button @click="activeTab = 'tabTasks'" :class="activeTab === 'tabTasks' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                        Tasks
                      </button>
                    </div>

                    <div class="is-scrollbar-hidden overflow-y-auto overscroll-contain pb-2">
                      <div class="is-scrollbar-hidden mt-3 flex space-x-4 overflow-x-auto px-3">
                        <a href="apps-kanban.html" class="w-14 text-center">
                          <div class="avatar h-12 w-12">
                            <div class="is-initial rounded-full bg-success text-white">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                              </svg>
                            </div>
                          </div>
                          <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                            Kanban
                          </p>
                        </a>
                        <a href="dashboards-crm-analytics.html" class="w-14 text-center">
                          <div class="avatar h-12 w-12">
                            <div class="is-initial rounded-full bg-secondary text-white">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                              </svg>
                            </div>
                          </div>
                          <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                            Analytics
                          </p>
                        </a>
                        <a href="apps-chat.html" class="w-14 text-center">
                          <div class="avatar h-12 w-12">
                            <div class="is-initial rounded-full bg-info text-white">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                              </svg>
                            </div>
                          </div>
                          <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                            Chat
                          </p>
                        </a>
                        <a href="apps-filemanager.html" class="w-14 text-center">
                          <div class="avatar h-12 w-12">
                            <div class="is-initial rounded-full bg-error text-white">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                              </svg>
                            </div>
                          </div>
                          <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                            Files
                          </p>
                        </a>
                        <a href="dashboards-crypto-1.html" class="w-14 text-center">
                          <div class="avatar h-12 w-12">
                            <div class="is-initial rounded-full bg-secondary text-white">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 9a2 2 0 10-4 0v5a2 2 0 01-2 2h6m-6-4h4m8 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                            </div>
                          </div>
                          <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                            Crypto
                          </p>
                        </a>
                        <a href="dashboards-banking-1.html" class="w-14 text-center">
                          <div class="avatar h-12 w-12">
                            <div class="is-initial rounded-full bg-primary text-white dark:bg-accent">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                              </svg>
                            </div>
                          </div>
                          <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                            Banking
                          </p>
                        </a>
                        <a href="apps-todo.html" class="w-14 text-center">
                          <div class="avatar h-12 w-12">
                            <div class="is-initial rounded-full bg-info text-white">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M12.5293 18L20.9999 8.40002" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M3 13.2L7.23529 18L17.8235 6" stroke-linecap="round" stroke-linejoin="round" />
                              </svg>
                            </div>
                          </div>
                          <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                            Todo
                          </p>
                        </a>
                        <a href="dashboards-crm-analytics.html" class="w-14 text-center">
                          <div class="avatar h-12 w-12">
                            <div class="is-initial rounded-full bg-secondary text-white">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                              </svg>
                            </div>
                          </div>
                          <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                            Analytics
                          </p>
                        </a>
                        <a href="dashboards-orders.html" class="w-14 text-center">
                          <div class="avatar h-12 w-12">
                            <div class="is-initial rounded-full bg-warning text-white">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                              </svg>
                            </div>
                          </div>
                          <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                            Orders
                          </p>
                        </a>
                      </div>

                      <div class="mt-3 flex items-center justify-between bg-slate-100 py-1.5 px-3 dark:bg-navy-800">
                        <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                          Recent
                        </p>
                        <a href="#" class="text-tiny+ font-medium uppercase text-primary outline-none transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">
                          View All
                        </a>
                      </div>

                      <div class="mt-1 font-inter font-medium">
                        <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="apps-chat.html">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                          </svg>
                          <span>Chat App</span>
                        </a>
                        <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="apps-filemanager.html">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                          </svg>
                          <span>File Manager App</span>
                        </a>
                        <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="apps-mail.html">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                          </svg>
                          <span>Email App</span>
                        </a>
                        <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="apps-kanban.html">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                          </svg>
                          <span>Kanban Board</span>
                        </a>
                        <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="apps-todo.html">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path d="M3 13.2L7.23529 18L17.8235 6" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12.5293 18L20.9999 8.40002" stroke-linecap="round" stroke-linejoin="round" />
                          </svg>
                          <span>Todo App</span>
                        </a>
                        <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="dashboards-crypto-2.html">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9a2 2 0 10-4 0v5a2 2 0 01-2 2h6m-6-4h4m8 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>

                          <span>Crypto Dashboard</span>
                        </a>
                        <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="dashboards-banking-2.html">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                          </svg>

                          <span>Banking Dashboard</span>
                        </a>
                        <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="dashboards-crm-analytics.html">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                          </svg>

                          <span>Analytics Dashboard</span>
                        </a>
                        <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="dashboards-influencer.html">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                          </svg>

                          <span>Influencer Dashboard</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </template>

            <!-- Dark Mode Toggle -->
            <button @click="$store.global.isDarkModeEnabled = !$store.global.isDarkModeEnabled" class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
              <svg x-show="$store.global.isDarkModeEnabled" x-transition:enter="transition-transform duration-200 ease-out absolute origin-top" x-transition:enter-start="scale-75" x-transition:enter-end="scale-100 static" class="h-6 w-6 text-amber-400" fill="currentColor" viewBox="0 0 24 24">
                <path d="M11.75 3.412a.818.818 0 01-.07.917 6.332 6.332 0 00-1.4 3.971c0 3.564 2.98 6.494 6.706 6.494a6.86 6.86 0 002.856-.617.818.818 0 011.1 1.047C19.593 18.614 16.218 21 12.283 21 7.18 21 3 16.973 3 11.956c0-4.563 3.46-8.31 7.925-8.948a.818.818 0 01.826.404z" />
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" x-show="!$store.global.isDarkModeEnabled" x-transition:enter="transition-transform duration-200 ease-out absolute origin-top" x-transition:enter-start="scale-75" x-transition:enter-end="scale-100 static" class="h-6 w-6 text-amber-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd" />
              </svg>
            </button>
            <!-- Monochrome Mode Toggle -->
            <button @click="$store.global.isMonochromeModeEnabled = !$store.global.isMonochromeModeEnabled" class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
              <i class="fa-solid fa-palette bg-gradient-to-r from-sky-400 to-blue-600 bg-clip-text text-lg font-semibold text-transparent"></i>
            </button>

          </div>
        </div>
      </div>
    </nav>


  

    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
      <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
        <div class="col-span-12 lg:col-span-8 xl:col-span-9">
          <div :class="$store.breakpoints.smAndUp && 'via-purple-300'" class="card mt-12 bg-gradient-to-l from-pink-300 to-indigo-400 p-5 sm:mt-0 sm:flex-row">
            <div class="flex justify-center sm:order-last">
              <img class="-mt-16 h-40 sm:mt-0" src="images/illustrations/teacher.svg" alt="" />
            </div>
            <div class="mt-2 flex-1 pt-2 text-center text-white sm:mt-0 sm:text-left">
              <h3 class="text-xl">
                Welcome Back, <span class="font-semibold">Caleb</span>
              </h3>
              <p class="mt-2 leading-relaxed">
                Your student completed
                <span class="font-semibold text-navy-700">85%</span> of tasks
              </p>
              <p>Progress is <span class="font-semibold">excellent!</span></p>

              <button class="btn mt-6 bg-slate-50 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80">
                View Lessons
              </button>
            </div>
          </div>

          <div class="mt-4 sm:mt-5 lg:mt-6">
            <div class="flex h-8 items-center justify-between">
              <h2 class="text-base font-medium tracking-wide text-slate-700 dark:text-navy-100">
                Week 2 Classes
              </h2>
              <a href="#" class="border-b border-dotted border-current pb-0.5 text-xs+ font-medium text-primary outline-none transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">View All</a>
            </div>
            <div class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-3 sm:gap-5">
              <div class="card flex-row overflow-hidden">
                <div class="h-full w-1 bg-gradient-to-b from-blue-500 to-purple-600"></div>
                <div class="flex flex-1 flex-col justify-between p-4 sm:px-5">
                  <div>
                    <img class="h-12 w-12 rounded-lg object-cover object-center" src="images/others/testing-sm.jpg" alt="image" />
                    <h3 class="mt-3 font-medium text-slate-700 line-clamp-2 dark:text-navy-100">
                      Basic English
                    </h3>
                    <p class="text-xs+">Mon. 08:00 - 09:00</p>
                    <div class="mt-2 flex space-x-1.5">
                      <a href="#" class="tag bg-primary py-1 px-1.5 text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                        Language
                      </a>
                    </div>
                  </div>
                  <div class="mt-10 flex justify-between">
                    <div class="flex -space-x-2">
                      <div class="avatar h-7 w-7 hover:z-10">
                        <img class="rounded-full ring ring-white dark:ring-navy-700" src="images/avatar/avatar-16.jpg" alt="avatar" />
                      </div>

                      <div class="avatar h-7 w-7 hover:z-10">
                        <div class="is-initial rounded-full bg-info text-xs+ uppercase text-white ring ring-white dark:ring-navy-700">
                          jd
                        </div>
                      </div>

                      <div class="avatar h-7 w-7 hover:z-10">
                        <img class="rounded-full ring ring-white dark:ring-navy-700" src="images/avatar/avatar-19.jpg" alt="avatar" />
                      </div>
                    </div>
                    <button class="btn h-7 w-7 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 hover:shadow-lg hover:shadow-slate-200/50 focus:bg-slate-200 focus:shadow-lg focus:shadow-slate-200/50 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:hover:shadow-navy-450/50 dark:focus:bg-navy-450 dark:focus:shadow-navy-450/50 dark:active:bg-navy-450/90">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12" />
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
              <div class="card flex-row overflow-hidden">
                <div class="h-full w-1 bg-gradient-to-b from-info to-info-focus"></div>
                <div class="flex flex-1 flex-col justify-between p-4 sm:px-5">
                  <div>
                    <img class="h-12 w-12 rounded-lg object-cover object-center" src="images/others/design-sm.jpg" alt="image" />
                    <h3 class="mt-3 font-medium text-slate-700 line-clamp-2 dark:text-navy-100">
                      Learn UI/UX Design
                    </h3>
                    <p class="text-xs+">Tue. 10:00 - 11:30</p>
                    <div class="mt-2 flex space-x-1.5">
                      <a href="#" class="tag bg-info py-1 px-1.5 text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90">
                        UI/UX Design
                      </a>
                    </div>
                  </div>
                  <div class="mt-10 flex justify-between">
                    <div class="flex -space-x-2">
                      <div class="avatar h-7 w-7 hover:z-10">
                        <img class="rounded-full ring ring-white dark:ring-navy-700" src="images/avatar/avatar-20.jpg" alt="avatar" />
                      </div>

                      <div class="avatar h-7 w-7 hover:z-10">
                        <div class="is-initial rounded-full bg-warning text-xs+ uppercase text-white ring ring-white dark:ring-navy-700">
                          iu
                        </div>
                      </div>

                      <div class="avatar h-7 w-7 hover:z-10">
                        <img class="rounded-full ring ring-white dark:ring-navy-700" src="images/avatar/avatar-17.jpg" alt="avatar" />
                      </div>
                    </div>
                    <button class="btn h-7 w-7 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 hover:shadow-lg hover:shadow-slate-200/50 focus:bg-slate-200 focus:shadow-lg focus:shadow-slate-200/50 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:hover:shadow-navy-450/50 dark:focus:bg-navy-450 dark:focus:shadow-navy-450/50 dark:active:bg-navy-450/90">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12" />
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
              <div class="card flex-row overflow-hidden">
                <div class="h-full w-1 bg-gradient-to-b from-secondary-light to-secondary"></div>
                <div class="flex flex-1 flex-col justify-between p-4 sm:px-5">
                  <div>
                    <img class="h-12 w-12 rounded-lg object-cover object-center" src="images/others/sales-presentation-sm.jpg" alt="image" />
                    <h3 class="mt-3 font-medium text-slate-700 line-clamp-2 dark:text-navy-100">
                      Basic of digital marketing
                    </h3>
                    <p class="text-xs+">Wed. 09:00 - 11:00</p>
                    <div class="mt-2 flex space-x-1.5">
                      <a href="#" class="tag bg-secondary px-1.5 py-1 text-white hover:bg-secondary-focus focus:bg-secondary-focus active:bg-secondary-focus/90">
                        Marketing
                      </a>
                    </div>
                  </div>
                  <div class="mt-10 flex justify-between">
                    <div class="flex -space-x-2">
                      <div class="avatar h-7 w-7 hover:z-10">
                        <img class="rounded-full ring ring-white dark:ring-navy-700" src="images/avatar/avatar-16.jpg" alt="avatar" />
                      </div>

                      <div class="avatar h-7 w-7 hover:z-10">
                        <div class="is-initial rounded-full bg-info text-xs+ uppercase text-white ring ring-white dark:ring-navy-700">
                          jd
                        </div>
                      </div>

                      <div class="avatar h-7 w-7 hover:z-10">
                        <img class="rounded-full ring ring-white dark:ring-navy-700" src="images/avatar/avatar-19.jpg" alt="avatar" />
                      </div>
                    </div>
                    <button class="btn h-7 w-7 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 hover:shadow-lg hover:shadow-slate-200/50 focus:bg-slate-200 focus:shadow-lg focus:shadow-slate-200/50 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:hover:shadow-navy-450/50 dark:focus:bg-navy-450 dark:focus:shadow-navy-450/50 dark:active:bg-navy-450/90">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12" />
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="mt-4 sm:mt-5 lg:mt-6">
            <div class="flex items-center justify-between">
              <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                Media for lessons
              </h2>
              <div class="flex">
                <div class="flex items-center" x-data="{isInputActive:false}">
                  <label class="block">
                    <input x-effect="isInputActive === true && $nextTick(() => { $el.focus()});" :class="isInputActive ? 'w-32 lg:w-48' : 'w-0'" class="form-input bg-transparent px-1 text-right transition-all duration-100 placeholder:text-slate-500 dark:placeholder:text-navy-200" placeholder="Search here..." type="text" />
                  </label>
                  <button @click="isInputActive = !isInputActive" class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                  </button>
                </div>
                <div x-data="usePopper({placement:'bottom-end',offset:4})" @click.outside="isShowPopper && (isShowPopper = false)" class="inline-flex">
                  <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                  </button>
                  <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                    <div class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                      <ul>
                        <li>
                          <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Action</a>
                        </li>
                        <li>
                          <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Another Action</a>
                        </li>
                        <li>
                          <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Something else</a>
                        </li>
                      </ul>
                      <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                      <ul>
                        <li>
                          <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Separated Link</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card mt-3">
              <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                <table class="is-hoverable w-full text-left">
                  <thead>
                    <tr>
                      <th class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        COURSE NAME
                      </th>
                      <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        FILE NAME
                      </th>
                      <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        PERMISSION
                      </th>
                      <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        ASSIGN
                      </th>
                      <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        SIZE
                      </th>

                      <th class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <div class="flex items-center space-x-4">
                          <div class="relative flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-primary/10 dark:bg-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5.5 w-5.5 text-primary dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                          </div>
                          <span class="font-medium text-slate-700 dark:text-navy-100">Basic English</span>
                        </div>
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <a href="#" class="hover:underline focus:underline">English book.pdf
                        </a>
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <div class="badge space-x-2.5 text-slate-800 dark:text-navy-100">
                          <div class="h-2 w-2 rounded-full bg-current"></div>
                          <span>Only View </span>
                        </div>
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        13 Members
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                        56 MB
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <button class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                          </svg>
                        </button>
                      </td>
                    </tr>
                    <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <div class="flex items-center space-x-4">
                          <div class="relative flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-primary/10 dark:bg-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5.5 w-5.5 text-primary dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                          </div>
                          <span class="font-medium text-slate-700 dark:text-navy-100">Grammar and Punctuation
                          </span>
                        </div>
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <a href="#" class="hover:underline focus:underline">Is Correct.docx
                        </a>
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <div class="badge space-x-2.5 text-secondary dark:text-secondary-light">
                          <div class="h-2 w-2 rounded-full bg-current"></div>
                          <span>Can Edit</span>
                        </div>
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        95 Members
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                        4.2 MB
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <button class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                          </svg>
                        </button>
                      </td>
                    </tr>
                    <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <div class="flex items-center space-x-4">
                          <div class="relative flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-secondary/10 dark:bg-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5.5 w-5.5 text-secondary dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                            </svg>
                          </div>
                          <span class="font-medium text-slate-700 dark:text-navy-100">Practice speaking English
                          </span>
                        </div>
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <a href="#" class="hover:underline focus:underline">Speaking.mp3
                        </a>
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <div class="badge space-x-2.5 text-slate-800 dark:text-navy-100">
                          <div class="h-2 w-2 rounded-full bg-current"></div>
                          <span>Only View </span>
                        </div>
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        49 Members
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                        9 MB
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <button class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                          </svg>
                        </button>
                      </td>
                    </tr>
                    <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <div class="flex items-center space-x-4">
                          <div class="relative flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-info/10 dark:bg-info">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5.5 w-5.5 text-info dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                            </svg>
                          </div>
                          <span class="font-medium text-slate-700 dark:text-navy-100">Basic English
                          </span>
                        </div>
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <a href="#" class="hover:underline focus:underline">
                          English books.zip
                        </a>
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <div class="badge space-x-2.5 text-slate-800 dark:text-navy-100">
                          <div class="h-2 w-2 rounded-full bg-current"></div>
                          <span>Only View </span>
                        </div>
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        63 Members
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                        496 MB
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <button class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                          </svg>
                        </button>
                      </td>
                    </tr>
                    <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <div class="flex items-center space-x-4">
                          <div class="relative flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-warning/10 dark:bg-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5.5 w-5.5 text-warning dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                          </div>
                          <span class="font-medium text-slate-700 dark:text-navy-100">Grammar and Punctuation
                          </span>
                        </div>
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <a href="#" class="hover:underline focus:underline">
                          Video Course.mp4
                        </a>
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <div class="badge space-x-2.5 text-slate-800 dark:text-navy-100">
                          <div class="h-2 w-2 rounded-full bg-current"></div>
                          <span>Only View </span>
                        </div>
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        47 Members
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                        245 MB
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <button class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                          </svg>
                        </button>
                      </td>
                    </tr>
                    <tr class="border-y border-transparent">
                      <td class="whitespace-nowrap rounded-bl-lg px-4 py-3 sm:px-5">
                        <div class="flex items-center space-x-4">
                          <div class="relative flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-primary/10 dark:bg-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5.5 w-5.5 text-primary dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                          </div>
                          <span class="font-medium text-slate-700 dark:text-navy-100">Basic of digital marketing
                          </span>
                        </div>
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <a href="#" class="hover:underline focus:underline">Digital marketing.pdf
                        </a>
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <div class="badge space-x-2.5 text-slate-800 dark:text-navy-100">
                          <div class="h-2 w-2 rounded-full bg-current"></div>
                          <span>Only View </span>
                        </div>
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        42 Members
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                        54 MB
                      </td>
                      <td class="whitespace-nowrap rounded-br-lg px-4 py-3 sm:px-5">
                        <button class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                          </svg>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-span-12 lg:col-span-4 xl:col-span-3">
          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-1 lg:gap-6">
            <div class="card pb-5">
              <div class="mt-3 flex items-center justify-between px-4">
                <h2 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                  Working Hours
                </h2>
                <div x-data="usePopper({placement:'bottom-end',offset:4})" @click.outside="isShowPopper && (isShowPopper = false)" class="inline-flex">
                  <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn -mr-1.5 h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                    </svg>
                  </button>

                  <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                    <div class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                      <ul>
                        <li>
                          <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Action</a>
                        </li>
                        <li>
                          <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Another Action</a>
                        </li>
                        <li>
                          <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Something else</a>
                        </li>
                      </ul>
                      <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                      <ul>
                        <li>
                          <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Separated Link</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div>
                <div x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.workingHours); $el._x_chart.render() });"></div>
              </div>
              <div class="px-4 text-center text-xs+ sm:px-5">
                <p>Working hours calculated based on your activity</p>
              </div>
            </div>

            <div class="card p-4 lg:order-last">
              <div class="space-y-1 text-center font-inter text-xs+">
                <div class="flex items-center justify-between px-2 pb-4">
                  <p class="font-medium text-slate-700 dark:text-navy-100">
                    January 2022
                  </p>
                  <div class="flex space-x-2">
                    <button class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7" />
                      </svg>
                    </button>
                    <button class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7" />
                      </svg>
                    </button>
                  </div>
                </div>
                <div class="grid grid-cols-7 pb-2">
                  <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                    SUN
                  </div>
                  <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                    MON
                  </div>
                  <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                    TUE
                  </div>
                  <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                    WED
                  </div>
                  <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                    THU
                  </div>
                  <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                    FRY
                  </div>
                  <div class="text-tiny+ font-semibold text-primary dark:text-accent-light">
                    SAT
                  </div>
                </div>
                <div class="grid grid-cols-7 place-items-center">
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-400 hover:bg-primary/10 hover:text-primary dark:text-navy-300 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    29
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-400 hover:bg-primary/10 hover:text-primary dark:text-navy-300 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    30
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-400 hover:bg-primary/10 hover:text-primary dark:text-navy-300 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    31
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    1
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    2
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    3
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    4
                  </button>
                </div>
                <div class="grid grid-cols-7 place-items-center">
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    5
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    6
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    7
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    8
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    9
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    10
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    11
                  </button>
                </div>
                <div class="grid grid-cols-7 place-items-center">
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    12
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    13
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl font-medium text-primary hover:bg-primary/10 hover:text-primary dark:text-accent-light dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    14
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    15
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    16
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    17
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    18
                  </button>
                </div>
                <div class="grid grid-cols-7 place-items-center">
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    19
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    20
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    21
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    22
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    23
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    24
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    25
                  </button>
                </div>
                <div class="grid grid-cols-7 place-items-center">
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    26
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    27
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    28
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    29
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-900 hover:bg-primary/10 hover:text-primary dark:text-navy-100 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    30
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-400 hover:bg-primary/10 hover:text-primary dark:text-navy-300 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    1
                  </button>
                  <button class="flex h-7 w-9 items-center justify-center rounded-xl text-slate-400 hover:bg-primary/10 hover:text-primary dark:text-navy-300 dark:hover:bg-accent-light/10 dark:hover:text-accent-light">
                    2
                  </button>
                </div>
              </div>
            </div>

            <div class="sm:col-span-2 lg:col-span-1">
              <div class="flex h-8 items-center justify-between">
                <h2 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                  Students
                </h2>
                <a href="#" class="border-b border-dotted border-current pb-0.5 text-xs+ font-medium text-primary outline-none transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">View All</a>
              </div>
              <div class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-x-5 lg:grid-cols-1">
                <div class="card p-3">
                  <div class="flex items-center justify-between space-x-2">
                    <div class="flex items-center space-x-3">
                      <div class="avatar h-10 w-10">
                        <img class="rounded-full" src="images/avatar/avatar-20.jpg" alt="avatar" />
                        <div class="absolute right-0 h-3 w-3 rounded-full border-2 border-white bg-primary dark:border-navy-700 dark:bg-accent"></div>
                      </div>
                      <div>
                        <p class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                          Travis Fuller
                        </p>
                        <p class="mt-0.5 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                          65% completed
                        </p>
                      </div>
                    </div>
                    <div class="relative cursor-pointer">
                      <button class="btn h-8 w-8 rounded-full bg-slate-150 p-0 font-medium text-slate-700 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-100 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                      </button>
                      <div class="absolute top-0 right-0 -m-1 flex h-4 min-w-[1rem] items-center justify-center rounded-full bg-primary px-1 text-tiny font-medium leading-none text-white dark:bg-accent">
                        2
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card p-3">
                  <div class="flex items-center justify-between space-x-2">
                    <div class="flex items-center space-x-3">
                      <div class="avatar h-10 w-10">
                        <img class="rounded-full" src="images/avatar/avatar-19.jpg" alt="avatar" />
                      </div>
                      <div>
                        <p class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                          Konnor Guzman
                        </p>
                        <p class="mt-0.5 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                          78% completed
                        </p>
                      </div>
                    </div>
                    <div class="relative cursor-pointer">
                      <button class="btn h-8 w-8 rounded-full bg-slate-150 p-0 font-medium text-slate-700 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-100 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="card p-3">
                  <div class="flex items-center justify-between space-x-2">
                    <div class="flex items-center space-x-3">
                      <div class="avatar h-10 w-10">
                        <img class="rounded-full" src="images/avatar/avatar-18.jpg" alt="avatar" />
                      </div>
                      <div>
                        <p class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                          Alfredo Elliott
                        </p>
                        <p class="mt-0.5 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                          58% completed
                        </p>
                      </div>
                    </div>
                    <div class="relative cursor-pointer">
                      <button class="btn h-8 w-8 rounded-full bg-slate-150 p-0 font-medium text-slate-700 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-100 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                      </button>
                      <div class="absolute top-0 right-0 -m-1 flex h-4 min-w-[1rem] items-center justify-center rounded-full bg-primary px-1 text-tiny font-medium leading-none text-white dark:bg-accent">
                        3
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card p-3">
                  <div class="flex items-center justify-between space-x-2">
                    <div class="flex items-center space-x-3">
                      <div class="avatar h-10 w-10">
                        <img class="rounded-full" src="images/avatar/avatar-5.jpg" alt="avatar" />
                        <div class="absolute right-0 h-3 w-3 rounded-full border-2 border-white bg-primary dark:border-navy-700 dark:bg-accent"></div>
                      </div>
                      <div>
                        <p class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                          Derrick Simmons
                        </p>
                        <p class="mt-0.5 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                          65% completed
                        </p>
                      </div>
                    </div>
                    <div class="relative cursor-pointer">
                      <button class="btn h-8 w-8 rounded-full bg-slate-150 p-0 font-medium text-slate-700 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-100 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>

  <div id="x-teleport-target"></div>
  <script>
    window.addEventListener("DOMContentLoaded", () => Alpine.start());
  </script>
</body>


</html>