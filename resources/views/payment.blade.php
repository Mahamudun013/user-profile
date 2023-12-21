<!DOCTYPE html>
<html>
<head>
    <title>Payment Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container col-md-6" style="margin-top: 50px">
    	<h3>Payment detail</h3>

    	<form method="post" action="/payment/process">
        @csrf
        <label for="amount">Amount:</label>
        <input class="form-control" type="text" name="amount" id="amount" required>
        <br>
        <label for="user_id">User ID:</label>
        <input class="form-control" type="text" name="user_id" id="user_id" required>
        <br>
        <button class="btn btn-primary" type="submit">Pay Now</button>
    </form>

	<br>
    @if(session('status') == 'success')
        <div class="alert alert-success alert-dismissible">Payment successful!</div>
    @elseif(session('status') == 'failure')
    	<div class="alert alert-danger alert-dismissible">Payment failed!</div>
    @endif

    </div>
</body>
</html>