<?php

/* Common date operations for PHP5+
	You could copy-and-paste any of these standalone functions into a system class or date helper class or whatever is easiest for your project.
	For example, in this date.php script, I went ahead and made it a Date_Helper class.
	These functions are all standalone, though, and do not cross-contaminant. */

class Date_Helper {
	/* datetime_from_input function is what I like to use when I need to validate a datetime string.
		I just run the string into this function and get either a datetime object or if there's an error, false output. */
	public function datetime_from_input($input_date) {
		$date_sanitized = trim($input_date);
		try {
			$date_obj = DateTime::createFromFormat('Y-m-d\TH:i:sP',$date_sanitized);
			if ($date_obj === false) {
				$date_obj = DateTime::createFromFormat('Y-m-d\TH:i:sZ',$date_sanitized);
			}
			if ($date_obj === false) {
				$date_obj = DateTime::createFromFormat('Y-m-d H:i:sP',$date_sanitized);
			}
			if ($date_obj === false) {
				$date_obj = DateTime::createFromFormat('Y-m-d H:i:sZ',$date_sanitized);
			}
			if ($date_obj === false) {
				$date_obj = DateTime::createFromFormat('Y-m-d\TH:i:s',$date_sanitized);
			}
			if ($date_obj === false) {
				$date_obj = DateTime::createFromFormat('Y-m-d\TH:i:s.uZ',$date_sanitized);
			}
			if ($date_obj === false) {
				$date_obj = DateTime::createFromFormat('Y-m-d\TH:i:s.u',$date_sanitized);
			}
			if ($date_obj === false) {
				$date_obj = DateTime::createFromFormat(DateTime::ISO8601,$date_sanitized);
			}
			if ($date_obj === false) {
				$date_obj = DateTime::createFromFormat(DateTime::ATOM,$date_sanitized);
			}
			if ($date_obj === false) {
				$date_obj = DateTime::createFromFormat('Y-m-d H:i:s',$date_sanitized);
			}
			if ($date_obj === false) {
				$date_obj = DateTime::createFromFormat('Y-m-d H:i:s.u T',$date_sanitized);
			}
			if ($date_obj === false) {
				// var_dump(DateTime::getLastErrors());
				//attempt to validate a non-ISO-8601 date (without the time)
				$date_obj = DateTime::createFromFormat('Y-m-d',$date_sanitized);
			}
			return $date_obj;
		} catch (Exception $e) {
			return false;
		}
		return false;
	}
}
