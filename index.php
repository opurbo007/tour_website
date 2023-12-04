<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>



<?php include('includes/header.php'); ?>


<div class="px-4 py-8 sm:px-8 md:px-16 lg:px-32 xl:px-64">
	<!-- Grid Section -->
	<!-- Travel Destinations Section -->
	<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
		<!-- Destination Card 1 -->
		<div class="p-8">
			<div class="bg-indigo-100 rounded-full w-16 h-16 flex items-center justify-center text-indigo-500 shadow-2xl">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
					<!-- Replace this path with the dollar sign icon path -->
					<path fill-rule="evenodd"
						d="M10 2a8 8 0 100 16 8 8 0 000-16zm0 14a6 6 0 100-12 6 6 0 000 12zm0-10a1 1 0 100 2 1 1 0 000-2z"
						clip-rule="evenodd" />
				</svg>
			</div>
			<h2 class="uppercase mt-6 text-indigo-500 font-medium mb-3">SAVE UP TO 50%</h2>
			<p class="font-light text-sm text-gray-500 mb-3">Get the best offers from us 24/7. Explore our exclusive deals
				and discounts to save up to 50% on your next adventure.</p>
		</div>

		<!-- Destination Card 2 -->
		<div class="p-8">
			<div class="bg-green-100 rounded-full w-16 h-16 flex items-center justify-center text-green-500 shadow-2xl">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
					<path fill-rule="evenodd"
						d="M13 2a1 1 0 01.993.883L14 3v14a1 1 0 01-1.993.117L12 17V3a1 1 0 011-1zm-2 2a1 1 0 011 1v10a1 1 0 01-2 0V5a1 1 0 011-1zm-5 3a1 1 0 011 1v4a1 1 0 01-2 0V8a1 1 0 011-1z"
						clip-rule="evenodd" />
				</svg>
			</div>
			<h2 class="uppercase mt-6 text-green-500 font-medium mb-3">24/7 Support</h2>
			<p class="font-light text-sm text-gray-500 mb-3">Get instant support through our phone service. Our team is here
				to assist you with any inquiries or assistance you may need.</p>
		</div>

		<!-- Destination Card 3 -->
		<div class="p-8">
			<div class="bg-red-100 rounded-full w-16 h-16 flex items-center justify-center text-red-500 shadow-2xl">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
					<!-- Replace this path with the building icon path -->
					<path fill-rule="evenodd"
						d="M4 0a1 1 0 011 1v18a1 1 0 01-2 0V1a1 1 0 011-1zm5 2a1 1 0 011 1v16a1 1 0 01-2 0V3a1 1 0 011-1zm5 2a1 1 0 011 1v14a1 1 0 01-2 0V5a1 1 0 011-1zm5 2a1 1 0 011 1v12a1 1 0 01-2 0V7a1 1 0 011-1z"
						clip-rule="evenodd" />
				</svg>
			</div>
			<h2 class="uppercase mt-6 text-red-500 font-medium mb-3">
				BEST PRICE HOTELS</h2>
			<p class="font-light text-sm text-gray-500 mb-3">Discover the best price hotels that fit your budget. Our
				curated selection ensures you get the most value for your money, so you can enjoy a comfortable stay without
				breaking the bank</p>
		</div>
	</div>



	<!---Post---->

	<section class="text-center p-6">
		<h2 class="text-4xl font-bold border-b-4 border-blue-500 inline-block pb-2">Featured Posts</h2>

		<div class="py-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
			<?php
			$sql = "SELECT 
		PackageId, 
		PackageName, 
		PackageType, 
		PackageLocation, 
		PackagePrice, 
		PackageFetures, 
		PackageDetails, 
		PackageImage, 
		Creationdate, 
		UpdationDate 
FROM 
		tbltourpackages 
ORDER BY 
		Creationdate DESC 
