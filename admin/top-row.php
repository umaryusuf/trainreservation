<div class="row">
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-table fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <br>
                        <div class="huge">
                        <?php 
                            $query = mysqli_query($dbc, "SELECT COUNT(id) as max_tickets FROM tickets");
                            $data = mysqli_fetch_assoc($query);
                            echo $data["max_tickets"];
                        ?>
                        </div>
                        <div>Tickets!</div>
                        <br>
                    </div>
                </div>
            </div>
            <a href="ticket.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-th fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <br>
                        <div class="huge">
                        <?php 
                            $query = mysqli_query($dbc, "SELECT COUNT(id) as max_passengers FROM passengers");
                            $data = mysqli_fetch_assoc($query);
                            echo $data["max_passengers"];
                        ?>
                        </div>
                        <div>Passengers!</div>
                        <br>
                    </div>
                </div>
            </div>
            <a href="passenger.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <br>
                        <div class="huge">
                        <?php
                            $query = mysqli_query($dbc, "SELECT COUNT(username) as max_users FROM users");
                            $data = mysqli_fetch_assoc($query);
                            echo $data["max_users"]; 
                        ?>
                        </div>
                        <div>Users!</div>
                        <br>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

</div>
<!-- /.row -->
