<?php
/**
 * Functional Scope: Helper class for datetime
 */
namespace App\Helper;

class DateTimeHelper {

  /**
  * Helper function for checking a particular date format for datetime fields
  * @params [date , strict mode (default true))
  */
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
