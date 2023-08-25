<?php 
include_once("common/header.php");
?>

<div class="card">
	<div class="container">
		<div class="card-header">

			<div class="row">
				<div class="form-group col-md-2">
					<input type="date" id="cash_date" class="form-control" name="cash_date" value="" placeholder="" required>
				</div>
				<div class="form-group col-md-2">
					<input type="text" id="cash_acc_name" class="form-control" name="cash_acc_name" value="" placeholder="Account Name" required>
				</div>
				<div class="form-group col-md-2">
					<input type="text" id="cash_desc" class="form-control" name="cash_desc" value="" placeholder="Description" required>
				</div>
				<div class="form-group col-md-2">
					<input type="number" id="cash_amt" class="form-control" name="cash_amt" value="" placeholder="Amount" required step="0.001">
				</div>
				<div class="form-group col-md-2">
					<select name="cash_type" id="cash_type" class="form-control" required>
						<option value="Income">Income</option>
						<option value="Expense">Expense</option>
					</select>
				</div>
				<div class="form-group col-md-2">
					<button class="btn btn-info" name="submitcash" id="submitcash" onclick="accept(submitcash)" style="float:right;">Post</button>
				</div>

			</div>



			<button type="button" class="btn btn-info btn-lg" id="cash_edit_btn" data-toggle="modal" data-target="#myModal" style="display: none;">Open Modal</button>

			<!-- Modal -->
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Update</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>

						</div>
						
						<div class="modal-body" id="cash_edit_body">
							
						</div>

					</div>

				</div>
			</div>


			<form action="" method="get" class="mt-2">
				<div class="row">
					<div class="col-md-2">
						<span>Filter Results</span>
					</div>

					<div class="col-md-2">
						<input type="date" id="filter_date_from" class="form-control" name="filter_date_from" value="" placeholder="">
					</div>

					<div class="col-md-2">
						<input type="date" id="filter_date_to" class="form-control" name="filter_date_to" value="" placeholder="">
					</div>

					<div class="col-md-2">
						<input type="text" id="filter_account_name" class="form-control" name="filter_account_name" value="" placeholder="Account Name">
					</div>
					<div class="form-group col-md-2">
						<select name="cash_type_filter" id="cash_type_filter" class="form-control">
							<option value="">Select</option>
							<option value="Income">Income</option>
							<option value="Expense">Expense</option>
						</select>
					</div>
					<div class="form-group col-md-1">

						<button class="btn btn-success" n class="btn btn-danger" type="submit" title="apply" name="applyfilter" value="filter">Apply</button>
					</div>
					<div class="form-group col-md-1"><button class="btn btn-danger" onClick="window.location.reload(true)">Clear</button></div>
				</div>
			</form>
		</div>


		<?php 
		if (isset($_GET["applyfilter"]) && $_GET['filter_date_from'] !='' && $_GET['filter_date_to'] !='' && $_GET['filter_account_name'] !='' && $_GET['cash_type_filter'] !='') {
			$filter_date_from = $_GET['filter_date_from'];
			$filter_date_to = $_GET['filter_date_to'];
			$filter_account_name = $_GET['filter_account_name'];
			$cash_type_filter = $_GET['cash_type_filter'];

			$sql = "SELECT * FROM cashier WHERE close = '1' AND status = '1' AND cash_acc_name = '".$filter_account_name."' AND cash_type = '".$cash_type_filter."' AND cash_date BETWEEN '".$filter_date_from."' AND '".$filter_date_to."' ";
			$result = mysqli_query($conn, $sql);
		}

		elseif (isset($_GET["applyfilter"]) && $_GET['filter_date_from'] !='' && $_GET['filter_date_to'] !='' && $_GET['filter_account_name'] =='' && $_GET['cash_type_filter'] =='') {
			$filter_date_from = $_GET['filter_date_from'];
			$filter_date_to = $_GET['filter_date_to'];

			$sql = "SELECT * FROM cashier WHERE close = '1' AND status = '1' AND cash_date BETWEEN '".$filter_date_from."' AND '".$filter_date_to."' ";
			$result = mysqli_query($conn, $sql);	
		}

		elseif (isset($_GET["applyfilter"]) && $_GET['filter_date_from'] !='' && $_GET['filter_date_to'] !='' && $_GET['filter_account_name'] !='' && $_GET['cash_type_filter'] =='') {
			$filter_date_from = $_GET['filter_date_from'];
			$filter_date_to = $_GET['filter_date_to'];
			$filter_account_name = $_GET['filter_account_name'];

			$sql = "SELECT * FROM cashier WHERE close = '1' AND status = '1' AND cash_date BETWEEN '".$filter_date_from."' AND '".$filter_date_to."' AND cash_acc_name = '".$filter_account_name."' ";
			$result = mysqli_query($conn, $sql);
		}

		elseif (isset($_GET["applyfilter"]) && $_GET['filter_date_from'] !='' && $_GET['filter_date_to'] !='' && $_GET['cash_type_filter'] !=''  && $_GET['filter_account_name'] =='') {
			$filter_date_from = $_GET['filter_date_from'];
			$filter_date_to = $_GET['filter_date_to'];
			$cash_type_filter = $_GET['cash_type_filter'];

			$sql = "SELECT * FROM cashier WHERE close = '1' AND status = '1' AND cash_type = '".$cash_type_filter."' AND cash_date BETWEEN '".$filter_date_from."' AND '".$filter_date_to."' ";
			$result = mysqli_query($conn, $sql);
		}

		elseif (isset($_GET["applyfilter"]) && $_GET['filter_date_from'] =='' && $_GET['filter_date_to'] =='' && $_GET['filter_account_name'] !='' && $_GET['cash_type_filter'] !='') {
			$filter_account_name = $_GET['filter_account_name'];
			$cash_type_filter = $_GET['cash_type_filter'];

			$sql = "SELECT * FROM cashier WHERE close = '1' AND status = '1' AND cash_acc_name = '".$filter_account_name."' AND cash_type = '".$cash_type_filter."' ";
			$result = mysqli_query($conn, $sql);
		}

		else{
			$sql = "SELECT * FROM cashier WHERE close = '1' AND status = '1'";
			$result = mysqli_query($conn, $sql);
		}
			?>


			<div class="card-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Date</th>
							<th>Name</th>
							<th>Description</th>
							<th>Amount</th>
							<th>Type</th>
							<th>Balance</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$total_amt = 0;
						$balance = 0;
						$t_balance = 0;
						foreach ($result as $row) {
							$formatted_date = date("d F Y", strtotime($row['cash_date']));
							?>
							<tr id='<?php echo $row['cash_id'] ?>'>
								<td><?php echo $formatted_date; ?></td>
								<td><?php echo $row['cash_acc_name']; ?></td>
								<td class="desc"><?php echo $row['cash_desc']; ?></td>
								<td><?php echo abs($row['cash_amt']); ?></td>
								<td><?php echo $row['cash_type']; ?></td>
								<td>
									<?php 

									if ($row['cash_type'] == "Income") {
										$balance += abs($row['cash_amt']);
										$total_amt += abs($row['cash_amt']);
									} else if ($row['cash_type'] == "Expense") {
										$balance -= abs($row['cash_amt']);
										$total_amt += abs($row['cash_amt']);
									}


									echo $balance;
									$t_balance += $balance;
									?>

								</td>
								<td> 
									<button class="btn btn-info" type="submit" title="Edit" name="editcash" onclick="edit_cash();">Edit</button> &nbsp;
									<input type="hidden" name="cash_id" id='cash_id' value="<?php echo $row['cash_id'] ?>">
									<button class="btn btn-danger" type="submit" title="Delete" name="deletecash" onclick="del(deletecash,<?php echo $row['cash_id'] ?>)">Del</button>
									
								</td>
							</tr>
						<?php } ?>
						<tr>
							<td colspan="3" style="font-weight: bolder;">Total</td>
							<td style="font-weight: bolder;"><?php echo $total_amt; ?></td>
							<td></td>
							<td style="font-weight: bolder;"><?php echo $t_balance; ?></td>
							<td></td>
						</tr>
					</tbody>


				</table>
			</div>


	</div>
