<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserRolesEnum extends Enum
{
  CONST DEV = 0;
  CONST ADMIN = 1;
  CONST USER = 2;
}
