<?php
require_once 'AccountInterface.php';
require_once 'exceptions/NegativeValueException.php';


class BankAccount implements AccountInterface
{
    public const MIN_BALANCE = 0;

    protected $balance;
    protected $currency;

    public function __construct($balance = self::MIN_BALANCE, $currency = 'US')
    {
        $this->balance = $balance;
        $this->currency = $currency;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function deposit($amount): void
    {
        if ($amount < 0) {
            throw new NegativeValueException('Amount can NOT be a negative value!');
        }

        $this->balance += $amount;
    }

    function withdraw($amount): void
    {
        if ($amount < 0) {
            throw new NegativeValueException('Amount can NOT be a negative value!');
        }

        if (($this->balance - $amount) < 0) {
            throw new NegativeValueException('Amount is more than an actual balance');
        }

        $this->balance -= $amount;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency($currency): void
    {
        $this->currency = $currency;
    }
}
