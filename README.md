# Deployment Instructions 
  sudo cp -Rup {server,client} /var/www/html

Test RSS feeds:
  http://www.php.net/news.rss
  http://slashdot.org/rss/slashdot.rss
  http://newsrss.bbc.co.uk/rss/newsonline_uk_edition/front_page/rss.xml








# jaduRSSFeedServer
A test feed for Jadu RSS Feed Server

# Deployment Instructions
> Clone the git repository to a directory
> run a copy command to copy the server folder to an apache server running PHP5.
> make sure that the apt-get libaries: apache2, libapache2-mod-php5, php5-sqlite are installed.

> NEED allow_url_fopen = 1 to allow simplexml_load_file($url) to work!
http://jaspreetchahal.org/workaround-simplexml_load_file-function-simplexml-load-file-http-wrapper-is-disabled-in-the-server-configuration-by-allow_url_fopen0/
http://phpsec.org/projects/phpsecinfo/tests/allow_url_fopen.html
If enabled, allow_url_fopen allows PHP's file functions -- such as file_get_contents() and the include and require statements -- can retrieve data from remote locations, like an FTP or web site. Programmers frequently forget this and don't do proper input filtering when passing user-provided data to these functions, opening them up to code injection vulnerabilities. A large number of code injection vulnerabilities reported in PHP-based web applications are caused by the combination of enabling allow_url_fopen and bad input filtering.

allow_url_fopen is on by default.


alternatives:
curl_init();
file_get_contents();

Both are also blocked.

# jaduRSSFeedCleint
A test feed for Jadu RSS Feed Client

# Deployment Instructions

> Make sure you have node installed to your system.  I use linux but its possible to install node on Windows and Mac.
> Clone the git repository to a directory
> run "npm install".  This will install the server and development depenencies needed to run and build the website.
> run "grunt" to build the website based on the Gruntfile.js specifications.
> EITHER run "node server.js" to start the node server and view at http://localhost:3000.
> OR copy the client directory to an apache server to view via apache.

Notes.  The client directory is purely HTML, CSS and JavaScript, hence its ability to be viewed without running any server-client software.