<?php

namespace App;

enum UserRole: string
{
    case ADMIN ='admin';
    case SELLER ='seller';
    case CLIENT ='client';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
