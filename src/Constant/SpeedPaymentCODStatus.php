<?php
namespace speed\Constant;

/**
 * Class SpeedPaymentCODStatus
 * @package speed\Constant
 */
class SpeedPaymentCODStatus
{

    const Status_0 = 0;
    const Status_1 = 1;
    const Status_2 = 2;
    const Status_3 = 3;

    const labels = [
      self::Status_0 => 'پرداختی این مرسوله تعیین وضعیت نشده است',
      self::Status_1 => 'تعریف شده و در انتظار پرداخت',
      self::Status_2 => 'پرداخت شده',
      self::Status_3 => 'پرداخت کنسل شده',
    ];

}

