#### Docker LAMPRPR Stack

Docker example with Apache, MySql, Redis, PhpMyAdmin and PHP.  
Uses docker-compose as an orchestrator. To run these containers:

```
docker-compose up
```

#### Notes

There are 3 ways to execute PHP scripts on a web server.<br/>
* Apache module
* CGI
* FastCGI

#### Apache Module (mod_php)

When using mod_php the PHP interpreter is embedded in each Apache process that’s spawned on the server.<br/>
This way every Apache worker is able to handle and execute PHP scripts itself removing the need to deal with any external processes; unlike CGI or FastCGI.<br/><br/>
This makes it very useful for sites that are ‘PHP heavy’ where lots of requests are likely to contain PHP code (such as WordPress, Drupal, Joomla, etc.) because all the requests can be handled by Apache.    
The downside to this is that the footprint for each Apache process is larger as it requires more system resources with the PHP interpreter embedded. Even when serving static content such as images, text and style sheets where no PHP code needs to be executed, the process still contains the PHP interpreter.

#### CGI

Executing PHP scripts with a CGI application is the legacy way of running applications on a web server, it’s highly inefficient and rarely used.
It was originally introduced in the 1990’s but was deemed to be too inefficient to use on anything other than very small sites.    
The inefficiencies of running PHP with CGI support spawn from requiring a new process to be created each time any PHP code needs to be executed.  
As you can imagine, on busier sites or PHP based applications it can be very resource intensive.

#### FastCGI

FastCGI was introduced as a middle ground between the PHP Apache Module and the CGI application.  
It allows scripts to be executed by an interpreter outside of the web server and includes the security benefits of CGI but doesn’t include any of the inefficiencies of CGI.  
When executing PHP scripts with FastCGI each request is passed from the web server to FastCGI via a communication socket. This allows for much greater scalability as the web server and the PHP interpreter can be split into their own individual server environments if necessary.  
However a similar end result can also be achieved using nginx in front of Apache (such that nginx handles basic requests itself and only passes dynamic requests to Apache) so this point alone doesn’t determine the ideal choice for a given scenario.

[Read more](https://blog.layershift.com/which-php-mode-apache-vs-cgi-vs-fastcgi/)

- This project uses FastCGI module to interpret PHP files, therefore .htaccess directives can not be used.

```
- Linux (Alpine)
- Apache:latest (Alpine)
- Mysql:latest
- PHP:latest (FPM)
- Redis:latest
- PhpMyAdmin:latest
```

After initalizing containers, head over to http://localhost and BAM !