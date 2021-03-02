<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class SweetStatus extends Enum
{
    const InStock =   0;
    const LowInventory =   1;
    const OutOfStock = 2;
}
