<?php

/* Common security-related tasks for PHP5+
	You could copy-and-paste any of these standalone functions into a system class or security class or whatever is best for your project.
	For example, in this security.php script, I went ahead and made it a Security class.
	These functions are all standalone, though, and do not cross-contaminant. */

class Security {
	//The allowed password characters is so we can granularly control what passwords look like. Not all sites like uppercase characters. In this case, we're excluding the '=' character as well as most quote characters as a security precaution.
	private $allowed_password_characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ`~!?@#$%^&*,.<>()[]-_+:;';
	/* generate_password function is a simplified version of a function I created for account creation/recovery on a really old site a long time ago.
		It does not encrypt the password, so you'll have to determine your own encryption solution. Encryption is fairly straightforward, though. */
	public function generate_password($custom_length=0) {
		$pass = '';
		$pass_min_length = 5;
		$pass_max_length = 15;
		$length = rand($pass_min_length, $pass_max_length);
		if ($custom_length>0) {
			$length = $custom_length;
		}
		$max = mb_strlen($this->allowed_password_characters, '8bit') - 1;
		if ($max < 1) {
			//return this stupid password as a fallback in case we can't figure out a max, because max value not working signifies that we can't determine allowed characters length
			return 't3mP@55';
		}
		for ($i = 0; $i < $length; ++$i) {
			$pass .= $this->allowed_password_characters[random_int(0, $max)];
		}
		return $pass;
	}
}
