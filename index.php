<?php
/**
 * Created by IntelliJ IDEA.
 * User: Gustavo
 * Date: 14/05/2017
 * Time: 20:44
 */

?>
<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagamento com Braintree</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://js.braintreegateway.com/js/braintree-2.31.0.min.js"></script>

    <script>
        $.ajax({
            url: "token.php",
            type: "get",
            dataType: "json",
            success: function(data){
                braintree.setup(data, 'dropin', {container:'dropin-container'});
            }
        })
    </script>

    <style>
        label.heading{
            font-weight: 600;
        }
        .payment-form{
            width: 300px;
            margin-left: auto;
            margin-right: auto;
            padding: 10px;
            border: 1px solid black;
        }
    </style>
</head>
<body style="text-align: center; margin-top: 100px;">

<form action="payment.php" method="post" class="payment-form">

    <label for="firstName" class="heading">First Name</label><br/>
    <input type="text" name="firstName" id="firstName"><br/><br/>

    <label for="lastName" class="heading">Last Name</label><br/>
    <input type="text" name="lastName" id="lastName"><br/><br/>

    <label for="amount" class="heading">Amount (BRL)</label><br/>
    <input type="text" name="amount" id="amount"><br/><br/>

    <div id="dropin-container"></div><br/><br>

    <button type="submit">Pay with braintree</button>

</form>


</body>
</html>
