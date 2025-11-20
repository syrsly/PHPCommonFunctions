<?php

/* Common Math Workarounds for PHP5+
	You could copy-and-paste any of these standalone functions into a system class or math class or whatever is easiest for your project.
	For example, in this math.php script, I went ahead and made it a Math_Helper class.
	These functions are all standalone, though, and do not cross-contaminant. */

class Math_Helper {
	/* round_up: round up floats to a precision place
		Parameters:
			$value = int/float, the value you want rounded up
			$places = int, the precision cutoff for decimal values (can be as low as 0) */
	public static function round_up($value, $places = 0) {
		if ($places < 0) {
			$places = 0;
		}
		$mult = pow(10, $places);
		return ceil($value * $mult) / $mult;
	}
}
