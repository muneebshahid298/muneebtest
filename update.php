
<!-- <?php 
  //include_once("common/header.php");
  //include_once("common/footer.php");
 ?> -->
<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "muneeb";

$conn = new mysqli($servername, $username, $password, $database);


if (isset($_POST["edit_cash"])) {
  $cash_id = $_POST['edit_cash'];

            $sql = "SELECT * FROM cashier WHERE close = '1' AND status = '1' AND cash_id = '" . $cash_id . "'";
            $result = mysqli_query($conn, $sql);
            foreach ($result as $row) {
     ?>
        <form action="insert.php" method="post">
          <div class="row">
            <div class="form-group col-md-6">
            <input type="hidden" name="cash_id" value="<?php echo $row['cash_id'] ?>">
               <input type="date" id="cash_date" class="form-control" required name="cash_date" value="<?php echo $row['cash_date']; ?>">
            </div>
            <div class="form-group col-md-6">
               <input type="text" id="cash_acc_name" class="form-control" required name="cash_acc_name" value="<?php echo $row['cash_acc_name']; ?>">
            </div>
            <div class="form-group col-md-12">
               <input type="text" id="cash_desc" class="form-control" required name="cash_desc" value="<?php echo $row['cash_desc']; ?>">
            </div>
            <div class="form-group col-md-6">
               <input type="text" id="cash_amt" class="form-control" required name="cash_amt" value="<?php echo abs($row['cash_amt']); ?>">
            </div>
            <div class="form-group col-md-6">
               <select name="cash_type" id="cash_type" class="form-control" required>
                <option value="<?php echo $row['cash_type']; ?>" selected><?php echo $row['cash_type']; ?></option>
                <option value="Income">Income</option>
                <option value="Expense">Expense</option>
               </select>
            </div>
            <div class="form-group col-md-12 modal-footer">
               <input type="submit" class="btn btn-info" value="Update" name="updatecash" style="float:right;">
            </div>
         
        </div>
        </form>
      <?php 
    } 
       } ?>