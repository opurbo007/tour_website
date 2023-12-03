<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['submit1'])) {
	$fname = $_POST['fname'];
	$email = $_POST['email'];
	$mobile = $_POST['mobileno'];
	$subject = $_POST['subject'];
	$description = $_POST['description'];
	$sql = "INSERT INTO  tblenquiry(FullName,EmailId,MobileNumber,Subject,Description) VALUES(:fname,:email,:mobile,:subject,:description)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':fname', $fname, PDO::PARAM_STR);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
	$query->bindParam(':subject', $subject, PDO::PARAM_STR);
	$query->bindParam(':description', $description, PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if ($lastInsertId) {
		$msg = "Enquiry  Successfully submited";
	} else {
		$error = "Something went wrong. Please try again";
	}

}

include('includes/navbar.php'); ?>
<section class=" items-center py-10 bg-stone-100  font-poppins dark:bg-gray-800 ">
	<div class="justify-center flex-1 max-w-6xl py-4 mx-auto lg:py-6 md:px-6">


		<div class="w-full px-4 lg:mb-0 ">
			<div class="relative">
				<h1 class="pl-2 text-3xl font-bold border-l-8 border-blue-400 md:text-5xl dark:text-white uppercase">

					<?php echo $_GET['type'] ?>

				</h1>
			</div>
			<?php
			$pagetype = $_GET['type'];
			$sql = "SELECT type,detail from tblpages where type=:pagetype";
			$query = $dbh->prepare($sql);
			$query->bindParam(':pagetype', $pagetype, PDO::PARAM_STR);
			$query->execute();
			$results = $query->fetchAll(PDO::FETCH_OBJ);
			$cnt = 1;
			if ($query->rowCount() > 0) {
				foreach ($results as $result) {

					?>





					<p class="mt-6 mb-10 text-base leading-7 text-gray-500 dark:text-gray-400">
						<?php echo $result->detail; ?>

					</p>
				</div>
			<?php }
			} ?>



	</div>
	</div>
</section>
<?php include('includes/footer.php'); ?>

</body>

</html>