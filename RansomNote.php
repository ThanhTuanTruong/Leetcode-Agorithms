<!-- Given two strings ransomNote and magazine, return true if ransomNote can be constructed by using the letters from magazine and false otherwise.
Each letter in the magazine can only be used once in ransomNote.
 
Example 1:
Input: ransomNote = "a", magazine = "b"
Output: false

Example 2:
Input: ransomNote = "aa", magazine = "ab"
Output: false

Example 3:
Input: ransomNote = "aa", magazine = "aab"
Output: true -->


<?php

class Solution
{
	function canConstruct($ransomNote, $magazine)
	{
		$magazineMap = [];
		$strlenMagazine = strlen($magazine);
		
		for ($i = 0; $i < $strlenMagazine; $i++) {
			if (!array_key_exists($magazine[$i], $magazineMap)) {
				$magazineMap[$magazine[$i]] = 0;
			}
			$magazineMap[$magazine[$i]]++;
		}
		
		$strlenRansomNote = strlen($ransomNote);
		
		for ($i = 0; $i < $strlenRansomNote; $i++) {
			if (!array_key_exists($ransomNote[$i], $magazineMap) || $magazineMap[$ransomNote[$i]] === 0) {
				return false;
			}
			$magazineMap[$ransomNote[$i]]--;
		}
		
		return true;
	}
}

$solution = new Solution();

var_dump($solution->canConstruct('aaa', 'baa'));

