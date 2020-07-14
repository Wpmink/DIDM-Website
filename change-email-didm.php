<?php //Template Name:Change DIDM Email Page
get_header();
get_template_part('breadcrums'); ?>
<div class="container">
	<div class="row enigma_blog_wrapper">
	<div class="col-md-12">
	<?php get_template_part('post','page'); ?>

	<?php
			if($_POST)
			{

					global $wpdb;

					$email = $_POST['email'];
					$error = array();

					if(!is_email($email))
					{
						$error['email_valid'] = "Email has no valid value";
						echo "<script type='text/javascript'>alert('Email has no valid value');window.location.href='".site_url(). "/index.php/change-didm-email". "';</script>";
					}


					if(count($error) == 0)
          {
								$didm_mail = $wpdb->get_results("SELECT * FROM wp_didm_email");
								foreach ($didm_mail as $print)
								{
									 $before_didm_mail = $print->email;
								}


								$data_array = array(
																		'email' => $email
																	);


								$table_name = 'wp_didm_email';


								$field_name = array(
																		'email'=> $before_didm_mail ,
																	);

							//  $updated = $wpdb->update($table_name, $data_array,'ID' -> 9 );

								//$updated = $wpdb->update( $table, array( ‘column’ => ‘ID’, ‘field’ => ‘9’ ), array( ‘ID’ => 1 ) );
								$change_didm_email = $wpdb->update($table_name, $data_array , $field_name);
								if($change_didm_email == 1)
								{
									$didm_mail_1 = $wpdb->get_results("SELECT * FROM wp_didm_email");
									foreach ($didm_mail_1 as $print)
									{
										 $after_didm_mail = $print->email;
									}
									echo "<script type='text/javascript'>alert('DIDM Email Change Successful.');window.location.href='".site_url()."';</script>";

								}

								else
								{
										echo "<script type='text/javascript'>alert('ERROR - CHECK AGAIN'".$username."'');window.location.href='".site_url()."';</script>";
								}
					}
					else
          {
            print_r($error);
          }



			}

	?>





	</div>
	</div>
</div>
<?php get_footer(); ?>
