# Kpop Guessing Game Database Initializer

The Kpop Guessing Game is a web-based flashcard gaming project that consists of three different iterations. Two of the three iterations require the use of a database to store the flashcard data, and in order for those projects to be run properly the database must be initialized before execution. Therefore, the following repository contains a simple database initializer/handler for the [kpop-guessing-game-php](https://github.com/cassamb/kpop-guessing-game-php) and [kpop-guessing-game-ajax](https://github.com/cassamb/kpop-guessing-game-ajax) projects.

![Static Badge](https://img.shields.io/badge/JavaScript-yellow?style=for-the-badge&logo=javascript&logoColor=white)
![Static Badge](https://img.shields.io/badge/HTML-%23e34c26?style=for-the-badge&logo=HTML5&logoColor=white)
![Static Badge](https://img.shields.io/badge/CSS-%231572B6?style=for-the-badge&logo=CSS&logoColor=white)
![Static Badge](https://img.shields.io/badge/PHP-%238993be?style=for-the-badge&logo=PHP&logoColor=white)
![Static Badge](https://img.shields.io/badge/MySQL-%2300758f?style=for-the-badge&logo=MySQL&logoColor=white)
![Static Badge](https://img.shields.io/badge/XAMPP-%23fb7a24?style=for-the-badge&logo=XAMPP&logoColor=white)

## Functionality

The handler is not a part of the original requirements of the project; however, it is included here as a means to make the PHP and AJAX iterations of the project a bit easier for some users to execute without having to initialize the database on their own. **Users are welcome to modify the handler in any way that enhances their experience; however, the base functionality is as follows:**
* Establishes a connection to the local server
* Verifies if the given database has already been instantiated. 
  * ___If the 'flashcards' database does not current exist on the user's local machine___:
    * Creates the 'flashcards' database
    * Create a table within the database called 'groups'
    * Populates the groups table using the data in the 'groups.csv' file
  * ___If the 'flashcards' database already exists___, it prompts the user to start the official program.

## Developer Guide & Setup

### XAMPP
Given the projects use PHP, and PHP is a server-side language you'll need a **web server** in order to run the scripts. The one used for this implementation was [XAMPP](https://www.apachefriends.org/download.html), so be sure to have it installed before running this project. Once XAMPP is downloaded, open the control panel (run it as an administrator for the best results) and start the Apache as well as the MySQL modules.

### File Storage & Accessing the Local Server
Inside the XAMPP folder on your machine, there’s a folder called **htdocs** which is where you’ll store this handler along with kpop-guessing-game-php and kpop-guessing-game-ajax projects. By default, it’s full of files to help welcome you to the software, but there isn’t much use for them so they can be deleted without an issue. 

    By typing “localhost” into the url bar of your browser, you’ll gain access to a simple directory of all of the websites you have stored in the htdocs folder. This is how you'll access the database handler/initializer.

### Visual Studio (VS) Code
For those who would like to modify the code, you'll need a **code editor** (such as VS Code) to make the desired additions and/or changes to the scripts. In the event PHP isn't set up within VS Code on your machine, you'll need to validate the executable path. 

**If you're still having trouble, please refer to Dani Krossing's [PHP Course](https://youtu.be/l4_Vn-sTBL8?si=UIGpKFhiYa5W97H5) for additional help with PHP and XAMPP.**
