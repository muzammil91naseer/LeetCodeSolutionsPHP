<?php
/*Given a string s, find the length of the longest substring without repeating characters.

 

Example 1:

Input: s = "abcabcbb"
Output: 3
Explanation: The answer is "abc", with the length of 3.
Example 2:

Input: s = "bbbbb"
Output: 1
Explanation: The answer is "b", with the length of 1.
Example 3:

Input: s = "pwwkew"
Output: 3
Explanation: The answer is "wke", with the length of 3.
Notice that the answer must be a substring, "pwke" is a subsequence and not a substring.
Example 4:

Input: s = ""
Output: 0
 

Constraints:

0 <= s.length <= 5 * 104
s consists of English letters, digits, symbols and spaces.
*/

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    
    
    
    
    
    function lengthOfLongestSubstring($s) {
        
        if($s!="")
        {
            $length=strlen($s);
            $str_arr= str_split($s);
            unset($s);
            $hash=array();
            $j=1;
            $max=0;
            for($i=0;$i<$length;$i++)
            {
                for($j=$i;$j<$length;$j++)
                {
                    if(isset($hash[$str_arr[$j]]) && $hash[$str_arr[$j]] !=-1 )
                    {
                        if($i<$hash[$str_arr[$j]])
                        {
                            $i=$hash[$str_arr[$j]];
                        }
                        
                        $max_local=$j-$i+1;
                        if($max < $max_local)
                        {
                            $max=$max_local;
                        }
                        
                        $hash[$str_arr[$j]]=$j+1;
                    }
                    else
                    {
                        $max_local=$j-$i+1;
                        if($max < $max_local)
                        {
                            $max=$max_local;
                        }
                        $hash[$str_arr[$j]]=$j+1;
                    }
                    
                }
                
            }
            return $max;
            
        }else{
            return 0;
        }
    }
}

$sol=new Solution();
$out=$sol->lengthOfLongestSubstring("abcabcbb");
print_r($out);

?>