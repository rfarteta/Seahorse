 <?php

if(!empty($_POST))
{
	$errors = array();
	$prod = trim($_POST["product"]);
	$des = trim($_POST["pDescription"]);	
	$cat = trim($_POST["pCategory"]);
	$pri = trim($_POST["pPrice"]);
	$sup = trim($_POST["pSupplier"]);


	if(empty($prod))
	{
		$errors[] = "Please insert Product";
	}
	if(empty($des))
	{
		$errors[] = "Please insert Description";
	}
	if(empty($cat))
	{
		$errors[] = "Please insert Category";
	}
	if(empty($pri))
	{
		$errors[] = "Please insert Price";
	}
	if(empty($sup))
	{
		$errors[] = "Please insert Supplier";
	}


	if(count($errors) == 0)
	{	
		//Construct a question object
		productCreate($prod,$des,$cat,$pri,$sup);
		echo "<script>alert('Product Has Been Created');</script>";
	}
	else
	{
		echo "<script>";
		foreach ($errors as &$err) {
		    echo "alert('". $err ."');";
		}
		echo "</script>";
	}
}

$data = "";
$supplierFetchAll = supplierFetchAll(); //Retrieve list of all supplier
		foreach ($supplierFetchAll as $v1) {
			$data = $data ."<option value='". $v1['supp_id'] ."'>". $v1['supp_name'] ."</option>";
		}


echo "
<h5>Add Product</h5>
<div id='regbox'>
<form name='newUser' action='".$_SERVER['PHP_SELF']."' method='post'>

<div class='mdl-textfield mdl-js-textfield'>
  <textarea class='mdl-textfield__input' type='text' rows='1' id='Product' name='product'></textarea>
  <label class='mdl-textfield__label' for='product'>Product</label>
</div>
<br>
<div class='mdl-textfield mdl-js-textfield'>
  <textarea class='mdl-textfield__input' type='text' rows='1' id='pDescription' name='pDescription'></textarea>
  <label class='mdl-textfield__label' for='pDescription'>Product Description</label>
</div>
<br>
<div class='mdl-textfield mdl-js-textfield'>
  <textarea class='mdl-textfield__input' type='text' rows='1' id='pCategory' name='pCategory'></textarea>
  <label class='mdl-textfield__label' for='pCategory'>Category</label>
</div>
<br>
<div class='mdl-textfield mdl-js-textfield'>
  <textarea class='mdl-textfield__input' type='text' rows='1' id='pPrice' name='pPrice'></textarea>
  <label class='mdl-textfield__label' for='pPrice'>Price</label>
</div>
<br>
Supplier Name:<div class='mdl-select mdl-js-select mdl-select--floating-label'>
	<select class='mdl-select__input' id='supplier' name='pSupplier'>
		<option value=''></option>". $data ."</select>
</div>
</div>

<br><br>

<div class='mdl-grid'>
  <input class='mdl-button mdl-js-button mdl-button--raised' type='submit' value='Add Product'/>
</div>


</form>
</div>";

?>