# DoNotLink

See donotlink in action at [donotlink.it](https://donotlink.it)

## Description

Donotlink is a simple and fast url shortener that blocks search engines from following links and removes the referer.  
Linking to websites via donotlink will not improve the sites position in search engines.

## Installation - Apache

Donotlink requires a database (MySQL or MariaDB) and PHP (preferably 7).

### Apache

Create a database and set up the redirect table as specified in the **donotlink.sql** file.  
Copy the src directory to the root directory of your domain. Edit the **config.inc.php** file accordingly.  
You are ready to go.  
If you do not use donotlink under the root of your domain, **.htaccess** redirects and **robots.txt** rules will not work anymore.

### nginx

TBD

## Libraries
[clipboard.js](https://github.com/zenorocha/clipboard.js)  
[hashids.php](https://github.com/ivanakimov/hashids.php)

## License
Licensed under the MIT License

## Author
Twitter: [@ConnyDuck](https://twitter.com/ConnyDuck)
