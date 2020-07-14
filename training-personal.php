<?php
//Template Name:Training Personal Page

get_header();

get_template_part('breadcrums');
?>

<div class="container">

	<div class="row enigma_blog_wrapper">

	<div class="col-md-12">





<form method="post">
    <select name="projectname">
      <?php

			global $wpdb;

			$result = $wpdb->get_results("SELECT DISTINCT project_name FROM wp_createproject");
      foreach($result as $print)
      {
          echo '<option value="' . $print->project_name . '">' . $print->project_name . '</option>';
      }

      ?>
    </select>

    &nbsp&nbsp&nbsp<button name="choose" type="submit" style="background: #1bbc9b; color: white;" >Select</button>
</form>

<?php

//echo $_POST['projectname'];
$option = $_POST['projectname'];

$result1 = $wpdb->get_results("SELECT * FROM wp_createproject WHERE project_name = '$option'");

//echo $option;

if($_POST['projectname']) // เช็คว่า projectname มีค่าว่างไหม
{
	//echo "string";
	?>
	<table>
	<thead>
			<tr style='background-color:#1bbc9b;color:#000;'>
					<th>Name</th>
					<th>Description</th>
					<th>Start Date</th>
					<th>Finish Date</th>
					<th>Address</th>
					<th></th>
			</tr>
	</thead>
	<?php
	foreach($result1 as $print)
	{

		?>
				<tbody>

						<tr class="align-middle">
								<td>
								<?= $print->project_name;?> <!-- ปรินท์แค่เฉพาะฟิลด์ -->
								</td>

								<td>
								<?= $print->project_description;?>
								</td>

								<td>
								<?= $print->project_start_date;?>
								</td>

								<td>
								<?= $print->project_finish_date;?>
								</td>

								<td>
								<?= $print->project_address;?>
								</td>

								<td>
								<form method="post">
									  <input type="hidden" id="prjID" name="prjID" value="<?= $print->project_id;?> ">
										<button name="confirm" type="submit" style="background: #1bbc9b; color: white;">Confirm</button>
								</form>




								</td>

						</tr>
		<?php
		}
		?>
				</tbody>

		</table>
<?php


}

?>

</div>

</div>

</div>



<?php
if(isset($_POST['confirm']))
{
	$confirm = $_POST['prjID'];
	$result2 = $wpdb->get_results("SELECT * FROM wp_createproject WHERE project_id = '$confirm'");

	$user = getUserID();
	$result3 = $wpdb->get_results("SELECT * FROM wp_training_personal WHERE username = '$user'");

	foreach ($result2 as $print)
	{

		$Email = getEmailUser();
		$username = getUserID();
		$projectname = $print->project_name;
		$applicantname = getNameUser();
		$projectdescription = $print->project_description;
		$projectstartdate = $print->project_start_date;
		$projectfinishdate = $print->project_finish_date;
		$place = $print->project_address;
	}

	$thisPageStatus = 0;
	foreach ($result3 as $print)
	{
			if($print->project_name == $projectname && $print->start_date == $projectstartdate && $print->end_date == $projectfinishdate && $print->place == $place)
			{
					echo "<script type='text/javascript'>alert('You already accept this course');window.location.href='';</script>";
					$thisPageStatus = 1;
					break;
			}
	}
	if($thisPageStatus == 0)
	{
			$to = getDIDMMail();



			$subject = "Training Personal Applicant";

			$headers = 'From: ' . $Email . "\r\n";

			//เนื้อหาในเมล
			$message .= 'Username : ' .$username ."\r\n";
			$message .= 'Project name : ' . $projectname . "\r\n";
			$message .= 'Applicant name : ' . $applicantname . "\r\n";
			$message .= 'Detail : ' . $projectdescription . "\r\n";
			$message .= 'Start date : ' . $projectstartdate . "\r\n";
			$message .= 'End date : ' . $projectfinishdate . "\r\n";
			$message .= 'Place : ' . $place . "\r\n";



			// $sql = "INSERT INTO wp_training_personal (username,project_name,personal_fname,details,start_date,end_date,place,email) VALUES
			// ('$username','$projectname','$applicantname', '$projectdescription', '$projectstartdate','$projectfinishdate','$place','$Email')";
			// echo $sql;

			$table_name = 'wp_training_personal';

			$data_array = array(
													'username' => $username ,
													'project_name' => $projectname ,
													'personal_fname' => $applicantname ,
													'details' => $projectdescription ,
													'start_date' => $projectstartdate ,
													'end_date' => $projectfinishdate ,
													'place' => $place ,
													'email' => $Email
												);


													$rowResult = $wpdb->insert($table_name, $data_array, $format=NULL);
													if($rowResult == 1)
													{
															mail($to,$subject,$message,$headers); //Send mail

															echo "<script type='text/javascript'>alert('Apply Successfully, please wait for reply email as soon as possible. Thank you.');window.location.href='".site_url()."';</script>";

															//$name = $wpdb->get_results($table_name, $data_array(1), $format=NULL);
													}
													else
													{
															echo "<script type='text/javascript'>alert('ERROR - CHECK AGAIN'".$username."'');window.location.href='".site_url()."';</script>";
													}

	die;
	}


}





?>






<?php get_footer(); ?>
