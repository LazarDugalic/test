# Test (PHP 7)

### System requirements
    -  Linux OS
    -  PHP (7.1 or higher)
    -  Web Server (Recommended: Apache. Use of php's built in development server is also possible)
    -  Database server (MySQL 5.5+ or MariaDB 10.0+)
    -  Composer
    -  Git (fore development)

### Clone repository
    - $ cd
    - $ git clone https://github.com/LazarDugalic/test.git
    - $ sudo mv test/ /var/www/test.local
    - $ cd /var/www/test.local
    -    
### Import database
    Go to mysql console and type :
    - create database test character set utf8;
    - $ mysql -u root test < sql/test.sql  
    
### Install packages
    - $ composer install
    - $ npm install
    
### Apache configuration   
    - $ sudo cp apache2/apache.conf /etc/apache2/sites-enabled/test.conf
    - $ sudo service apache2 restart
    - $ echo '127.0.0.1 test.local' | sudo tee --append /etc/hosts >/dev/null
    
### Start webpack
    - $ ./assets.sh

### Dump autoload
    - $ composer dump-autoload -o        
    
### Admin credentials
    - email : admin@gmail.com
    - password: admin    
    
### Workflow
    Workflow:On the first page, you can see the listed products and approved messages.
    Below that, you have the option to leave a comment. After you submit a form,
    the message will be sent to the admin for review and approval. To access the admin panel,
    you have to click in the top right corner, on the "Login" link. After that,
    you'll need to log in with the following credentials:
    - Email : admin@gmail.com
    - Password: admin
    After that, you will see all of the messages. Bellow every message is a checkbox that
    can change the message status from disapproved to approved nad opposite.    
    
    
    
