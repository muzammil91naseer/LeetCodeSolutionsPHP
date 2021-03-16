<?
class Solution {

/*ZigZag Conversion
Medium

2219

5600

Add to List

Share
The string "PAYPALISHIRING" is written in a zigzag pattern on a given number of rows like this: (you may want to display this pattern in a fixed font for better legibility)

P   A   H   N
A P L S I I G
Y   I   R
And then read line by line: "PAHNAPLSIIGYIR"

Write the code that will take a string and make this conversion given a number of rows:

string convert(string s, int numRows);
 

Example 1:

Input: s = "PAYPALISHIRING", numRows = 3
Output: "PAHNAPLSIIGYIR"
Example 2:

Input: s = "PAYPALISHIRING", numRows = 4
Output: "PINALSIGYAHRPI"
Explanation:
P     I    N
A   L S  I G
Y A   H R
P     I
Example 3:

Input: s = "A", numRows = 1
Output: "A"
 

Constraints:

1 <= s.length <= 1000
s consists of English letters (lower-case and upper-case), ',' and '.'.
1 <= numRows <= 1000
 */
function convert($s, $numRows) {
    $s_arr=str_split($s);
    $length=sizeof($s_arr);
    $output_arr=[];
    $column=0;
    $s_arr_index=0;
    $pointer=0;// used for tracking next insertion index row wise
    $row=0;
    for($x=0;$x<$length;$x++)
    {
         if($pointer<=1){
             for($row=0;$row<$numRows;$row++)
             {
                 $pointer=$row;
                 if($s_arr[$s_arr_index])
                 {


                  if (!$output_arr[$row]) 
                  {
                      $output_arr[$row] = [];
                  }

                  $output_arr[$row][$column]=$s_arr[$s_arr_index];
                  $s_arr_index++;

                  $x++;
                 }else{
                     break;
                 }

            }
             $column++;
             $x--;//to cater for increment in x due to loop

        }else{
             if($s_arr[$s_arr_index])
              {
                  $pointer--;
                  if (!$output_arr[$pointer]) {
                      $output_arr[$pointer] = [];
                  }
                 
                  $output_arr[$pointer][$column]=$s_arr[$s_arr_index];

                  $column++;
                  $s_arr_index++;

              }else{

                  break;
              }

        }
        
        
    
    }
    
    $output_str="";
    foreach($output_arr as $row_arr)
    {
        foreach($row_arr as $val)
        {
            $output_str=$output_str.$val;            }
    }
    
    return $output_str;
    
}
}
?>