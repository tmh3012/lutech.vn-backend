<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserTypeEnum extends Enum
{
  const SUPER_ADMIN = 0;
  const ADMIN = 1;
}
