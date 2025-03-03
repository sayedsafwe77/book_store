<?php

namespace App;

enum OrderStatusEnum: string
{
    case Pending = 'pending';
    case OutForDelivery = 'out_for_delivery';
    case Confirmed = 'confirmed';
    case Delivered = 'delivered';
    case Cancelled = 'cancelled';
}
