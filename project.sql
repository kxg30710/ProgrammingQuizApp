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
insert into students values (700733072, "Lnu", "Abbas", "kxg30712@ucmo.edu", "adfdfddfdff");

insert into batch values ("CS5130", "Advanced Web development");
insert into batch values ("CS5120", "Advanced Java");


insert into admin_users values ("admin", "admin123");


insert into student_assignment values (700733071, "CS5130", NULL);
insert into student_assignment values (700733072, "CS5120", NULL);

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
