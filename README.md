![image not showing](https://pbs.twimg.com/media/FizwZdTXEAEMDPX.jpg)
# Team-19

### Project Name: Sarth

##### Contributors:

* Faraz Ahmed
* Hussain Ahmed
* Lena Akhter
* Hasnain Ali
* Muniib Ali
* Sadiyah Begum
* Sarah Rahimi

---

### Description:

Sarth is an e-commerce website that allows users to browse a wide catalog of video games. Users can purchase their desired video game(s) by adding them to their basket and checking out as a registered user. The games will be displayed with a brief description, cover picture, age rating, price, and will be categorised within genres such as Action, Mystery, Stealth etc. Our stakeholders will be people who enjoy playing video games as a hobby and our website will contain a wide range of games to reach as many target audiences as possible. The video game market typically adopts a more futuristic feel which we will display through varied colour schemes and layouts. Doing so provides us with a unique flair to appeal to our stakeholders. We have taken inspiration from websites such as Steam and Epic Games Launcher in the design of our website, though we plan to differ from these examples by making our website more user-friendly and attractive to the eye. Both these websites are quite monochromatic and confusing when you want to purchase a game. We will avoid this by utilising brighter, visually appealing colour schemes to keep users interested, as well as making sure that the website is easy to navigate.

##### Requirements: 
- PHP version: 8.1.10
- Laravel Version: 9.39.0

---

### How to Set up our Project

#### Step 1 
[Install XAMPP](https://www.apachefriends.org/download.html)  

#### Step 2 
[Install Composer](https://getcomposer.org/download/) and follow the default installation steps.  
#### Step 3 
If not cloned already, [Clone the Repository](https://github.com/lenaakhter/Team-19).  
#### Step 4 
![image not showing](https://pbs.twimg.com/media/Fi55R0vWAAE8XQb?format=png&name=small) <br>
Make sure to run the APACHE server and MySql from XAMPP 
#### Step 5
Click the **admin** button for MySQL and it should take you to the PhpMyAdmin page.
#### Step 6
Create a new database named **sarth** and import the sarth.sql file in the SQL file folder.
#### Step 7
Access the **Sarth-website** folder on Visual Studio Code, or any other source code editor.
#### Step 8
You will now see this within you files tab. <br>
![image not showing](https://pbs.twimg.com/media/Fi6cKG0XgAQ_LZC?format=jpg&name=small) <br>
If you **have** a .env file skip to step 10. If not proceed to step 7.
#### Step 9
Copy the .env example folder and paste it into the same folder (Sarth-website). Rename this .env.
#### Step 10
Check line 14 in the .env folder that DB_DATABASE is equal to "sarth". If it isn't change it to "sarth" like the image below. <br>
![image not showing](https://pbs.twimg.com/media/Fi6cn_2XgAAKrVJ?format=png&name=240x240)
#### Step 11
In the terminal make sure you're inside the Sarth-website folder and type in the command **php artisan serve**. Copy and paste the http link provided into a browser. <br>
*Note: if you are getting an error with your vendor file run the command "composer update" and then try this step again. <br>
![image not showing](https://pbs.twimg.com/media/Fi6dOVHWAAEV0l3?format=png&name=900x900)
#### Step 12
You are now ready. Enjoy. <br>
![image not showing](https://pbs.twimg.com/media/Fi6eOJrXgAIWRKR?format=jpg&name=small)

