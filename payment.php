<?php
error_reporting(0);
require('header.train.search.php');

$price = $_SESSION["price"];
$passenger_no = $_SESSION["passenger_no"];

$amount = $price * $passenger_no;

?>

	<div class="container">
		<div class="">
			<h1 class="title_main text-center">Payment Form</h1>
			<div class="panel panel-default">
				<div class="row">
		            <div class="col-md-7">
		            	<div class="alert alert-warning">
		            		<strong>Alert: </strong> <span style="text-decoration: line-through; font-weight: bold;">N</span> <?php echo $amount;?> will be deducted from your bank account.
		            	</div>
		                <div class="creditCardForm">
		                    <div class="payment">
		                        <form role="form" method="POST" name="payment" action="pay.php">
		                            <div class="form-group owner">
		                                <label for="owner">Owner Name:</label>
		                                <input type="text" class="form-control" name="owner" id="owner">
		                            </div>
		                            <div class="form-group CVV">
		                                <label for="cvv">PIN:</label>
		                                <input type="text" name="pin" class="form-control" id="cvv">
		                            </div>
		                            <div class="form-group" id="card-number-field">
		                                <label for="cardNumber">Card Number:</label>
		                                <input type="text" name="cardno" class="form-control" id="cardNumber">
		                            </div>
		                            <div class="form-group" id="expiration-date">
		                                <label>Expiration Date:</label>
		                                <select name="month">
		                                    <option value="January">January</option>
		                                    <option value="February">February </option>
		                                    <option value="March">March</option>
		                                    <option value="April">April</option>
		                                    <option value="May">May</option>
		                                    <option value="June">June</option>
		                                    <option value="July">July</option>
		                                    <option value="August">August</option>
		                                    <option value="September">September</option>
		                                    <option value="October">October</option>
		                                    <option value="November">November</option>
		                                    <option value="December">December</option>
		                                </select>
		                                <select name="year">
		                                    <option value="2016"> 2016</option>
		                                    <option value="2017"> 2017</option>
		                                    <option value="2018"> 2018</option>
		                                    <option value="2019"> 2019</option>
		                                    <option value="2020"> 2020</option>
		                                    <option value="2021"> 2021</option>
		                                </select>
		                            </div>
		                            <div class="form-group" id="credit_cards">
		                                <img src="images/visa.jpg" id="visa">
		                                <img src="images/mastercard.jpg" id="mastercard">
		                            </div>
		                            <div class="form-group" id="pay-now">
		                                <button type="submit" name="pay" class="btn btn-primary" id="confirm-purchase">Confirm</button>
		                            </div>
		                        </form>
		                    </div>
		                </div>
		            </div>
		            <div class="col-md-5">
		                <p class="examples-note text-info">Here are some dummy credit card numbers and CVV codes so you can test out the form:</p>

		                <div class="examples">
		                    <div class="table-responsive">
		                        <table class="table table-hover">
		                            <thead>
		                                <tr>
		                                    <th>Type</th>
		                                    <th>Card Number</th>
		                                    <th>PIN</th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                <tr>
		                                    <td>Visa</td>
		                                    <td>4716108999716531</td>
		                                    <td>257</td>
		                                </tr>
		                                <tr>
		                                    <td>Master Card</td>
		                                    <td>5281037048916168</td>
		                                    <td>043</td>
		                                </tr>
		                            </tbody>
		                        </table>
		                    </div>
		                </div>
		            </div>
		        </div>
			</div>
		</div>
	</div>
	<script src="js/jquery.payform.min.js" charset="utf-8"></script>
    <script src="js/script.js"></script>

<?php include('footer.search.page.php');?>