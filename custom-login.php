<?php
/*Template Name: Custom Login Page*/

      global $user_ID;
      global $wpdb;

      if(!$user_ID)
      {
          if($_POST)
          {
              //echo "string";
              $username = $wpdb->escape($_POST['username']);//escape -> protect your data from invalid value
              $password = $wpdb->escape($_POST['password']);

              $login_array = array();
              $login_array['user_login'] = $username;
              $login_array['user_password'] = $password;

              $verify_user = wp_signon($login_array, true);

              if(!is_wp_error($verify_user))
              {
                  if($username == 'admin')
                  {
                      echo "<script>window.location = '".site_url(). "/wp-admin". "'</script>";
                  }
                  else
                  {
                      echo "<script>window.location = '".site_url()."'</script>";
                  }

              }
              else
              {
                  echo "<script type='text/javascript'>alert('Username or Password incorrect');window.location.href='".site_url(). "/index.php/sign-in". "';</script>";
              }
          }
          else
          {
              //user in logged out state
              get_header();
              get_template_part('breadcrums');
              get_template_part('post','page');



              ?>


              <!-- <form method="post">
                <center>
                  <label for="username">Username/Email</label>
                  <div><input id="username" name="username" type="text" placeholder="Username" /></div>
                  <label for="password">Password</label>
                  <div><input id="password" name="password" type="password" placeholder="Password" /></div>
                  <button name="btn_submit" type="submit">Log in</button>
                  </center>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>

              </form> -->

              <?php
          }
      }
   ?>
<?php get_footer();?>
