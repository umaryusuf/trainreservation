<?php require('./header.php');?>
<?php require('./top-nav.php');?>
<?php require('./side-nav.php');?>


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    User details
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select-all"/></th>
                                <th>Username</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Date of birth</th>
                                <th>Email</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $query = "SELECT * FROM users order by username asc";
                              $result = mysqli_query($dbc, $query);
                              while($rows = mysqli_fetch_array($result)){
                                echo '<tr>';
                                echo '<td><input type="checkbox" id="select-all"/></td>';
                                echo '<td>'.$rows['username'].'</td>';
                                echo '<td>'.$rows['firstname'].'</td>';
                                echo '<td>'.$rows['lastname'].'</td>';
                                echo '<td>'.$rows['dob'].'</td>';
                                echo '<td>'.$rows['email'].'</td>';
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
