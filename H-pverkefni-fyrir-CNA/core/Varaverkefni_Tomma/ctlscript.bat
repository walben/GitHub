@echo off
rem START or STOP Services
rem ----------------------------------
rem Check if argument is STOP or START

if not ""%1"" == ""START"" goto stop

if exist D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\hypersonic\scripts\ctl.bat (start /MIN /B D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\server\hsql-sample-database\scripts\ctl.bat START)
if exist D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\ingres\scripts\ctl.bat (start /MIN /B D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\ingres\scripts\ctl.bat START)
if exist D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\mysql\scripts\ctl.bat (start /MIN /B D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\mysql\scripts\ctl.bat START)
if exist D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\postgresql\scripts\ctl.bat (start /MIN /B D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\postgresql\scripts\ctl.bat START)
if exist D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\apache\scripts\ctl.bat (start /MIN /B D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\apache\scripts\ctl.bat START)
if exist D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\openoffice\scripts\ctl.bat (start /MIN /B D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\openoffice\scripts\ctl.bat START)
if exist D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\apache-tomcat\scripts\ctl.bat (start /MIN /B D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\apache-tomcat\scripts\ctl.bat START)
if exist D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\resin\scripts\ctl.bat (start /MIN /B D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\resin\scripts\ctl.bat START)
if exist D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\jboss\scripts\ctl.bat (start /MIN /B D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\jboss\scripts\ctl.bat START)
if exist D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\jetty\scripts\ctl.bat (start /MIN /B D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\jetty\scripts\ctl.bat START)
if exist D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\subversion\scripts\ctl.bat (start /MIN /B D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\subversion\scripts\ctl.bat START)
rem RUBY_APPLICATION_START
if exist D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\lucene\scripts\ctl.bat (start /MIN /B D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\lucene\scripts\ctl.bat START)
if exist D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\third_application\scripts\ctl.bat (start /MIN /B D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\third_application\scripts\ctl.bat START)
goto end

:stop
echo "Stopping services ..."
if exist D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\third_application\scripts\ctl.bat (start /MIN /B D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\third_application\scripts\ctl.bat STOP)
if exist D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\lucene\scripts\ctl.bat (start /MIN /B D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\lucene\scripts\ctl.bat STOP)
rem RUBY_APPLICATION_STOP
if exist D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\subversion\scripts\ctl.bat (start /MIN /B D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\subversion\scripts\ctl.bat STOP)
if exist D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\jetty\scripts\ctl.bat (start /MIN /B D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\jetty\scripts\ctl.bat STOP)
if exist D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\hypersonic\scripts\ctl.bat (start /MIN /B D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\server\hsql-sample-database\scripts\ctl.bat STOP)
if exist D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\jboss\scripts\ctl.bat (start /MIN /B D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\jboss\scripts\ctl.bat STOP)
if exist D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\resin\scripts\ctl.bat (start /MIN /B D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\resin\scripts\ctl.bat STOP)
if exist D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\apache-tomcat\scripts\ctl.bat (start /MIN /B /WAIT D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\apache-tomcat\scripts\ctl.bat STOP)
if exist D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\openoffice\scripts\ctl.bat (start /MIN /B D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\openoffice\scripts\ctl.bat STOP)
if exist D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\apache\scripts\ctl.bat (start /MIN /B D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\apache\scripts\ctl.bat STOP)
if exist D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\ingres\scripts\ctl.bat (start /MIN /B D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\ingres\scripts\ctl.bat STOP)
if exist D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\mysql\scripts\ctl.bat (start /MIN /B D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\mysql\scripts\ctl.bat STOP)
if exist D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\postgresql\scripts\ctl.bat (start /MIN /B D:\Home\Tom\Archives\GitHub\H-pverkefni-fyrir-CNA\core\Varaverkefni_Tomma\postgresql\scripts\ctl.bat STOP)

:end

