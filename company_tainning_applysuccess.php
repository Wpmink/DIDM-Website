<?php
//Template Name:Training Company Success Page

get_header();

get_template_part('breadcrums');

global $wpdb;
$username = getUserID();



$result = $wpdb->get_results("SELECT * FROM wp_training_company WHERE username =  '$username' ORDER BY create_date DESC");


?>
<div class="container">

	<div class="row enigma_blog_wrapper">

	<div class="col-md-12">



<p><strong>Your information&nbsp;</strong></p>
<p style="text-align: center;">
</p>


<table>
    <thead>
	<tr style='background-color:#1bbc9b;color:#000;'>
        <td>Company Name</td>
        <td>Detail</td>
        <td>Period Time</td>
        <td>to</td>
        <td>Place</td>
	</tr>
    </thead>
    <?php


		foreach($result as $print)
		{

			?>
			<tbody>

					<td>
					<?= $print->company_name;?>
					</td>


					<td>
					<?= $print->detail?>
					</td>

					<td>
					<?= $print->start_date;?>
					</td>

					<td>
					<?= $print->end_date;?>
					</td>

					<td>
					<?= $print->place;?>
					</td>

			</tr>
	<?php
	//จบ1loop ได้ 1 แถว  ทำจนครบDBเราของuserนั้น ๆ
	}
?>





    </tbody>
</table>



<p></p>
<p style="text-align: center;"><strong>Apply successfully , waiting for our reply email as soon as possible.<br>
Thank you.</strong></p>


</div>

</div>

</div>


<?php get_footer(); ?>
