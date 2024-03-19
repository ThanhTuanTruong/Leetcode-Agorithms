<!-- Given a string s which consists of lowercase or uppercase letters, return the length of the longest palindrome that can be built with those letters.
Letters are case sensitive, for example, "Aa" is not considered a palindrome here.
 
Example 1:
Input: s = "abccccdd"
Output: 7
Explanation: One longest palindrome that can be built is "dccaccd", whose length is 7.

Example 2:
Input: s = "a"
Output: 1
Explanation: The longest palindrome that can be built is "a", whose length is 1. -->


<?php

class Solution
{
	function longestPalindrome($s)
	{
		$map = [];
		$strlenS = strlen($s);
		
		for ($i = 0; $i < $strlenS; $i++) {
			if (!array_key_exists($s[$i], $map)) {
				$map[$s[$i]] = 0;
			}
			$map[$s[$i]]++;
		}
		
		$result = 0;
		foreach ($map as $key => $count) {
			$result += $count - $count % 2;
		}
		
		if ($result < $strlenS) {
			$result++;
		}
		
		return $result;
	}
}

$solution = new Solution();

var_dump($solution->longestPalindrome('abccccdd'));