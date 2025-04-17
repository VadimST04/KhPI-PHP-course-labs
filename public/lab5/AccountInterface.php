<?php

interface AccountInterface
{
    public function deposit($amount): void;
    public function withdraw($amount): void;
    public function getBalance(): float;
}
