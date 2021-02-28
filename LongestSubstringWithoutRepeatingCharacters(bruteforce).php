<?
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

error_reporting(0);
ini_set('display_errors', 0);
ini_set ( 'max_execution_time', 0);

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    public $out=array();
    public $max=0;
    
    function extract_max()
    {
        //print_r($this->out);
        //print_r("\n");
         foreach($this->out as $str)
        {
            $duplicate_found=0;
            //print_r("String: {$str} \n");
            $str_arr=array();
            $hash=array();
            $str_arr= str_split($str);
            unset($str);
            $count_str_arr=count($str_arr);
             
             //print_r("\n");
            if($count_str_arr==1 && $this->max==0){
                $this->max=1;
                //print_r("here \n");
            }
            else{
                
                for($j=0;$j<$count_str_arr;$j++){
                    
                    for($i=$j+1;$i<$count_str_arr;$i++){
                       
                        if($str_arr[$j]==$str_arr[$i]){
                           // print_r("Setting duplicate to one : ");
                           // print_r("\n");
                            $duplicate_found=1;
                            break;
                        }
                        
                        
                    }
                    
                    if($duplicate_found==1)
                    {
                        break;
                    } 
                }
            }
         
            //print_r("Duplicate found : ".$duplicate_found);
            //print_r("\n");
             if($duplicate_found == 0)
               {
                    //check value of $max_length
                   if($this->max < $count_str_arr)
                   {
                      // print_r("updating max : ".$count_str_arr);
                      // print_r("\n");
                       $this->max = $count_str_arr;
                   }
               }
             /*
             print_r("count_str_arr:");
             print_r($count_str_arr."\n");
             print_r("Max :");
             print_r($this->max);
             print_r("\n");
             print_r("\n");
             print_r("\n");
             */
            
        }
        unset($this->out);
        

    }
    
    function get_all_substrings($input) 
    {
        
        
        $count_str= strlen($input);
        
        for ($i = 0; $i <$count_str; $i++) {
            for ($j = $i; $j < $count_str; $j++) {
                
                $this->out[]=substr($input,$i,$j-$i+1);
                
            } 
            $this->extract_max();
            
        }
        
    }
    
    function lengthOfLongestSubstring($s) {
        
        if($s!="")
        {
            $this->get_all_substrings($s);
            unset($s);
            return $this->max;
            
        }else{
            return 0;
        }
    }
}
?>