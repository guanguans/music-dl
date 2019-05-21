@echo off

rem -------------------------------------------------------------
rem  music-php command for Windows.
rem -------------------------------------------------------------

@setlocal

set MUSIC_PHP_PATH=%~dp0

if "%PHP_COMMAND%" == "" set PHP_COMMAND=php.exe

"%PHP_COMMAND%" "%MUSIC_PHP_PATH%music-php" %*

@endlocal