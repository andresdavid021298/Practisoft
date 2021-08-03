# Título del proyecto:
#### PractiSoft

***
## Índice
1. [Características](#características)
2. [Contenido del proyecto](#contenido-del-proyecto)
3. [Tecnologías](#tecnologías)
4. [IDE](#ide)
5. [Instalación](#instalación)
6. [Demo](#demo)
7. [Autor(es)](#autores)
8. [Institución Académica](#institución-académica)
***

#### Características:
  - Proyecto de una aplicación web para la gestión de las prácticas empresariales en el programa de Ingeniería de Sistemas de la Universidad Francisco de Paula Santander (UFPS).
  - La autenticación de usuarios para correos institucionales se realiza a través de la API de Google y la autenticación de empresas cuenta con un inicio de sesión local.
  - Existen 4 roles en el sistema: Director del programa, coordinador de prácticas empresariales, empresas y practicantes.
  - Se envían correos electrónicos a las empresas en el momento del registro en el sistema y el restablecimiento de la contraseña.
  - El sistema permite la generación de informes estadísticos del proceso de la práctica empresarial.
  - El sistema permite la exportación de informes en formato PDF y XLSX.
***

#### Contenido del proyecto

| Archivo      | Descripción  |
|--------------|--------------|
| [Config](https://github.com/andresdavid021298/Practisoft/tree/main/CodigoFuente/Config) | Archivo para la conexión con la base de datos y su correspondiente script. |
| [Controller](https://github.com/andresdavid021298/Practisoft/tree/main/Controller) | Carpeta que contiene los controladores de la aplicación. |
| [Model](https://github.com/andresdavid021298/Practisoft/tree/main/Model/DAO) | Carpeta que contiene los modelos con los DAO de la aplicación. |
| [View](https://github.com/andresdavid021298/Practisoft/tree/main/View) | Carpeta que contiene las interfaces gráficas de la aplicación. |
| [css](https://github.com/andresdavid021298/Practisoft/tree/main/css) | Archivos que tienen las hojas de estilo que se aplican a las interfaces gráficas. |
| [js](https://github.com/andresdavid021298/Practisoft/tree/main/js) | Carpeta que contiene los archivos para el manejo de los eventos de la aplicación. |

***
#### Tecnologías

  - [![HTML5](https://img.shields.io/badge/HTML5-CSS-green)](https://developer.mozilla.org/es/docs/Web/Guide/HTML/HTML5)
  - [![JavaScript](https://img.shields.io/badge/JavaScript-green)](https://developer.mozilla.org/es/docs/Web/JavaScript)
  - [![PHP](https://img.shields.io/badge/PHP-blue)](https://www.php.net/manual/es/intro-whatis.php)
  - Lenguaje de base de datos: MYSQL.
  - Biblioteca de diseño: Bootstrap.
  -	Sistema de control de versiones: Github.
  -	Sistema de gestión de dependencias de PHP: Composer.
  -	Librería para envío de correos: PHP Mailer.
  -	Librería para la generación de PDF: DOMPDF
  -	Librería para la generación de Excel: PHPSPREADSHEET
  -	Librería para el uso de alertas informativas de Node.js: Sweet Alert 2
  -	Librería para gráficos: Pie Chart de Google.
  -	API para el inicio de sesión: OAuth de Google.
  -	Herramienta para gestionar base de datos: phpmyadmin.

***
#### IDE

- El proyecto se desarrolla usando Microsoft Visual Studio Code, un editor de código redefinido y optimizado para crear y depurar aplicaciones web y en la nube modernas [(Visual Studio Code)](https://code.visualstudio.com/).

***
### Instalación

Para la instalación del sistema, es necesario contar con los siguientes componentes:

- Ingresar al repositorio. [Github](https://github.com/andresdavid021298/Practisoft).
- Descargar el proyecto. [descargar](https://github.com/andresdavid021298/Practisoft/archive/refs/heads/main.zip).
- Descargar un paquete de software libre de distribución de Apache (XAMPP, WAMP, LAMP...).
- Incorporar la base de datos. [ver](https://github.com/andresdavid021298/Practisoft/tree/main/Config).
- Instalar Composer, el sistema de gestión de paquetes. [Composer](https://getcomposer.org/download/).
- Agregar el siguiente comando para disponer de la librería de [DOMPDF](https://github.com/dompdf/dompdf): `composer require dompdf/dompdf`
- Agregar el siguiente comando para disponer de la librería de [PHPSPREADSHEET](https://phpspreadsheet.readthedocs.io/en/latest/): `composer require phpoffice/phpspreadsheet`
- Agregar el siguiente comando para disponer de la librería de [Sweet Alert 2](https://sweetalert2.github.io/): `npm install --save sweetalert2`

***
### Demo
La aplicación se encuentra alojada temporalmente en el siguiente enlace: [PractiSoft](https://practisoftufps.online/).
- Usuario Director: judithdelpilarrt@ufps.edu.co - Contraseña: contraseña del correo institucional
- Usuario Coordinador: judithdelpilarrt@ufps.edu.co - Contraseña: contraseña del correo institucional
- Usuario Empresa: madarme22@gmail.com - Contraseña: Clave1234
- Usuario Estudiante: madarme@ufps.edu.co - Contraseña: contraseña del correo institucional

***
### Autor(es)
Proyecto desarrollado por Andrés David Ariza Cáceres (<andresdavidac@ufps.edu.co>), Diego Alexander Navas Urbina (<diegoalexandernu@ufps.edu.co>) y Jorge Andrés Mojica Villamizar (<jorgeandresmv@ufps.edu.co>).

***
### Institución Académica   
Proyecto desarrollado en el Curso de Profundización de Desarrollo de Software [Programa de Ingeniería de Sistemas] de la [Universidad Francisco de Paula Santander]

   [Programa de Ingeniería de Sistemas]:<https://ingsistemas.cloud.ufps.edu.co/>
   [Universidad Francisco de Paula Santander]:<https://ww2.ufps.edu.co/>
