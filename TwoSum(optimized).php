<?php
/*
Category= EASY
Given an array of integers nums and an integer target, return indices of the two numbers such that they add up to target.

You may assume that each input would have exactly one solution, and you may not use the same element twice.

You can return the answer in any order.

 

Example 1:

Input: nums = [2,7,11,15], target = 9
Output: [0,1]
Output: Because nums[0] + nums[1] == 9, we return [0, 1].
Example 2:

Input: nums = [3,2,4], target = 6
Output: [1,2]
Example 3:

Input: nums = [3,3], target = 6
Output: [0,1]
 

Constraints:

2 <= nums.length <= 103
-109 <= nums[i] <= 109
-109 <= target <= 109
Only one valid answer exists.

*/
class Solution 
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    
    function twoSum($nums, $target) 
    {
        $assoc_arr = Array();
        foreach($nums as $val)
        {
            $assoc_arr[$val]=1;

        }
        $index=0;
        foreach($nums as $val)
        {
            $compliment=$target-$val;
            if(isset($assoc_arr[$compliment]))
            {
                return([$index,array_search($compliment,array_keys($assoc_arr))]);

            }
            $index++;
            

        }
        
    }
}
$test=new Solution();
$result=$test->twoSum([1,2,7,9,11],10);
print_r($result);
?>