CREATE DATABASE eexam;
USE eexam;

GRANT ALL ON eexam.* TO 'php'@'localhost' IDENTIFIED BY 'phpdb';
CREATE TABLE students(
stud_id INT(20) UNSIGNED NOT NULL,
first_name VARCHAR(128) NOT NULL,
last_name VARCHAR(128) NOT NULL,
email VARCHAR(255) NOT NULL UNIQUE,
password CHAR(128) NOT NULL,
PRIMARY KEY (stud_id)
);

CREATE TABLE batch(
course_id VARCHAR(10) NOT NULL,
course_name CHAR(100) NOT NULL,
PRIMARY KEY (course_id)
);

CREATE TABLE admin_users(
username VARCHAR(25) NOT NULL,
pwd VARCHAR(25) NOT NULL
);

CREATE TABLE student_assignment(
stud_id INT(20) UNSIGNED,
course_id VARCHAR(10) NOT NULL,
exam_taken MEDIUMINT,
FOREIGN KEY (stud_id) REFERENCES students(stud_id),
FOREIGN KEY (course_id) REFERENCES batch(course_id)
);

CREATE TABLE question_bank(
    course_id VARCHAR(10) NOT NULL,
    question_id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
    question varchar(2500),
    option_1 varchar(255),
    option_2 varchar(255),
    option_3 varchar(255),
    option_4 varchar(255),
    answer varchar(255),
    PRIMARY KEY (question_id),
    FOREIGN KEY (course_id) REFERENCES batch(course_id)
);

CREATE TABLE score(
    stud_id INT(20) UNSIGNED,
    course_id VARCHAR(10) NOT NULL,
    score INT(20) UNSIGNED,
    FOREIGN KEY (stud_id) REFERENCES students(stud_id),
    FOREIGN KEY (course_id) REFERENCES batch(course_id)

);

insert into students values (700733071, "Kavitha", "Gunasekaran", "kxg30710@ucmo.edu", "adfdfdf");
insert into students values (700869568,"Vasanth","Arul","ktedt03@ucmo.edu","egeerer4");
insert into students values (700740983,"Palancha","Pranathi","kxet001@ucmo.edu","egadr@4");
insert into students values (700742174,"Ekkaladevi Srinivas","Ruchitha","kxet002@ucmo.edu","egadr@5");
insert into students values (700742175,"Aravind","Jes","kxet003@ucmo.edu","egadr@6");
insert into students values (700742176,"George","Adam","kxet004@ucmo.edu","egadr@7");
insert into students values (700742177,"John","Fedrick","kxet005@ucmo.edu","egadr@8");
insert into students values (700742178,"Sam","Srinivas","kxet006@ucmo.edu","egadr@9");
insert into students values (700742179,"Srinivas","Raj","kxet007@ucmo.edu","egadr@10");
insert into students values (700742180,"Abdul","Vivek","kxet008@ucmo.edu","egadr@11");
insert into students values (700742181,"Adam","Vasanth","kxet009@ucmo.edu","egadr@12");
insert into students values (700742182,"Vasanth","James","kxet010@ucmo.edu","egadr@13");
insert into students values (700742183,"Atul","Raj","kxet011@ucmo.edu","egadr@14");
insert into students values (700742184,"sarath","Vikram","kxet012@ucmo.edu","egadr@15");
insert into students values (700742185,"Sai","Charan","kxet013@ucmo.edu","egadr@16");
insert into students values (700742186,"Sahithya","shan","kxet014@ucmo.edu","egadr@17");
insert into students values (700742187,"Nitha","kumar","kxet015@ucmo.edu","egadr@18");
insert into students values (700742188,"Nitin","Kumar","kxet016@ucmo.edu","egadr@19");
insert into students values (700742189,"Vivek","Reddy","kxet017@ucmo.edu","egadr@20");
insert into students values (700742190,"Adam","John","kxet018@ucmo.edu","egadr@21");
insert into students values (700742191,"Thomas","Roy","kxet019@ucmo.edu","egadr@22");
insert into students values (700742192,"Thankam","Thomas","kxet020@ucmo.edu","egadr@23");
insert into students values (700742193,"Amirta","Kumar","kxet021@ucmo.edu","egadr@24");
insert into students values (700742194,"Indhu","Sid","kxet022@ucmo.edu","egadr@25");
insert into students values (700742195,"Tasmina","raj","kxet023@ucmo.edu","egadr@26");
insert into students values (700742196,"Ramya","yesh","kxet024@ucmo.edu","egadr@27");
insert into students values (700742197,"Kevin","Raj","kxet025@ucmo.edu","egadr@28");
insert into students values (700742198,"Robert","sam","kxet026@ucmo.edu","egadr@29");
insert into students values (700742199,"Liz","crystal","kxet027@ucmo.edu","egadr@30");
insert into students values (700742200,"Deidre","small","kxet028@ucmo.edu","egadr@31");
insert into students values (700742201,"Right","Thomas","kxet029@ucmo.edu","egadr@32");
insert into students values (700742202,"Rich","Adam","kxet030@ucmo.edu","egadr@33");
insert into students values (700742203,"Yeash","uday","kxet031@ucmo.edu","egadr@34");
insert into students values (700742204,"venkat","dev","kxet032@ucmo.edu","egadr@35");





