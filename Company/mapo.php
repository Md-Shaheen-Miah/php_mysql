
<?php 
$db = new mysqli('localhost','root','','company');

if(isset($_POST['btnSubmit'])){
	$mname = $_POST['mname'];
    $maddress=$_POST['maddress'];
	$mcontact = $_POST['mcontact'];
	$db->query(" call manufacture('$mname',' $maddress','$mcontact') ");
}


?>


<form action="#" method="post">
<fieldset style="width:30%;margin:0% auto;">
	<legend><h3>Manufacturer table</h3></legend>
	<table>
		
		<tr>
			<td><label for="mname">Name</label></td>
			<td><input type="text" name="mname" /></td>
		</tr>
        <tr>
            <td><label for="maddress">Address</label></td>
            <td><input type="text" name="maddress"></td>
        </tr>
		<tr>
			<td><label for="mcontact">Contact</label></td>
			<td><input type="text" name="mcontact" /></td>
		</tr>
		<tr> 
			<td></td>
			<td><input type="submit" name="btnSubmit" value="submit" /></td>
		</tr>
		
	</table>
	</fieldset>
</form>



<?php
if(isset($_POST['addProduct'])){
	$pname = $_POST['pname'];
	$mprice = $_POST['mprice'];
   
	$mid = $_POST['manufac'];
	$db->query(" call production('$pname','$mprice','$mid') ");
}


if(isset($_POST['delmanufact'])){
	$mid = $_POST['manufac'];
	$db->query(" delete from manufacturer where id='$mid ' ");
}


?>


<form action="#" method="post">
	<fieldset style="width:30%;margin:0% auto;">
	<legend><h3>Product table</h3></legend>
	<table>
		<tr>
			<td><label for="pname">Name</label></td>
			<td><input type="text" name="pname" /></td>
		</tr>
		<tr>
			<td><label for="mprice">Price</label></td>
			<td><input type="text" name="mprice" /></td>
		</tr>
        
		<tr>
			<td><label for="manufac">Manufacturer Name</label></td>
			<td>
				<select name="manufac">
					<?php 
						$manufac = $db->query("select * from manufacturer");
						while(list($_mid,$_mname) = $manufac->fetch_row()){
							echo "<option value='$_mid'>$_mname</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr> 
			<td></td>
			<td><input type="submit" name="addProduct" value="submit" /></td>
		</tr>
	</table>
	</fieldset>
</form>


<form action="#" method="post" >
	<table style="margin:0% auto;">
		<tr>
			<td><label for="manufac">Manufacturer</label></td>
			<td>
				<select name="manufac">
					<?php 
						$manufac = $db->query("select * from manufacturer");
						while(list($_mid,$_mname) = $manufac->fetch_row()){
							echo "<option value='$_mid'>$_mname</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr> 
			<td></td>
			<td><input type="submit" name="delmanufact" value="delete" /></td>
		</tr>
	</table>
</form>






<fieldset style="width:30%;margin:0% auto;">
<legend><h3>View Product</h3></legend>
<table border="1" style="border-collapse: collapse; "  > 
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Price</th>
		<th>Manufacturer name</th>
		<th>Contact</th>
		
	</tr>
	<?php 
		$product = $db->query(" select * from view_product ");
		while(list($_id,$_name,$_price,$_Manufacturer,$_ccontact,) = $product->fetch_row()){
			echo "<tr> 
					<td>$_id</td>
					<td>$_name</td>
					<td>$_price</td>
					<td>$_Manufacturer</td>
					<td>$_ccontact</td>
					
				</tr>";
		}
	
	?>
</table>
</fieldset>
