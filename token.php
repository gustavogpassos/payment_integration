<?php
/**
 * Created by IntelliJ IDEA.
 * User: Gustavo
 * Date: 14/05/2017
 * Time: 21:03
 */
require "boot.php";

echo json_encode(Braintree_ClientToken::generate());
