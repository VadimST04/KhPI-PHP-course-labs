<?php
require_once 'BankAccount.php';

class SavingsAccount extends BankAccount
{
    public static float $interestRate = 3.5 / 100;

    public function applyInterest(): void
    {
        $this->balance += $this->balance * self::$interestRate;
    }
}
