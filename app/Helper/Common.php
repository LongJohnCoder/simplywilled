<?php
	/**
	 *
	 */
	namespace App\Helper;

	class Common
	{
    public static function getToken($length)
    {
      $key = '';
      $keys = array_merge(range(0, 9), range('A', 'Z'));

      for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
      }
      return $key;
    }
  }
