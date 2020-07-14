<?php
//Template Name:Manage Order Page
get_header();
get_template_part('breadcrums');
?>

<div class="container">

	<div class="row enigma_blog_wrapper">

	<div class="col-md-12">

		<table>
		    <thead>
		        <tr  style='background-color:#1bbc9b;color:#000;'>
		            <th>Username</th>
		            <th>Name</th>
		            <th>Material Type</th>
		            <th>Color</th>
		            <th>Infill</th>
		            <th>TrackingNumber</th>
		            <th></th>
		        </tr>
		    </thead>
		    <?php
		 global $wpdb;
		 $result = $wpdb->get_results("SELECT * FROM wp_printer3D ");
		    foreach($result as $print)
			{

					?>
		      <tbody>

		          <td>
		          <?= $print->Username;?>
		          </td>

		          <td>
		          <?= $print->Firstname;?>
		          </td>

		          <td>
		          <?= $print->Type;?>
		          </td>

		          <td>
		          <?= $print->Color;?>
		          </td>

		      	  <td>
		      		<?= $print->Infill;?>
		      	  </td>

		            <td>
		      		<?= $print->Trackingnumber;?>
		      	  </td>

		      		<td>
		              <form method="post">
		                <input type="hidden" id="idk2" name="idk2" value="<?= $print->ID;?> ">
						   			<button name="edit" type="submit" class="btn btn-success">Edit</button>



						   			<button name="delete" type="submit" class="btn btn-danger">Delete</button>
					 				</form>
		      		</td>

		  <?php
		  }
		  ?>
		      </tbody>
		  </table>



		<?php
		if(isset($_POST['edit']))
		{
		        $IDK = $_POST['idk2'];
						$result50 = $wpdb->get_results("SELECT * FROM wp_printer3D WHERE ID = '$IDK'");

						foreach($result50 as $print)
					{
						$user50 = $print->Username;
						$name50 = $print->Firstname;
						$tel50 = $print->Telephone;
						$email50 = $print->Email;

						$color50 = $print->Color;
						$infill50 = $print->Infill;
						$trackingNumber50 = $print->Trackingnumber;
					}
					// echo "username = " . $user50;
					// echo "name = " . $name50;
					// echo "tel = " . $tel50;
					// echo "email = " . $email50;
?>
					<hr />
					<br>
					<strong>User : </strong><?= $user50;?>
					<br><strong>Name : </strong><?= $name50;?>
					<br><strong>Telephone :  </strong><?= $tel50;?>
					<br><strong>Email :  </strong><?= $email50;?>
					<form method="post">

					<br><br><strong style="text-align: center;">Material Type </strong><select name="typeofmodal">
					<option value="ABS">ABS</option>
					<option value="PLC">PLC</option>
					<option value="Nylon">Nylon</option>
					<option value="TPU">TPU</option>
					<option value="TPE">TPE</option>
					</select>
					<br><br><strong>Color </strong>
							<input name="color" required="" type="text" value="<?= $color50;?>" />
					<br><br><strong>Infill</strong>  
							<input name="infill" required="" type="int" maxlength="3" value="<?= $infill50;?>" /></p>

					<br><strong>Tracking Number </strong>  
							<input name="trackingnumber"  type="text"  value="<?= $trackingNumber50;?>" /></p>
							<input type="hidden" id="idk50" name="idk50" value="<?= $IDK;?> ">

					<br><button name="confirmUpdate" class="btn" style="background: #1bbc9b; color: white;" type="submit">Confirm</button></p>
					</form>



			<?php




}


		if(isset($_POST['delete']))
		{
		        $IDK30 = $_POST['idk2'];
						//echo "IDK30 = " . $IDK30;
						$table_name30 = 'wp_printer3D';
						$field_name30 = array(
								'ID'=> $IDK30
														);

						$deleteResult = $wpdb->delete($table_name30, $field_name30, $format = null );
						if($deleteResult == 1)
						{

								echo "<script type='text/javascript'>alert('Delete Successfully.');window.location.href='".site_url(). "/index.php/manage-order". "';</script>";
						}
						else
						{
								echo "<script type='text/javascript'>alert('Fail.');window.location.href='".site_url(). "/index.php/manage-order". "';</script>";
						}


		}





		if(isset($_POST['confirmUpdate']))
		{
			$IDK50 = $_POST['idk50'];
			$newType50 = $_POST['typeofmodal'];
			$newColor50 = $_POST['color'];
			$newInfill50 = $_POST['infill'] ;
			$newTrackingNumber50 = $_POST['trackingnumber'] ;

			$result100 = $wpdb->get_results("SELECT * FROM wp_printer3D WHERE Trackingnumber = '$newTrackingNumber50'");
			if($result100 && $newTrackingNumber50 != "")
			{
					echo "<script type='text/javascript'>alert('Tracking Number already exist')</script>";
			}
			else
			{
						// echo "newType = " . $newType50;
						// echo "newColor = " . $newColor50;
						// echo "newInfill = " . $newInfill50;
						// echo "newTrackingNumber = " . $newTrackingNumber50;

						$to = $email50;
						$subject = "3d register";
						$headers = 'From: ' . getDIDMMail() . "\r\n";
						$message .= 'You can check and track at 3DPtracking in website.This is your Tracking number : ' . $Trackingnumber . "\r\n";

						// echo $beforeIDK;
						$table_name = 'wp_printer3D';
						$data_array = array(
																'Type' => $newType50 ,
																'Color' => $newColor50 ,
																'Infill' => $newInfill50 ,
																'Trackingnumber' => $newTrackingNumber50
															);

						$field_name = array(
																'ID'=> $IDK50
																);


						 $updateResult = $wpdb->update($table_name, $data_array,  $field_name);
						 if($updateResult == 1)
						 {
								 mail($to,$subject,$message,$headers);
								 echo "<script type='text/javascript'>alert('Edit Successfully.');window.location.href='".site_url(). "/index.php/manage-order". "';</script>";

						 }
						 else
						 {
								//echo "Fail";
								echo "<script type='text/javascript'>alert('Edit Fail, please enter your tracking number again.');window.location.href='".site_url(). "/index.php/manage-order". "';</script>";
						 }
			}



		}


		?>
	</div>

	</div>

	</div>
  <?php get_footer(); ?>
