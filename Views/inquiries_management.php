<?php
session_start();

include('../Config/codeGen.php');
include('../Config/config.php');
include('../Helpers/auth.php');
include('../Helpers/inquiries_management.php');

$user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
$query = "CALL GetUserByID('$user_id'); ";
$results=mysqli_query($mysqli,$query);
  if ($user=mysqli_fetch_object($results)) {
    $user_name=$user->user_name;
    $user_type=$user->user_type;
    
    #Make Global variable
    Global $user_name;
    Global $user_type;
  
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
          Inquiries Management
        </h2>
        <div class="hidden h-full py-1 sm:flex">
          <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
        </div>
        <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
          <li class="flex items-center space-x-2">
            <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent" href="#">All</a>
            <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </li>
          <li>Inquiries</li>
        </ul>
      </div>
      <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
        <!-- From HTML Table -->
        <div class="card pb-4">
          <div class="my-3 flex h-8 items-center justify-between px-4 sm:px-5">

            <div x-data="usePopper({placement:'bottom-end',offset:4})" @click.outside="isShowPopper && (isShowPopper = false)" class="inline-flex">
              <div x-data="{showModal:false}">
             <?php if ($user_type == 'Administrator'){ ?>
                <button @click="showModal = true" class="btn bg-gradient-to-r from-sky-400 to-blue-600 p-0.5 font-medium">
                  <span class="btn bg-white dark:bg-navy-700"> Add inquiries House</span>
                </button>
                <?php } ?>
                <template x-teleport="#x-teleport-target">
                  <div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5" x-show="showModal" role="dialog" @keydown.window.escape="showModal = false">
                    <div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300" @click="showModal = false" x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
                    <div class="relative w-full max-w-lg origin-top rounded-lg bg-white transition-all duration-300 dark:bg-navy-700" x-show="showModal" x-transition:enter="easy-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="easy-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
                      <div class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 dark:bg-navy-800 sm:px-5">
                        <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                          New Inquiries house
                        </h3>
                        <button @click="showModal = !showModal" class="btn -mr-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                          </svg>
                        </button>
                      </div>
                      <div class="px-1 py-0.2 sm:px-2">

                        <form method="post" enctype="multipart/form-data">
                          <div class="mt-1 space-y-2">
                            <label class="block">
                              <span>Choose House No :</span>
                              <select name="house_no" id="house_no" class="form-select  w-full rounded-md border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                                <?php
                                $sql = "CALL ManageHouse('get_all', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL,NULL);";
                                $result = mysqli_query($mysqli, $sql);
                                // Check if there are multiple result sets
                                if (mysqli_more_results($mysqli)) {
                                  // Move to the next result set
                                  mysqli_next_result($mysqli);
                                }

                                while ($house = $result->fetch_object()) {
                                  if ($house->house_status = 'Available') {
                                ?>
                                    <option value="<?php echo $house->house_no ?>"><?php echo $house->house_no ?> </option>
                                <?php }
                                }
                                $result->free();

                                ?>

                              </select>
                            </label>
                            <label class="block">
                              <span>House Title:</span>

                              <input class="form-input  w-full rounded-md border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="inquiry_house_id" type="hidden" id="house_id" />
                              <input class="form-input  w-full rounded-md border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="inquiry_user_id" type="hidden" value="<?php echo $user_id; ?>" />
                              <input class="form-input  w-full rounded-md border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="house_title" type="text" id="house_title" />

                            </label>
                            <label class="block">
                              <span>House Type:</span>
                              <input class="form-input  w-full rounded-md border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="house_type" type="text" id="house_type" />
                            </label>


                            <label class="block">
                              <span>Inquiry Message:</span>
                              <textarea rows="4" name="inquiry_message" placeholder=" Enter Text" class="form-textarea w-full resize-none rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"></textarea>
                            </label>

                            <div class="space-x-2 text-right">
                              <button @click="showModal = false" class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                Cancel
                              </button>
                              <button type="submit" name="add_inquiry" class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                Submit
                              </button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </template>
              </div>


              <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                <div class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">

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
          <div class="ml-4 mr-4">
            <div x-data x-init="$el._x_grid =  new Gridjs.Grid({
                from: $refs.table,
                sort: true,
                pagination: {
                    enabled: true,
                    limit: 10, // Adjust the number of rows per page as needed
                },
                search: true,
              }).render($refs.wrapper);">
              <div class="is-scrollbar-hidden min-w-full overflow-x-auto px-6">

                <table x-ref="table" id="InquiryTable" class="table-container">
                  <thead>
                    <tr>
                      <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        #
                      </th>
                      <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        House No.
                      </th>
                      <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        House Title
                      </th>
                      <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        By
                      </th>
                      <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        Message
                      </th>
                  
                      <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        Created on
                      </th>

                      <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        Action
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "CALL ManageInquiries('get_all',NULL,NULL, NULL, NULL,NULL);";
                    $result = mysqli_query($mysqli, $sql);
                    // Fetch all rows and store them as objects
                    #Count
                    $count = 0;
                    while ($inquiry = $result->fetch_object()) {
                      $count = $count + 1;
                    ?>



                      <tr>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          <?php echo $count;  ?>
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          <?php echo $inquiry->house_no;  ?>
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          <?php echo $inquiry->house_title;  ?>
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          <?php echo $inquiry->user_name;  ?>
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          <?php echo $inquiry->inquiry_message;  ?>
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          <?php echo $inquiry->inquiry_created_on;  ?>
                        </td>
                        <?php
                        #HOUSE ONWER CAN REPLY
                        if($user_type == 'House Owner' && $inquiry->owner_id = $user_id && empty($inquiry->inquiry_message_reply)){
                        ?>
                        <td class="px-2 py-3 sm:px-5">
                          <div>
                          <div x-data="{showModal:false}">
                              <button @click="showModal = true" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-primary-500 dark:text-primary-50 dark:hover:bg-primary-450 dark:focus:bg-primary-450 dark:active:bg-primary-450/90  d-inline-block mt-2">
                                <i class="fa fa-edit"></i>
                              </button>
                              <template x-teleport="#x-teleport-target">
                                <div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5" x-show="showModal" role="dialog" @keydown.window.escape="showModal = false">
                                  <div class="absolute inset-0 bg-slate-900/60 backdrop-blur transition-opacity duration-300" @click="showModal = false" x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
                                  <div class="relative max-w-lg rounded-lg bg-white px-4 py-4 text-center transition-opacity duration-300 dark:bg-navy-700 sm:px-5" x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                    

                                    <div mb-1 >
                                      <h2 class="text-2xl text-slate-700 dark:text-navy-100 mb-2">
                                        Reply Inquire
                                      </h2>
                                     
                                      <form method="post" id="ReplyForm">
                                        <input type="hidden" value="<?php echo $inquiry->inquiry_id;  ?>" id="InquiryId" name="inquiry_id">
                                        <p   rows="4" class="w-full rounded-lg border border-slate-300 border-white p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent">
                                        <?php echo $inquiry->inquiry_message;  ?> 
                                        </p>
                                        <label class="block">Enter Your Inquire Reply:</label>  
                                       <textarea name="inquiry_message_reply" id="Inquiry_Message" rows="4" placeholder=" Enter Text" class="form-textarea w-full rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"></textarea>
                                        <button type="button" id="Reply" name="reply_inquiry" class="btn mt-6 bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90">
                                          Yes
                                        </button>
                                        <button @click="showModal = false" class="btn mt-6 bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90">
                                          Close
                                        </button>
                                      </form>

                                    </div>
                                  </div>
                                </div>
                              </template>
                            </div>

                          </div>
            
                       
                          <div x-data="{showModal:false}">
                              <button @click="showModal = true" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90 d-inline-block mt-2">
                                <i class="fa fa-trash"></i>
                              </button>
                              <template x-teleport="#x-teleport-target">
                                <div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5" x-show="showModal" role="dialog" @keydown.window.escape="showModal = false">
                                  <div class="absolute inset-0 bg-slate-900/60 backdrop-blur transition-opacity duration-300" @click="showModal = false" x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
                                  <div class="relative max-w-lg rounded-lg bg-white px-4 py-7 text-center transition-opacity duration-300 dark:bg-navy-700 sm:px-5" x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                    <img width="3500" height="3500" src="../Public/Dashboard/images/illustrations/questions-animate.svg" alt="image" />

                                    <div mb-1 >
                                      <h2 class="text-2xl text-slate-700 dark:text-navy-100">
                                        Delete this Inquiry
                                      </h2>
                                      <p style="color:red;" class="mt-1 text-color:Red;">
                                        .Warning,Once Inquiry is Deleted, Can not be recovered,Are you Sure?
                                      </p>
                                      <form method="post">
                                        <input type="hidden" value="<?php echo $inquiry->inquiry_id;  ?>" name="inquiry_id">
                                        <button type="submit" name="delete_inquiry" class="btn mt-6 bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90">
                                          Yes
                                        </button>
                                        <button @click="showModal = false" class="btn mt-6 bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90">
                                          Close
                                        </button>
                                      </form>

                                    </div>
                                  </div>
                                </div>
                              </template>
                            </div>

                          </div>
                        </td>
                        <?php } else { ?>
                          <td class="px-6 py-3 sm:px-5">
                          <div>
                          <div x-data="{showModal:false}">
                              <button @click="showModal = true" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                <i class="fa fa-trash"></i>
                              </button>
                              <template x-teleport="#x-teleport-target">
                                <div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5" x-show="showModal" role="dialog" @keydown.window.escape="showModal = false">
                                  <div class="absolute inset-0 bg-slate-900/60 backdrop-blur transition-opacity duration-300" @click="showModal = false" x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
                                  <div class="relative max-w-lg rounded-lg bg-white px-4 py-7 text-center transition-opacity duration-300 dark:bg-navy-700 sm:px-5" x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                    <img width="3500" height="3500" src="../Public/Dashboard/images/illustrations/questions-animate.svg" alt="image" />

                                    <div mb-1 >
                                      <h2 class="text-2xl text-slate-700 dark:text-navy-100">
                                        Delete this Inquiry
                                      </h2>
                                      <p style="color:red;" class="mt-1 text-color:Red;">
                                        .Warning,Once Inquiry is Deleted, Can not be recovered,Are you Sure?
                                      </p>
                                      <form method="post">
                                        <input type="hidden" value="<?php echo $inquiry->inquiry_id;  ?>" name="inquiry_id">
                                        <button type="submit" name="delete_inquiry" class="btn mt-6 bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90">
                                          Yes
                                        </button>
                                        <button @click="showModal = false" class="btn mt-6 bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90">
                                          Close
                                        </button>
                                      </form>

                                    </div>
                                  </div>
                                </div>
                              </template>
                            </div>

                          </div>
                        </td>
                        <?php } ?>
                      </tr>
                    <?php }}?>



                  </tbody>
                </table>
              </div>
              <div>
                <div x-ref="wrapper"></div>
              </div>
            </div>
          </div>
        </div>




      </div>
    </main>




  </div>

  <div id="x-teleport-target"></div>
  <?php include('../Partial/dashoard/script.php'); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Get House Details -->
  <script>
    $(document).ready(function() {
      $('#house_no').change(function() {
        var selectedHouseNo = $(this).val();

        $.ajax({
          url: 'get_house_details.php',
          method: 'POST',
          data: {
            house_no: selectedHouseNo
          },
          success: function(response) {
            var data = JSON.parse(response);
            if (data) {
              $('#house_id').val(data.house_id);
              $('#house_user_id').val(data.house_user_id);
              $('#house_title').val(data.house_title);
              $('#house_type').val(data.house_type);
              $('#house_location').val(data.house_location);
              $('#house_price').val(data.house_price);
            }
          }
        });
      });
    });
  </script>
  <!--Add Inquire Reply -->
  <script>
    $(document).ready(function(){
        $("#Reply").click(function(){
            // Get form data
            var formData = $("#ReplyForm").serialize();

            // Perform Ajax request
            $.ajax({
                type: "POST",
                url: "../Helpers/inquiries_management.php",
                data: formData,
                success: function(response){
                // Extract the content of #InquiryTable from the response
                var updatedContent = $(response).find("#InquiryTable").html();

                // Replace the content only if it exists
                if (updatedContent !== undefined && updatedContent !== null) {
                    $("#InquiryTable").html(updatedContent);
                } else {
                    // Handle error or unexpected response
                    console.error("Unexpected or empty response from the server.");
                }
            },
            error: function(xhr, status, error){
                // Handle Ajax errors
                console.error("Ajax request failed: " + status + "\nError: " + error);
            }
        });
    });
});

</script>

</body>


</html>