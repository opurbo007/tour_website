<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
	header('location:index.php');
} else {
	include('includes/navbar.php'); ?>


	<section class="items-center py-10 bg-stone-100 xl:h-screen font-poppins dark:bg-gray-800">

		<div class="text-center pb-6">
			<h2 class="text-4xl font-bold border-b-4 border-blue-500 inline-block pb-2">Issue-Ticket</h2>
		</div>

		<form name="chngpwd" method="post" onSubmit="return valid();">
			<?php if ($error) { ?>
				<div class="errorWrap"><strong>ERROR</strong>:
					<?php echo htmlentities($error); ?>
				</div>
			<?php } else if ($msg) { ?>
					<div class="succWrap"><strong>SUCCESS</strong>:
					<?php echo htmlentities($msg); ?>
					</div>
			<?php } ?>
			<div class="overflow-x-auto">
				<table class="border-collapse border w-full sm:w-3/4 md:w-2/3 lg:1/2 xl:w-2/3 mx-auto">
					<thead>
						<tr>
							<th class="border p-2">#</th>
							<th class="border p-2">Ticket Id</th>
							<th class="border p-2">Issue</th>
							<th class="border p-2">Description</th>
							<th class="border p-2">Admin Remark</th>
							<th class="border p-2">Reg Date</th>
							<th class="border p-2">Remark date</th>
						</tr>
					</thead>
					<tbody>
						<?php

						$uemail = $_SESSION['login'];
						;
						$sql = "SELECT * from tblissues where UserEmail=:uemail";
						$query = $dbh->prepare($sql);
						$query->bindParam(':uemail', $uemail, PDO::PARAM_STR);
						$query->execute();
						$results = $query->fetchAll(PDO::FETCH_OBJ);
						$cnt = 1;
						if ($query->rowCount() > 0) {
							foreach ($results as $result) { ?>
								<tr>
									<td class="border p-2">
										<?php echo htmlentities($cnt); ?>
									</td>
									<td class="border p-2">#TKT-
										<?php echo htmlentities($result->id); ?>
									</td>
									<td class="border p-2">
										<?php echo htmlentities($result->Issue); ?>
									</td>
									<td class="border p-2">
										<?php echo htmlentities($result->Description); ?>
									</td>
									<td class="border p-2">
										<?php echo htmlentities($result->AdminRemark); ?>
									</td>
									<td class="border p-2">
										<?php echo htmlentities($result->PostingDate); ?>
									</td>
									<td class="border p-2">
										<?php echo htmlentities($result->AdminremarkDate); ?>
									</td>
								</tr>
								<?php $cnt = $cnt + 1;
							}
						} ?>
					</tbody>
				</table>
			</div>
			</div>
			</div>
	</section>

	<?php include('includes/footer.php'); ?>
	</body>

	</html>
<?php } ?>