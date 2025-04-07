<?php

namespace App;

enum UserStatus: string
{
    case ACTIVE = 'actif';
    case INACTIVE = 'inactif';
}
