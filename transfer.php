<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
    <link rel="stylesheet" href="file.css">

   
</head>
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

<?php
    include 'join.php';
    $sql = "SELECT * FROM `customer` ";
    $result = mysqli_query($link,$sql);
?>

 <h1 style=" color:white; text-align:center;  font-size: 62px;font-style: inherit;">CUSTOMER DETAILS</h1>
        <br>
            
                      <center><table class="table table-hover table-striped table-condensed table-bordered" style=" background: rgb(46, 44, 44);" >
                                      </center>
                            <tr>
                            <th scope="col" style=" color:white;font-size: 22px;  border: solid white; padding: 17px;">Id</th>
                            <th scope="col" style=" color:white; font-size: 22px;  border: solid white; padding: 17px;">Name</th>
                            <th scope="col" style="color:white; font-size: 22px;  border: solid white;padding: 17px;">E-Mail</th>
                            <th scope="col" style=" color:white; font-size: 22px; border: solid white; padding: 17px;"> Account Number</th>
                            <th scope="col" style=" color:white; font-size: 22px;  border: solid white;padding: 17px;"> Current Balance</th>
                            <th scope="col" style=" color:white; font-size: 22px;  border: solid white;padding: 17px;"> Transaction</th>
                             </tr>
                        
                    
                <?php 
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr style="color : white; text-align: center; border: 1px solid white;" >
                        <td  style="color : white; text-align: center; border: solid white;padding: 12px;"><?php echo $rows['id'] ?></td>
                        <td style="color : white; text-align: center; border: solid white;padding: 12px;"><?php echo $rows['name']?></td>
                        <td style="color : white; text-align: center; border: solid white; padding: 12px;"><?php echo $rows['email']?></td>
                        <td style="color : white; text-align: center; border: solid white; padding: 12px;"><?php echo $rows['account number']?></td>
                        <td style="color : white; text-align: center; border: solid white; padding: 12px;" ><?php echo $rows['balance']?></td>
                        <td style="color : white; text-align: center; border: solid white;padding: 12px;"><a href="transaction.php?id= <?php echo $rows['id'] ;?>"> <button type="button" class="hero-btn">TRANSFER</button></a></td> 
                    </tr>
                <?php
                    }
                ?>
            
                        
                    </table>
                  
            
         
         
</body>
                </section>
</html>