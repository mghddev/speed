<?php
namespace speed\Constant;

/**
 * Class SpeedOrderStatus
 * @package speed\Constant
 */
class SpeedOrderStatus
{
    const Status_10 = 10;
    const Status_20 = 20;
    const Status_30 = 30;
    const Status_40 = 40;
    const Status_50 = 50;
    const Status_60 = 60;
    const Status_70 = 70;
    const Status_80 = 80;

    const labels = [
      self::Status_10 => 'در انتظار ارسال',
      self::Status_20 => 'ارسال شده',
      self::Status_30 => 'تحویل داده شده',
      self::Status_40 => 'عدم حضور گیرنده',
      self::Status_50 => 'آدرس اشتباه',
      self::Status_60 => 'عدم دریافت مرسوله',
      self::Status_70 => 'لغو درخواست',
      self::Status_80 => 'دلایل دیگر',
    ];


}
