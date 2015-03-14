Tables:

1. annoucement
Responsible of annoucements (stores just the annoucements and author, course information).

2. annoucementNotify
Responsible for mapping annoucements to the correct students

3. course
Responsible for courses (stores just the course name, number, etc).

4. couseMember
Responsible for linking members(students and instructors) to courses. In other words,
this table shows which members are in which classes.
	-Foreign key: ID from member
	-Foreign key: ID from course
	-Unique key: memberID + courseID (so that same student cannot be in same class twice)

5. member
Respnsible for student and instructor information such as first name, last name.