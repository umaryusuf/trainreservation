<?php
session_start();
require_once('config/db.php');

$ticket_no = $_SESSION["ticket_no"];
$query = mysqli_query($dbc, "SELECT * FROM tickets WHERE ticket_no='$ticket_no'");
$data = mysqli_fetch_array($query);
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Book Your Ticket</title>

    <style>
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:30px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }
    .btn{
      color: #333;
      background-color: orange;
      padding: 15px 25px;
      border-radius: 4px;
      border: none;
    }
    .btn:hover{
      cursor: pointer;
      color: #fff;
      box-shadow: 2px 2px 1px 2px #ddd;
    }

    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }

    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }

    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }

    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }

    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }

    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }

    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }

    .invoice-box table tr.details td{
        padding-bottom:20px;
    }

    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }

    .invoice-box table tr.item.last td{
        border-bottom:none;
    }

    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #eee;
        font-weight:bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }

        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
    @media print{
      .btn{
        display: none;
      }
    }
    </style>
</head>

<body>
  <div class="invoice-box">
    <table cellpadding="0" cellspacing="0" border="1">
      <tr class="top">
        <td colspan="4">
          <table>
            <tr>
              <td class="title">
                <a href="index.php">
                  <img src="./css/images/logo.png" style="width:100%; max-width:600px;">
                </a>
              </td>

              <td>
                <br>
                <strong>Ticket No #: <?php echo $_SESSION['ticket_no'];?></strong>
                <br>
                <strong>Seat No #: <?php echo $data["seat_no"]; ?></strong>
                <br>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <?php echo 'ABUJA KADUNA EXPRESSS';?>
        </td>
        <td style="text-align: left">
          Payment Status: 
          <?php
            $ticket_no = $_SESSION["ticket_no"]; 
            $paid_query = mysqli_query($dbc, "SELECT id FROM payment WHERE ticket_no='$ticket_no'");
            if (mysqli_num_rows($paid_query) > 0) {
              echo "Paid";
            }else{
              echo "Not paid";
            }
          ?>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          Date of Journey: <?php echo $data["date"]; ;?>
        </td>
        <td>
          Source: <?php echo $data["source"] ?>
        </td>
        <td rowspan="">
          Destination: <?php echo $data["destination"] ?>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          Arrival time: <?php echo $data["a_time"] ?>
        </td>
        <td>
          Deparature time: <?php echo $data["d_time"] ?>
        </td>
        <td>
          Boarding: <?php echo ($data["source"] === "Kaduna") ? "Rigasa - ". $data["source"]." : ".$data["d_time"] : "Kubuwa - " . $data["source"]." : ".$data["d_time"];?>
        </td>
      </tr>
      <tr class="details">
        <td >Name</td>
        <td>Age</td>
        <td>Gender</td>
        <td>Type</td>
      </tr>
      <?php
        $query2  = "select * from passengers where ticket_no = "."'".$_SESSION['ticket_no']."'";
        $result = mysqli_query($dbc, $query2);
        while ($rows = mysqli_fetch_array($result)){
          echo '<tr>';
          echo '<td width="250">'.$rows["name"].'</td>';
          echo '<td >'.$rows["age"].'</td>';
          echo '<td>'.$rows["gender"].'</td>';
          echo '<td>'.$rows["type"].'</td>';
        }
      ?>
    </table>
    <br>
    <button class="btn" onclick="window.print()">Print Ticket</button>
  </div>
</body>
</html>
