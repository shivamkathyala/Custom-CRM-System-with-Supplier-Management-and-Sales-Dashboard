<?php
//include auth_session.php file on all user panel pages
require_once("adminFunction.php");  

headers(); 
menus();
leftSidebar();
?>

	<div class="userList pageContent">
		<div class="container">
			<div class="inner"> 
					<!-- Modal content -->
					<?php
						$type = 'salesperson';
						 $sql = "SELECT * FROM `users`"; // WHERE type = '$type'
					
						$result = mysqli_query($con, $sql);
						$total = mysqli_num_rows($result);
						?>
				 
						
						<h2 class="salehead">All Users</h2>
						
						<input type="text" id="myInput" onkeyup="myFunctionList()" placeholder="Search .." title="Type in a username or email">
						<p>Total users = <?php echo $total; ?></p>
					<div class="table-container" style="max-height: 300px; overflow-y: scroll;">
						<table id="myTable">
						  <tr class="header">
							<th style="width:20%;">Serial No.</th>
							<th style="width:50%;">Username</th>
							<th style="width:30%;">E-mail</th>
							<th style="width:30%;">Role</th>
						  </tr> 
							<?php
							$number = 1;
							while ($row = mysqli_fetch_assoc($result)) {
							?>
							<tr>
								<td><?php echo $number; ?></td>
								<td><?php echo $row['username']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['role']; ?></td>
							</tr>
							<?php
								$number++;	
							}
							?>

						</table> 
					</div>
			</div>
		</div>
	</div>
	<script>
	/* usertable search script */
	function myFunctionList() {
  var input, filter, table, tr, td, i, j, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    var displayRow = false; // Initialize a flag to hide the row

    // Loop through all the columns in the current row
    for (j = 0; j < tr[i].cells.length; j++) {
      td = tr[i].cells[j];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          // If any column contains the filter, show the row
          displayRow = true;
          break; // No need to check other columns in this row
        }
      }
    }

    // Set the row's display property based on the flag
    tr[i].style.display = displayRow ? "" : "none";
  }
}
	
	</script>
<?php footers(); ?> 