LIMIT 3";

			// Fetch four posts
			$query = $dbh->prepare($sql);
			$query->execute();
			$results = $query->fetchAll(PDO::FETCH_OBJ);
			foreach ($results as $result) {
				?>
				<!-- Post -->
				<div class="mb-4 p-2 rounded-lg  border-l-4 border-indigo-500 ">
					<img class="h-56 max-w-full w-full rounded-lg"
						src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage); ?>" class="img-responsive" alt="">
					<div class="text-content">
						<div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
							<h3 class="text-xl font-semibold mt-2">
								<?php echo htmlentities($result->PackageName); ?>
							</h3>
							<h6 class="text-gray-600 font-bold mb-2">Package Type:
								<?php echo htmlentities($result->PackageType); ?>
							</h6>
							<p class="text-gray-600 mb-2"><b>Location :</b>
								<?php echo htmlentities($result->PackageLocation); ?>
							</p>
							<!-- <p class="text-gray-600 mb-2"><b>Description:</b>
									<?php echo htmlentities($result->PackageFetures); ?>
								</p> -->
							<h5 class="text-gray-600 font-bold mb-2">BDT :
								<?php echo htmlentities($result->PackagePrice); ?>
							</h5>
							<a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId); ?>" class="text-black ">
								<button
									class="w-32 bg-white tracking-wide text-gray-800 font-bold rounded border-b-2 border-blue-500 hover:border-black hover:bg-gray-300 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
									<span class="mx-auto">
										Details</span>
								</button></a>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</section>


	<!-- Fixed Background Section -->
	<div class="relative bg-fixed">
		<div class="w-full h-screen relative object-cover">
			<!-- Image with Overlay -->
			<div class="absolute inset-0 bg-black opacity-50"></div>
			<img src="./img/bg1.jpg" alt="Background Image" class="w-full h-full object-cover">

			<!-- Text Overlay -->
			<div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center text-white z-10">
				<h1 class="text-5xl font-bold mb-4">Explore the World with Us</h1>
				<p class="text-lg mb-8">Discover amazing destinations and plan your next adventure.</p>
				<button
					class="bg-transparent border border-white text-white px-8 py-4 rounded-full hover:bg-white hover:text-black transition duration-300">Book
					Now</button>
			</div>
		</div>
	</div>

	<!-- Additional Content -->
	<div class="pt-10">
		<div class="flex flex-col items-center justify-center"> <span
				class="rounded-full  font-bold  bg-indigo-500 px-2 py-1 text-white uppercase text-sm text-center"> Chose Your
				Next
				Vacation </span> </div>
	</div>




	<section class="text-center p-6">
		<h2 class="text-4xl font-bold border-b-4 border-blue-500 inline-block pb-2">TOUR PACKAGES</h2>

		<div class="py-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
			<?php
			$sql = "SELECT * from tbltourpackages LIMIT 6"; // Fetch four posts
			$query = $dbh->prepare($sql);
			$query->execute();
			$results = $query->fetchAll(PDO::FETCH_OBJ);
			foreach ($results as $result) {
				?>
				<!-- Post -->
				<div class="mb-4 p-2 rounded-lg  border-b-4 border-indigo-500 ">
					<img class="h-56 max-w-full w-full rounded-lg"
						src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage); ?>" class="img-responsive" alt="">
					<div class="text-content">

						<h3 class="text-xl font-semibold mt-2">
							<?php echo htmlentities($result->PackageName); ?>
						</h3>
						<h6 class="text-gray-600 font-bold mb-2">Package Type:
							<?php echo htmlentities($result->PackageType); ?>
						</h6>
						<p class="text-gray-600 mb-2"><b>Location :</b>
							<?php echo htmlentities($result->PackageLocation); ?>
						</p>
						<!-- <p class="text-gray-600 mb-2"><b>Description:</b>
									<?php echo htmlentities($result->PackageFetures); ?>
								</p> -->
						<h5 class="text-gray-600 font-bold mb-2">BDT :
							<?php echo htmlentities($result->PackagePrice); ?>
						</h5><a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId); ?>" class="text-black ">
							<button
								class="w-32 bg-white tracking-wide text-gray-800 font-bold rounded border-b-2 border-blue-500 hover:border-black hover:bg-gray-300  shadow-md py-2 px-6 inline-flex items-center">
								<span class="mx-auto">Details</span>
							</button></a>

					</div>
				</div>
				<?php
			}
			?>
		</div>

	</section>
	<div class="flex flex-col items-center justify-center pb-4"> <span
			class="rounded-full bg-indigo-500 px-2 py-1 text-white uppercase text-sm"> <a href="./package-list.php">View More
				Package</a></span>
	</div>



</div>

<?php include('includes/footer.php'); ?>

</body>


<script>
	// JavaScript to change images automatically every 3 seconds
	let currentImageIndex = 0;
	const images = [
		"./img/bg5.jpg",
		"./img/bg7.jpg",
		"./img/bg6.jpg",
		"./img/bg9.jpg",
		"./img/bg10.jpg",
		"./img/bg11.jpg",
	];

	function changeImage() {
		// Update the image source for each card
		document.getElementById("cardImage1").src = images[currentImageIndex];
		document.getElementById("cardImage2").src = images[(currentImageIndex + 1) % images.length];
		document.getElementById("cardImage3").src = images[(currentImageIndex + 2) % images.length];

		// Move to the next image or loop back to the first one
		currentImageIndex = (currentImageIndex + 1) % images.length;
	}

	// Set interval to change image every 3 seconds
	setInterval(changeImage, 3000);
</script>

<script>
	document.getElementById("hamburger").onclick = function toggleMenu() {
		const navToggle = document.getElementsByClassName("toggle");
		for (let i = 0; i < navToggle.length; i++) {
			navToggle.item(i).classList.toggle("hidden");
		}
	};
</script>

</html>