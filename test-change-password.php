<?php
/*Template Name: Test Change Password Page*/



if($_POST)
{
    global $wpdb;


    $password = $wpdb->escape($_POST['txtPassword']);


    $error = array();

    if(empty($password))
    {
      $error['password_empty'] = "Needed Password must";
      echo "<script type='text/javascript'>alert('Needed Password must');window.location.href='".site_url(). "/index.php/change-user-password". "';</script>";
    }


    if(count($error) == 0)
    {
        $id = getUserIDNumber();
        $username = getUserID();

        wp_set_password( $password, $id );

        $login_array = array();
        $login_array['user_login'] = $username;
        $login_array['user_password'] = $password;

        $verify_user = wp_signon($login_array, true);



        echo "<script type='text/javascript'>alert('Your password has change');window.location.href='".site_url(). "/index.php/change-user-password". "';</script>";


    }
    else {
      print($error);
      echo "....................";
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
