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

//if (!isset($_POST['planId'])) {

    $result = Braintree_Transaction::sale([
        'amount' => $_POST['amount'],
        'paymentMethodNonce' => $_POST['nonce'],
        'options' => [
            'submitForSettlement' => True
        ]
    ]);

//}else{
    /*$result = Braintree_Subscription::create([
        'paymentMethodNonce' => $_POST['nonce'],
        'planId' => $_POST['planId'],
        'amount' => $_POST['amount'],
        'merchantAccountId' => 'amigopet'
    ]);*/
//}

echo $result;die();

if($result->success === true){

}else{
    print_r($result->errors);
    die();
}

?>