@echo off

set php=C:\_cloud\PHP-Engines\php-7.3.13-Win32-VC15-x64\php.exe
set artifactid=statista-challenge
set port=12345

C:
cd C:\_GitLocal\%artifactid%\src

%php% -v
echo PHP web server running @ localhost:%port%
%php% -S localhost:%port%

pause
