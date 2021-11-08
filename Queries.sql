
-- Table
CREATE TABLE Teacher
(
TeacherID int primary key Identity,
TeacherName varchar(55) NOT NULL,
Address varchar(100) NOT NULL,
Contact varchar(12) NOT NULL,
JoinDate Date NOT NULL,
Gender char NOT NULL,
)

-- Table
CREATE TABLE Class
(
ClassID int,
TeacherID int NOT NULL,
FOREIGN KEY (TeacherID) REFERENCES Teacher(TeacherID) ON Delete Cascade,
PRIMARY KEY (ClassID, TeacherID)
)

-- Table
CREATE TABLE Student
(
	StudentID int PRIMARY KEY Identity,
	StudentName varchar(30) NOT NULL,
	FatherName varchar(30) NOT NULL,
	Address varchar(100) NOT NULL,
	Contact varchar(12) NOT NULL,
	DOB Date NOT NULL,
	Gender char NOT NULL,
	AdmissionDate Date NOT NULL,
	Class int,
	RollNo varchar(15) Unique
)

-- Table
CREATE TABLE Registration
(
	StudentID int PRIMARY KEY,
	ClassID int,
	FOREIGN KEY (StudentID) References Student(StudentID)
)

-- Table
CREATE TABLE StudentFees
(
StudentID int NOT NULL,
FeesStatus varchar(10) NOT NULL,
PaidOn date NOT NULL,
PRIMARY KEY (StudentID, PaidOn),
FOREIGN KEY (StudentID) REFERENCES Student(StudentID)
)


-- Table
CREATE TABLE Course
(
	CourseID int Primary KEY Identity,
	CourseName varchar(30) UNIQUE
)


-- Table
CREATE TABLE CourseTeacher
(
	CourseID int,
	TeacherID int,
	FOREIGN KEY(TeacherID) REFERENCES Teacher(TeacherID) ON DELETE CASCADE,
	FOREIGN KEY(CourseID) REFERENCES Course(CourseID) ON DELETE CASCADE,
	PRIMARY Key(CourseID, TeacherID)
)

-- Table
CREATE TABLE Attendence
(
AttendanceID int,
Status varchar(10) NOT NULL,
DateOfDay date,
FOREIGN KEY(AttendanceID) REFERENCES Student(StudentID),
PRIMARY KEY(AttendanceID, DateofDay)
)

-- Table
CREATE TABLE StudentFees
(
StudentID int NOT NULL,
FeesStatus varchar(10) NOT NULL,
PaidOn date NOT NULL,
PRIMARY KEY (StudentID, PaidOn),
FOREIGN KEY (StudentID) REFERENCES Student(StudentID)
)


-- Trigger
create trigger RegistrationinsertStudent on Student
After insert
as
declare @stdid int
declare @class int

select @stdid=i.StudentID,@class=i.Class from inserted i;

insert into Registration
(StudentID ,ClassID)
values (@stdid,@class);

print 'trigger fired'
Go


-- Trigger
create trigger Registrationupdate on Student
After update
as
declare @stdid int
declare @class int

select @stdid=i.StudentID,@class=i.Class from inserted i Where StudentID = i.StudentID;

update Registration Set ClassID = @class Where StudentID = @stdid;

print 'trigger fired'
Go








