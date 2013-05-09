Readme Flickr Nav

Configurations:

In 'path.to/flickrNav/application/config' set the following files:
- autoload.php:
 + $autoload['libraries'] = array('database'); // Add database support
 + $autoload['helper'] = array('url', 'form'); // Helpers to handle urls and forms
- config.php:
 + $config['base_url']	= 'http://localhost/~juaning/flickrNav'; // Path to your installation
- database.php:
 + $db['default']['hostname'] = 'localhost';
 + $db['default']['username'] = 'flickrNav';
 + $db['default']['password'] = 'flickNavPWD';
 + $db['default']['database'] = 'flickr';
 + $db['default']['dbdriver'] = 'mysql';
- routes.php:
 + $route['default_controller'] = "main";
 
Database Schema:

3 tables were created to handled the task
- Query:
 + Saves queries string and date
- Image:
 + Saves images data like url, creator, date, location
- Image_Query:
 + Table that have Ids of the previous tables an creates a relation many to many between them