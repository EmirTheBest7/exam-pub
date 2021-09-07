

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

    <link rel="stylesheet" href="../../style.css">

    <title>Hello, world!</title>
</head>

<body>
    <nav class="navbar navbar-light">
        <div class="container">
            <h1 class="text-center">User</h1>
            
            <?php
            include("../../db.php");
            $sel_user="Select * from users;";
            $user_query = mysqli_query($con,$sel_user);
            while($user = mysqli_fetch_assoc($user_query)) {
                echo '<a href=?id='.$user['id'].'>'.$user['name'].'</a>';

            } ?>
        </div>
        
    </nav>


    <div class="container">
        <div class="row">

            <h2>View Records</h2>
            <table width="100%" border="1" style="border-collapse:collapse;">
                <thead>
                    <tr>
                        <th><strong>Date&Time</strong></th>
                        <th><strong>Product</strong></th>
                        <th><strong>Price</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                        $user_id = $_GET['id'];
                        $records = mysqli_query($con, "SELECT * FROM orders WHERE who=".$user_id."");
                        while($data = mysqli_fetch_assoc($records)) { ?>
                    <tr>
                        <td align="center"><?php echo $data["time"]; ?></td>
                        <?php
                        $drink_id = $data["what"];
                        $filter = mysqli_query($con, "SELECT * from drinks where drink_id=".$drink_id." ");
                        while ($drink_btn = mysqli_fetch_assoc($filter)) {
                            echo '<td align="center">'.$drink_btn['product'].'</td>';
                        }
                        
                        ?>
                        <td align="center" class='total'><?php echo $data["price"]; ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="2" style="text-align:right">Total:</th>
                        <th colspan="2" style="text-align:center"><span id="sum"></span></th>
                    </tr>
                    
                    
                </tbody>
            </table>

        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
    calc_total();

$(".choose").on('change', function(){
  var parent = $(this).closest('tr');

  $('.total',parent);

  calc_total();
});

function calc_total(){
  var sum = 0;
  $(".total").each(function(){
    sum += parseFloat($(this).text());
  });
  $('#sum').text(sum);
}
</script>
</body>

</html>