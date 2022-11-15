CREATE DATABASE eexam;
USE eexam;

GRANT ALL ON eexam.* TO 'admin'@'localhost' IDENTIFIED BY 'admindb';
CREATE TABLE students(
stud_id INT(20) UNSIGNED NOT NULL,
first_name VARCHAR(128) NOT NULL,
last_name VARCHAR(128) NOT NULL,
email VARCHAR(255) NOT NULL,
password CHAR(128) NOT NULL,
PRIMARY KEY (stud_id)
);

CREATE TABLE batch(
course_id MEDIUMINT UNSIGNED NOT NULL,
course_name CHAR(100) NOT NULL,
PRIMARY KEY (course_id)
);

CREATE TABLE student_assignment(
stud_id INT(20) UNSIGNED,
course_id MEDIUMINT UNSIGNED,
FOREIGN KEY (stud_id) REFERENCES students(stud_id),
FOREIGN KEY (course_id) REFERENCES batch(course_id)
);

