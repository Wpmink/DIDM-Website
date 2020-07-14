<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Project</title>

    <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
    <script src="/javascript/library/less.min.js"></script>


    <style type="text/css">

        .f1{

            position:relative;
            left:300px;
            top:10px;
        }
        .f2{
            position:relative;
            left:300px;
            top:20px;
        }
        .ca1{
            position:relative;
            left:300px;
            top:30px;
        }
        .ca2{
            position:relative;
            left:300px;
            top:50px;
        }
        .f3{
            position:relative;
            left:300px;
            top:60px;
        }
        .btn1{
            position:relative;
            left:500px;
            top:70px;

        }
        .f4{
            position:relative;
            left:300px;
            top:70px;
        }
        .triangle{

            position:fixed;
            left:300px;
            top:200px
        }

    </style>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>


    <?php
    /*Template Name: create-project-page*/
    get_header();
    get_template_part('breadcrums');
    ?>

    <?php
    if ( current_theme_supports( 'convertica-semantic-ui' ) ) {
        wp_enqueue_script( 'sui-script', get_stylesheet_directory_uri() . '/semantic-ui/semantic.min.js', array(
             'jquery'
        ), false, true );
        wp_enqueue_style( 'sui-style', get_stylesheet_directory_uri() . '/semantic-ui/semantic.min.css' );
    }
    ?>


    <form class="ui form" method="post" enctype="multipart/form-data">


        <div class="seven wide field f1">
            <font class="ui content1", size = 2>Name of project</font>
            <font color=red class="ui content1-2",  size = 2>***required field***</font>
            <input type="text" name="Name" placeholder="name of project">
        </div>

        <div class="seven wide two column field f2">
            <font class="ui content2", size = 2>Brief description</font>
            <font color=red class="ui content2-2", size = 2>***required field***</font>
            <!--<input type="text" name="description" placeholder="brief description">-->
            <textarea rows="5" type="text" name="description" placeholder="brief description"></textarea>
        </div>

        <div class="ui calendar ca1" id="c1">
            <font class="ui content3", size = 2>Start of date</font>
            <font color=red class="ui content3-2", size = 2>***required field***</font>
            <div class="ui input left icon">
                <i class="calendar icon"></i>
                <input type="date" name="start" placeholder="start of date">
            </div>
        </div>

        <div class="ui calendar ca2" id="c2">
            <font class="ui content4", size = 2>Finish of date</font>
            <font color=red class="ui content4-2", size = 2>***required field***</font>
            <div class="ui input left icon">
                <i class="calendar icon"></i>
                <input type="date" name="finish" placeholder="finish of date">
            </div>
        </div>

        <div class="seven wide field f3">
            <font class="ui content5", size = 2>Place</font>
            <font color=red class="ui content5-2", size = 2>***required field***</font>
            <textarea rows="3" type="text" name="place" placeholder="place"></textarea>

        </div>

        <div class="three wide field f4">
            <font class="ui content6", size = 2>Type</font>
            <font color=red class="ui content6-2", size = 2>***required field***</font>
            <input type="text" name="type" placeholder="type of project">

        </div>




        <form class="form-inline" onsubmit="openModal()" id="myForm" method="post">


       <button class="ui teal button btn1" type="submit" data-toggle="modal" data-target="#myModal" name="submit_create_project">Submit</button>
        </form>


    <?php if(isset($_POST['submit_create_project']))
    {
        $cc1 = $_POST['Name'];
        $cc2 = $_POST['description'];
        $cc3 = $_POST['start'];
        $cc4 = $_POST['finish'];
        $cc5 = $_POST['place'];
        $cc6 = $_POST['type'];


        ?><form  method="post">
         <!-- Modal -->
        <div id="myModal" class="triangle" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="submit" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Project</h4>
            </div>
            <div class="modal-body">
                <p>Do you want to create this project</p>
            </div>

            <div class="modal-footer">
                <input type="hidden" id="n1" name="n1" value="<?=$cc1?>">
                <input type="hidden" id="n2" name="n2" value="<?=$cc2?>">
                <input type="hidden" id="n3" name="n3" value="<?=$cc3?>">
                <input type="hidden" id="n4" name="n4" value="<?=$cc4?>">
                <input type="hidden" id="n5" name="n5" value="<?=$cc5?>">
                <input type="hidden" id="n6" name="n6" value="<?=$cc6?>">

                <button class="btn btn-default" type="submit" name="yes_create_project">Yes</button>
                <button type="submit" class="btn btn-default" data-dismiss="modal">No</button>
            </div>

            </div>

        </div>
        </div>
        </form>
   <?php }   ?>










        <br><br><br><br><br><br><br><br><br><br>

    </form>

    <?php
    get_footer();
    ?>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="semantic/dist/semantic.min.js"></script>

    <script>
        $('#c1').calendar();
    </script>
    <script>
        $('#c2').calendar();
    </script>


</body>
</html>
