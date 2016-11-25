@echo off
rem START or STOP Services
rem ----------------------------------
rem Check if argument is STOP or START

if not ""%1"" == ""START"" goto stop


"D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\mysql\bin\mysqld" --defaults-file="D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\mysql\bin\my.ini" --standalone --console
if errorlevel 1 goto error
goto finish

:stop
"D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\apache\bin\pv" -f -k mysqld.exe -q

if not exist "D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\mysql\data\%computername%.pid" goto finish
echo Delete %computername%.pid ...
del "D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\mysql\data\%computername%.pid"
goto finish


:error
echo MySQL could not be started

:finish
exit
