<?php
session_start();

include('../Config/codeGen.php');
include('../Config/config.php');
include('../Helpers/bookings_management.php');

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
    $house_id = $_GET['house'];

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

                <div class="mt-1">
                  <a href="#" class="text-lg font-medium text-slate-700 hover:text-info focus:text-info dark:text-navy-100 dark:hover:text-accent-info dark:focus:text-accent-info">Rent:Ksh.<?php echo $house_details->house_price ?>/per Month</a>
                </div>
                <p class="mt-1">
                  <?php echo $house_details->house_description ?>
                </p>

              </div>

              <!-- Footer Blog Post -->
              <div class="mt-5 flex space-x-3">
                <div x-data="{showModal:false}">
                  <?php if (!empty($house_details->house_description)) { ?>
                    <button @click="showModal = true" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                      <svg version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="34px" height="34px" viewBox="0 0 32.00 32.00" xml:space="preserve" fill="#000000" stroke="#000000" stroke-width="0.576">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                          <style type="text/css">
                            .puchipuchi_een {
                              fill: #1c71d8;
                            }
                          </style>
                          <path class="puchipuchi_een" d="M7,6c0-2.757,2.243-5,5-5s5,2.243,5,5c0,1.627-0.793,3.061-2,3.974V6c0-1.654-1.346-3-3-3 S9,4.346,9,6v3.974C7.793,9.061,7,7.627,7,6z M24,13c-1.104,0-2,0.896-2,2v-1c0-1.104-0.896-2-2-2s-2,0.896-2,2v-1 c0-1.104-0.896-2-2-2s-2,0.896-2,2V6c0-1.104-0.896-2-2-2s-2,0.896-2,2v10.277C9.705,16.106,9.366,16,9,16c-1.104,0-2,0.896-2,2v3 c0,0.454,0.155,0.895,0.438,1.249L11,28h12l2.293-3.293C25.682,24.318,26,23.55,26,23v-8C26,13.896,25.104,13,24,13z M11,29v1 c0,0.552,0.447,1,1,1h10c0.553,0,1-0.448,1-1v-1H11z"></path>
                        </g>
                      </svg>

                      <span>Book Now</span>
                    </button>
                  <?php } ?>
                  <template x-teleport="#x-teleport-target">
                    <div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5" x-show="showModal" role="dialog" @keydown.window.escape="showModal = false">
                      <div class="absolute inset-0 bg-slate-900/60 backdrop-blur transition-opacity duration-300" @click="showModal = false" x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
                      <div class="relative max-w-lg rounded-lg bg-white px-4 py-10 text-center transition-opacity duration-300 dark:bg-navy-700 lg:px-5" x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

                        <div class="flex justify-between rounded-t-lg bg-slate-200 px-6 py-6 dark:bg-navy-800 sm:px-5">
                          <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                            Do what to Book House No:<?php echo $house_details->house_no ?>: <?php echo $house_details->house_title ?> ?
                          </h3>
                          <button @click="showModal = !showModal" class="btn -mr-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                          </button>
                        </div>
                        <div class="px-6 py-6 sm:px-5">
                          <p>
                            Please select Time and Date.
                          </p>
                          <form method="post">
                            <div class="mt-1 space-y-3 text-base font-medium text-slate-700 dark:text-navy-100">
                              <label>Select Time:</label>
                              <input hidden name="booking_house_onwer_id" value="<?php echo $house_details->house_user_id ?>" />
                              <input hidden name="booking_user_id" value="<?php echo $userID ?>" />
                              <input hidden name="booking_house_id" value="<?php echo $house_details->house_id ?>" />
                              <input name="booking_time" x-init="$el._x_flatpickr = flatpickr($el,{inline:true,enableTime: true,noCalendar: true, dateFormat: 'h : m',defaultDate: dayjs().format('h : m')})" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Choose time..." type="text" />

                              <label>Select Date:</label>

                              <input name="booking_date" x-init="$el._x_flatpickr = flatpickr($el)" class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Choose date..." type="text" />
                              <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                              </span>




                              <div class="space-x-2 text-right">
                                <button @click="showModal = false" class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                  Cancel
                                </button>
                                <button type="submit" name="add_booking" @click="showModal = false" class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                  Apply
                                </button>
                          </form>
                        </div>
                      </div>
                    </div>
                </div>
                </template>
              </div>


            </div>
          </div>
        </div>
        <div class="col-span-12 py-6 lg:fixed-top lg:bottom-0 lg:col-span-4 lg:self-start">

          <div class="card ">
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
                <?php echo date('d-M-Y', strtotime($house_details->user_created_at)); ?>
              </h5>
              <?php
              #Get House Owner Id
              $user_id = $house_details->user_id;
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
      
          <div class="card mt-4">
            <div class="my-3 mx-4 flex h-4 items-center justify-between">
              <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
                House Inquires
              </h2>
              
              <div x-data="{showModal:false}" class="inline-flex items-center space-x-2">
              <button
      @click="showModal = true"
      class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
    >
              <svg width="14px" height="14px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>plus</title> <desc>Created with Sketch Beta.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set-Filled" sketch:type="MSLayerGroup" transform="translate(-362.000000, -1037.000000)" fill="#3584e4"> <path d="M390,1049 L382,1049 L382,1041 C382,1038.79 380.209,1037 378,1037 C375.791,1037 374,1038.79 374,1041 L374,1049 L366,1049 C363.791,1049 362,1050.79 362,1053 C362,1055.21 363.791,1057 366,1057 L374,1057 L374,1065 C374,1067.21 375.791,1069 378,1069 C380.209,1069 382,1067.21 382,1065 L382,1057 L390,1057 C392.209,1057 394,1055.21 394,1053 C394,1050.79 392.209,1049 390,1049" id="plus" sketch:type="MSShapeGroup"> </path> </g> </g> </g></svg>
              </button>
      <template x-teleport="#x-teleport-target">
      <div
        class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
        x-show="showModal"
        role="dialog"
        @keydown.window.escape="showModal = false"
      >
        <div
          class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300"
          @click="showModal = false"
          x-show="showModal"
          x-transition:enter="ease-out"
          x-transition:enter-start="opacity-0"
          x-transition:enter-end="opacity-100"
          x-transition:leave="ease-in"
          x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0"
        ></div>
        <div
          class="relative max-w-lg rounded-lg bg-white px-4 py-10 text-center transition-opacity duration-300 dark:bg-navy-700 sm:px-5"
          x-show="showModal"
          x-transition:enter="ease-out"
          x-transition:enter-start="opacity-0"
          x-transition:enter-end="opacity-100"
          x-transition:leave="ease-in"
          x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0"
        >
         

          <div class="mt-2 col-6">
          <form id="InquireForm">
          <input type="hidden" value="<?php echo $user_id?>" name="inquiry_user_id" id="User_Id">
              <input type="hidden" value=" <?php echo $house_details->house_id?>" name="inquiry_house_id" id="House_Id">

          <label class="block">Enter Your Inquire :</label>  
    <textarea name="inquiry_message" id="Inquiry_Message" rows="4" placeholder=" Enter Text" class="form-textarea w-full rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"></textarea>

            <button
            type="button"
            id="Add_Inquire"
              class="btn mt-2 bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90"
            >
              Add
            </button>
            <button
              @click="showModal = false"
              class="btn mt-2 bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-info-focus/90"
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </template>
              </div>
            </div>
            <div class="max-w-xl">
              
              <div class="mt-5">
                <ol class="timeline max-w-sm" id="DisplayInquires">
                  <li class="timeline-item">
                    <div class="timeline-item-point rounded-full bg-slate-300 dark:bg-navy-400"></div>
                    <div class="timeline-item-content flex-1 pl-4 sm:pl-8">
                      <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                        <p class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0">
                          User Photo Changed
                        </p>
                        <span class="text-xs text-slate-400 dark:text-navy-300">12 minute ago</span>
                      </div>
                      <p class="py-1">John Doe changed his avatar photo</p>
                    </div>
                  </li>
                  <li class="timeline-item">
                    <div class="timeline-item-point rounded-full bg-primary dark:bg-accent"></div>
                    <div class="timeline-item-content flex-1 pl-4 sm:pl-8">
                      <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                        <p class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0">
                          Video Added
                        </p>
                        <span class="text-xs text-slate-400 dark:text-navy-300">1 hour ago</span>
                      </div>
                      <p class="py-1">Mores Clarke added new video</p>
                    </div>
                  </li>
                  <li class="timeline-item">
                    <div class="timeline-item-point rounded-full bg-success">
                      <span class="inline-flex h-full w-full animate-ping rounded-full bg-success opacity-80"></span>
                    </div>
                    <div class="timeline-item-content flex-1 pl-4 sm:pl-8">
                      <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                        <p class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0">
                          Design Completed
                        </p>
                        <span class="text-xs text-slate-400 dark:text-navy-300">3 hours ago</span>
                      </div>
                      <p class="py-1">
                        Robert Nolan completed the design of the CRM application
                      </p>
                    </div>
                  </li>
                  <li class="timeline-item">
                    <div class="timeline-item-point rounded-full bg-warning"></div>
                    <div class="timeline-item-content flex-1 pl-4 sm:pl-8">
                      <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                        <p class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0">
                          ER Diagram
                        </p>
                        <span class="text-xs text-slate-400 dark:text-navy-300">a day ago</span>
                      </div>
                      <p class="py-1">Team completed the ER diagram app</p>
                    </div>
                  </li>
                  <li class="timeline-item">
                    <div class="timeline-item-point rounded-full bg-error"></div>
                    <div class="timeline-item-content flex-1 pl-4 sm:pl-8">
                      <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                        <p class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0">
                          Weekly Report
                        </p>
                        <span class="text-xs text-slate-400 dark:text-navy-300">a day ago</span>
                      </div>
                      <p class="py-1">The weekly report was uploaded</p>
                    </div>
                  </li>
                </ol>
              </div>
            </div>
            <div class="code-wrapper hidden pt-4">
              <pre class="is-scrollbar-hidden max-h-96 overflow-auto rounded-lg hljs language-xml" x-init="hljs.highlightElement($el)">
  <span class="hljs-tag">&lt;<span class="hljs-name">ol</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"timeline max-w-sm"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">li</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"timeline-item"</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">div</span>
        <span class="hljs-attr">class</span>=<span class="hljs-string">"timeline-item-point rounded-full bg-slate-300 dark:bg-navy-400"</span>
      &gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"timeline-item-content flex-1 pl-4 sm:pl-8"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"flex flex-col justify-between pb-2 sm:flex-row sm:pb-0"</span>&gt;</span>
          <span class="hljs-tag">&lt;<span class="hljs-name">p</span>
            <span class="hljs-attr">class</span>=<span class="hljs-string">"pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0"</span>
          &gt;</span>
            User Photo Changed
          <span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
          <span class="hljs-tag">&lt;<span class="hljs-name">span</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-xs text-slate-400 dark:text-navy-300"</span>
            &gt;</span>12 minute ago&lt;/span
          &gt;
        <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-name">p</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"py-1"</span>&gt;</span>John Doe changed his avatar photo<span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
      <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-name">li</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">li</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"timeline-item"</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">div</span>
        <span class="hljs-attr">class</span>=<span class="hljs-string">"timeline-item-point rounded-full bg-primary dark:bg-accent"</span>
      &gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"timeline-item-content flex-1 pl-4 sm:pl-8"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"flex flex-col justify-between pb-2 sm:flex-row sm:pb-0"</span>&gt;</span>
          <span class="hljs-tag">&lt;<span class="hljs-name">p</span>
            <span class="hljs-attr">class</span>=<span class="hljs-string">"pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0"</span>
          &gt;</span>
            Video Added
          <span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
          <span class="hljs-tag">&lt;<span class="hljs-name">span</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-xs text-slate-400 dark:text-navy-300"</span>
            &gt;</span>1 hour ago&lt;/span
          &gt;
        <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-name">p</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"py-1"</span>&gt;</span>Mores Clarke added new video<span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
      <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-name">li</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">li</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"timeline-item"</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"timeline-item-point rounded-full bg-success"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-name">span</span>
          <span class="hljs-attr">class</span>=<span class="hljs-string">"inline-flex h-full w-full animate-ping rounded-full bg-success opacity-80"</span>
        &gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">span</span>&gt;</span>
      <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"timeline-item-content flex-1 pl-4 sm:pl-8"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"flex flex-col justify-between pb-2 sm:flex-row sm:pb-0"</span>&gt;</span>
          <span class="hljs-tag">&lt;<span class="hljs-name">p</span>
            <span class="hljs-attr">class</span>=<span class="hljs-string">"pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0"</span>
          &gt;</span>
            Design Completed
          <span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
          <span class="hljs-tag">&lt;<span class="hljs-name">span</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-xs text-slate-400 dark:text-navy-300"</span>
            &gt;</span>3 hours ago&lt;/span
          &gt;
        <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-name">p</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"py-1"</span>&gt;</span>
          Robert Nolan completed the design of the CRM application
        <span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
      <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-name">li</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">li</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"timeline-item"</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"timeline-item-point rounded-full bg-warning"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"timeline-item-content flex-1 pl-4 sm:pl-8"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"flex flex-col justify-between pb-2 sm:flex-row sm:pb-0"</span>&gt;</span>
          <span class="hljs-tag">&lt;<span class="hljs-name">p</span>
            <span class="hljs-attr">class</span>=<span class="hljs-string">"pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0"</span>
          &gt;</span>
            ER Diagram
          <span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
          <span class="hljs-tag">&lt;<span class="hljs-name">span</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-xs text-slate-400 dark:text-navy-300"</span>
            &gt;</span>a day ago&lt;/span
          &gt;
        <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-name">p</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"py-1"</span>&gt;</span>Team completed the ER diagram app<span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
      <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-name">li</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-name">li</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"timeline-item"</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"timeline-item-point rounded-full bg-error"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
      <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"timeline-item-content flex-1 pl-4 sm:pl-8"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"flex flex-col justify-between pb-2 sm:flex-row sm:pb-0"</span>&gt;</span>
          <span class="hljs-tag">&lt;<span class="hljs-name">p</span>
            <span class="hljs-attr">class</span>=<span class="hljs-string">"pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0"</span>
          &gt;</span>
            Weekly Report
          <span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
          <span class="hljs-tag">&lt;<span class="hljs-name">span</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"text-xs text-slate-400 dark:text-navy-300"</span>
            &gt;</span>a day ago&lt;/span
          &gt;
        <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-name">p</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"py-1"</span>&gt;</span>The weekly report was uploaded<span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
      <span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-name">li</span>&gt;</span>
  <span class="hljs-tag">&lt;/<span class="hljs-name">ol</span>&gt;</span>
              </pre>
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
<!-- JavaScript -->
<script>
    $(document).ready(function(){
        $("#Add_Inquire").click(function(){
            // Get form data
            var formData = $("#InquireForm").serialize();

            // Perform Ajax request
            $.ajax({
                type: "POST",
                url: "<?php echo $_SERVER['PHP_SELF']; ?>",
                data: formData,
                success: function(response){
                   // Replace the form content with the updated form
                   $("#myForm").replaceWith($(response).find("#myForm"));
                }
            });
        });
    });
</script>
<?php
// PHP Logic to Handle POST Request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 // Define variables to store form data
$inquiry_user_id = mysqli_real_escape_string($mysqli,$_POST['inquiry_user_id']); // Get the user ID from the form
$inquiry_house_id = mysqli_real_escape_string($mysqli,$_POST['inquiry_house_id']);
$inquiry_message = mysqli_real_escape_string($mysqli,$_POST['inquiry_message']);

  $sql="CALL ManageInquiries('create', NULL, '$inquiry_user_id', '$inquiry_house_id', '$inquiry_message'NULL);";
  $result=mysqli_query($mysqli,$sql);
  if($result){
      $_SESSION['success'] = "Inquiry is Added";
  }else {
      $err = "Failed,Try Again";
 }
}
?>
</body>

</html>