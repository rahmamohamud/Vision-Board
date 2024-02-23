# VISTA: Vision Board Creator

## Welcome to Vista!

Vista is a web-based Vision Board Creator that empowers users to manifest their aspirations visually. This modern web application features an intuitive user interface enhanced with web animations and visually appealing elements. For instance, dynamic hover effects elegantly highlight navbar elements, contributing to a delightful user experience.

## How it Works

Vista's functionality begins with user registration and login. User data, including securely hashed passwords, is meticulously stored in a MySQL database. The use of parametrized SQL queries adds an additional layer of security, safeguarding against potential hacking attempts.

Once logged in, users are guided through an effortless process to create vision boards. A series of carefully crafted questions aid in the board creation process. Upon completion, users are seamlessly redirected to a dedicated page where they can download their vision board in PNG format, facilitating easy sharing and preservation.

The application goes beyond creation by offering users the flexibility to manage their boards. Options to delete boards and log out contribute to a comprehensive and user-centric experience.

All pages within Vista are meticulously linked to ensure a smooth and intuitive navigation experience. The application's responsiveness ensures optimal display across various screen sizes. The entry point to the app is the 'Home-Page.php' file, providing a centralized starting point for users.

## Technologies Used

Vista harnesses a powerful stack of technologies to deliver a robust and engaging user experience:

1. **PHP**: A server-side scripting language powering dynamic web pages.
2. **JavaScript**: The backbone of interactivity within the application.
3. **HTML & CSS**: Standard markup and styling languages for crafting web interfaces.
4. **Bootstrap**: A front-end framework contributing to responsive and visually appealing UI components.
5. **MySQL**: A reliable and secure database management system for storing user data.

## Installation Notes

To run Vista locally or on your server, follow these installation steps:

1. **PHP and MySQL:**
        - Install PHP and MySQL on your server or local environment. You can download the XAMPP package, as it contains all the necessary elements to run the application.

2. **Database Setup:**
        - Create a MySQL database for Vista in your MySQL admin. The name of the database should be *'vision-board'* and the table should be named *'users'*.

3. **Running the Application:**
        - Ensure PHP and MySQL are running.
        - Ensure that the folder name where you saved the application is named 'Vision-Board-App'
        - Start the PHP development server:

        ```
        php -S localhost:8000 -t path/to/vista
        ```

    Replace `path/to/vista` with the actual path to your Vista application.

    - Open your browser and navigate to `http://localhost/Vision-Board-App/Home-Page.php`.

## Limitations

Vista, while designed to offer an immersive experience, has certain limitations to be aware of:
- The accuracy of vision board creation depends on the specificity of user input.
- Given the complexity of web animations and user interactions, occasional bugs or crashes may occur.

### Note:

Vista is a personal project developed by me, a final-year tech student, to showcase my programming skills. It is not intended for commercial use or deployment in production environments. Your feedback on the application's functionality and code is highly valued for ongoing improvements.

## Licences and Credits
All image credits belong to [Freepik](freepik.com) and Icons to [Google Icons](https://fonts.google.com/icons).
I designed and created the Vista logo and Vision Board myself. 