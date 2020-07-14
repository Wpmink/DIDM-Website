<?php
//Template Name:Consult Page

get_header();
get_template_part('breadcrums');
get_template_part('post','page');
if($_POST)
{
  $FullName = $_POST['fullName'];//echo $Fullname;
  $Email = $_POST['email'];//echo $Email;
  $QA = $_POST['txtQA'];//echo $QA;

  $error = array();
  if(empty($FullName))
  {
    $error['fullname_empty'] = "Please input your name";
    echo "<script type='text/javascript'>alert('Please input your name');window.location.href='".site_url(). "/index.php/consult". "';</script>";
  }
  if($Fullname == " ")
  {
    $error['fullname_firstspace'] = "Please input your name";
    echo "<script type='text/javascript'>alert('Please input your name');window.location.href='".site_url(). "/index.php/consult". "';</script>";
  }

  if(empty($Email))
  {
    $error['email_empty'] = "Please input your Email";
    echo "<script type='text/javascript'>alert('Please input your Email');window.location.href='".site_url(). "/index.php/consult". "';</script>";
  }
  if($Email == " ")
  {
    $error['fullname_firstspace'] = "Please input your Email";
    echo "<script type='text/javascript'>alert('Please input your Email');window.location.href='".site_url(). "/index.php/consult". "';</script>";
  }

  if(empty($QA))
  {
    $error['qa_empty'] = "Please input your Question";
    echo "<script type='text/javascript'>alert('Please input your Question');window.location.href='".site_url(). "/index.php/consult". "';</script>";
  }
  if($QA == " ")
  {
    $error['question_firstspace'] = "Please input your Question";
    echo "<script type='text/javascript'>alert('Please input your Question');window.location.href='".site_url(). "/index.php/consult". "';</script>";
  }

  if(count($error) == 0)
  {
    //mail
    $sendto = getDIDMMail();
    $subject = "Consult";
    $headers = 'From: ' . $Email . "\r\n";

    //เนื้อหาในเมล
    $message .= 'Name : ' . $FullName . "\r\n";
    $message .= 'Question : ' . $QA . "\r\n";


    mail($sendto,$subject,$message,$headers);
    echo "<script type='text/javascript'>alert('Your Question has send , waiting for our reply email Thank you ');window.location.href='".site_url(). "/index.php/consult". "';</script>";

  }
}


?>
<?php get_footer();?>
