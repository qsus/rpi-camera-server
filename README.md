# rpi-camera-server
WARNING: Work in progress!

This is server backend for my project [rpi-camera](https://github.com/qsus/rpi-camera).

## Prerequisites
* VPS with public IP and apache
## Usage
1. Create a file for passwords using `htpasswd -B -c /PATH/TO/passwords USERNAME` (You can put it wherever you want to, as long as apache has access there. USERNAME, along with password it asks for, will be required to access the webpage.)
2. Copy .htaccess.example to .htaccess and replace the example values.
3. Get an SSL certificate and configure apache accordingly.

Refer to [apache docs](https://httpd.apache.org/docs/2.4/howto/auth.html) if you get stuck. Folder videos/ is exclusively for videos in format .mov or .ogv, with the only exception being git-store file to make sure git stores that folder.
