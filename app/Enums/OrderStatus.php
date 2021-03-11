<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class OrderStatus extends Enum
{
  const Untreated =   0;
  const Undispatched =   1;
  const Shipping = 2;
  const Sent = 3;

  public static function getStatus($value): string
  {
    switch ($value){
      case 'Untreated':
        return '未処理';
        brake;
      case 'Undispatched':
        return '発送処理中';
        brake;
      case 'Shipping':
        return '発送中';
        brake;
      case 'Sent':
        return '対応済み';
        brake;
      default:
        return self::getKey($value);
    }
  }
}