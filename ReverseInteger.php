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
    function reverse($x) {
        $str_val=(String)$x;
        $str_arr=preg_split('//', $str_val, -1, PREG_SPLIT_NO_EMPTY);
        $index=0;
        $output="";
        if($x<0){
            $output.="-";
        }
        for($i=count($str_arr)-1;$i>=0;$i--)
        {
           
            if($str_arr[$i]!="-")
            {
                $output.=$str_arr[$i];
            }
                
            
            $index++;
            
        }
        $output_int=(int)$output;
        if(-2147483648<=$output_int && $output_int<=2147483647 )
        {
            return $output_int;
        }
        else
        {
            return 0;
        }
        
       

    }
}

$obj=new Solution();
$res=$obj->reverse(-214748364);

?>