insert into batch values ("CS5130", "Advanced Web development");
insert into batch values ("CS5120", "Advanced Java");
insert into batch values ("CS5330", "Advanced Operating System");


insert into admin_users values ("admin", "admin123");

insert into student_assignment values (700733071,"CS5130",1);
insert into student_assignment values (700869568,"CS5130",1);
insert into student_assignment values (700869568,"CS5330",1);
insert into student_assignment values (700740983,"CS5330",1);
insert into student_assignment values (700740983,"CS5130",1);
insert into student_assignment values (700742174,"CS5130",1);
insert into student_assignment values (700742175,"CS5330",1);
insert into student_assignment values (700742176,"CS5330",1);
insert into student_assignment values (700742177,"CS5330",1);
insert into student_assignment values (700742178,"CS5120",1);
insert into student_assignment values (700742178,"CS5330",1);
insert into student_assignment values (700742179,"CS5120",1);
insert into student_assignment values (700742180,"CS5130",1);
insert into student_assignment values (700742181,"CS5130",1);
insert into student_assignment values (700742182,"CS5120",1);
insert into student_assignment values (700742183,"CS5130",1);
insert into student_assignment values (700742184,"CS5130",1);
insert into student_assignment values (700742185,"CS5120",1);
insert into student_assignment values (700742186,"CS5130",1);
insert into student_assignment values (700742187,"CS5330",1);
insert into student_assignment values (700742188,"CS5120",1);
insert into student_assignment values (700742189,"CS5330",1);
insert into student_assignment values (700742190,"CS5330",null);
insert into student_assignment values (700742191,"CS5330",null);
insert into student_assignment values (700742192,"CS5330",null);
insert into student_assignment values (700742193,"CS5130",null);
insert into student_assignment values (700742194,"CS5130",null);
insert into student_assignment values (700742195,"CS5130",null);
insert into student_assignment values (700742196,"CS5130",null);
insert into student_assignment values (700742197,"CS5130",null);
insert into student_assignment values (700742198,"CS5130",null);


insert into score values (700733071,"CS5130",4);
insert into score values (700869568,"CS5130",2);
insert into score values (700869568,"CS5330",4);
insert into score values (700740983,"CS5330",3);
insert into score values (700740983,"CS5130",6);
insert into score values (700742174,"CS5130",7);
insert into score values (700742175,"CS5330",8);
insert into score values (700742176,"CS5330",5);
insert into score values (700742177,"CS5330",4);
insert into score values (700742178,"CS5120",7);
insert into score values (700742178,"CS5330",6);
insert into score values (700742179,"CS5120",8);
insert into score values (700742180,"CS5130",3);
insert into score values (700742181,"CS5130",8);
insert into score values (700742182,"CS5120",5);
insert into score values (700742183,"CS5130",3);
insert into score values (700742184,"CS5130",2);
insert into score values (700742185,"CS5120",8);
insert into score values (700742186,"CS5130",6);
insert into score values (700742187,"CS5330",10);
insert into score values (700742188,"CS5120",1);
insert into score values (700742189,"CS5330",2);


insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130","Who is the father of PHP?","Drek Kolkevi"," Rasmus Lerdorf","Willam Makepiece","List Barely","Rasmus Lerdorf");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130","Which of the following is not true?","PHP can be used to develop web applications.","PHP makes a website dynamic","PHP applications can not be compile","PHP can not be embedded into html.","PHP can not be embedded into html.");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130","PHP scripts are enclosed within _______","<php> . . . </php>","?php . . . ?php","<?php . . . ?>","<p> . . . </p>","<?php . . . ?>");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130","Which of the following variables is not a predefined variable?","$get","$request","$ask","$post","$ask");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130","When you need to obtain the ASCII value of a character which of the following function you apply in PHP?","chr( );","asc( );","ord( );","val( );","ord( );");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130","Which of the following method sends input to a script via a URL?","Get","Post","Both","None","Get");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130","Which of the following function returns a text in title case from a variable?","ucwords($var)","upper($var)","toupper($var)","ucword($var)","ucwords($var)");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130","Which of the following function returns the number of characters in a string variable?","count($variable)","len($variable)","strcount($variable)","strlen($variable)","strlen($variable)");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130","Which method scope prevents a method from being overridden by a subclass?","Abstract","Protected","Final","Static","Final");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130"," PHP recognizes constructors by the name.","classname()","_construct()","function _construct()","function __construct()","function __construct()");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130","Which version of PHP introduced the instanceof keyword?","PHP 4","PHP 5","PHP 5.3","PHP 6","PHP 5");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130","Which one of the following function operates similarly to fgets(), except that it also strips any HTML and PHP tags form the input?","fgetsh()","fgetsp()","fgetsa()","fgetss()","fgetss()");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130","Which of the following PHP functions can be used to get the current memory usage?","memory_get_usage()"," memory_get_peak_usage()","get_peak_usage()","get_usage()","memory_get_usage()");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130","What is the smallest header in HTML by default?","h1","h2","h4","h6","h6");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130","Who is the father of PHP?","Drek Kolkevi"," Rasmus Lerdorf","Willam Makepiece","List Barely","Rasmus Lerdorf");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130","Which of the following is not true?","PHP can be used to develop web applications.","PHP makes a website dynamic","PHP applications can not be compile","PHP can not be embedded into html.","PHP can not be embedded into html.");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130","PHP scripts are enclosed within _______","<php> . . . </php>","?php . . . ?php","<?php . . . ?>","<p> . . . </p>","<?php . . . ?>");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130","Which of the following variables is not a predefined variable?","$get","$request","$ask","$post","$ask");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130","When you need to obtain the ASCII value of a character which of the following function you apply in PHP?","chr( );","asc( );","ord( );","val( );","ord( );");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130","Which of the following method sends input to a script via a URL?","Get","Post","Both","None","Get");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130","Which of the following function returns a text in title case from a variable?","ucwords($var)","upper($var)","toupper($var)","ucword($var)","ucwords($var)");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130","Which of the following function returns the number of characters in a string variable?","count($variable)","len($variable)","strcount($variable)","strlen($variable)","strlen($variable)");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130","Which method scope prevents a method from being overridden by a subclass?","Abstract","Protected","Final","Static","Final");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130"," PHP recognizes constructors by the name.","classname()","_construct()","function _construct()","function __construct()","function __construct()");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130","Which version of PHP introduced the instanceof keyword?","PHP 4","PHP 5","PHP 5.3","PHP 6","PHP 5");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130","Which one of the following function operates similarly to fgets(), except that it also strips any HTML and PHP tags form the input?","fgetsh()","fgetsp()","fgetsa()","fgetss()","fgetss()");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130","Which of the following PHP functions can be used to get the current memory usage?","memory_get_usage()"," memory_get_peak_usage()","get_peak_usage()","get_usage()","memory_get_usage()");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130","What is the smallest header in HTML by default?","h1","h2","h4","h6","h6");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5130","Which one of the following function is capable of reading a file into an array?","file()","arrfile()","arr_file()","file_arr()","file()");





insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120","Who is the father of PHP?","Drek Kolkevi"," Rasmus Lerdorf","Willam Makepiece","List Barely","Rasmus Lerdorf");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120","Which of the following is not true?","PHP can be used to develop web applications.","PHP makes a website dynamic","PHP applications can not be compile","PHP can not be embedded into html.","PHP can not be embedded into html.");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120","PHP scripts are enclosed within _______","<php> . . . </php>","?php . . . ?php","<?php . . . ?>","<p> . . . </p>","<?php . . . ?>");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120","Which of the following variables is not a predefined variable?","$get","$request","$ask","$post","$ask");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120","When you need to obtain the ASCII value of a character which of the following function you apply in PHP?","chr( );","asc( );","ord( );","val( );","ord( );");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120","Which of the following method sends input to a script via a URL?","Get","Post","Both","None","Get");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120","Which of the following function returns a text in title case from a variable?","ucwords($var)","upper($var)","toupper($var)","ucword($var)","ucwords($var)");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120","Which of the following function returns the number of characters in a string variable?","count($variable)","len($variable)","strcount($variable)","strlen($variable)","strlen($variable)");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120","Which method scope prevents a method from being overridden by a subclass?","Abstract","Protected","Final","Static","Final");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120"," PHP recognizes constructors by the name.","classname()","_construct()","function _construct()","function __construct()","function __construct()");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120","Which version of PHP introduced the instanceof keyword?","PHP 4","PHP 5","PHP 5.3","PHP 6","PHP 5");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120","Which one of the following function operates similarly to fgets(), except that it also strips any HTML and PHP tags form the input?","fgetsh()","fgetsp()","fgetsa()","fgetss()","fgetss()");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120","Which of the following PHP functions can be used to get the current memory usage?","memory_get_usage()"," memory_get_peak_usage()","get_peak_usage()","get_usage()","memory_get_usage()");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120","What is the smallest header in HTML by default?","h1","h2","h4","h6","h6");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120","Who is the father of PHP?","Drek Kolkevi"," Rasmus Lerdorf","Willam Makepiece","List Barely","Rasmus Lerdorf");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120","Which of the following is not true?","PHP can be used to develop web applications.","PHP makes a website dynamic","PHP applications can not be compile","PHP can not be embedded into html.","PHP can not be embedded into html.");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120","PHP scripts are enclosed within _______","<php> . . . </php>","?php . . . ?php","<?php . . . ?>","<p> . . . </p>","<?php . . . ?>");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120","Which of the following variables is not a predefined variable?","$get","$request","$ask","$post","$ask");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120","When you need to obtain the ASCII value of a character which of the following function you apply in PHP?","chr( );","asc( );","ord( );","val( );","ord( );");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120","Which of the following method sends input to a script via a URL?","Get","Post","Both","None","Get");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120","Which of the following function returns a text in title case from a variable?","ucwords($var)","upper($var)","toupper($var)","ucword($var)","ucwords($var)");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120","Which of the following function returns the number of characters in a string variable?","count($variable)","len($variable)","strcount($variable)","strlen($variable)","strlen($variable)");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120","Which method scope prevents a method from being overridden by a subclass?","Abstract","Protected","Final","Static","Final");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120"," PHP recognizes constructors by the name.","classname()","_construct()","function _construct()","function __construct()","function __construct()");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120","Which version of PHP introduced the instanceof keyword?","PHP 4","PHP 5","PHP 5.3","PHP 6","PHP 5");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120","Which one of the following function operates similarly to fgets(), except that it also strips any HTML and PHP tags form the input?","fgetsh()","fgetsp()","fgetsa()","fgetss()","fgetss()");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120","Which of the following PHP functions can be used to get the current memory usage?","memory_get_usage()"," memory_get_peak_usage()","get_peak_usage()","get_usage()","memory_get_usage()");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120","What is the smallest header in HTML by default?","h1","h2","h4","h6","h6");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5120","Which one of the following function is capable of reading a file into an array?","file()","arrfile()","arr_file()","file_arr()","file()");




insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330","Who is the father of PHP?","Drek Kolkevi"," Rasmus Lerdorf","Willam Makepiece","List Barely","Rasmus Lerdorf");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330","Which of the following is not true?","PHP can be used to develop web applications.","PHP makes a website dynamic","PHP applications can not be compile","PHP can not be embedded into html.","PHP can not be embedded into html.");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330","PHP scripts are enclosed within _______","<php> . . . </php>","?php . . . ?php","<?php . . . ?>","<p> . . . </p>","<?php . . . ?>");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330","Which of the following variables is not a predefined variable?","$get","$request","$ask","$post","$ask");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330","When you need to obtain the ASCII value of a character which of the following function you apply in PHP?","chr( );","asc( );","ord( );","val( );","ord( );");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330","Which of the following method sends input to a script via a URL?","Get","Post","Both","None","Get");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330","Which of the following function returns a text in title case from a variable?","ucwords($var)","upper($var)","toupper($var)","ucword($var)","ucwords($var)");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330","Which of the following function returns the number of characters in a string variable?","count($variable)","len($variable)","strcount($variable)","strlen($variable)","strlen($variable)");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330","Which method scope prevents a method from being overridden by a subclass?","Abstract","Protected","Final","Static","Final");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330"," PHP recognizes constructors by the name.","classname()","_construct()","function _construct()","function __construct()","function __construct()");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330","Which version of PHP introduced the instanceof keyword?","PHP 4","PHP 5","PHP 5.3","PHP 6","PHP 5");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330","Which one of the following function operates similarly to fgets(), except that it also strips any HTML and PHP tags form the input?","fgetsh()","fgetsp()","fgetsa()","fgetss()","fgetss()");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330","Which of the following PHP functions can be used to get the current memory usage?","memory_get_usage()"," memory_get_peak_usage()","get_peak_usage()","get_usage()","memory_get_usage()");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330","What is the smallest header in HTML by default?","h1","h2","h4","h6","h6");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330","Who is the father of PHP?","Drek Kolkevi"," Rasmus Lerdorf","Willam Makepiece","List Barely","Rasmus Lerdorf");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330","Which of the following is not true?","PHP can be used to develop web applications.","PHP makes a website dynamic","PHP applications can not be compile","PHP can not be embedded into html.","PHP can not be embedded into html.");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330","PHP scripts are enclosed within _______","<php> . . . </php>","?php . . . ?php","<?php . . . ?>","<p> . . . </p>","<?php . . . ?>");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330","Which of the following variables is not a predefined variable?","$get","$request","$ask","$post","$ask");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330","When you need to obtain the ASCII value of a character which of the following function you apply in PHP?","chr( );","asc( );","ord( );","val( );","ord( );");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330","Which of the following method sends input to a script via a URL?","Get","Post","Both","None","Get");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330","Which of the following function returns a text in title case from a variable?","ucwords($var)","upper($var)","toupper($var)","ucword($var)","ucwords($var)");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330","Which of the following function returns the number of characters in a string variable?","count($variable)","len($variable)","strcount($variable)","strlen($variable)","strlen($variable)");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330","Which method scope prevents a method from being overridden by a subclass?","Abstract","Protected","Final","Static","Final");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330"," PHP recognizes constructors by the name.","classname()","_construct()","function _construct()","function __construct()","function __construct()");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330","Which version of PHP introduced the instanceof keyword?","PHP 4","PHP 5","PHP 5.3","PHP 6","PHP 5");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330","Which one of the following function operates similarly to fgets(), except that it also strips any HTML and PHP tags form the input?","fgetsh()","fgetsp()","fgetsa()","fgetss()","fgetss()");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330","Which of the following PHP functions can be used to get the current memory usage?","memory_get_usage()"," memory_get_peak_usage()","get_peak_usage()","get_usage()","memory_get_usage()");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330","What is the smallest header in HTML by default?","h1","h2","h4","h6","h6");
insert into question_bank (course_id, question, option_1, option_2, option_3, option_4, answer) values ("CS5330","Which one of the following function is capable of reading a file into an array?","file()","arrfile()","arr_file()","file_arr()","file()");
