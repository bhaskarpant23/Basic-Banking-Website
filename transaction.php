<?php
include 'join.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * FROM `customer` where id=$from";
    $query = mysqli_query($link,$sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "SELECT * FROM `customer` where id=$to";
    $query = mysqli_query($link,$sql);
    $sql2 = mysqli_fetch_array($query);



    // condition to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // condition to check insufficient balance.
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // condition to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE customer set balance=$newbalance where id=$from";
                mysqli_query($link,$sql);
             

                // adding amount to reciever's account
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE customer set balance=$newbalance where id=$to";
                mysqli_query($link,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
               
                $sql = " INSERT INTO `transaction`(`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($link,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='history.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
   
    <link rel="stylesheet"href="file.css">

   
</head>

<body>
<section class="header">
    <nav>
       
        <div class="nav-links" id="navLinks">
           <ul>
            <li><a href="index.html">HOME</a></li>
            <li><a href="transfer.php">CUSTOMER DETAILS</a></li>
            <li><a href="history.php">TRANSACTION HISTORY</a></li>
            <li><a href="contact.html">CONTACT</a></li>
        </ul></div>
       </nav>

	<div>
   <center>     <h1 style=" color:white; text-align:center;  font-size: 62px;font-style: inherit;">TRANSACTION</h2></center>
            <?php
                 include 'join.php';
             $sid=$_GET['id'];
                $sql = "SELECT * FROM  customer where id=$sid";
                $result=mysqli_query($link,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($link);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
    <br>
    <div>
      <center>      <table class="table table-hover table-striped table-condensed table-bordered" style=" background: rgb(46, 44, 44);" >  </center>
                <tr style="color : black;">
                    <th   style=" color:white;font-size: 22px;  border: solid white; padding: 17px;">Id</th>
                    <th   style=" color:white;font-size: 22px;  border: solid white; padding: 17px;">Name</th>
                    <th   style=" color:white;font-size: 22px;  border: solid white; padding: 17px;">Email</th>
                    <th   style=" color:white;font-size: 22px;  border: solid white; padding: 17px;">Account Number</th>
                    <th   style=" color:white;font-size: 22px;  border: solid white; padding: 17px;">Current Balance</th>
                </tr>
                <tr style="color : black;">
                    <td  style="color : white; text-align: center; border: solid white;padding: 12px;"><?php echo $rows['id'] ?></td>
                    <td  style="color : white; text-align: center; border: solid white;;padding: 12px;"><?php echo $rows['name'] ?></td>
                    <td style="color : white; text-align: center; border: solid white;;padding: 12px;"><?php echo $rows['email'] ?></td>
                    <td style="color : white; text-align: center; border: solid white;;padding: 12px;"><?php echo $rows['account number'] ?></td>
                    <td  style="color : white; text-align: center; border: solid white;;padding: 12px;"><?php echo $rows['balance'] ?></td>
                </tr>
            </table>
        </div>
        <br><br>
         <label style="color : white;letter-spacing:2px; padding:60px; font-size: 25px;"><b>TRANSFER TO:</b></label>
        <select style=" padding:10px;"  name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'join.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM customer where id!=$sid";
                $result=mysqli_query($link,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($link);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['name'] ;?> (Balance: 
                    <?php echo $rows['balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br><br>
        <br><br>
            <label style="color : white; letter-spacing:2px; padding: 60px; font-size: 25px;"><b>AMOUNT:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      &nbsp;&nbsp;&nbsp;</label>
         <input  style=" padding:10px;  " type="number" class="form-control" name="amount" required>
            <br><br><br><br>
                <div class="text-center" >
        <center>    <button class="hero-btn" name="submit" type="submit" id="myBtn" >Transfer</button></center>
            </div>
        </form>
    </div>
    
    </section>
</body>
    </html>