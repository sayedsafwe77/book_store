<?php

namespace App;

enum OrderStatusEnum: string
{
    case Pending = 'pending';
    case Confirmed = 'confirmed';
    case Delivered = 'delivered';
    case Cancelled = 'cancelled';
}
