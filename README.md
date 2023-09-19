Add following to C:\xampp\apache\conf\extra\httpd-vhosts.conf

```
        <VirtualHost *:80>
            DocumentRoot "C:/xampp/htdocs/phpiggy/public"
            ServerName phpiggy.local
            ##<Directory "C:/xampp/htdocs/phpiggy/public">
            ##	RewriteEngine on
            ##	RewriteCond %{REQUEST_FILENAME} !-d
            ##	RewriteCond %{REQUEST_FILENAME} !-f
            ##	RewriteRule ^ /index.php [L]
            ##</Directory>
        </VirtualHost>
```
Afterwards rembember to comment it out (#), otherwise projects don't work

For using phpiggy.local add following to the end of C:\Windows\System32\Drivers\etc\hosts

```
# XAMPP Virutal Hosts
127.0.0.1 phpiggy.local
```

For reloading composer use 
```
composer dump-autoload
```

For enabling the database connections check that extention=pdo_mysql is enabled (not commented out) in php.ini

Running scripts:
```
composer run-script phpiggy 
```

Add php environment variables 
```
composer require vlucas/phpdotenv
```