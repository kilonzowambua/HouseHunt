<?php
session_start();
$user_id= $_SESSION['user_id'];
include('../Config/codeGen.php');
include('../Config/config.php');
include('../Helpers/auth.php');
?>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php $page = 'On Boarding'; ?>
<?php include('../Partial/dashoard/head.php'); ?>

<body>

    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Set Up Account
            </h2>
            <div class="hidden h-full py-1 sm:flex">
                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
            </div>
            <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                <li class="flex items-center space-x-2">
                    <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent" href="#">Forms</a>
                    <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </li>
                <li>Fill the Neccessary fields</li>
            </ul>
        </div>

        <template x-if="$store.breakpoints.isXs">
            <div x-data="{isStuck:false}" class="pb-6" x-intersect:enter.full.margin.-60px.0.0.0="isStuck = false" x-intersect:leave.full.margin.-60px.0.0.0="isStuck = true">
                <div :class="isStuck && 'fixed right-0 top-[60px] w-full z-10'">
                    <div class="transition-all duration-200" :class="isStuck && 'py-2.5 px-4 bg-white dark:bg-navy-700 shadow-lg relative'">
                        <ol class="steps with-space-line">
                            <li class="step before:bg-primary dark:before:bg-accent">
                                <div class="step-header rounded-full bg-primary text-white dark:bg-accent">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h3 class="text-xs font-medium text-slate-700 dark:text-navy-100">
                                    Create Account
                                </h3>
                            </li>
                           
                            <li class="step before:bg-slate-200 dark:before:bg-navy-500">
                                <div class="step-header rounded-full bg-primary text-white dark:bg-accent">
                                    2
                                </div>
                                <h3 class="text-xs font-medium text-slate-700 dark:text-navy-100">
                                    Setting Up Account
                                </h3>
                            </li>
                           
                        </ol>
                    </div>
                </div>
            </div>
        </template>

        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
            <div class="col-span-12 sm:col-span-8">
                <div class="card p-4 sm:p-5">
                   <form method="POST">
                    <div class="mt-4 space-y-4">
                    
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                 
                            <label class="block">
                                <span>Phone number</span>
                                <span class="relative mt-1.5 flex">
                                <input  type="text" name="user_id" value="<?php echo $user_id ?>" hidden />
                                    <input class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="07++++++++" type="text" x-input-mask="{numericOnly: true, blocks: [0, 3, 3, 4], delimiters: ['(', ') ', '-']}" name="user_phone_no" />
                                    <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                </span>
                            </label>

                            <label class="block">
                                <span>City</span>
                                <span class="relative mt-1.5 flex">
                                    <input class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Your City/Town" type="text" name="user_location" />
                                    <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                        <i class="fa-solid fa-city text-base"></i>
                                    </span>
                                </span>
                            </label>
                            <label class="block">
                                <span>User Type</span>
                                <span class="relative mt-1.5 flex">
                                    <select name="user_type" class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" >
                                    <option>House Seeker</option>
                                    <option>House Owner</option>
                                  </select>
                                  <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                        <i class="fa-solid fa-user-group text-base"></i>
                                    </span>
                                </span>
                            </label>
                        </div>
                      
                        <div class="flex justify-end space-x-2">
                            <button type="submit" name="setup"class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                <span>Next</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                   </form>
                </div>
            </div>

            <div class="hidden sm:col-span-4 sm:block">
                <div class="sticky top-24 mt-3">
                    <ol class="steps is-vertical line-space">
                        <li class="step pb-8 before:bg-primary dark:before:bg-accent">
                            <div class="step-header rounded-full bg-primary text-white dark:bg-accent">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <h3 class="ml-4 text-slate-700 dark:text-navy-100">
                                Create Account
                            </h3>
                        </li>
                       
                        <li class="step pb-8 before:bg-slate-200 dark:before:bg-navy-500">
                            <div class="step-header rounded-full bg-primary text-white dark:bg-accent">
                                2
                            </div>
                            <h3 class="ml-4 text-slate-700 dark:text-navy-100">
                            Setting Up Account
                            </h3>
                        </li>
                        <li class="step pb-8 before:bg-slate-200 dark:before:bg-navy-500">
                            <div class="step-header rounded-full bg-slate-200 text-slate-800 dark:bg-navy-500 dark:text-white">
                                3
                            </div>
                            <h3 class="ml-4 text-slate-700 dark:text-navy-100">Submit</h3>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </main>


    <div id="x-teleport-target"></div>
    <?php include('../Partial/dashoard/script.php'); ?>
</body>

</html>