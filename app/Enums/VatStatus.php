<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static inPrice()
 * @method static static fromPrice()
 */
final class VatStatus extends Enum
{
    const IN_PRICE   = 1;
    const FROM_PRICE = 2;
}
