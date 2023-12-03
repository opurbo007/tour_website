<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
	header('location:index.php');
} else {
	if (isset($_REQUEST['bkid'])) {
		$bid = intval($_GET['bkid']);
		$email = $_SESSION['login'];
		$sql = "SELECT FromDate FROM tblbooking WHERE UserEmail=:email and BookingId=:bid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->bindParam(':bid', $bid, PDO::PARAM_STR);
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_OBJ);
		if ($query->rowCount() > 0) {
			foreach ($results as $result) {
				$fdate = $result->FromDate;

				$a = explode("/", $fdate);
				$val = array_reverse($a);
				$mydate = implode("/", $val);
				$cdate = date('Y/m/d');
				$date1 = date_create("$cdate");
				$date2 = date_create("$fdate");
				$diff = date_diff($date1, $date2);
				echo $df = $diff->format("%a");
				if ($df > 1) {
					$status = 2;
					$cancelby = 'u';
					$sql = "UPDATE tblbooking SET status=:status,CancelledBy=:cancelby WHERE UserEmail=:email and BookingId=:bid";
					$query = $dbh->prepare($sql);
					$query->bindParam(':status', $status, PDO::PARAM_STR);
					$query->bindParam(':cancelby', $cancelby, PDO::PARAM_STR);
					$query->bindParam(':email', $email, PDO::PARAM_STR);
					$query->bindParam(':bid', $bid, PDO::PARAM_STR);
					$query->execute();

					$msg = "Booking Cancelled successfully";
				} else {
					$error = "You can't cancel booking before 24 hours";
				}
			}
		}
	}

	include('includes/navbar.php'); ?>


	<section class="items-center py-10 bg-stone-100 xl:h-screen font-poppins dark:bg-gray-800">

		<div class="text-center">
			<h2 class="text-4xl font-bold border-b-4 border-blue-500 inline-block pb-2">Your Tour History</h2>
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
							<th class="border p-2">Booking Id</th>
							<th class="border p-2">Package Name</th>
							<th class="border p-2">From</th>
							<th class="border p-2">To</th>
							<th class="border p-2">Comment</th>
							<th class="border p-2">Status</th>
							<th class="border p-2">Booking Date</th>
							<th class="border p-2">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$uemail = $_SESSION['login'];
						$sql = "SELECT tblbooking.BookingId as bookid, tblbooking.PackageId as pkgid, tbltourpackages.PackageName as packagename, tblbooking.FromDate as fromdate, tblbooking.ToDate as todate, tblbooking.Comment as comment, tblbooking.status as status, tblbooking.RegDate as regdate, tblbooking.CancelledBy as cancelby, tblbooking.UpdationDate as upddate FROM tblbooking JOIN tbltourpackages ON tbltourpackages.PackageId=tblbooking.PackageId WHERE UserEmail=:uemail";
						$query = $dbh->prepare($sql);
						$query->bindParam(':uemail', $uemail, PDO::PARAM_STR);
						$query->execute();
						$results = $query->fetchAll(PDO::FETCH_OBJ);
						$cnt = 1;
						if ($query->rowCount() > 0) {
							foreach ($results as $result) {
								?>
								<tr>
									<td class="border p-2">
										<?php echo htmlentities($cnt); ?>
									</td>
									<td class="border p-2">#BK
										<?php echo htmlentities($result->bookid); ?>
									</td>
									<td class="border p-2"><a href="package-details.php?pkgid=<?php echo htmlentities($result->pkgid); ?>"
											class="text-blue-500 hover:underline">
											<?php echo htmlentities($result->packagename); ?>
										</a></td>
									<td class="border p-2">
										<?php echo htmlentities($result->fromdate); ?>
									</td>
									<td class="border p-2">
										<?php echo htmlentities($result->todate); ?>
									</td>
									<td class="border p-2">
										<?php echo htmlentities($result->comment); ?>
									</td>
									<td class="border p-2">
										<?php
										if ($result->status == 0) {
											echo "Pending";
										} elseif ($result->status == 1) {
											echo "Confirmed";
										} elseif ($result->status == 2 && $result->cancelby == 'u') {
											echo "Canceled by you at " . $result->upddate;
										} elseif ($result->status == 2 && $result->cancelby == 'a') {
											echo "Canceled by admin at " . $result->upddate;
										}
										?>
									</td>
									<td class="border p-2">
										<?php echo htmlentities($result->regdate); ?>
									</td>
									<?php if ($result->status == 2) { ?>
										<td class="border p-2">Cancelled</td>
									<?php } else { ?>
										<td class="border p-2">
											<a href="tour-history.php?bkid=<?php echo htmlentities($result->bookid); ?>"
												class="text-red-500 hover:underline"
												onclick="return confirm('Do you really want to cancel booking')">Cancel</a>
										</td>
									<?php } ?>
								</tr>
								<?php
								$cnt = $cnt + 1;
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