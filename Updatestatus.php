<?php
//Template Name:Update Status Page

get_header();
get_template_part('breadcrums');

?>
<div class="container">
	<div class="row enigma_blog_wrapper">
		<div class="col-md-12">
<?php
	  global $wpdb;
	  $result = $wpdb->get_results("SELECT * FROM wp_printer3D");
	  
	  $result1 = $wpdb->get_results("SELECT * FROM wp_printer3D INNER JOIN wp_statustracking on wp_printer3D.Status = wp_statustracking.IDS");
?>

<table>
    <thead>
        <tr  style='background-color:#1bbc9b;color:#000;'>
            <th>Name</th>
            <th>Tracking Number</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
<?php

foreach($result1 as $print)
{
?>
	<tbody>
			<tr class=" align-middle">
					
					<td>
						<?= $print->Firstname;?> 
						
					</td>

					<td>
						<?=	$print->Trackingnumber;?>
					</td>		
		
					<td>
						<?=	$print->Status_name;?>
					</td>

					<td>
					<form method="post">
						<input type="hidden" id="idk" name="idk" value="<?= $print->ID?>  ">
						<button name="confirm" type="submit" class="btn btn-success">Edit</button>
				   </form>
					</td>
			</tr>
<?php
}
?>
	</tbody>
</table>
		
		</div>
	</div>
</div>
<?php
	if(isset($_POST['confirm']))
	{  
			$IDK = $_POST[idk];
				echo $IDK;
				$result2 = $wpdb->get_results("SELECT * FROM wp_ID");
				foreach ($result2 as $print)
				{
					$beforeIDK = $print->IDK;
				}
				
				$table_name = 'wp_ID';
				$data_array = array(
									'IDK' => $IDK 
								);
	
				$field_name = array(
									'IDK'=> $beforeIDK 
																);
	
				$updateResult = $wpdb->update($table_name, $data_array,  $field_name);
							  
	
	
			if($updateResult == 1)
			 {
				
				 echo "<script type='text/javascript'>window.location.href='".site_url(). "/index.php/update-status-edit". "';</script>";
			 }
			 else
			 {
				echo "<script type='text/javascript'>alert('Fail.');window.location.href='".site_url(). "/index.php/update-status". "';</script>";
			 }
	}
?>

<?php get_footer(); ?>