</div>



<script type="text/javascript">
	function submitcash(){
		var cash_date = $("#cash_date").val();
		var cash_acc_name = $("#cash_acc_name").val();
		var cash_desc = $("#cash_desc").val();
		var cash_amt = $("#cash_amt").val();
		var cash_type = $("#cash_type").val();

		$.ajax({
			type: "POST",
			url: "insert.php",
			data:{
				insertcash:cash_date,
				cash_acc_name:cash_acc_name,
				cash_desc:cash_desc,
				cash_amt:cash_amt,
				cash_type:cash_type
			},
			success: function(data){
	    // Swal.fire(
	    //     'Success!!',
	    //     'Cash has been added!'
	    // )
	    location.reload();
	}

});
	}


	function deletecash(id){
		var id = id;
		$.ajax({
			type: "POST",
			url: "insert.php",
			data: 'delete_cash='+id,
			success: function(data){
				var rowh = "#"+id;
				$(rowh).remove();
				Swal.fire(
					'Deleted!',
					'Record has been deleted.',
					'success'
					)
				//alert(data);
			}

		});
	}



	function edit_cash(){
		var id = $("#cash_id").val();;
		$.ajax({
			type: "POST",
			url: "update.php",
			data: 'edit_cash='+id,
			success: function(data){
				$("#cash_edit_body").html(data);
				$('#cash_edit_btn').trigger('click');
				 //alert(data);
				}

			});
	}
</script>

<?php 
include_once("common/footer.php");
 ?>
