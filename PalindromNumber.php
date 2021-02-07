<?php
/*
9. Palindrome Number
Easy

3008

1697

Add to List

Share
Given an integer x, return true if x is palindrome integer.

An integer is a palindrome when it reads the same backward as forward. For example, 121 is palindrome while 123 is not.

 

Example 1:

Input: x = 121
Output: true
Example 2:

Input: x = -121
Output: false
Explanation: From left to right, it reads -121. From right to left, it becomes 121-. Therefore it is not a palindrome.
Example 3:

Input: x = 10
Output: false
Explanation: Reads 01 from right to left. Therefore it is not a palindrome.
Example 4:

Input: x = -101
Output: false
 

Constraints:

-231 <= x <= 231 - 1
 

Follow up: Could you solve it without converting the integer to a string?
*/

class Solution 
{

    /**
     * @param Integer $x
     * @return Integer
     */
    function isPalindrome($x) 
    {
        if($x<0)
        {
            return 0;
        }
        else
        {
            $output=0;
            $temp=$x;
            while($temp!=0)
            {
                $remainder=(int)($temp%10);
                $temp=(int)($temp/10);
                $output=($output*10)+$remainder;
            }
            if($x==$output)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        

        }

        
    }
}

$obj=new Solution();
$res=$obj->isPalindrome(121);
print_r($res);

?>