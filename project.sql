CREATE DATABASE eexam;
USE eexam;

GRANT ALL ON eexam.* TO 'admin'@'localhost' IDENTIFIED BY 'admindb';
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

insert into question_bank values ("CS5130",2,"Which of the following array represents an array with strings as index?","Numeric Array"," Associative Array","Multidimentional Array","None of the above."," Associative Array");
insert into question_bank values ("CS5130",3,"ques1","op1","op2","op3","op4","op1");
insert into question_bank values ("CS5130",4,"ques2","op1","op2","op3","op4","op2");
insert into question_bank values ("CS5130",5,"ques3","op1","op2","op3","op4","op3");
insert into question_bank values ("CS5130",6,"ques4","op1","op2","op3","op4","op4");
insert into question_bank values ("CS5130",7,"ques5","op1","op2","op3","op4","op1");
insert into question_bank values ("CS5130",8,"ques6","op1","op2","op3","op4","op2");
insert into question_bank values ("CS5130",9,"ques7","op1","op2","op3","op4","op3");
insert into question_bank values ("CS5130",10,"ques8","op1","op2","op3","op4","op4");
insert into question_bank values ("CS5130",11,"ques9","op1","op2","op3","op4","op1");
insert into question_bank values ("CS5130",12,"ques10","op1","op2","op3","op4","op2");
insert into question_bank values ("CS5130",13,"ques11","op1","op2","op3","op4","op3");
insert into question_bank values ("CS5130",14,"ques12","op1","op2","op3","op4","op4");
insert into question_bank values ("CS5130",15,"ques13","op1","op2","op3","op4","op1");
insert into question_bank values ("CS5130",16,"ques14","op1","op2","op3","op4","op2");
insert into question_bank values ("CS5130",17,"ques15","op1","op2","op3","op4","op3");
insert into question_bank values ("CS5130",18,"ques16","op1","op2","op3","op4","op4");
insert into question_bank values ("CS5130",19,"ques17","op1","op2","op3","op4","op1");
insert into question_bank values ("CS5130",20,"ques18","op1","op2","op3","op4","op2");
insert into question_bank values ("CS5130",21,"ques19","op1","op2","op3","op4","op3");
insert into question_bank values ("CS5130",22,"ques20","op1","op2","op3","op4","op4");
insert into question_bank values ("CS5130",23,"ques21","op1","op2","op3","op4","op1");
insert into question_bank values ("CS5130",24,"ques22","op1","op2","op3","op4","op2");
insert into question_bank values ("CS5130",25,"ques23","op1","op2","op3","op4","op3");
insert into question_bank values ("CS5130",26,"ques24","op1","op2","op3","op4","op4");
insert into question_bank values ("CS5130",27,"ques25","op1","op2","op3","op4","op1");
insert into question_bank values ("CS5130",28,"ques26","op1","op2","op3","op4","op2");
insert into question_bank values ("CS5130",29,"ques27","op1","op2","op3","op4","op3");
insert into question_bank values ("CS5130",30,"ques28","op1","op2","op3","op4","op4");
insert into question_bank values ("CS5130",31,"ques29","op1","op2","op3","op4","op1");
insert into question_bank values ("CS5130",32,"ques30","op1","op2","op3","op4","op2");
insert into question_bank values ("CS5130",33,"ques31","op1","op2","op3","op4","op3");
insert into question_bank values ("CS5120",34,"ques32","op1","op2","op3","op4","op4");
insert into question_bank values ("CS5120",35,"ques33","op1","op2","op3","op4","op1");
insert into question_bank values ("CS5120",36,"ques34","op1","op2","op3","op4","op2");
insert into question_bank values ("CS5120",37,"ques35","op1","op2","op3","op4","op3");
insert into question_bank values ("CS5120",38,"ques36","op1","op2","op3","op4","op4");
insert into question_bank values ("CS5120",39,"ques37","op1","op2","op3","op4","op1");
insert into question_bank values ("CS5120",40,"ques38","op1","op2","op3","op4","op2");
insert into question_bank values ("CS5120",41,"ques39","op1","op2","op3","op4","op3");
insert into question_bank values ("CS5120",42,"ques40","op1","op2","op3","op4","op4");
insert into question_bank values ("CS5120",43,"ques41","op1","op2","op3","op4","op1");
insert into question_bank values ("CS5120",44,"ques42","op1","op2","op3","op4","op2");
insert into question_bank values ("CS5120",45,"ques43","op1","op2","op3","op4","op3");
insert into question_bank values ("CS5120",46,"ques44","op1","op2","op3","op4","op4");
insert into question_bank values ("CS5120",47,"ques45","op1","op2","op3","op4","op1");
insert into question_bank values ("CS5120",48,"ques46","op1","op2","op3","op4","op2");
insert into question_bank values ("CS5120",49,"ques47","op1","op2","op3","op4","op3");
insert into question_bank values ("CS5120",50,"ques48","op1","op2","op3","op4","op4");
insert into question_bank values ("CS5120",51,"ques49","op1","op2","op3","op4","op1");
insert into question_bank values ("CS5120",52,"ques50","op1","op2","op3","op4","op2");
insert into question_bank values ("CS5120",53,"ques51","op1","op2","op3","op4","op3");
insert into question_bank values ("CS5120",54,"ques52","op1","op2","op3","op4","op4");
insert into question_bank values ("CS5120",55,"ques53","op1","op2","op3","op4","op1");
insert into question_bank values ("CS5120",56,"ques54","op1","op2","op3","op4","op2");
insert into question_bank values ("CS5120",57,"ques55","op1","op2","op3","op4","op3");
insert into question_bank values ("CS5120",58,"ques56","op1","op2","op3","op4","op4");
insert into question_bank values ("CS5120",59,"ques57","op1","op2","op3","op4","op1");
insert into question_bank values ("CS5120",60,"ques58","op1","op2","op3","op4","op2");
insert into question_bank values ("CS5120",61,"ques59","op1","op2","op3","op4","op3");
insert into question_bank values ("CS5120",62,"ques60","op1","op2","op3","op4","op4");
insert into question_bank values ("CS5120",63,"ques61","op1","op2","op3","op4","op1");
insert into question_bank values ("CS5120",64,"ques61","op1","op2","op3","op4","op2");
insert into question_bank values ("CS5120",65,"ques61","op1","op2","op3","op4","op3");
insert into question_bank values ("CS5120",66,"ques61","op1","op2","op3","op4","op4");
insert into question_bank values ("CS5120",67,"ques61","op1","op2","op3","op4","op1");
insert into question_bank values ("CS5120",68,"ques61","op1","op2","op3","op4","op2");
insert into question_bank values ("CS5120",69,"ques61","op1","op2","op3","op4","op3");
insert into question_bank values ("CS5120",70,"ques61","op1","op2","op3","op4","op4");
insert into question_bank values ("CS5120",71,"ques61","op1","op2","op3","op4","op1");
insert into question_bank values ("CS5120",72,"ques61","op1","op2","op3","op4","op2");
insert into question_bank values ("CS5120",73,"ques61","op1","op2","op3","op4","op3");
insert into question_bank values ("CS5120",74,"ques61","op1","op2","op3","op4","op4");
insert into question_bank values ("CS5120",75,"ques61","op1","op2","op3","op4","op1");
insert into question_bank values ("CS5120",76,"ques61","op1","op2","op3","op4","op2");
insert into question_bank values ("CS5120",77,"ques61","op1","op2","op3","op4","op3");
insert into question_bank values ("CS5120",78,"ques61","op1","op2","op3","op4","op4");
insert into question_bank values ("CS5120",79,"ques61","op1","op2","op3","op4","op1");
insert into question_bank values ("CS5120",80,"ques61","op1","op2","op3","op4","op2");
insert into question_bank values ("CS5120",81,"ques61","op1","op2","op3","op4","op3");
insert into question_bank values ("CS5120",82,"ques61","op1","op2","op3","op4","op4");
insert into question_bank values ("CS5120",83,"ques61","op1","op2","op3","op4","op2");
insert into question_bank values ("CS5120",84,"ques61","op1","op2","op3","op4","op3");
insert into question_bank values ("CS5120",85,"ques61","op1","op2","op3","op4","op4");