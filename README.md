# jaduRSSFeedServer
A test feed for Jadu RSS Feed Server



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