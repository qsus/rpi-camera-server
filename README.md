# rpi-camera-server
WARNING: Work in progress!

This is server backend for my project [rpi-camera](https://github.com/qsus/rpi-camera).

## Prerequisites
* VPS with public IP and apache
## Usage
1. Create a file for passwords using `htpasswd -c /PATH/TO/passwords USERNAME` (You can put it wherever you want to, as long as apache has access there. USERNAME, along with password it asks for, will be required to access the webpage.)
2. Copy .htaccess.example to .htaccess and replace the example values.

Refer to [apache docs](https://httpd.apache.org/docs/2.4/howto/auth.html) if you get stuck.
