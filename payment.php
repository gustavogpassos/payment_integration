<?php
/**
 * Created by IntelliJ IDEA.
 * User: Gustavo
 * Date: 14/05/2017
 * Time: 21:13
 */

require "boot.php";

/*if(empty($_POST['payment_method_nonce'])){
    header('Location: index.php');

}*/

$result = Braintree_Transaction::sale([
    'amount' => $_POST['amount'],
    'paymentMethodNonce' => $_POST['payment_method_nonce'],
    'options' => [
        'submitForSettlement' => True
    ]
]);

echo $result;die();

if($result->success === true){

}else{
    print_r($result->errors);
    die();
}

?>