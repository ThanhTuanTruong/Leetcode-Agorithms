<!-- Given a string s containing just the characters '(', ')', '{', '}', '[' and ']', determine if the input string is valid.
An input string is valid if:
Open brackets must be closed by the same type of brackets.
Open brackets must be closed in the correct order.
Every close bracket has a corresponding open bracket of the same type.


Example 1:
Input: s = "()"
Output: true

Example 2:
Input: s = "()[]{}"
Output: true

Example 3:
Input: s = "(]"
Output: false -->


<?php

class Solution
{
	function isValid($s)
	{
		$strlenS = strlen($s);
		
		if ($strlenS % 2 != 0) {
			return false;
		}
		
		$map = [];
		$bracketSet = ['(' => ')', '{' => '}', '[' => ']'];
		
		for ($i = 0; $i < $strlenS; $i++) {
			if (array_key_exists($s[$i], $bracketSet)) {
				$map[] = $bracketSet[$s[$i]];
			} elseif (array_pop($map) !== $s[$i]) {
				return false;
			}
		}
		
		return count($map) === 0;
	}
}

$solution = new Solution();

var_dump($solution->isValid('()}'));

