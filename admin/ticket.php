<?php require('./header.php');?>
<?php require('./top-nav.php');?>
<?php require('./side-nav.php');?>


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tickets</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ticket Details
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select-all"/></th>
                                <th>Sl no</th>
                                <th>Source</th>
                                <th>Destination</th>
                                <th>Deparature time</th>
                                <th>Arrival time</th>
                                <th>No of passenger</th>
                                <th>Full Name</th>
                                <th>Ticket No.</th>
                                <th>Seat No</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query = "select * from tickets order by id asc";
                            $result = mysqli_query($dbc, $query);
                            while($rows = mysqli_fetch_array($result)){
                              echo '<tr>';
                              echo '<td><input type="checkbox" id="select-all"/></td>';
                              echo '<td>'.$rows['id'].'</td>';
                              echo '<td>'.$rows['source'].'</td>';
                              echo '<td>'.$rows['destination'].'</td>';
                              echo '<td>'.$rows['a_time'].'</td>';
                              echo '<td>'.$rows['d_time'].'</td>';
                              echo '<td>'.$rows['passenger_no'].'</td>';
                              echo '<td>'.$rows['fullname'].'</td>';
                              echo '<td>'.$rows['ticket_no'].'</td>';
                              echo '<td>'.$rows['seat_no'].'</td>';
                              echo '<td>'.$rows['date'].'</td>';
                              echo '</tr>';
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>




<?php require('./footer.php');?>
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>
