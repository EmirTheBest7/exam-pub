<?php 


if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'young') {
        echo '<script language="javascript">';
        echo 'alert("User is 2 young :( ")';
        echo '</script>';
    }
    elseif ($_GET['msg'] == 'cash') {
        echo '<script language="javascript">';
        echo 'alert("You dont have enough money :( ")';
        echo '</script>';
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- Bootstrap CSS -->

    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">

        <h1 class="text-center">Exam Bar</h1>

        <div class="row">

            <?php

            include("./db.php");
            
            $sel_query="Select * from users;";
            $result = mysqli_query($con,$sel_query);
            while($row = mysqli_fetch_assoc($result)) { ?>
            
            <div class='col-md-4 col-lg-4 col-sm-4'>

                <label>
                    <input type='radio' name='client' class='card-input-element' value='<?php echo $row["id"]; ?>' />
            
                    <div class='panel panel-default card-input text-center'>
                        <img class='card-img-top' src='orange.jpg' alt='Card image cap'>
                        <div class='panel-heading'><?php echo $row["name"]; ?></div>
                        <div class='panel-body'>
                            Client
                        </div>
                    </div>
            
                </label>
            
            </div>

            <?php } ?>

            <!--
            <div class="col-md-4 col-lg-4 col-sm-4">

                <label>
                    <input type="radio" name="client" class="card-input-element" value="a" />

                    <div class="panel panel-default card-input text-center">
                        <img class="card-img-top" src="http://www.azspagirls.com/files/2010/09/orange.jpg"
                            alt="Card image cap">
                        <div class="panel-heading">Jmeno</div>
                        <div class="panel-body">
                            client specific content
                        </div>
                    </div>

                </label>

            </div>
            <div class="col-md-4 col-lg-4 col-sm-4">

                <label>
                    <input type="radio" name="client" class="card-input-element" value="b" />

                    <div class="panel panel-default card-input text-center">
                        <div style="font-size: 300px;"><i class="fa fa-smile-o fa-10x" aria-hidden="true"></i></div>

                        <div class="panel-heading">Jmeno</div>
                        <div class="panel-body">
                            client specific content
                        </div>
                    </div>

                </label>

            </div>
            <div class="col-md-4 col-lg-4 col-sm-4">

                <label>
                    <input type="radio" name="client" class="card-input-element" value="c" />

                    <div class="panel panel-default card-input text-center">
                        <div style="font-size: 300px;"><i class="fa fa-smile-o fa-10x" aria-hidden="true"></i></div>

                        <div class="panel-heading">Jmeno</div>
                        <div class="panel-body">
                            client specific content
                        </div>
                    </div>

                </label>

            </div>-->
            
        </div>

        <div class="container">
            <div class="row">
                <a id="aaa" class="btn btn-danger mx-auto w-50 mt-3 next">
                    Pokračovat k výběru nápoje
                </a>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        $(document).ready(function () {
            $('input[type="radio"]').click(function () {
                if ($(this).attr("value")) {
                    $(".next").show(); // Zobraz button

                    
                    $(".next").on('click', function (e) {
                            //window.location.assign("./drink-menu/index.php?id=."+ this.value);
                            window.location.assign("./drink-menu/index.php?id="+ $("input[name='client']:checked").val());
                            //output(window.location.href = "drink-menu/index.php?id="+ $("input[name='client']:checked"));
                    });

                    /*$(function() {

                        $("input[name$='client']").change(function() {
                            //window.location.assign("./drink-menu/index.php?id=."+ this.value);
                            alert("./drink-menu/index.php?id="+ this.value);
                        });
                    
                    });*/



                    //alert($("input[name='client']:checked").val());
                }
            });


        });
    </script>


</body>

</html>