<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data of Project</title>

    <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
    <script src="/javascript/library/less.min.js"></script>

    <style type="text/css">
        
       
        .f2{
            position:relative;
            left:300px;   
            top:20px; 
        }
        .f3{   
            position:relative;
            left:300px;    
            top:50px;
        }
        .ca1{   
            position:relative;
            left:300px;  
            top:70px;  
        }
        .ca2{   
            position:relative;
            left:300px;    
            top:90px;
        }
        
        .f4{   
            position:relative;
            left:300px;    
            top:120px;
        }
        .f5{   
            position:relative;
            left:300px;    
            top:140px;
        }
        .btn3{   
            position:relative;
            left:400px;    
            top:160px;
            
        }
        .triangle{
            
            position:fixed;
            left:500px;    
            top:200px
        }
    </style>
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    
    <?php
        /*Template Name: data-of-project-page*/
        get_header();
        get_template_part( 'breadcrums' );
    ?>

    <?php
    if ( current_theme_supports( 'convertica-semantic-ui' ) ) {
        wp_enqueue_script( 'sui-script', get_stylesheet_directory_uri() . '/semantic-ui/semantic.min.js', array(
             'jquery' 
        ), false, true );
        wp_enqueue_style( 'sui-style', get_stylesheet_directory_uri() . '/semantic-ui/semantic.min.css' );
    }
    ?>

        

    <form class ="ui form" method="post" enctype="multipart/form-data">
    <table>
    <tr>
        <th><center>Number of Project</center></th>
        <th><center>Name of Project</center></th>
        <th><center>Description of Project</center></th>
        <th><center>Start Date of Project</center></th>
        <th><center>Finish Date of Project</center></th>
        <th><center>Address of Project</center></th>
        <th><center>Type of Project</center></th>
        <th><center>Edit Project</center></th>
        <th><center>Delete Project</center></th>
        
    </tr>
    
    <?php
        global $wpdb;
        +$number=0;
        $retrieved_data = $wpdb->get_results("SELECT * FROM wp_createproject");
        foreach($retrieved_data as $print)
        { ?>
            
            <tr>
                <td><center><?php echo ++$number;?></center></td>
                <td><center><?php echo $print->project_name;?></center></td>
                <td><center><?php echo $print->project_description;?></center></td>
                <td><center><?php echo $print->project_start_date;?></center></td>
                <td><center><?php echo $print->project_finish_date;?></center></td>
                <td><center><?php echo $print->project_address;?></center></td>
                <td><center><?php echo $print->project_type;?></center></td>


                <form class="form-inline" onsubmit="openModal()" id="myForm1" method="post">
                <input type="hidden" id="prjid1" name="prjid1" value="<?=$print->project_id?>">
                <input type="hidden" id="prjid5" name="prjid5" value="<?=$print->project_name?>">
                <td>
                    <!-- Trigger the modal with a button -->
                    <button class=" ui orange button btn1" type="submit" data-toggle="modal" data-target="#myModal" name="edit_project">Edit</button>
                
                </form>
                </td>
                
                

                
                <form class="form-inline" onsubmit="openModal()" id="myForm2" method="post">
                <input type="hidden" id="prjid2" name="prjid2" value="<?=$print->project_id?>">
                <input type="hidden" id="prjid4" name="prjid4" value="<?=$print->project_name?>">       
                <td>
                    <!-- Trigger the modal with a button -->
                    <button class=" ui red button btn2" type="submit" data-toggle="modal" data-target="#myModal" name="delete_project">Delete</button>
                </form>
               
                </td>
            
               
            </tr>
            
  <?php }?>
   
    </table>
    </form>

    <?php if(isset($_POST['delete_project']))
                 {  
                    if(isset($_POST['prjid2']) == $print->project_id )
                    {  
                    $datadel = $_POST['prjid2'];
                    $datapro = $_POST['prjid4']; ?>
                    <!-- Modal -->
                    
                    <div class="triangle" id="myModal" role="dialog">

                        <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="submit" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Delete Project</h4>
                            </div>
                            <div class="modal-body">
                            <p>Do you want to delete this project(<?php echo $datapro?>)? </p>

                            </div>

                            
                            <form  method="post">   
                            <div class="modal-footer">
                            
                              
                                <input type="hidden" id="prjid3" name="prjid3" value="<?=$datadel?>"> 
                                <button class="btn btn-default btn2-1" type="submit" name="yes_delete_project">Yes</button>
                              
                                <button class="btn btn-default btn2-2" type="submit"  data-dismiss="modal">No</button>
                             
                            </div>
                            </form>
                        </div>
                        </div>
                        
                    </div>
                   
            <?php }
                }?>


              
    <?php
        if(isset($_POST['edit_project']))
        {  
            $data2 = $_POST['prjid1'];
            $data3 = $_POST['prjid5'];
            
            if($data2 != NUll)
          {  
            $retrieved_data2 = $wpdb->get_results("SELECT * FROM wp_createproject WHERE project_id = $data2 ");
              ?><form method="post"> 
            <?php foreach($retrieved_data2 as $print2)
                { ?>
                        
                        
                        <div class=" f1">
                           
                            <?php $print2->project_id;?>
                           
                       
                        </div>

                        <div class="five wide field f2">
                            <font class="ui content4", size = 2>Name of project</font>
                            <font color=red class="ui content1-2",  size = 2>***required field***</font>
                            <textarea rows="1" type="text" name="name_edit" ></textarea>
                            <?php echo "Original information = ";
                            echo $print2->project_name;?>
                        </div>

                        <div class="five wide field f3">
                            <font class="ui content5", size = 2>Brief description</font>
                            <font color=red class="ui content1-2",  size = 2>***required field***</font>
                            <textarea rows="5" type="text" name="description_edit" ></textarea> 
                            <?php echo "Original information = ";
                            echo $print2->project_description;?>
                        </div>

                        <div class="ui calendar ca1" id="c1">
                            <font class="ui content6", size = 2>Start of date</font>
                            <font color=red class="ui content1-2",  size = 2>***required field***</font>
                            <div class="ui input left icon">
                                <i class="calendar icon"></i>
                                <input type="date" name="start_edit" >  
                            </div>
                            <?php echo "Original information = ";
                            echo $print2->project_start_date;?>
                        </div>
                        
                        <div class="ui calendar ca2" id="c2">
                            <font class="ui content7", size = 2>Finish of date</font>
                            <font color=red class="ui content1-2",  size = 2>***required field***</font>
                            <div class="ui input left icon">
                                <i class="calendar icon"></i>
                                <input type="date" name="finish_edit" >                                
                            </div>
                            <?php echo "Original information = ";
                            echo $print2->project_finish_date;?>
                        </div>
                        
                        <div class="five wide field f4">
                            <font class="ui content8", size = 2>Place</font>
                            <font color=red class="ui content1-2",  size = 2>***required field***</font>
                            <textarea rows="3" type="text" name="place_edit"></textarea> 
                            <?php echo "Original information = ";
                            echo $print2->project_address;?>
                        </div>
                        
                        <div class="five wide field f5">
                            <font class="ui content9", size = 2>Type</font>
                            <font color=red class="ui content1-2",  size = 2>***required field***</font>
                            <textarea rows="1" type="text" name="type_edit"></textarea> 
                            <?php echo "Original information = ";
                            echo $print2->project_type;?>
                        </div>

                        
                        <input type="hidden" id="prjid6" name="prjid6" value="<?=$data2?>"> 
                        <input type="hidden" id="prjid7" name="prjid7" value="<?=$data3?>"> 

                        <button class="ui teal button btn3" type="submit" name="submit_edit_project">Edit Project</button>
                 </form>      
                        
                        
             <?php }?>
             
    <?php }
        }?>
    
   <form  method="post"> 
            <?php if(isset($_POST['submit_edit_project']))
             {  
                 if(isset($_POST['prjid6']) == $print->project_id )
                 {  
                 $dataedit1 = $_POST['prjid6'];
                 $dataedit2 = $_POST['prjid7']; 

                 $dataedit3 = $_POST['name_edit'];
                 $dataedit4 = $_POST['description_edit']; 
                 $dataedit5 = $_POST['start_edit'];
                 $dataedit6 = $_POST['finish_edit']; 
                 $dataedit7 = $_POST['place_edit'];
                 $dataedit8 = $_POST['type_edit']; 
                 
                 ?>
                 <!-- Modal -->
                 
                 <div class="triangle" id="myModal" role="dialog">

                     <div class="modal-dialog modal-sm">
                     <div class="modal-content">
                         <div class="modal-header">
                         <button type="submit" class="close" data-dismiss="modal">&times;</button>
                         <h4 class="modal-title">Edit Project</h4>
                         </div>
                         <div class="modal-body">
                         <p>Do you want to edit this project(<?php echo $dataedit2?>)? </p>

                         </div>

                         
                          
                         <div class="modal-footer">
                            
                            <input type="hidden" id="prjid8" name="prjid8" value="<?=$dataedit1?>"> 
                            <input type="hidden" id="prjid9" name="prjid9" value="<?=$dataedit2?>">

                            <input type="hidden" id="prjid10" name="prjid10" value="<?=$dataedit3?>"> 
                            <input type="hidden" id="prjid11" name="prjid11" value="<?=$dataedit4?>">
                            <input type="hidden" id="prjid12" name="prjid12" value="<?=$dataedit5?>"> 
                            <input type="hidden" id="prjid13" name="prjid13" value="<?=$dataedit6?>">
                            <input type="hidden" id="prjid14" name="prjid14" value="<?=$dataedit7?>"> 
                            <input type="hidden" id="prjid15" name="prjid15" value="<?=$dataedit8?>">
                             <button class="btn btn-default btn4" type="submit" name="yes_edit_project">Yes</button>
                         
                             <button class="btn btn-default btn5" type="submit"  data-dismiss="modal">No</button>
                        
                         </div>
                         
                     </div>
                     
                    </div>
                 </div>
         <?php  }
            }?>
            </form>
    
	


    <br><br><br><br><br><br><br><br><br><br><br><br><br>

    <?php
    get_footer();
    ?>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="semantic/dist/semantic.min.js"></script>

    <script>
        $('.btn2')
        .modal('attach events', '.test.button', 'show')
        ;

    </script>
    <script>
        $('.ui.longer.modal')
        .modal('show')
        ;
    </script>

</body>
</html>