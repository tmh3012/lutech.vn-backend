<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserTypeEnum extends Enum
{
  CONST SUPER_ADMIN = 0;
  CONST ADMIN = 1;
  CONST DEV = 2;
  CONST MARKETING = 3;
  CONST TESTER = 4;
  CONST META_DATA = 5;
}
