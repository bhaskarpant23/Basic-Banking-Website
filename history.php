
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="stylesheet" href="file.css">
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
    <center>    <h1 style=" color:white; text-align:center;  font-size: 62px; font-style: inherit;">TRANSACTION HISTORY</h1></center>
        
       <br>
       <div >
  <center> <table class="table table-hover table-striped table-condensed table-bordered" style=" background: rgb(46, 44, 44);" >
        <thead style="color : white;">
            <tr>
                <th style=" color:white;font-size: 22px;  border: solid white; padding: 17px;">S.No.</th>
                <th style=" color:white;font-size: 22px;  border: solid white; padding: 17px;">Sender</th>
                <th  style=" color:white;font-size: 22px;  border: solid white; padding: 17px;">Receiver</th>
                <th style=" color:white;font-size: 22px;  border: solid white; padding: 17px;">Amount</th>
                <th style=" color:white;font-size: 22px;  border: solid white; padding: 17px;">Date & Time</th>
            </tr>
        </thead>
        <tbody>
        <?php

            include 'join.php';

            $sql ="SELECT * FROM `transaction`";

            $query =mysqli_query($link, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>

            <tr style="color : white;">
            <td class="py-2" style="color : white; text-align: center; border: solid white; padding: 12px;"><?php echo $rows['sno']; ?></td>
            <td class="py-2"style="color : white; text-align: center; border: solid white; padding: 12px;"><?php echo $rows['sender']; ?></td>
            <td class="py-2" style="color : white; text-align: center; border: solid white; padding: 12px;"><?php echo $rows['receiver']; ?></td>
            <td class="py-2" style="color : white; text-align: center; border: solid white;padding: 12px;"><?php echo $rows['amount']; ?> </td>
            <td class="py-2" style="color : white; text-align: center; border: solid white;padding: 12px;"><?php echo $rows['date and time']; ?> </td>
                
        <?php
            }

        ?>
        </tbody>
    </table></center>

    </div>
</div>
        </section>
</body>
</html>

