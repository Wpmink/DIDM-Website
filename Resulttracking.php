<?php
//Template Name:Result Tracking Page

get_header();

get_template_part('breadcrums');
?>

<div class="container">

	<div class="row enigma_blog_wrapper">

	<div class="col-md-12">
		<?php get_template_part('post','page');

if($_POST)
{
	global $wpdb;
	$Tracking_Number = $_POST['Tracking_Number'] ;
	$error = array();
	if(strpos($Tracking_Number, ' ') !== FALSE)
	{
		$error['tracking_number_space'] = "";
		echo "<script type='text/javascript'>alert('Tracking Number has Space');window.location.href='".site_url(). "/index.php/tracking". "';</script>";
	}
	if(empty($Tracking_Number))
	{
		$error['tracking_number_empty'] = "Needed Tracking Number must";
		echo "<script type='text/javascript'>alert('Needed Tracking Number must');window.location.href='".site_url(). "/index.php/tracking". "';</script>";
	}
	if(count($error) == 0)
	{
				$result = $wpdb->get_results("SELECT * FROM wp_printer3D WHERE Trackingnumber = '$Tracking_Number'");
				if($result)
				{
					foreach ($result as $print)
							{
							$username = $print->Username;
							$name = $print->Firstname;
							$tel = $print->Telephone;
							$email = $print->Email;
							$type = $print->Type;
							$color = $print->Color;
							$infill = $print->Infill;
							$status = $print->Status;
							}


							$result1 = $wpdb->get_results("SELECT * FROM wp_statustracking WHERE IDS = '$status'");
							foreach ($result1 as $print)
							{
								$statusPic = $print->Pic;
								$statusName = $print->Status_name;
							}
						?>

							<table>
									<thead>
											<tr colspan='9' style='background-color:#1bbc9b;color:#000;'>
													<th>Username</th>
													<th>Name</th>
													<th>Telephone</th>
													<th>Email</th>
													<th>Type</th>
													<th>Color</th>
													<th>Infill</th>
													<th>Status</th>
											</tr>
									</thead>
									<tbody>

											<tr class=" align-middle">
													<td>
													<?= $username;?> <!-- ปรินท์ค่าแนวนอน -->

													</td>

													<td>
													<?= $name;?>
													</td>

													<td>
													<?= $tel;?>
													</td>

													<td>
													<?= $email;?>
													</td>

													<td>
													<?= $type;?>
													</td>

													<td>
													<?= $color;?>
													</td>

													<td>
													<?= $infill;?>
													</td>

													<td>
													<?= $statusName;?>
													</td>

											</tr>
									</tbody>
							</table>
			<?php
							echo '<img src = "'.site_url(). "/picture/". $statusPic.'" width="100%""
																			style="border:2px solid white!important ;">' ;
					}

					else
					{
							echo "<script type='text/javascript'>alert('Tracking number incorrect , Please Check your tracking number.');window.location.href='".site_url(). "/index.php/tracking". "';</script>";
					}
				}


}



?>





</div>

</div>

</div>



<?php get_footer();?>
