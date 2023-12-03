<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['submit2'])) {
  $pid = intval($_GET['pkgid']);
  $useremail = $_SESSION['login'];
  $fromdate = $_POST['fromdate'];
  $todate = $_POST['todate'];
  $comment = $_POST['comment'];
  $person = $_POST['person'];
  $status = 0;
  $sql = "INSERT INTO tblbooking(PackageId,UserEmail,FromDate,ToDate,person,Comment,status) VALUES(:pid,:useremail,:fromdate,:todate,:person,:comment,:status)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':pid', $pid, PDO::PARAM_STR);
  $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
  $query->bindParam(':fromdate', $fromdate, PDO::PARAM_STR);
  $query->bindParam(':todate', $todate, PDO::PARAM_STR);
  $query->bindParam(':person', $person, PDO::PARAM_STR);
  $query->bindParam(':comment', $comment, PDO::PARAM_STR);
  $query->bindParam(':status', $status, PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if ($lastInsertId) {
    $msg = "Booked Successfully";
  } else {
    $error = "Something went wrong. Please try again";
  }

}
?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/datepicker.min.js"></script>
<style>
  .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
  }

  .succWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
  }
</style>
</head>


<?php include('includes/navbar.php'); ?>
<section class="p-6 lg:h-screen sm:h-screen ">
  <div class="text-center">
    <h2 class="text-4xl font-bold border-b-4 border-blue-500 inline-block pb-2">PACKAGES LIST</h2>
  </div>
  <?php if ($error) { ?>
    <div class="errorWrap"><strong>ERROR</strong>:
      <?php echo htmlentities($error); ?>
    </div>
  <?php } else if ($msg) { ?>
      <div class="succWrap"><strong>SUCCESS</strong>:
      <?php echo htmlentities($msg); ?>
      </div>
  <?php } ?>
  <?php
  $pid = intval($_GET['pkgid']);
  $sql = "SELECT * from tbltourpackages where PackageId=:pid";
  $query = $dbh->prepare($sql);
  $query->bindParam(':pid', $pid, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  $cnt = 1;
  if ($query->rowCount() > 0) {
    foreach ($results as $result) { ?>
      <div class="flex flex-col md:flex-row bg-gray-100 p-4">

        <div class="md:w-1/2 mb-4 md:mb-0">
          <img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage); ?>"
            class="w-full md:h-1/2 object-cover rounded-md">
        </div>
        <div class="md:w-1/2 p-4 ">
          <form name="book" method="post" class="md:w-2/3 p-4">

            <h2 class="text-2xl font-semibold mb-2">
              <?php echo htmlentities($result->PackageName); ?>
            </h2>
            <p class="text-gray-600 mb-2">#PKG-
              <?php echo htmlentities($result->PackageId); ?>
            </p>
            <p class="mb-2"><b class="text-xl font-semibold">Package Type :</b>
              <?php echo htmlentities($result->PackageType); ?>
            </p>
            <p class="mb-2"><b class="text-xl font-semibold">Package Location :</b>
              <?php echo htmlentities($result->PackageLocation); ?>
            </p>
            <p><b class="text-xl font-semibold">Features:</b>
              <?php echo htmlentities($result->PackageFetures); ?>
            </p>

            <div date-rangepicker class="flex items-center mt-4">
              <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                  <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                  </svg>
                </div>
                <input
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="   Select date start" id="datepicker" type="text" name="fromdate" required="">
              </div>
              <span class="mx-4 text-gray-500">to</span>
              <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                  <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                  </svg>
                </div>
                <input
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="   Select date end" id="datepicker1" type="text" name="todate" required="">
              </div>
            </div>
            <div class="mt-4">
              <label for="person" class="block text-xl font-medium text-gray-700">Total Member</label>
              <input id="person" name="person" type="number" class="border border-gray-300 p-2 w-full"
                placeholder="How many persons?" min="1" value="1" required />
            </div>
            <div class="mt-4">

              <h3 class="text-xl font-semibold">Total:
                <?php echo htmlentities($result->PackagePrice); ?> BDT
              </h3>
            </div>


            <h3 class="mt-4 font-medium text-xl">Package Details:</h3>
            <p class="py-2">
              <?php echo htmlentities($result->PackageDetails); ?>
            </p>



            <div class="mb-4">
              <label for="comment" class="block text-xl  font-medium text-gray-700">Comment</label>
              <textarea id="comment" name="comment" rows="3" class="border border-gray-300 p-2 w-full"
                placeholder="Add your comment"></textarea>
            </div>

            <?php if ($_SESSION['login']) { ?>
              <div class="flex items-center">
                <button type="submit" name="submit2" class="bg-blue-500 text-white px-4 py-2 rounded">
                  Book
                </button>
              </div>
            <?php } else { ?>
              <div class="flex items-center">
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="showLoginModal()">
                  Login to Book
                </button>
              </div>

              <div id="loginModal"
                class="modal fixed inset-0 z-50 hidden overflow-auto bg-black bg-opacity-50 flex items-center justify-center">
                <div class="modal-content bg-white p-6 rounded-lg">
                  <span class="close absolute top-0 right-0 p-4 cursor-pointer" onclick="closeLoginModal()">&times;</span>
                  <p class="text-lg">Please login Before any making any Booking request</p>
                  <button class="bg-blue-500 text-white px-4 py-2 rounded mt-4" onclick="closeLoginModal()">Close</button>
                </div>
              </div>

              <script>
                function showLoginModal() {
                  var modal = document.getElementById('loginModal');
                  modal.classList.remove('hidden');
                }

                function closeLoginModal() {
                  var modal = document.getElementById('loginModal');
                  modal.classList.add('hidden');
                }
              </script>
            <?php } ?>



          </form>


        </div>


      </div>





    <?php }
  } ?>
</section>
<?php
include('includes/footer.php'); ?>


</body>

</html>