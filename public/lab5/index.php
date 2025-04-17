<?php
require_once 'SavingsAccount.php';

$bankAccount = new SavingsAccount(100, 'GRN');
echo 'My balance is ' . $bankAccount->getBalance();
echo '<br/>';
try {
    $bankAccount->deposit(-50);
} catch (NegativeValueException $e) {
    echo $e->getMessage();
}
$bankAccount->deposit(50);
echo '<br/>My balance is ' . $bankAccount->getBalance();
echo '<br/>';
try {
    $bankAccount->withdraw(-50);
} catch (NegativeValueException $e) {
    echo $e->getMessage();
}
echo '<br/>';
try {
    $bankAccount->withdraw(500);
} catch (NegativeValueException $e) {
    echo $e->getMessage();
}
$bankAccount->withdraw(20);
echo '<br/>My balance is ' . $bankAccount->getBalance();
$bankAccount->applyInterest();
echo '<br/>My balance is ' . $bankAccount->getBalance();
