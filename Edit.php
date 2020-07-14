<?php
//Template Name:Edit Page
get_header();
get_template_part('breadcrums');
?>


<div class="container">

	<div class="row enigma_blog_wrapper">

	    <div class="col-md-12">
<?php
    global $wpdb;
    $IDK = $wpdb->get_results("SELECT IDK FROM wp_ID ");
    $result = $wpdb->get_results("SELECT * FROM wp_printer3D INNER JOIN wp_ID on wp_printer3D.ID = wp_ID.IDK ");
    
    foreach($result as $print)
	{

	?>
    User : <?= $print->Username;?>
    <br><strong>Name : </strong><?= $print->Firstname;?>
    <br><strong>Telephone :</strong>  <?= $print->Telephone;?>
    <br><strong>Email :</strong><?= $print->Email;?>
    <form method="post">
    
    <br><br><strong style="text-align: center;">Material Type</strong><select name="typeofmodal">
    <option value="ABS">ABS</option>
    <option value="PLC">PLC</option>
    <option value="Nylon">Nylon</option>
    <option value="TPU">TPU</option>
    <option value="TPE">TPE</option>
    </select>
    <br><br><strong>Color</strong>
        <input name="color" required="" type="text" value="<?= $print->Color;?>" />
    <br><br><strong>Infill</strong>  
        <input name="infill" required="" type="int" maxlength="3" value="<?= $print->Infill;?>" /></p>
    
    <br><strong>Tracking Number</strong>  
        <input name="trackingnumber"  type="text"  value="<?= $print->Trackingnumber;?>" /></p>
   
   
    <br><button class="btn" style="background: #1bbc9b; color: white;" type="submit">Confirm</button></p>
    </form>
    <?php
    }
    ?>
        </div>

    </div>

</div>

<?php
    if($_POST)
    {
        $Type = $_POST['typeofmodal'];
        $Color = $_POST['color'];
        $Infill = $_POST['infill'] ;
        $Trackingnumber = $_POST['trackingnumber'] ;
        $Email = $print->Email;

        // echo $Type;
        // echo $Color;
        // echo $Infill;
        // echo $Trackingnumber;
        
        $to = $Email;
        $subject = "3d register";
        $headers = 'From: ' . getDIDMMail() . "\r\n";
        $message .= 'You can check and track at 3DPtracking http://volley5544.000webhostapp.com/index.php/tracking/.This is your Tracking number : ' . $Trackingnumber . "\r\n";
        foreach($IDK as $print)
        {
            $beforeIDK = $print->IDK;
        }
       // echo $beforeIDK;
        $table_name = 'wp_printer3D';
        $data_array = array(
                            'Type' => $Type ,
                            'Color' => $Color ,
                            'Infill' => $Infill ,
                            'Trackingnumber' => $Trackingnumber
                          );

        $field_name = array(
                            'ID'=> $beforeIDK
														);

    
         $updateResult = $wpdb->update($table_name, $data_array,  $field_name);
         if($updateResult == 1)
         {
             
             echo "<script type='text/javascript'>alert('Edit Successfully.');window.location.href='".site_url(). "/index.php/manage-order". "';</script>";
             mail($to,$subject,$message,$headers);
         }
         else
         {
            //echo "Fail";
            echo "<script type='text/javascript'>alert('Edit Fail, please enter your tracking number again.');window.location.href='".site_url(). "/index.php/createorder". "';</script>";
         }
    }

?>






















<?php get_footer(); ?>


