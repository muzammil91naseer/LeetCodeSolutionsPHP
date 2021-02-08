<?/*


32. Longest Valid Parentheses
Hard

4439

167

Add to List

Share
Given a string containing just the characters '(' and ')', find the length of the longest valid (well-formed) parentheses substring.

 

Example 1:

Input: s = "(()"
Output: 2
Explanation: The longest valid parentheses substring is "()".
Example 2:

Input: s = ")()())"
Output: 4
Explanation: The longest valid parentheses substring is "()()".
Example 3:

Input: s = ""
Output: 0
 

Constraints:

0 <= s.length <= 3 * 104
s[i] is '(', or ')'.
*/
class Solution {

/**
 * @param String $s
 * @return Integer
 */
function longestValidParentheses($s) 
    {
        $validator=array();
        $stack=array();
        $stack_index=0;
        $counter=0;
        $s_arr=str_split($s);
        $count=array();
        $count[$counter]=0;
        $index=0;
        for($i=0;$i<count($s_arr);$i++)
        {
            $s_arr[$i]=['status'=>0,'value'=>$s_arr[$i],'index'=>$i];
        }
        foreach($s_arr as $val)
        {
            //print_r($val);
            if(!isset($stack[0]))
            {
                if($val['value']=="(")
                {
                    array_unshift($stack,$val);
                    $stack_index++;
                    
                    
                }else
                {
                    $counter++;
                }
                
            }
            else
            {
                if($val['value']=="(")
                {
                    if($stack[0]=="(")
                    {
                        array_unshift($stack,$val);
                        $stack_index++;
                        
                        
                    }
                    else
                    {
                        $counter++;
                        $count[$counter]=0;
                        
                    }
                   
                    
                }
                else if($val['value']==")")
                {
                    
                    if($stack[0]=="(")
                    {
                        print_r("here");
                        $output=array_shift($stack);
                        $s_arr[$output['index']]['status']=1;
                        $s_arr[$index]['status']=1;
                        print_r($s_arr);
                        $stack_index--;
                        
                        $count[$counter]=$count[$counter]+1;
                        
                    
                    }else
                    {
                        $counter++;
                        $count[$counter]=0;
                    
                    }
                    
                    
                }
           }
            $index++;
        
        }// end loop
       //print_r($s_arr);
        $max_count=0;
        foreach($count as $val)
        {
            if($val>$max_count)
            {
                $max_count=$val;
            }
        }
        $max_count=$max_count*2;
        return $max_count;
        
    }
}
?>