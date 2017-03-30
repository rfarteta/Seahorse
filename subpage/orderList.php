<?php

if(!empty($_POST))
{

  //Delete permission levels
  if(!empty($_POST['Delivered'])){
    $Delivered = $_POST['Delivered'];
    $m = 0;

    foreach($Delivered as $v){
     DeliveredOrders($v);
     $m++;
    }
    

    echo "<script>alert('Updated ". $m ." orders');</script>";

    // if ($update = DeliveredOrders($Delivered)){
    // $successes[] = "Updated ". $update ." accounts";
    // }
  }
  

}

// $productData = productFetchAll(); //Retrieve list of all products
$num = 0;
// $pid = "";


$orderData = orderFetchAll();

echo '
<form name="adminPermissions" action="'.$_SERVER['PHP_SELF'].'"" method="post">
<h5>Order List</h5> 
<table class="mdl-data-table mdl-js-data-table">
  <thead>
    <tr>
      <th class="mdl-data-table__cell--non-numeric">Product Name</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Total Price</th>
      <th class="mdl-data-table__cell--non-numeric">Address</th>
      <th>Delivered</th>
    </tr>
  </thead><tbody>';

//List each permission level
foreach ($orderData as $v1) {

echo '<tr>
      <td class="mdl-data-table__cell--non-numeric">'. GetProductName($v1['prod_id']) .'</td>
      <td>'. $v1['amount'] .'</td>
      <td>'. $v1['quantity'] .'</td>
      <td id="p'. $num .'">'. number_format($v1['amount'] * $v1['quantity'], 2) .'</td>
      <td id="v'. $num .'">'. GetAddress(GetCustomerId($v1['user_id'])) .'</td>
      <td>';

      if(GetDeliveryStatus($v1['shipment_id']) == 1)
      {
        echo "Done";
      } else {
        echo "<input type='checkbox' name='Delivered[".$v1['shipment_id']."]' value='".$v1['shipment_id']."' >";
      }

echo '</td>
    </tr>';

$num++;
}

echo '
</tbody>
</table><br>
<input type="submit" name="Submit" value="Submit" />
</form>
';
?>

<script>
  loadValues(<?php echo $num; ?>);
</script>