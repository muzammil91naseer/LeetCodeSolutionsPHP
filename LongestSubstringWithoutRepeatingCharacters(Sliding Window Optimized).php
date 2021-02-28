error_reporting(0);
ini_set('display_errors', 0);
ini_set ( 'max_execution_time', 0);

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
                    //print_r("i:  ".$i."  \n");
                    //print_r("j:  ".$j."  \n");
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
                    
                    /*
                    print_r("Hash: \n");
                    print_r($hash);
                    print_r("\n");
                    print_r("Max : ");
                    print_r($max);
                    print_r("\n");
                    print_r("i:  ".$i."  \n");
                    print_r("j:  ".$j."  \n");
                    print_r("end block \n");
                    */
                    
                }
                
            }
            
            return $max;
            
        }else{
            return 0;
        }
    }
}