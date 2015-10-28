CREATE DATABASE college;
USE college;
create table student(
	student_id integer primary key,
	name varchar(10), 
	year smallint default 1,
	dept_no integer,
	major varchar(20) not null
	);
create table department(
	dept_name varchar(20) UNIQUE,
	office varchar(20),
	office_tel varchar(20) NOT NULL,
	dept_no integer primary key AUTO_INCREMENT
	);

ALTER TABLE student MODIFY major varchar(40);
ALTER TABLE student ADD COLUMN gender varchar(10);
ALTER TABLE department modify dept_name varchar(40) ;
ALTER TABLE department modify office varchar(30);

ALTER TABLE student DROP COLUMN gender;

INSERT INTO student VALUES(20070002, 'James Bond', 3, 4, 'Business Administration') ;
INSERT INTO student VALUES(20060001, 'Queenie', 4, 4, 'Business Administration');
INSERT INTO student VALUES(20030001, 'Reonardo', 4, 2, 'Electronic Engineering') 
INSERT INTO student VALUES(20040003, 'Julia', 3, 2, 'Electronic Engineering');
INSERT INTO student VALUES(20060002, 'Roosevelt', 3, 1, 'Computer Science') ;
INSERT INTO student VALUES(20100002, 'Fearne', 3, 4, 'Business Administration');
INSERT INTO student VALUES(20110001, 'Chloe', 2, 1, 'Computer Science') ;
INSERT INTO student VALUES(20080003, 'Amy', 4, 3, 'Law');
INSERT INTO student VALUES(20040002, 'Selina', 4, 5, 'English Literature') ;
INSERT INTO student VALUES(20070001, 'Ellen', 4, 4, 'Business Administration');
INSERT INTO student VALUES(20100001, 'Kathy', 3, 4, 'Business Administration') ;
INSERT INTO student VALUES(20110002, 'Lucy', 2, 2, 'Electronic Engineering');
INSERT INTO student VALUES(20030002, 'Michelle', 5, 1, 'Computer Science') ;
INSERT INTO student VALUES(20070003, 'April', 4, 3, 'Law');
INSERT INTO student VALUES(20070005, 'Alicia', 2, 5, 'English Literature');
INSERT INTO student VALUES(20100003, 'Yullia', 3, 1, 'Computer Science');
INSERT INTO student VALUES(20070007, 'Ashlee', 2, 4, 'Business Administration');

INSERT INTO department VALUES('Computer Science', 'Engineering building', '02-3290-0123','');
INSERT INTO department VALUES('Electronic Engineering', 'Engineering building','02-3290-2345','');
INSERT INTO department VALUES('Law', 'Law building', '02-3290-7896','');
INSERT INTO department VALUES( 'Business Administration', 'Administration building', '02-3290-1112','');
INSERT INTO department VALUES ('English Literature', 'Literature building', '02-3290-4412','');

UPDATE department SET dept_name = 'Electronic and Electrical Engineering' WHERE dept_name='Electronic engineering';

INSERT INTO department(dept_name, office_tel,office) VALUE ('Education','02-3290-2347','Education Building');

UPDATE student SET major='Education' WHERE name='Chloe';
DELETE FROM student WHERE name='Michelle';
DELETE FROM student WHERE name='Fearne';

SELECT * FROM student WHERE major='Computer Science';
SELECT student_id,year,major FROM student;
SELECT * FROM student WHERE year=3;
SELECT * FROM student WHERE year=1 OR year=2; 
SELECT * FROM student WHERE major=(SELECT dept_name FROM department WHERE dept_no=4);

SELECT * FROM student WHERE student_id LIKE '%2007%';
SELECT * FROM student ORDER BY student_id;
SELECT * FROM student GROUP BY major HAVING AVG(year)>3;
SELECT * FROM student WHERE major='Business Administration' AND student_id LIKE '%2007%' limit 2; 

CREATE DATABESE world;
USE world;

SELECT * FROM countries WHERE independence_year=1948;
SELECT * FROM countries WHERE country_code = (SELECT country_code WHERE language='English' OR language='French');

