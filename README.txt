MopenLMS Program(R) Version 2.0 12/06/2015

General Usage Notes
-------------------

MopenLMS is an mobile-optimized, open source LMS created by Clifford Chan, Malcolm Milanovich, John Nyugen, and Qui Trinh.

If you'd like to try out MopenLMS please visit: https://mopenlms.com/

=============================================================================== 

If you'd like to deploy your own version of MopenLMS follow the steps below:

Prerequisites
-------------

- MopenLMS requires the use of MySQL, MongoDB, and a WebServer such as Apache. 

- The easiest way to set up MopenLMS is to install MySQL and XAMPP on the local machine.


Installing MopenLMS Application for local machine
-------------------------------------------------

1. Open the XAMPP control panel and turn on apache. Put the entire application in the desinated apache server folder. 

2. Start a new MySQL connection and set username: root and password: root.

3. Create a new database and name it: openlms.

4. Connect the pdo file with your set MySQL username and password by changing the pdo.php (../Actions/sql/pdo.php).

5. To connect the MongoDB to your server follow the guide called MongoDB.pdf (../MongoDB/MongoDB.pdf).

6. Import the provided SQL dump file (../Domain/mopenlms.sql) into openlms.

6. Run index.html (../index.html).

7. Register for an account.


Installing MopenLMS Application for Web Server
----------------------------------------------

1. Create a web server using cloud or hardware.

2. Select a prefered Operating System for the web server. We recommend using a linux based operating system for optimal usage.

3. SSH onto the server and download software for apache, MySQL, MongoDB, and PHP.

4. Start the apache server and follow the above steps starting from step 2.

===============================================================================

Demo
----

Follow the YouTube link to view the demo:

Fall 2015 CMPE 195B Group 2 - MopenLMS Student View Demo Part 1 
https://www.youtube.com/watch?v=62CxIc35K_M


Fall 2015 CMPE 195B Group 2 - MopenLMS Instructor View Demo Part 2 
https://www.youtube.com/watch?v=0S0i0pbsNmw

===============================================================================

Folder Descriptions
-------------------

- Responders: The responders folder holds the HTML files.

- Actions: The actions folder holds the JavaScript and PHP functions that are used by the HTML files.

- Domain: The domain folder holds an export of the databse required by MopenLMS.

- home: The home folder holds the structure of the URLs.

- css: Includes the jQuery Mobile css files for MopenLMS.
