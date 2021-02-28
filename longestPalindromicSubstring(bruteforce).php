<?
class Solution {

    /**
     * @param String $s
     * @return String
     */
    
    function get_all_substrings($input) 
    {
        $count_str= strlen($input);
        $out=array();
        
        for ($i = 0; $i <$count_str; $i++) {
            for ($j = $i; $j < $count_str; $j++) {
                
                $out[]=substr($input,$i,$j-$i+1);
                
            } 
        }
        return $out;
        
    }
    function get_palindrom_length($str)
    {
        $valid_palindrom=1;
        $arr=str_split($str);
        $arr_count=count($arr);
        
    
        $j=$arr_count-1;
        for($i=0;$i<=($arr_count/2);$i++)
        {
            if($arr[$i]!=$arr[$j])
            {
                $valid_palindrom=0;
                return null;
            }

            $j--;
        }
        if($valid_palindrom==1)
        {
            return $str;
        }
        
       
        
    }
    
    function longestPalindrome($s) {
        if($s!="")
        {
            $sub_strings=$this->get_all_substrings($s);
            unset($s);
            $max_str="";
            $count_arr=count($sub_strings);
            for($i=0;$i<$count_arr;$i++)
            {
                $palindrom_string=$this->get_palindrom_length($sub_strings[$i]);
                if(strlen($max_str)<strlen($palindrom_string) && $palindrom_string!=null )
                {
                    $max_str=$palindrom_string;
                }
                unset($palindrom_string);
            }

            return $max_str;
        }
        else
        {
            return $s;
        }
        
    }
}
?>