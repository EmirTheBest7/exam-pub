
<?php
    
    include("../db.php");
    session_start();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $records = mysqli_query($con, "SELECT * from users where id='".$id."'");
        while ($data = mysqli_fetch_array($records)) {
            $age = $data['age'];
            $cash = $data['cash'];

            if ($age >= 18) {
                echo "Age OK";
            }
            else {
                header("Location:../index.php?msg=young");
                exit();
            }
            $status = "";
            if(isset($_POST['new']) && $_POST['new']==1) {
                $trn_date = date("Y-m-d H:i:s");
                $what =$_REQUEST['product'];
                $qty =$_REQUEST['amount'];
                $price =$_REQUEST['price'];

                

                if ($qty <= 0) {
                    echo '<script language="javascript">';
                    echo 'alert("You have to order more than 1 shots")';
                    echo '</script>';
                } else {
                    $data = array(); 
                    foreach ($what as $key => $n) {
                        //echo "</br>UserID:". $id. "</br>Product:" .$what[$key]. "</br>Qty:" .$qty[$key] . "</br>Price:" .$price[$key] . "</br>Time:" .$trn_date;

                        $cash_check = $cash - ($price[$key] * $qty[$key]);
                        //echo $cash_check;
                        if ($cash < $cash_check) {
                            header("Location:../index.php?msg=cash");
                            exit();
                        }

                        $cash = $cash - ($price[$key] * $qty[$key]);
                        //echo $cash;
                        /*
                        $_SESSION['data']= array();
                        array_push($_SESSION['data'], "$id", "$what[$key]", "$qty[$key]", "$price[$key]" , "$trn_date");
                        */
                        
                        
                        array_push($data, "UserID: "."$id", "Product: "."$what[$key]", "Quantity: "."$qty[$key]", "Price: "."$price[$key]" , "Time: "."$trn_date");


                        
                        $ins_query="insert into orders (`who`,`what`,`qty`,`price`,`time`) values ('$id','$what[$key]','$qty[$key]','$price[$key]','$trn_date')";
                        mysqli_query($con, $ins_query) or die(mysql_error());

                        /*
                        $_SESSION['id'] = $id;
                        $_SESSION['what'] = $what[$key];
                        $_SESSION['qty'] = $qty[$key];
                        $_SESSION['price'] = $price[$key];
                        */
                        

                        $update="update users set cash='".$cash_check."' where id='".$id."'";
                        mysqli_query($con, $update) or die(mysqli_error());

                        //echo "</br>UserID:". $id. "</br>Product:" .$what[$key]. "</br>Qty:" .$qty[$key] . "</br>Price:" .$price[$key] . "</br>Time:" .$trn_date . "</br>Cash:" .$cash;


                        
                    }

                    array_push($data, "Cash Available:".$cash);
                    $_SESSION['data']=$data;
                    print_r($_SESSION['data']);
                    
                    
                    header("Location:../thanks/index.php");
                    
                    
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

    <link rel="stylesheet" href="../style.css">

    <title>Hello, world!</title>
</head>

<body>


    

            <nav class="navbar navbar-light">
                    <div class="container">
                            <h1 class="text-center">Drinks</h1>
                            <div class="block">Zustatek:<span><?php echo $cash; ?> Kč</span></div>
                    </div>
                  </nav>


    <div class="container">
        <div class="row">
            
            <form action="" method="post" >
            <input type="hidden" name="new" value="1" />
                <div class="d-flex">

            <?php  
            
            $drinks = mysqli_query($con, "SELECT * from drinks");
            while ($drink = mysqli_fetch_array($drinks)) {
                $drink_id = $drink['drink_id'];
                echo '
                <div class="col-md-4 col-lg-4 col-sm-4">
                
                    <label class="card" style="width: 18rem;">
                        <input type="checkbox" name="client" class="card-input-element" value="'.$drink_id.'" />
                        
                        <div class="panel panel-default card-input text-center card-body">
                            <img class="card-img-top" src="../orange.jpg" alt="Card image cap">
                            <h5 class="card-title">'.$drink["product"].'</h5>
                            <p class="card-text">Cena: '.$drink["price"].'</p>
                            <p class="card-text">Amount: '.$drink["amount"].'</p>
                            <input type="hidden" name="product[]" value="'.$drink_id.'">
                            <input type="hidden" name="price[]" value="'.$drink["price"].'">
                            <input type="number" name="amount[]" min="0" max="5"> <!-- id="amount" -->
                            
                        </div>
                    </label>
                </div>
                ';
            }

            ?>
        </div>
                <input type="submit" class="btn btn-success">
            </form>
        </div>






    </div>



    </div>

    <?php
        }
    } ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


</body>

</html>