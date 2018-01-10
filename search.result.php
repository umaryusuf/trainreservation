<?php
//error_reporting(0);
include('header.train.search.php');
?>


<div class="container">
    <div class="wrapper">
        <h1 class="title_main text-center">Train Shedule</h1>
          <table class="table table-striped table-bordered table-hover table-responsive">
              <thead class="text-center">
                <tr>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>Departure time</th>
                    <th>Arrival Time</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query = mysqli_query($dbc, "SELECT * FROM train WHERE source='$from' AND destination='$to'");
                  while($row = mysqli_fetch_array($query)):
                    $_SESSION["price"] = $row["price"];
                ?>
                <tr>
                  <td id="from"><?php echo $row['source']; ?></td>
                  <td id="to"><?php echo $row["destination"]; ?></td>
                  <td id="price" style="display:none"><?php echo $row["price"]; ?></td>
                  <td id="d_time"><?php echo $row["d_time"]; ?></td>
                  <td id="a_time"><?php echo $row["a_time"] ?></td>
                  <td>
                    <button id="book" class="btn btn_frm">Book</button>
                  </td>
                </tr>
                <?php endwhile ?>
              </tbody>
          </table>
    </div>
</div>
<?php include('footer.search.page.php');?>

<script>
$(document).on("click", "#book", function () {
    var from = $(this).closest("tr").find('#from').text();
    var to = $(this).closest("tr").find('#to').text();
    var price = $(this).closest("tr").find('#price').text();
    var d_time = $(this).closest("tr").find('#d_time').text();
    var a_time = $(this).closest("tr").find('#a_time').text();
    var url = './book.php?from='+from+'&to='+to;
    url += '&a_time='+a_time+'&d_time='+d_time;
    //alert(url);
    window.location = url;
});
</script>
