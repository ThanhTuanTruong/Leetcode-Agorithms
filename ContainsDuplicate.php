<!-- Given an integer array nums, return true if any value appears at least twice in the array, and return false if every element is distinct.

Example 1:
Input: nums = [1,2,3,1]
Output: true

Example 2:
Input: nums = [1,2,3,4]
Output: false

Example 3:
Input: nums = [1,1,1,3,3,4,3,2,4,2]
Output: true -->


<?php

class Solution
{
	function containsDuplicate($nums)
	{
		$map = [];
		
		for ($i = 0; $i < count($nums); $i++) {
			if (!array_key_exists($nums[$i], $map)) {
				$map[$nums[$i]] = 0;
			}
			
			$map[$nums[$i]]++;
		}
		
		foreach ($map as $count) {
			if ($count >= 2) {
				return true;
			}
		}
		
		return false;
	}
}

$solution = new Solution();

var_dump($solution->containsDuplicate([1, 2, 2]));

