**Control de un termostato virtual inteligente "nest-like" para eedomus**
  
*Instalación:*
1/ Descargue el script thermolearn.php y el archivo ddl.sql en GitHub:  https://github.com/influman/eedomus_ThermoLearn  
2/ Cree una base de datos "thermoLearnv1" en un servidor MySql e importe el archivo "ddl.sql" para la creación de las tablas (con phpMyAdmin, por ejemplo)  
3/ Debe instalar el script "thermolearn.php" en un servidor web/php propio (y no en el controlador eedomus), en una carpeta /thermoLearn  
4/ Modifique el script thermolearn.php para introducir sus  parámetros de acceso a la API eedomus así como sus parámetros de acceso a la base de datos "thermoLearn"  
   
//*************************************** API eedomus *********************************  
// Credenciales de la API eedomus  
$api_user = "XXXXXX"; //introduzca su api user  
$api_secret = "yyyyyyyyyyyyyyy";  //introduzca su api secret   
//*************************************** Parámetros bdd **************************  
//server MySQL  
$sqlserver='localhost';  
//MySQL login  
$sqllogin='root'; //introduzca el usuario sql  
//MySQL password   
$sqlpass='password'; //introduzca la contraseña correspondiente al usuario  
//MySQL dataBase  
$dataBase='thermoLearnv1'; //base de datos que debe crear  
  
5/ Vaya a lastore eedomus, instale el plugin "thermoLearn" e introduzca la siguiente información:  
- la IP de acceso al servidor php/mysql, indicando la ruta  
- el número de la zona de calefacción controlada por el plugin (de 1 a 8)  
- el detector de movimiento asociado a esta zona  
- La consigna real de la Zona de Calefacción (o su propia  consigna), que sincronizará el thermoLearn  
El script thermolearn_call.php se instalará en su controlador. Permite llamar al script externo y transmitirle los argumentos  necesarios.  
    
****************************************************************************************************************  
El termostato inteligente thermoLearn le permite controlar el aprendizaje de hasta 8 zonas de calefacción, y establecer de forma automática las consignas de temperatura que mejor se adapten a las costumbres del hogar, en función de los días de la semana y de las estaciones.  
  
Su funcionamiento está basado en los siguientes principios:  
  
El objetivo último del sistema es establecer consignas de temperatura de forma autónoma, entre 1 y 8 consignas como máximo.  
El sistema de aprendizaje no permite controlar las partes "potencia/conmutación" de la calefacción.  
Sólo proporciona las consignas de temperatura al sistema "potencia", por lo que puede ser del tipo histéresis o PID, o DIY.  
El termostato inteligente debe aprender de forma continua en función de las consignas establecidas por los usuarios bien manualmente, bien mediante reglas existentes.  
Es necesario disponer de un detector de presencia para cada una de las zonas definidas.  
Aprende de forma continua, incluso si el usuario no lo usa para establecer la consigna al final.  
   
En primer lugar, ponga el thermoLearn en modo User y seleccione manualmente las consignas  thermoLearn durante una o dos semanas.  
A continuación, ponga el thermoLearn en modo Smart. De esta forma, seleccionará por si mismo las consignas.  
Si la consigna establecida de forma automática no es de su agrado, sólo tiene que seleccionar manualmente la nueva consigna, tras lo cual el thermoLearn aprenderá y volver al modo Smart automáticamente al cabo de 3 horas.  
El aprendizaje se hace más preciso y optimiza el consumo poco a poco, con el paso de los días, en función de sus costumbres en cuanto a confort.  
  
El thermoLearn sincroniza su consigna con una consigna eedomus (consigna Zona de Calefacción o su propio estado de consigna).  
Debe establecer esta consigna en los parámetros, a través de su código API.  
Debe asegurarse de que todos los valores posibles de la consigna thermoLearn existen en la consigna Zona de Calefacción (añada las que no existan, en su caso).   

  
*Documentación traducida al español por www.domoticadomestica.com (Philippe Rochette)  
  
  