<?php
//Template Name:3D Regist Page
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
get_header();

get_template_part('breadcrums');
get_template_part('post','page');
?>
<?php
if($_POST)
{
      global $wpdb;

      $Username = getUserID();
      $Name = getNameUser();
      $Telephone =  getTelUser();
      $Email =  getEmailUser();
      $type = $_POST['typeofmodal'];
      $color = $_POST['color'];
      $infill = $_POST['infill'];
      $detail = $_POST['txtDetail'];
      $imgupload = $_POST['imgupload'];



      $table_name = 'wp_printer3D';
      $savepath = "picture/";
      $info = pathinfo($_FILES['imgupload']['name']);
      $allowed =  array('gif','png' ,'jpg');
      $file_name2 = $_FILES['imgupload']['name'];
      $file_name_temp2 = explode(".", $file_name2);
      $extension2 = end($file_name_temp2);
      $file_type2= $_FILES['imgupload']['type'];

      $data_array = array(
                          'Username' => $Username ,
                          'Firstname' => $Name ,
                          'Telephone' => $Telephone ,
                          'Email' => $Email ,
                          'Type' => $type ,
                          'Color' => $color ,
                          'Infill' => $infill ,
                          'Detail' => $detail ,
                          'image' => $info['basename']
                        );

      $target = $savepath.DIRECTORY_SEPARATOR.$info['basename'];
      move_uploaded_file( $_FILES['imgupload']['tmp_name'], $target);

      $filename =$info['basename'];
      $path = "picture/";
      $file = $path . "/" . $filename;
      //echo $file ;
      $mailto = getDIDMMail();
      $subject = '3D REGISTER';

      $content = file_get_contents($file);
      $content = chunk_split(base64_encode($content));

      // a random hash will be necessary to send mixed content
      $separator = md5(time());

      // carriage return type (RFC)
      $eol = "\r\n";

      // main header (multipart mandatory)
      $headers = "From:".$Email. $eol;
      $headers .= "MIME-Version: 1.0" . $eol;
      $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
      $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
      $headers .= "This is a MIME encoded message." . $eol;

      // message
      $message .= 'Username : ' . $Username . "\r\n" . $eol;
      $message .= 'Name : ' . $Name . "\r\n" . $eol;
      $message .= 'Telephone : ' . $Telephone . "\r\n" . $eol;
      $message .= 'Type : ' . $type . "\r\n" . $eol;
      $message .= 'Color : ' . $color . "\r\n" . $eol;
      $message .= 'Infill : ' . $infill . "\r\n" . $eol;
      $message .= 'Detail : ' .  $detail . "\r\n" . $eol;
      $body = "--" . $separator . $eol;
      $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
      $body .= "Content-Transfer-Encoding: 8bit" . $eol;
      $body .= $message . $eol;

      // attachment
      $body .= "--" . $separator . $eol;
      $body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
      $body .= "Content-Transfer-Encoding: base64" . $eol;
      $body .= "Content-Disposition: attachment" . $eol;
      $body .= $content . $eol;
      $body .= "--" . $separator . "--";




      $rowResult = $wpdb->insert($table_name, $data_array, $format=NULL);

      if($rowResult == 1)
      {
          //mail($to,$subject,$message,$headers); //Send mail
          echo $Username;
          mail($mailto, $subject,$body, $headers);
          echo "<script type='text/javascript'>alert('Successfully added. Please wait for reply e-mail.');window.location.href='".site_url(). "/index.php". "';</script>";

          //$name = $wpdb->get_results($table_name, $data_array(1), $format=NULL);
      }
      else
      {
          echo "<script type='text/javascript'>alert('Your data is already in the system. Can not add duplicate data');window.location.href='".site_url(). "/index.php/model-3d". "';</script>";
      }

      die;

}



?>
<?php get_footer(); ?>
