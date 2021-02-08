<?PHP


/*


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
function longestValidParentheses($s) {
        $validator=array();
        $stack=array();
        $stack_index=0;
        $counter=0;
        $s_array=str_split($s);
        $s_arr=array();
        $count=array();
        $count[$counter]=0;
        $index=0;
        for($i=0;$i<count($s_array);$i++)
        {
            $s_arr[$i]=array('status'=>0,'value'=>$s_array[$i],'index'=>$i);
        }
        foreach($s_arr as $key => $val)
        {
            if(!isset($stack[0]))
            {
                if($val['value']=="(")
                {
                    array_unshift($stack,$val);
                }else
                {
                    $counter++;
                }
            }
            else
            {
                if($val['value']=="(")
                {
                    if($stack[0]["value"]=="(")
                    {
                        array_unshift($stack,$val);
                    }
                    else
                    {
                        $counter++;
                        $count[$counter]=0;
                    }
                }
                else if($val['value']==")")
                {
                    if($stack[0]["value"]=="(")
                    {
                        $output=array_shift($stack);
                        $s_arr[$output['index']]['status']=1;
                        $s_arr[$index]['status']=1;
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
        $j=0;
        $counts_final=array();
        foreach($s_arr as $val)
        {
            if($val["status"]==1)
            {
                if(isset($counts_final[$j]))
                {
                    $counts_final[$j]=$counts_final[$j]+1;
                }
                else{
                    $counts_final[$j]=1;
                }
            }
            if($val["status"]==0)
            {
                $j++;
            }
        }
        $max_count=0;
        foreach($counts_final as $val)
        {
            if($val>$max_count)
            {
                $max_count=$val;
            }
        }
        //echo '<pre>',print_r($max_count,1),'</pre>';
        return $max_count;
    }
}
$obj=new Solution();
$s="(()(()))";
//print_r($s);
$res=$obj->longestValidParentheses($s);

?>
