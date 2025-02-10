<?php

namespace App;

enum PaymentTypeEnum: string
{
    case Cash = 'cash';
    case Visa = 'visa';
}
