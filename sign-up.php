<?php //Template Name:Sign Up1 Page

        global $wpdb;
				//global $user_ID;
        if($_POST)
        {
          $name = $wpdb->escape($_POST['txtName']);
          $username = $wpdb->escape($_POST['txtUsername']);
          $email = $wpdb->escape($_POST['txtEmail']);
          $tel = $wpdb->escape($_POST['txtTel']);
          $password = $wpdb->escape($_POST['txtPassword']);
          $confirmPass = $wpdb->escape($_POST['txtConfirmPassword']);

          $error = array();
          if(strpos($username, ' ') !== FALSE)
          {
            $error['username_space'] = "";
            echo "<script type='text/javascript'>alert('Username has Space');window.location.href='".site_url(). "/index.php/sign-up". "';</script>";
          }
          if(empty($username))
          {
            $error['username_empty'] = "Needed Username must";
            echo "<script type='text/javascript'>alert('Needed Username must');window.location.href='".site_url(). "/index.php/sign-up". "';</script>";
          }
          if(username_exists($username))
          {
            $error['username_exists'] = "Username already exist";
            echo "<script type='text/javascript'>alert('Username already exist');window.location.href='".site_url(). "/index.php/sign-up". "';</script>";
          }
          if(!is_email($email))
          {
            $error['email_valid'] = "Email has no valid value";
            echo "<script type='text/javascript'>alert('Email has no valid value');window.location.href='".site_url(). "/index.php/sign-up". "';</script>";
          }
          if(email_exists($email))
          {
            $error['email_existence'] = "Email already exist";
            echo "<script type='text/javascript'>alert('Email already exist');window.location.href='".site_url(). "/index.php/sign-up". "';</script>";
          }
          if(strcmp($password, $confirmPass) !== 0)
          {
            $error['password'] = "Password didn't match";
            echo "<script type='text/javascript'>alert('Password didn't match');window.location.href='".site_url(). "/index.php/sign-up". "';</script>";
          }
          if(empty($password))
          {
            $error['password_empty'] = "Needed Password must";
            echo "<script type='text/javascript'>alert('Needed Password must');window.location.href='".site_url(). "/index.php/sign-up". "';</script>";
          }
          if(empty($name))
          {
            $error['name_empty'] = "Needed Name must";
            echo "<script type='text/javascript'>alert('Needed Name must');window.location.href='".site_url(). "/index.php/sign-up". "';</script>";
          }
          if(empty($tel))
          {
            $error['tel_empty'] = "Needed Tel must";
            echo "<script type='text/javascript'>alert('Needed Tel must');window.location.href='".site_url(). "/index.php/sign-up". "';</script>";
          }

          if(count($error) == 0)
          {
            wp_create_user($username, $password, $email);



            $data_array = array(
                                'user_tel' => $tel ,
                                'display_name'=> $name
                              );


            $table_name = 'wp_users';


            $field_name = array(
                                'user_login'=> $username ,
                              );

          //  $updated = $wpdb->update($table_name, $data_array,'ID' -> 9 );

            //$updated = $wpdb->update( $table, array( ‘column’ => ‘ID’, ‘field’ => ‘9’ ), array( ‘ID’ => 1 ) );
            $wpdb->update($table_name, $data_array , $field_name);

						$login_array = array();
						$login_array['user_login'] = $username;
						$login_array['user_password'] = $password;

						$verify_user = wp_signon($login_array, true);
						echo "<script type='text/javascript'>alert('Register Successful, welcome to DIDM website');window.location.href='".site_url()."';</script>";
						//echo "<script>window.location = '".site_url()."'</script>";




          }
          else
          {
            print_r($error);
          }

        }
				else
				{
					get_header();
					get_template_part('breadcrums');

					get_template_part('post','page');
				}


  ?>

<?php get_footer(); ?>
