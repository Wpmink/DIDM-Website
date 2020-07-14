<?php
//Template Name:Update Status Edit Page

get_header();
get_template_part('breadcrums');

?>
<div class="container">
	<div class="row enigma_blog_wrapper">
		<div class="col-md-12">

<?php
    //  global $wpdb;
    //  $IDK = $wpdb->get_results("SELECT IDK FROM wp_ID ");

	$result1 = $wpdb->get_results("SELECT * FROM wp_printer3D INNER JOIN wp_ID on wp_printer3D.ID = wp_ID.IDK");
	foreach($result1 as $print)
	{
		$Username = $print->Username;
		$Name = $print->Firstname;
		$trackingnumber = $print->Trackingnumber;

	}

?>	<br><strong> Username : </strong><?php echo $Username; ?>
	<br><strong> Name : </strong><?php echo $Name; ?>
	<br><strong> Number Tracking : </strong><?php echo $trackingnumber; ?>  

<form method="post">
    <br><br>Status  
    <select name="status">
        <option value="1">Received order</option>
        <option value="2">Valuate and return</option>
        <option value="3">Confirm from customer</option>
        <option value="4">Pending Payment</option>
        <option value="5">Start Print model 3D</option>
        <option value="6">Ready to send and inform Tracking number</option>
    </select>
    <button type="submit" class="btn" style="background: #1bbc9b; color: white;" >Comfirm</button>
</form>

</div>
	</div>
</div>
<?php
	if($_POST)
	{  
			$status = $_POST['status'];
			
				$result2 = $wpdb->get_results("SELECT * FROM wp_ID");
				foreach ($result2 as $print)
				{
					$beforeIDK = $print->IDK;

				}
				
				$table_name = 'wp_printer3D';
				$data_array = array(
									'Status' => $status 
																);
	
				$field_name = array(
									'ID'=> $beforeIDK
																);
	
				$updateResult = $wpdb->update($table_name, $data_array,  $field_name);
							  
	
	
			if($updateResult == 1)
			 {
				
				 echo "<script type='text/javascript'>alert('Update Successfully.');window.location.href='".site_url(). "/index.php/update-status". "';</script>";
			 }
			 else
			 {
				echo "<script type='text/javascript'>alert('Fail.');window.location.href='".site_url(). "/index.php/update-status-edit". "';</script>";
			 }
	}
?>

<?php get_footer(); ?>