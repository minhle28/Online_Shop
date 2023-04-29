<?php
include "adminCommon.php";
admin_head_tag();
?>

<body>
	<?php admin_sidebar(); ?>

	<?php admin_navbar(); ?>

		<!-- Dashboard -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
				</div>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check'></i>
					<span class="text">
						<h3>3</h3>
						<p>New Order</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group'></i>
					<span class="text">
						<h3>0</h3>
						<p>Visitors</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle'></i>
					<span class="text">
						<h3>$0</h3>
						<p>Total Sales</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Orders</h3>
					</div>
					<table>
						<thead>
							<tr>
								<th>User</th>
								<th>Date Order</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<img src="images/user.png">
									<p>Cutomer 1</p>
								</td>
								<td>04-27-2023</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
							<tr>
								<td>
									<img src="images/user.png">
									<p>Cutomer 2</p>
								</td>
								<td>04-27-2023</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="images/user.png">
									<p>Cutomer 3</p>
								</td>
								<td>04-28-2023</td>
								<td><span class="status process">Process</span></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</main>
	</section>

	<script src="./js/admin.js"></script>
</body>

</html>