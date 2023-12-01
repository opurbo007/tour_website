<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/navbar.php'); ?>



<section class="text-center p-6 ">
	<h2 class="text-4xl font-bold border-b-4 border-blue-500 inline-block pb-2">PACKAGES LIST</h2>

	<div class="py-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-20">



		<!-- <form method="post" action="">
			<input type="text" name="search" placeholder="Search by name or location">
			<input type="submit" value="Search">
		</form> -->

		<?php

		$sql = "SELECT * FROM tbltourpackages";

		// Check if the search form is submitted
		if (isset($_POST['search']) && !empty($_POST['search'])) {
			$search = $_POST['search'];
			// Add conditions to search by name or location
			$sql .= " WHERE PackageName LIKE :search OR PackageLocation LIKE :search";
		}

		$query = $dbh->prepare($sql);

		// If search condition is set, bind the parameter
		if (isset($search)) {
			$query->bindParam(':search', $search, PDO::PARAM_STR);
		}

		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_OBJ);
		$cnt = 1;

		if ($query->rowCount() > 0) {
			foreach ($results as $result) {
				// Display packages
				?>
				<div class="mb-4 p-2  rounded-lg  border-l-4 border-r-4 border-indigo-500 ">

					<img class="h-56 max-w-full w-full rounded-lg"
						src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage); ?>" class="img-responsive" alt="">

					<div class="text-content">
						<h4 class="text-xl font-semibold mt-2">Package Name:
							<?php echo htmlentities($result->PackageName); ?>
						</h4>
						<h6 class="text-gray-600 font-bold mb-2">Package Type :
							<?php echo htmlentities($result->PackageType); ?>
						</h6>
						<p class="text-gray-600 mb-2"><b>Package Location :</b>
							<?php echo htmlentities($result->PackageLocation); ?>
						</p>
						<p class="text-gray-600 mb-2"><b>Features</b>
							<?php echo htmlentities($result->PackageFetures); ?>
						</p>


						<h5 class="text-gray-600 font-bold mb-2">BDT :
							<?php echo htmlentities($result->PackagePrice); ?>
						</h5>
						<a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId); ?>" class="view"> <button
								class="w-32 bg-white tracking-wide text-gray-800 font-bold rounded border-b-2 border-blue-500 hover:border-black hover:bg-gray-300  shadow-md py-2 px-6 inline-flex items-center">
								<span class="mx-auto">Details</span>
							</button></a>
					</div>

				</div>
				<?php
			}
		} else {

			echo "No packages found.";
		}
		?>
	</div>
</section>

</div>
</div>
</div>



<?php include('includes/footer.php'); ?>


</html>