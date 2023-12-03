<?php
error_reporting(0);
session_start();
include('includes/config.php');

if (isset($_POST['submit'])) {
  $issue = $_POST['issue'];
  $description = $_POST['description'];
  $email = $_SESSION['login'];
  $sql = "INSERT INTO tblissues(UserEmail, Issue, Description) VALUES(:email, :issue, :description)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':issue', $issue, PDO::PARAM_STR);
  $query->bindParam(':description', $description, PDO::PARAM_STR);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if ($lastInsertId) {
    $_SESSION['msg'] = "Info successfully submitted";
    header("Location: thankyou.php");
    exit;
  } else {
    $_SESSION['msg'] = "Something went wrong. Please try again.";
    header("Location: thankyou.php");
    exit;
  }
}

include('includes/navbar.php');
?>

<section class="items-center py-10 bg-stone-100 xl:h-screen font-poppins dark:bg-gray-800">
  <div class="flex items-center justify-center">
    <form name="help" method="post" class="bg-white p-8 rounded-lg shadow-md">
      <h2 class="lg:text-4xl md:text-2xl sm:text-xl font-bold border-b-4 border-blue-500 inline-block pb-2">How can we
        help you?</h2>
      <ul>
        <li class="my-4">
          <select id="country" name="issue" class="w-full p-2 border border-gray-300 rounded-md" required="">
            <option value="">Select Issue</option>
            <option value="Booking Issues">Booking Issues</option>
            <option value="Cancellation">Cancellation</option>
            <option value="Refund">Refund</option>
            <option value="Other">Other</option>
          </select>
        </li>
        <li class="mb-4">
          <input class="w-full p-6 border border-gray-300 rounded-md" type="text" placeholder="description"
            name="description" required="">
        </li>
      </ul>
      <div class="text-center">
        <button type="submit" name="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Submit</button>
      </div>
    </form>
  </div>
</section>

<?php include('includes/footer.php'); ?>
</body>

</html>