@echo off

rem --------------------------------------------
rem  music-dl command for Windows.
rem --------------------------------------------

@setlocal

set MUSIC_DL_PATH=%~dp0

if "%PHP_COMMAND%" == "" set PHP_COMMAND=php.exe

"%PHP_COMMAND%" "%MUSIC_DL_PATH%music-dl" %*

@endlocal
