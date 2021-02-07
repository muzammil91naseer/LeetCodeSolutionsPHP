<?php
/*You are given two non-empty linked lists representing two non-negative integers. The digits are stored in reverse order, and each of their nodes contains a single digit. Add the two numbers and return the sum as a linked list.

You may assume the two numbers do not contain any leading zero, except the number 0 itself.

 

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

class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    public function get_int_val($l1)
    {
        if($l1->next=="")
        {
            return $l1->val;
        }
        else
        {
            
             return (String)$this->get_int_val($l1->next).(String)$l1->val;
        }
    }
    function addTwoNumbers($l1, $l2) {

        $num_1=$this->get_int_val($l1);
        $num_2=$this->get_int_val($l2);
        $sum=$num_1+$num_2;
        $temp=(int)$sum;
        
        $out=array();
        while($temp!=0)
        {
            $remainder=(int)$temp%10;
            $temp=(int)($temp/10);
            $out[]=$remainder;
        
        }
        $output=new ListNode();
        $head=$output;
        $count=count($out);
        $index=0;
        foreach($out as $val)
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

?>