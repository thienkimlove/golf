<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019-04-08
 * Time: 14:22
 */

namespace App\Libraries;


class Golf
{
    public const TYPE_MEMBER_DEFAULT = 0;
    public const TYPE_MEMBER_PREMIUM = 1;
    public const TYPE_MEMBER_COACH = 2;

    public static function getMemberTypes()
    {
        return [
            self::TYPE_MEMBER_DEFAULT => 'Mặc định',
            self::TYPE_MEMBER_PREMIUM => 'VIP',
            self::TYPE_MEMBER_COACH => 'Thầy'
        ];
    }

}