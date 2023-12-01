<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/navbar.php'); ?>


<section class="flex items-center py-10 bg-stone-100 xl:h-screen font-poppins dark:bg-gray-800 ">
	<div class="justify-center flex-1 max-w-6xl py-4 mx-auto lg:py-6 md:px-6">
		<div class="flex flex-wrap ">
			<div class="w-full px-4 mb-10 lg:w-1/2 lg:mb-0">
				<div class="relative">
					<img src="https://i.postimg.cc/QtyYkbxp/pexels-andrea-piacquadio-927022.jpg" alt=""
						class="relative z-40 object-cover w-full h-96 lg:rounded-tr-[80px] lg:rounded-bl-[80px] rounded">
					<div
						class="absolute z-10 hidden w-full h-full bg-blue-400 rounded-bl-[80px] rounded -bottom-6 right-6 lg:block">
					</div>


				</div>
			</div>
			<div class="w-full px-4 mb-10 lg:w-1/2 lg:mb-0 ">
				<div class="relative">
					<h1
						class="absolute -top-20   left-0 text-[20px] lg:text-[100px] text-gray-900 font-bold  dark:text-gray-200 opacity-5 md:block hidden">
						About Us
					</h1>
					<h1 class="pl-2 text-3xl font-bold border-l-8 border-blue-400 md:text-5xl dark:text-white">
						Welcome to Leisure Life
					</h1>
				</div>
				<h2 class="font-semibold py-6 text-blue-500"> Enriching Lives Through Travel</h2>
				<p class="mt-6 mb-10 text-base leading-7 text-gray-500 dark:text-gray-400">


					We envision a world where travel transforms individuals, fostering a deep appreciation for diverse cultures,
					landscapes, and adventures. Our mission is to be the catalyst for these transformative journeys, ensuring each
					traveler discovers the joy and enrichment that comes from exploring the world.



				</p>

			</div>
		</div>
	</div>
</section>


<?php include('includes/footer.php'); ?>


</html>