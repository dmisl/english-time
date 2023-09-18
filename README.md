<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## Intro
Hello, this is a project made to make learning English easier. Made by Dmytro Slutyi

## How to install the project
Everything is quite simple, first you need to download the project to your computer, git bash will help us with this
To do this, use the command
```
git clone https://github.com/dmisl/english.git
```
After installation, in the console, go to the project location on your computer and download the Laravel files we need
```
composer install
```
After which we create an .env file in the project folder, copying the prepared text from .env.example. Customize if necessary and move on.

Enter the following commands into the console

```
php artisan key:generate
php artisan migrate
```

After entering these commands, you need to rename the storage folder from the ../public/ folder to some other name and enter the command
```
php artisan storage:link
```

Then transfer all files from the folder you renamed to the /public/storage folder

You're done :) The project is successfully installed on your computer, but that's not all

## How this project works
There are two roles in this project: 
- Teacher
- Student

To start working with the site, you need to register on the site and then grant yourself administrator rights through the database. 

After that, you will be able to log in to your profile. In your profile, you will be able to see the basic functionality of this site. Going to the **account activation page**, you will be able to see a list of users, specifically students, who are waiting for their account to be activated, i.e. to **be granted access to go to their profile page**. 

Once their account is activated, you **can give them access to any course you have created** to start their training. Once the learner has access to the course, they will be able to complete the assignments you have created.

## How the course system works
Above I wrote about how to give a student access to a course you created. 

But **how courses are made** on this site is simple.

**There can be many lessons in one course, and in one lesson there can be many tasks** that we can give to the student, for example, for homework. 

By the way, creating tasks will be easy and intuitive, all thanks to a simplified interface, so you can even create a task in a few minutes.


Available types of tasks at the moment:
- Translate words
- Fill in the blanks (with ready-made answers)
- Fill in the blanks (by entering answers manually)
- ABC, choose the correct answer

You can also create an information page where your student can repeat or learn new rules of the language he`s learning.

## Available languages
- English
- Poland
- Ukrainian

## Outro
This is not the final version of this site, over time it will be improved with new interface languages and new functionality.

That's why we don't say goodbye :)
