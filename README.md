# Alumi.IO-WebApp

O **Projeto de Curso Alumi.IO** tem o objetivo de simular uma caderneta escolar mas num website com a base de Yii2.

## Como iniciar um projeto em desenvolvimento
1. Executar o seguinte comando: ```php init```
1. Executar o seguinte comando: ```composer install```
1. Executar o seguinte comando: ```yii migrate/fresh```
1. Executar o seguinte comando: ```yii_test migrate/fresh```
1. Executar o seguinte comando (Terminal 1): ```yii serve --docroot="frontend/web/"```
1. Executar o seguinte comando (Terminal 2): ```java -Dwebdriver.chrome.driver=./chromedriver.exe -jar selenium-server-standalone-3.141.59.jar```
1. Executar o seguinte comando (Terminal 3): ```cd frontend``` ```..\vendor\bin\codecept run --html```

## Membros do Grupo
* Daniel Correia Batista nº2171836
* Rodrigo Manuel Alves Rodrigues nº2180620
* Samuel Pires Brito nº2180657
