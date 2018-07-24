<?php

namespace App\Helpers;

class Detection
{

	/**
	 * https://gist.github.com/philipptempel/4322656
	 * Get the user's operating system

	 *
	 * @param   string  $userAgent  The user's user agent
	 *
	 * @return  string  Returns the user's operating system as human readable string,
	 *  if it cannot be determined 'n/a' is returned.
	 */
	public function getOS($userAgent) {
	    // Create list of operating systems with operating system name as array key 
	    $oses = array (
	        'iPhone'            => '(iPhone)',
	        'Windows 3.11'      => 'Win16',
	        'Windows 95'        => '(Windows 95)|(Win95)|(Windows_95)',
	        'Windows 98'        => '(Windows 98)|(Win98)',
	        'Windows 2000'      => '(Windows NT 5.0)|(Windows 2000)',
	        'Windows XP'        => '(Windows NT 5.1)|(Windows XP)',
	        'Windows 2003'      => '(Windows NT 5.2)',
	        'Windows Vista'     => '(Windows NT 6.0)|(Windows Vista)',
	        'Windows 7'         => '(Windows NT 6.1)|(Windows 7)',
	        'Windows NT 4.0'    => '(Windows NT 4.0)|(WinNT4.0)|(WinNT)|(Windows NT)',
	        'Windows ME'        => 'Windows ME',
	        'Open BSD'          => 'OpenBSD',
	        'Sun OS'            => 'SunOS',
	        'Linux'             => '(Linux)|(X11)',
	        'Safari'            => '(Safari)',
	        'Mac OS'            => '(Mac_PowerPC)|(Macintosh)',
	        'QNX'               => 'QNX',
	        'BeOS'              => 'BeOS',
	        'OS/2'              => 'OS/2',
	        'Search Bot'        => '(nuhk)|(Googlebot)|(Yammybot)|(Openbot)|(Slurp/cat)|(msnbot)|(ia_archiver)'
	    );
	    
	    // Loop through $oses array
	    foreach($oses as $os => $preg_pattern) {
	        // Use regular expressions to check operating system type
	        if ( preg_match('@' . $preg_pattern . '@', $userAgent) ) {
	            // Operating system was matched so return $oses key
	            return $os;
	        }
	    }
	    
	    // Cannot find operating system so return Unknown
	    
	    return 'n/a';
	}


	/**
	*	https://www.codespeedy.com/simple-php-code-to-detect-mobile-device/
	*/
	public function isMobileDevice($userAgent): bool
	{
		$devicesString = "/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i";

	    return preg_match($devicesString, $userAgent);
	}
}