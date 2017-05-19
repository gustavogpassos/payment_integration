<?php
/**
 * Created by IntelliJ IDEA.
 * User: Gustavo
 * Date: 14/05/2017
 * Time: 21:13
 */

require "boot.php";

if(empty($_POST['payment_method_nonce'])){
    header('Location: index.php');

}

$result = Braintree_Transaction::sale([
    'amount' => $_POST['amount'],
    'paymentMethodNonce' => $_POST['payment_method_nonce'],
    'options' => [
        'submitForSettlement' => True
    ]
]);

if($result->success === true){

}else{
    print_r($result->errors);
    die();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment report</title>


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
<body>
<form action="payment.php" method="post" class="payment-form">

    <label for="id" class="heading">Transaction ID</label><br/>
    <input type="text" disabled="disabled" name="id" id="id" value="<?php echo $result->transaction->id; ?>"><br/><br/>

id    <label for="firstName" class="heading">First Name</label><br/>
    <input type="text" disabled="disabled" name="firstName" id="firstName" value=""><br/><br/>

    <label for="lastName" class="heading">Last Name</label><br/>
    <input type="text" disabled="disabled" name="lastName" id="lastName" value=""><br/><br/>

    <label for="amount" class="heading">Amount (BRL)</label><br/>
    <input type="text" disabled="disabled" name="amount" id="amount" value="<?php echo $result->transaction->amount.' '.$result->transaction->currencyIsoCode; ?>"><br/><br/>

    <label for="status" class="heading">Status</label><br/>
    <input type="text" disabled="disabled" name="status" id="status" value="Successful"><br/><br/>

    <div id="dropin-container"></div><br/><br>

    <button type="submit">Pay with braintree</button>

</form>

</body>
</html>
