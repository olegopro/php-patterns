<?php

namespace Adapter;

class PaymentAdapter implements IPaymentAdapter
{
    private $payObject;

    public function __construct(IPayment $payObject)
    {
        $this->payObject = $payObject;
    }

    public function pay($total)
    {
        $this->payObject->getForm($total);
    }
}
