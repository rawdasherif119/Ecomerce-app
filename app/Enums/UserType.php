<?php 

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Merchant()
 * @method static static Buyer()
 */
final class UserType extends Enum
{
    const MERCHANT = 1;
    const BUYER = 2;
}
