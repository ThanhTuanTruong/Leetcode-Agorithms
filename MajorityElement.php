<!-- Given an array nums of size n, return the majority element.
The majority element is the element that appears more than ⌊n / 2⌋ times. You may assume that the majority element always exists in the array.
 
Example 1:
Input: nums = [3,2,3]
Output: 3

Example 2:
Input: nums = [2,2,1,1,1,2,2]
Output: 2 -->


<?php

class Solution
{
	function majorityElement($nums)
	{
		$major = -1;
		$counter = 0;
		
		for ($i = 0; $i < count($nums); $i++) {
			if ($counter === 0) {
				$major = $nums[$i];
			}
			
			$counter += ($major === $nums[$i]) ? 1 : -1;
		}
		
		return $major;
	}
}

$solution = new Solution();

var_dump($solution->majorityElement([2, 3, 2]));

