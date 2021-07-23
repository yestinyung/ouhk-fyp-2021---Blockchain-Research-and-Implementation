pragma solidity ^0.4.21;

contract InfoContract {

   string grad_year = 'Null';
   string stud_id = 'Null';
   string stud_name_zh = 'Null';
   string stud_name_en = 'Null';
   string course_zh = 'Null';
   string course_en = 'Null';
   string grad_img_name = 'Null';
   address setID ;
   bool  upload = false;
   function setInfo(string _grad_year, string _stud_id , string _stud_name_zh, string _stud_name_en, string _course_zh, string _course_en, string _grad_img_name) public{
       if(!upload){
           grad_year = _grad_year;
           stud_id = _stud_id;
           stud_name_zh = _stud_name_zh;
           stud_name_en = _stud_name_en;
           course_zh = _course_zh;
           course_en = _course_en;
           grad_img_name = _grad_img_name;
           setID = msg.sender;
           upload = true;
       }
   }

   function getInfo() public constant returns (string, string, string, string, string, string, string) {
         return (grad_year, stud_id, stud_name_zh, stud_name_en, course_zh, course_en, grad_img_name);
   }   
   function change(string _grad_year, string _stud_id , string _stud_name_zh, string _stud_name_en, string _course_zh, string _course_en, string _grad_img_name) public{
        if(setID==msg.sender && upload){
           grad_year = _grad_year;
           stud_id = _stud_id;
           stud_name_zh = _stud_name_zh;
           stud_name_en = _stud_name_en;
           course_zh = _course_zh;
           course_en = _course_en;
           grad_img_name = _grad_img_name;
        }
   }
}