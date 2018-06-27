Set Fecha=%Date:~0,2%_%Date:~3,2%_%Date:~6,4%
Set Hora=%Time:~0,2%_%Time:~3,2%

mkdir PMD
cd PMD
mkdir %Fecha%
cd %Fecha%
php ../../phpmd.phar ../../application/controllers html codesize --reportfile %Hora%_report-controllers.html
php ../../phpmd.phar ../../application/domain html codesize --reportfile %Hora%_report-domain.html
php ../../phpmd.phar ../../application/persistence html codesize --reportfile %Hora%_report-persistence.html
php ../../phpmd.phar ../../application/wrapper html codesize --reportfile %Hora%_report-wrapper.html