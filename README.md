#Test (PHP 7)

###System requirements
    * PHP (7.1 or higher)
    * Web Server (Recommended: Apache. Use of php's built in development server is also possible)
    * Database server (MySQL 5.5+ or MariaDB 10.0+)
    * Composer
    * Git (fore development)

###Clone repository
    cd /var/www
    mkdir test.local && cd test.local
    git clone https://github.com/LazarDugalic/test.git
    
###Import database
    mysql -u root test < sql/test.sql  
    
###Install packages
    composer install
    npm install
    
###Apache configuration   
    cp apache2/apache.conf /etc/apache2/sites-enabled/test.conf
    sudo service apache2 restart
    echo '127.0.0.1 test.local' | sudo tee --append /etc/hosts >/dev/null
   
###Start webpack
    ./assets.sh
    
    
