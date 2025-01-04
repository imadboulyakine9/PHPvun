# PHP WAF Simulator and Secure Login System

This project demonstrates how to build a Web Application Firewall (WAF) simulator and a secure login system using PHP. The WAF helps protect against common web vulnerabilities such as SQL injection and Cross-Site Scripting (XSS), while the secure login system ensures user authentication and session management.

## Project Setup

1. **Install a Local Development Environment:** Choose a suitable local server environment like XAMPP, WAMP, MAMP, or set up a LAMP stack manually.
2. **Create Project Directory:** Create a new folder for your project (e.g., "php-waf-auth").
3. **Create Subfolders for Organization:** Inside your project directory, create subfolders for different components: "waf", "auth", "includes", and "logs".
4. **Create Initial PHP Files:** Create empty files named `index.php`, `waf.php`, `auth.php`, and `config.php`.
5. **Set Up Database (If Using):** Install a database server like MySQL, create a new database (e.g., "waf_auth_db"), and create a `database.sql` file to store your database schema.

## Features

- Web Application Firewall (WAF) to detect and block malicious requests.
- Secure user authentication with password hashing and session management.
- Logging of detected attacks and failed login attempts.
- Optional Multi-Factor Authentication (MFA) for enhanced security.

## Usage

1. **Start the Local Server:** Ensure Apache and MySQL are running.
2. **Access the Project:** Open your web browser and navigate to `http://localhost/php-waf-auth`.
3. **Register and Login:** Use the registration and login forms to create and authenticate users.

## License

This project is licensed under the MIT License.
