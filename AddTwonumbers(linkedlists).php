<?php
/*You are given two non-empty linked lists representing two non-negative integers. The digits are stored in reverse order, and each of their nodes contains a single digit. Add the two numbers and return the sum as a linked list.

You may assume the two numbers do not contain any leading zero, except the number 0 itself.

Difficulty :
 

Example 1:


Input: l1 = [2,4,3], l2 = [5,6,4]
Output: [7,0,8]
Explanation: 342 + 465 = 807.
Example 2:

Input: l1 = [0], l2 = [0]
Output: [0]
Example 3:

Input: l1 = [9,9,9,9,9,9,9], l2 = [9,9,9,9]
Output: [8,9,9,9,0,0,0,1]
 

Constraints:

The number of nodes in each linked list is in the range [1, 100].
0 <= Node.val <= 9
It is guaranteed that the list represents a number that does not have leading zeros.

*/
class ListNode 
{
        public $val = 0;
        public $next = null;
        function __construct($val = 0, $next = null) 
        {
             $this->val = $val;
             $this->next = $next;
        }
 }
 class Solution 
 {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     * */
    public function get_str_val($l1)
    {
        if($l1->next=="")
        {
            return $l1->val;
        }
        else
        {
            
            return (String)$this->get_str_val($l1->next).(String)$l1->val;
        }
    }
    function addTwoNumbers($l1, $l2) 
    {

        $num_1=$this->get_str_val($l1);
        $num_1_arr=str_split($num_1);
        $count_1=count($num_1_arr);
    
        $num_2=$this->get_str_val($l2);
        $num_2_arr=str_split($num_2);
        $count_2=count($num_2_arr);
        $max_count=0;
        if($count_1>$count_2)
        {
            $max_count=$count_1;
        }
        else
        {
            $max_count=$count_2;    
        }
        $output_array=array();
        $carry=0;
        for ($i=$max_count-1;$i>=0;$i--)
        {
            print_r($i);
            if(isset($num_1_arr[$count_1-1]) && isset($num_2_arr[$count_2-1]))
            {
                if(($carry+(int)$num_1_arr[$count_1-1]+(int)$num_2_arr[$count_2-1])>9)
                {
                    $output_array[$i]=($carry+(int)$num_1_arr[$count_1-1]+(int)$num_2_arr[$count_2-1])%10;
                    $carry=1;
                                                                                                            $count_1--;
                                                                                                            $count_2--;
                }
                else
                {

                    $output_array[$i]=$carry+(int)$num_1_arr[$count_1-1]+(int)$num_2_arr[$count_2-1];
                    $carry=0;
                    $count_1--;
                                                                                                                $count_2--;
                }


            }else if(!isset($num_1_arr[$count_1-1]))
            {
                if(($carry+0+(int)$num_2_arr[$count_2-1])>9)
                {
                    $output_array[$i]=($carry+0+(int)$num_2_arr[$count_2-1])%10;
                    $carry=1;
                                                                                                            $count_1--;
                                                                                                            $count_2--;
                }
                else
                {

                    $output_array[$i]=$carry+0+(int)$num_2_arr[$count_2-1];
                    $carry=0;
                    $count_1--;
                                                                                                                $count_2--;
                }
            }
            else if(!isset($num_2_arr[$count_2-1]))
            {
                if(($carry+(int)$num_1_arr[$count_1-1]+0)>9)
                {
                    $output_array[$i]=($carry+0+(int)$num_1_arr[$count_1-1])%10;
                    $carry=1;
                                                                                                            $count_1--;
                                                                                                            $count_2--;
                }
                else
                {

                    $output_array[$i]=$carry+0+(int)$num_1_arr[$count_1-1];
                    $carry=0;
                    $count_1--;
                                                                                                                $count_2--;
                }
            }
            
            
        }
        if($carry==1)
        {
            $output_array[]=1;
        }
        $output=new ListNode();
        $head=$output;
        $count=count($output_array);
        $index=0;
        foreach($output_array as $val)
        {
            $output->val=$val;
            if($index<$count-1)
            {
                $output->next = new ListNode(0);
                $output=$output->next;
            
            }
            
            $index++;
        
        }
        
        return $head;
        
    }
}

$test=new ListNode(5);
$test->next=new ListNode(7);
$test->next->next =new ListNode(9);

$test2=new ListNode(2);
$test2->next=new ListNode(4);
$test2->next->next =new ListNode(6);
$sol=new Solution();
$res=$sol->addTwoNumbers($test,$test2);
print_r($res);

?>