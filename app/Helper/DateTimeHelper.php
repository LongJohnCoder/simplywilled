<?php
namespace App\Helper;

class DateTimeHelper {
  public function verifyDate($date, $strict = true)
  {
    $dateTime = \DateTime::createFromFormat('Y-m-d H:i:s', $date);
    if ($strict) {
        $errors = \DateTime::getLastErrors();
        if (!empty($errors['warning_count'])) {
            return false;
        }
    }
    return $dateTime !== false;
  }
}
