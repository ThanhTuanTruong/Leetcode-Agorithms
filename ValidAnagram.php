<!-- Given two strings s and t, return true if t is an anagram of s, and false otherwise.
An Anagram is a word or phrase formed by rearranging the letters of a different word or phrase, typically using all the original letters exactly once.
 
Example 1:
Input: s = "anagram", t = "nagaram"
Output: true

Example 2:
Input: s = "rat", t = "car"
Output: false

Example 3:
Input: s = "a gentleman", t = "elegant man"
Output: true

Example 4:
Input: s = "eleven plus two", t = "twelve plus one"
Output: true -->


<?php

class Solution
{
	function isAnagram($s, $t)
	{
		$strlenS = strlen($s);
		$strlenT = strlen($t);
		
		if ($strlenS != $strlenT) {
			return false;
		}
		
		$map = [];
		
		for ($i = 0; $i < $strlenS; $i++) {
			$char = $s[$i];
			
			$map[$char] ??= 0;
			$map[$char]++;
		}
		
		for ($i = 0; $i < $strlenT; $i++) {
			$char = $t[$i];
			
			if (!isset($map[$char])) {
				return false;
			}
			
			$map[$char]--;
			
			if ($map[$char] == 0) {
				unset($map[$char]);
			}
		}
		
		return count($map) == 0;
	}
}

$solution = new Solution();

var_dump($solution->isAnagram('anagram', 'nagaram'));

