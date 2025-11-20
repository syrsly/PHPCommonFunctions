<?php

/* Common validation tasks for PHP5+
	You could copy-and-paste any of these standalone functions into a system class or math class or whatever is easiest for your project.
	For example, in this math.php script, I went ahead and made it a Validator class.
	These functions are all standalone, though, and do not cross-contaminant. */

class Validator {
	/* encapsulated_by_single_quotes is a function I often use to check if a string is already encapsulated for the purpose of sanitizing strings *from* SQL.
		You should *not* ever use this function to bypass sanitization, however. It's more a way to check for odd character placement and add extra handlers.
		For example, you might have bad data in a table you have to pull from.
	*/
	public function encapsulated_by_single_quotes($string) {
		return (strlen($string) >= 2 && $string[0] === '\'' && $string[strlen($string) - 1] === '\'');
	}
}
