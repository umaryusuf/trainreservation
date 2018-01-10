<?php require('./header.php');?>
<?php require('./top-nav.php');?>
<?php require('./side-nav.php');?>


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Passengers</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Passenger details
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select-all"/></th>
                                <th>Sl no</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Ticket no</th>
                                <th>Seat no</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $query = "select * from passengers order by id asc";
                            $result = mysqli_query($dbc, $query);
                            while($rows = mysqli_fetch_array($result)){
                              echo '<tr>';
                              echo '<td><input type="checkbox" id="select-all"/></td>';
                              echo '<td>'.$rows["id"].'</td>';
                              echo '<td>'.$rows["name"].'</td>';
                              echo '<td>'.$rows["type"].'</td>';
                              echo '<td>'.$rows["age"].'</td>';
                              echo '<td>'.$rows["gender"].'</td>';
                              echo '<td>'.$rows["ticket_no"].'</td>';
                              echo '<td>'.$rows["seat_no"].'</td>';
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
