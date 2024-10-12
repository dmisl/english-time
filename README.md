![Alt text](https://www.itctraductionscanada.ca/wp-content/uploads/sites/2/2020/08/english-words-1210x423.jpg)
---
## 📋 Roadmap

- [About](#about)
- [Tech Stack](#tech_stack)
- [Server Requiremenets](#requirements)
- [Running the Program](#running)
- [Features](#features)

## 🧐 About <a id = "about"></a>

Using this platform, you can easily create your own English courses for native speakers of any language. The project works using a user-friendly and simplified interface, which will greatly facilitate the work of both the course owner and the students who will take this course. 

Due to the fact that the project development process was carried out with the help of my English teacher, the learning process on such a platform will be as effective as possible in learning the necessary English language

You can try this platform at https://englishtime.website/ (available in 3 languages)

## 🏗️ Tech Stack <a id = "tech_stack"></a>

- [Laravel](https://laravel.com/)
- [JavaScript]()
- [MySQL database](https://www.mysql.com/)
- [Bootstrap](https://getbootstrap.com/)
- [Figma](https://www.figma.com/)
- [Docker](https://www.docker.com/products/docker-desktop/)

## ⚙️ Requiremenets <a id = "requirements"></a>

Server requirements to run locally:
- PHP >= 8.1
- MySQL 8.0

To run on Docker:
- [Docker](https://www.docker.com/products/docker-desktop/)

## 🚀 Running the Program <a id = "running"></a>

To run the program locally, simply clone the repository and execute the start script:
```
git clone https://github.com/dmisl/EnglishTime.git
cd <project_directory>
php start.php
```
This script automates all necessary setup steps, including installing PHP/JS dependencies, setting up environment variables, running migrations, starting the development server

Once the script completes, your program will be up and running, ready for you to use.

---

To run the program using Docker:

Before running Docker commands, update the .env file with your database configuration.

```
DB_HOST=database
DB_USERNAME=someone
DB_PASSWORD=secret
```
then run
```
php start.php
docker-compose build
docker-compose up
```

This will set up the program environment using Docker, allowing you to run it seamlessly. (If you encounter any issues with the environment run `docker-compose down` then `docker-compose up`)

## 💡 Features <a id = "features"></a>

1. **User-Friendly Interface**: 
   - Designed to cater to both students and teachers, ensuring a seamless experience for course creation, management, and learning.

2. **Course Management (CRUD)**:
   - Teachers can effortlessly Create, Read, Update, and Delete courses, streamlining the organization of educational content.

3. **Lesson Management (CRUD)**:
   - Teachers have full control over creating, editing, and deleting lessons, enabling structured and comprehensive curriculum development.

4. **Task Management (CRUD)**:
   - Utilizing Laravel and native JavaScript, tasks can be created swiftly, empowering teachers to generate engaging exercises in minutes.

5. **Variety of Task Types**:
   - Offers five task types: Translate, Fill in the Gaps (with ready-made answers), Fill in the Gaps (manual input), ABC, and Info, catering to diverse learning styles and objectives.

6. **Cross-Platform Compatibility**:
   - Accessible across various devices, including mobile phones, ensuring flexibility and convenience for users on-the-go.

7. **Multilanguage Support**:
   - Supports English, Polish, and Ukrainian languages out of the box, with an easy mechanism for adding additional languages as needed.

8. **Account Activation Workflow**:
   - Implements a system where newly registered accounts require activation by a teacher, ensuring authenticity and control over user access.

9. **Customized Course Access**:
   - Teachers can grant access to specific courses based on the user's English proficiency level, ensuring tailored learning experiences.

10. **Task Feedback and Correction**:
    - Enables teachers to review and provide feedback on student tasks, facilitating active engagement and personalized learning support.

11. **Dark Mode Support**:
    - Seamlessly integrates dark fashion elements with the design for users who prefer a darker aesthetic, enhancing visual comfort and usability.
