@echo off

cd images

break>..\scripts\list_files.json

REM fileList='[
echo | set /p=fileList='[ >> ..\scripts\list_files.json

REM ajout d'un premier élément bidon, pour le problème de la dernière (ou première) virgule
REM a voir si possibilité de la supprimer proprement 
REM {"path":"dummy","name":"dummy"}
REM echo | set /p={"path":"dummy","name":"dummy"} >> ..\scripts\list_files.json

echo | set /p={"directory":"dummy","files":[]} >> ..\scripts\list_files.json

for /D %%i in (*.*) do (

echo | set /p=,{"directory":"%%i","files":[{"path":"dummy","name":"dummy"} >> ..\scripts\list_files.json

 for %%f in (%%i\*) do (
echo | set /p=,{"path":"images/%%i/%%~nxf","name":"%%i"}>>..\scripts\list_files.json
)


echo | set /p=]} >> ..\scripts\list_files.json

)

REM ]'
echo | set /p=]'>>..\scripts\list_files.json

REM pause