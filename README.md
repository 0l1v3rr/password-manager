# Password Manager

<img src="screenshots/v1.png" alt="screenshot" width="800px">

A very basic password manager.<br>
**Tech stack:**
- PHP
- MySQL
- Bootstrap

## Setup
Download and install XAMPP.<br>
Clone this repository:
```sh
git clone https://github.com/0l1v3rr/password-manager.git
```
Start the **Apache** and the **MySQL** server in the control panel.<br>
Paste the content of `password-manager` folder into the `xampp/htdocs` folder.<br>
In the **phpmyadmin** panel, create the necessary database and the tables. The commands are in the `data/tables.sql` file.<br>

Set the document root to the public_html folder.

Go to the file app/config.php and change the secret `please_change_your_secret` and setup your database connection.

Go to `localhost/`, and enjoy!
