<?php
session_start();

include('../Config/codeGen.php');
include('../Config/config.php');
include('../Helpers/auth.php');
include('../Helpers/ratings_management.php');

$userID = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
$query = "CALL GetUserByID('$userID'); ";
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
<?php include('../Partial/dashoard/head.php');

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
      <div class="flex items-center space-x-4 py-5 lg:py-6">
        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
          Ratings Management
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
          <li>Ratings</li>
        </ul>
      </div>
      <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
        <!-- From HTML Table -->
        <div class="card pb-4">
          <div class="my-3 flex h-8 items-center justify-between px-4 sm:px-5">

           
          </div>
          <div>
            <div x-data x-init="$el._x_grid =  new Gridjs.Grid({
                from: $refs.table,
                sort: true,
                pagination: {
                    enabled: true,
                    limit: 10, // Adjust the number of rows per page as needed
                },
                search: true,
              }).render($refs.wrapper);">
              <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                <table x-ref="table" class="w-full text-left table-container">
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
                        House Seeker
                      </th>
                      <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        Rating(s)
                      </th>
                    
                      <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        Rated On
                      </th>
                      
                      <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                        Action
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "CALL ManageRatings('get_all', NULL, NULL, NULL, NULL)";
                    $result = mysqli_query($mysqli, $sql);
                    // Fetch all rows and store them as objects
                    #Count
                    $count = 0;
                    while ($rating = $result->fetch_object()) {
                      $count = $count + 1;


                    ?>
                      <tr>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          <?php echo $count;  ?>
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          <?php echo $rating->house_no;  ?>
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          <?php echo $rating->house_title;  ?>
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          <?php echo $rating->Seeker_name;  ?>
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <?php echo $rating->rating; ?> stars
                      
                        </td>
                        
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                       <?php echo $rating->rating_created_on;  ?>
                        </td>
                      
                       
                        <td class="whitespace-nowrap">
                          <div>
                            
                            <div x-data="{showModal:false}">
                              <button @click="showModal = true" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                <i class="fa fa-trash"></i>
                              </button>
                              <template x-teleport="#x-teleport-target">
                                <div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5" x-show="showModal" role="dialog" @keydown.window.escape="showModal = false">
                                  <div class="absolute inset-0 bg-slate-900/60 backdrop-blur transition-opacity duration-300" @click="showModal = false" x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
                                  <div class="relative max-w-lg rounded-lg bg-white px-4 py-10 text-center transition-opacity duration-300 dark:bg-navy-700 sm:px-5" x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                    <img width="350" height="350" src="../Public/Dashboard/images/illustrations/questions-animate.svg" alt="image" />

                                    <div class="mt-2">
                                      <h2 class="text-2xl text-slate-700 dark:text-navy-100">
                                        Delete this <?php echo $rating->house_no;  ?> :<?php echo $rating->house_title;  ?> Ratings
                                      </h2>
                                      <p style="color:red;" class="mt-1 text-color:Red;">
                                        Warning,Once Star(s) is Removed, Can not be recovered,Are you Sure?
                                      </p>
                                      <form method="post">
                                        <input type="hidden" value="<?php echo $rating->rating_id;  ?>" name="rating_id">
                                        <button type="submit" name="delete_rating" class="btn mt-1 bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90">
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
                      </tr>
                      <?php }}  ?>



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
  <script>
    window.addEventListener("DOMContentLoaded", () => Alpine.start());
  </script>
</body>


</html>