<?php
/*
Given a signed 32-bit integer x, return x with its digits reversed. If reversing x causes the value to go outside the signed 32-bit integer range [-231, 231 - 1], then return 0.

Assume the environment does not allow you to store 64-bit integers (signed or unsigned).

Example 1:

Input: x = 123
Output: 321
Example 2:

Input: x = -123
Output: -321
Example 3:

Input: x = 120
Output: 21
Example 4:

Input: x = 0
Output: 0
 

Constraints:

-231 <= x <= 231 - 1


*/

class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x) 
    {
        $output=0;
        $temp=$x;
        while($temp!=0)
        {
            $remainder=(int)($temp%10);
            $temp=(int)($temp/10);
            $output=($output*10)+$remainder;
           
        }
        if(-2147483648<=$output && $output<=2147483647 )
        {
            return $output;
        }
        else
        {
            return 0;
        }
        
        
       

    }
}

$obj=new Solution();
$res=$obj->reverse(-2147483648);
print_r($res);

?>