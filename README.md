# TEST REQUIREMENTS CORALIS STUDIO
## Case Study
Please create a web application with Codeigniter Framework with the following function:
1. Registration form with email, name, password, and a profile picture upload.
2. A login page and landing page showing the submitted information.
3. A proper forgot password feature

Please note that **SQL files** must be included.

## Step by Step
1. do `composer install` in terminal
2. do `cp cp.example .env` to duplicate the .env file
   and don't forget to un-comment the **CI_ENVIRONMENT** and **APP.baseURL**
   
   ![Screenshot 2024-04-26 000855](https://github.com/Reeansa/coralis-studio-ci4/assets/92510276/a6b36154-62cb-4d2f-b05a-dd5c3f5efd05)
3. first create a database manual with the name **carolis_studio** or import the SQL that I have provided in the **SQL file** folder.
   
   ![Screenshot 2024-04-26 001239](https://github.com/Reeansa/coralis-studio-ci4/assets/92510276/d05c32ac-bae2-46a6-95ed-d315d9700305)
4. if you created the database manual, do `php spark migrate` but if importing via **SQL file** ignore this step.
5. run the program with the command `php spark serve --port 8081`, if the port is already used in another program, you can change it as desired, but don't forget to change the `app.baseURL` in the **.env** to adjust to the link that has been created.

**Notes: create an account first before login.**

## Results
### Login
![image](https://github.com/Reeansa/coralis-studio-ci4/assets/92510276/7518f702-22c7-4d3e-925c-d7ebacf65c77)
### Register
![image](https://github.com/Reeansa/coralis-studio-ci4/assets/92510276/fd9ab0a1-bf4b-4fde-9f6c-1685b5eda7df)
### Forgot Password
![image](https://github.com/Reeansa/coralis-studio-ci4/assets/92510276/78f94a8a-14f3-4d43-8542-6a967324a61d)
![image](https://github.com/Reeansa/coralis-studio-ci4/assets/92510276/31dbeb3f-8a38-4882-a6b2-1cc10a01c0cf)
![image](https://github.com/Reeansa/coralis-studio-ci4/assets/92510276/eee11474-0bea-4528-b33e-e96199fc9ff3)
### alert (Notification, Error, Success)
![image](https://github.com/Reeansa/coralis-studio-ci4/assets/92510276/f592e062-3df5-4f10-8aec-410a09919d5b)
![image](https://github.com/Reeansa/coralis-studio-ci4/assets/92510276/842e998e-ca47-480c-ba0a-f9da7780a495)
![image](https://github.com/Reeansa/coralis-studio-ci4/assets/92510276/96982f93-a206-4dba-85f4-5fa6f099fda7)
### Showing The Submitted Information
![image](https://github.com/Reeansa/coralis-studio-ci4/assets/92510276/0ba317a3-f4c0-4202-b293-33782b275754)



