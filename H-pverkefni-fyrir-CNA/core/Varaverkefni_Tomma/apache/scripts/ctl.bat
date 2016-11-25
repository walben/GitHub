@echo off

if not ""%1"" == ""START"" goto stop

cmd.exe /C start /B /MIN "" "D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\apache\bin\httpd.exe"

if errorlevel 255 goto finish
if errorlevel 1 goto error
goto finish

:stop
"D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\apache\bin\pv" -f -k httpd.exe -q
if not exist "D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\apache\logs\httpd.pid" GOTO finish
del "D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\apache\logs\httpd.pid"
goto finish

:error
echo Error starting Apache

:finish
exit
