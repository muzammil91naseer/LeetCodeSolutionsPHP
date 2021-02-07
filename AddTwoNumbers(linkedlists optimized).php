<?php
/*You are given two non-empty linked lists representing two non-negative integers. The digits are stored in reverse order, and each of their nodes contains a single digit. Add the two numbers and return the sum as a linked list.

You may assume the two numbers do not contain any leading zero, except the number 0 itself.

Difficulty :
 
Medium 

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
    function addTwoNumbers($l1, $l2) 
    {
        $result=new ListNode();
        $iterator=$result;
        
        $index=0;
        $carry=0;
       
        
        while(isset($l1->val) || isset($l2->val))
        {
            if(isset($l1->val) && isset($l2->val))
            {
                if($l1->val+$l2->val+$carry>9)
                {
                    $result->val=($l1->val+$l2->val+$carry)%10;
                    $carry=1;
                }
                else
                {
                    $result->val=$l1->val+$l2->val+$carry;
                    $carry=0;
                   
                }
                
            }
            else if(isset($l1->val))
            {
                 
                if($l1->val+$carry>9)
                {
                    $result->val=($l1->val+$carry)%10;
                    $carry=1;
                    
                }
                else
                {
                    $result->val=$l1->val+$carry;
                    $carry=0;
                    
                }

            }else if(isset($l2->val))
            {
                if($l2->val+$carry>9)
                {
                    $result->val=($l2->val+$carry)%10;
                    $carry=1;
                    
                }
                else
                {
                    $result->val=$l2->val+$carry;
                    $carry=0;
                    
                }
            }
           
            if(isset($l1->next) || isset($l2->next))
            {
                $result->next = new ListNode(0);
                $result=$result->next;
                

            }
            $l2=$l2->next;
            $l1=$l1->next;
            
            
            
        }//end while
        
        if($carry==1)
        {
            
            $result->next = new ListNode($carry);
            $result=$result->next;
            
        }
       return $iterator;
       
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