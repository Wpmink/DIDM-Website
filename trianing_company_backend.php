<?php
//Template Name:Training Company Page

get_header();

get_template_part('breadcrums');
get_template_part('post','page');
?>



<?php
if($_POST)
{

    global $wpdb;

    $value = $_POST['testApply'];
    $username = getUserID();
    $CompanyName = $_POST['txtCompanyName'];
    $Detail = $_POST['txtDetail'];
    $DateStart = $_POST['dateStart'];
    $DateEnd = $_POST['dateEnd'];
    $Place = $_POST['txtPlace'];
    $Email = getEmailUser();
    $error = array();

    if($value == 1)
    {
        if(empty($CompanyName))
        {
          $error['company_empty'] = "Needed Company name_edit must";
          echo "<script type='text/javascript'>alert('Needed Company Name must');window.location.href='".site_url(). "/index.php/trainning-company". "';</script>";
        }
        if($CompanyName == " ")
        {
          $error['company_space'] = "";
          echo "<script type='text/javascript'>alert('Company Name has Space');window.location.href='".site_url(). "/index.php/trainning-company". "';</script>";
        }

        if(empty($Detail))
        {
          $error['detail_empty'] = "Needed Detail must";
          echo "<script type='text/javascript'>alert('Needed Detail must');window.location.href='".site_url(). "/index.php/trainning-company". "';</script>";
        }

        if($Detail == " ")
        {
          $error['detail_space'] = "";
          echo "<script type='text/javascript'>alert('Needed Detail must');window.location.href='".site_url(). "/index.php/trainning-company". "';</script>";
        }

        if(empty($DateStart))
        {
          $error['datestart_empty'] = "Needed Date Start must";
          echo "<script type='text/javascript'>alert('Needed Date Start must');window.location.href='".site_url(). "/index.php/trainning-company". "';</script>";
        }
        if(empty($DateEnd))
        {
          $error['dateend_empty'] = "Needed Date End must";
          echo "<script type='text/javascript'>alert('Needed Date End must');window.location.href='".site_url(). "/index.php/trainning-company". "';</script>";
        }
        if(empty($Place))
        {
          $error['place_empty'] = "Needed Tel must";
          echo "<script type='text/javascript'>alert('Needed Place must');window.location.href='".site_url(). "/index.php/trainning-company". "';</script>";
        }
        if($Place == " ")
        {
          $error['place_space'] = "";
          echo "<script type='text/javascript'>alert('Needed Place must');window.location.href='".site_url(). "/index.php/trainning-company". "';</script>";
        }

        //check period time ห้ามย้อน
        //เปรียบเทียบกับวันแรก ถ้าน้อยกว่า 0 แสดงว่าเลือกวันย้อนหลัง
        // $DateDiff = .DateDiff($DateStart,$DateEnd)."<br>";
        // if($DateDiff < 0)
        // {
        //   $error['pickEnddate_beforeStartdate'] = "";
        //   echo "<script type='text/javascript'>alert('You select End date before Start date , Plase select new date');window.location.href='".site_url(). "/index.php/trainning-company". "';</script>";
        // }

        $currentDateTime = date('Y-m-d');
        if($DateStart < $currentDateTime) // วันแรกมาก่อน ปัจจุบัน ก็เออเร่อ
        {
          $error['date_before_Current'] = "Please select current date";
          echo "<script type='text/javascript'>alert('Please select current date');window.location.href='".site_url(). "/index.php/trainning-company". "';</script>";
        }

        // ถ้าวันแรก มากกว่า วันจบ ก็ เออเร่อ
        if($DateStart > $DateEnd)
        {
          $error['endDate_before_startDate'] = "You select End Date before Start Date ,Please select new date";
          echo "<script type='text/javascript'>alert('You select End Date before Start Date ,Please select new date');window.location.href='".site_url(). "/index.php/trainning-company". "';</script>";
        }

        if($DateStart == $DateEnd)
        {
          $error['endDate_startDate'] = "You select End Date before Start Date ,Please select new date";
          echo "<script type='text/javascript'>alert('Your period time is INVALID');window.location.href='".site_url(). "/index.php/trainning-company". "';</script>";
        }

        if(count($error) == 0)
        {
          $to = getDIDMMail();
          $subject = "ทีมงาน"; //ชื่อเรื่อง
          $headers = 'From: ' . $Email . "\r\n"; //จากEmailไหน
          //เนื้อหาในเมล
          $message .= 'CompanyName : ' . $CompanyName . "\r\n";
          $message .= 'Detail : ' . $Detail . "\r\n";
          $message .= 'DateStart : ' . $DateStart . "\r\n";
          $message .= 'DateEnd : ' . $DateEnd . "\r\n";
          $message .= 'Place : ' . $Place . "\r\n";




          $table_name = 'wp_training_company';

          $data_array = array(
                              'username' => $username ,
                              'company_name' => $CompanyName ,
                              'detail' => $Detail ,
                              'start_date' => $DateStart ,
                              'end_date' => $DateEnd ,
                              'place' => $Place ,
                              'email' => $Email
                            );

          $rowResult = $wpdb->insert($table_name, $data_array, $format=NULL);
            if($rowResult == 1)
            {
                mail($to,$subject,$message,$headers);

                echo "<script type='text/javascript'>alert('Apply Successfully, please wait for reply email as soon as possible. Thank you.');window.location.href='".site_url(). "/index.php/training-company-success". "';</script>";
            }
            else
            {
                echo "<script type='text/javascript'>alert('ERROR - CHECK AGAIN'".$username."'');window.location.href='".site_url(). "/index.php/trainning-company". "';</script>";
            }
          }
    }
    else
    {
        exit();
    }

}



 ?>

 <?php get_footer(); ?>
