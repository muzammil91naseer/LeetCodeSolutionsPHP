<?php
/*Roman numerals are represented by seven different symbols: I, V, X, L, C, D and M.

Symbol       Value
I             1
V             5
X             10
L             50
C             100
D             500
M             1000
For example, 2 is written as II in Roman numeral, just two one's added together. 12 is written as XII, which is simply X + II. The number 27 is written as XXVII, which is XX + V + II.

Roman numerals are usually written largest to smallest from left to right. However, the numeral for four is not IIII. Instead, the number four is written as IV. Because the one is before the five we subtract it making four. The same principle applies to the number nine, which is written as IX. There are six instances where subtraction is used:

I can be placed before V (5) and X (10) to make 4 and 9. 
X can be placed before L (50) and C (100) to make 40 and 90. 
C can be placed before D (500) and M (1000) to make 400 and 900.
Given a roman numeral, convert it to an integer.

 

Example 1:

Input: s = "III"
Output: 3
Example 2:

Input: s = "IV"
Output: 4
Example 3:

Input: s = "IX"
Output: 9
Example 4:

Input: s = "LVIII"
Output: 58
Explanation: L = 50, V= 5, III = 3.
Example 5:

Input: s = "MCMXCIV"
Output: 1994
Explanation: M = 1000, CM = 900, XC = 90 and IV = 4.
 

Constraints:

1 <= s.length <= 15
s contains only the characters ('I', 'V', 'X', 'L', 'C', 'D', 'M').
It is guaranteed that s is a valid roman numeral in the range [1, 3999].
*/

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function romanToInt($s) {

        $s_arr=str_split($s);
        $count=count($s_arr);

        $Converter=[
            "I"=>1,
            "V"=>5,
            "X"=>10,
            "L"=>50,
            "C"=>100,
            "D"=>500,
            "M"=>1000

        ];
        $valid_chunks=Array();
        $int_val=0;
        for($i=0;$i<$count;$i++)
        {
            // case 1
            if(isset($s_arr[$i]) )
            {
                if($s_arr[$i]=="I")
                {
                    if(isset($s_arr[$i+1]) )
                    {
                        if($s_arr[$i+1]=="V")
                        {
                            $valid_chunks[]=$Converter["V"]-1;
                            $i++;
                        }
                        else if($s_arr[$i+1]=="X")
                        {
                            $valid_chunks[]=$Converter["X"]-1;
                            $i++;
                        }
                        else
                        {
                            $valid_chunks[]=$Converter["I"];
                        }
        
                    }
                    else
                    {
                        $valid_chunks[]=$Converter["I"];
                    }
                    
                }
                else if($s_arr[$i]=="X")
                {
                    if(isset($s_arr[$i+1]) )
                    {
                        if($s_arr[$i+1]=="L")
                        {
                            $valid_chunks[]=$Converter["L"]-10;
                            $i++;
                        }
                        else if($s_arr[$i+1]=="C")
                        {
                            $valid_chunks[]=$Converter["C"]-10;
                            $i++;
                        }
                        else
                        {
                            $valid_chunks[]=$Converter["X"];
                        }
        
                    }
                    else
                    {
                        $valid_chunks[]=$Converter["X"];
                    }
                    
                }
                else if($s_arr[$i]=="C")
                {
                    if(isset($s_arr[$i+1]) )
                    {
                        if($s_arr[$i+1]=="D")
                        {
                            $valid_chunks[]=$Converter["D"]-100;
                            $i++;
                        }
                        else if($s_arr[$i+1]=="M")
                        {
                            $valid_chunks[]=$Converter["M"]-100;
                            $i++;
                        }
                        else
                        {
                            $valid_chunks[]=$Converter["C"];
                        }
        
                    }
                    else
                    {
                        $valid_chunks[]=$Converter["C"];
                    }
                    
                }
                else if($s_arr[$i]=="L")
                {
                    $valid_chunks[]=$Converter["L"];
                }
                else if($s_arr[$i]=="V")
                {
                    $valid_chunks[]=$Converter["V"];
                }
                else if($s_arr[$i]=="D")
                {
                    $valid_chunks[]=$Converter["D"];
                }
                else if($s_arr[$i]=="M")
                {
                    $valid_chunks[]=$Converter["M"];
                }

            }
           
        }
        $sum=0;
        foreach($valid_chunks as $chunk) 
        {
            $sum+=$chunk;
        }     
        
        return $sum;
    }
}
$test=new Solution();
$result=$test->romanToInt("LVIII");
print_r($result);

?>