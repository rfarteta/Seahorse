
<?php

if(!empty($_POST))
{

    echo "<script>alert('". orderCreate($loggedInUser->user_id, $_POST["figures"]) ."');</script>";
  
}

$productData = productFetchAll(); //Retrieve list of all products
$num = 0;
$pid = "";
echo '
<form name="adminPermissions" action="'.$_SERVER['PHP_SELF'].'"" method="post">
<h5>Inventory</h5>
<table class="mdl-data-table mdl-js-data-table">
  <thead>
    <tr>
      <th class="mdl-data-table__cell--non-numeric">Product Name</th>
      <th>Category</th>
      <th>Description</th>
      <th>Price</th>
      <th>Stock</th>
      <th class="mdl-data-table__cell--non-numeric">Action</th>
    </tr>
  </thead><tbody>';

//List each permission level
foreach ($productData as $v1) {
$num++;
$pid = $v1['prod_id'] .",". $pid;
inventoryFetch();
echo '<tr>
      <td class="mdl-data-table__cell--non-numeric">'. $v1['prod_name'] .'</td>
      <td>'. $v1['prod_description'] .'</td>
      <td>'. $v1['prod_category'] .'</td>
      <td id="p'. $num .'">'. $v1['prod_price'] .'</td>
      <td id="v'. $num .'">0</td>
      <td> 
           <a href="#" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" data-upgraded=",MaterialButton,MaterialRipple" onclick="inc('. $num .')">
              <i class="material-icons">add</i>
              <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 160.392px; height: 160.392px; transform: translate(-50%, -50%) translate(18px, 30px);"></span>
              </span>
            </a>
           <a href="#" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" data-upgraded=",MaterialButton,MaterialRipple" onclick="dec('. $num .')">
              <i class="material-icons">remove</i>
              <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 160.392px; height: 160.392px; transform: translate(-50%, -50%) translate(18px, 30px);"></span>
              </span>
            </a>
      </td>
    </tr>';

}

echo '
</tbody>
</table><br>
<input type="text" name="figures" style="display:none" id="figures">
<input type="text" name="pid" style="display:none" value="'. $pid .'"><br>

    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored-red" data-upgraded=",MaterialButton,MaterialRipple" type="submit" name="action">
      <i class="material-icons">forward</i>
        <span id="total">
          Order Now
        </span>
      <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 278.477px; height: 278.477px; transform: translate(-50%, -50%) translate(95px, 15px);"></span>
      </span>
    </button>
  </form>
';
?>

<script>
  loadValues(<?php echo $num; ?>);
</script>