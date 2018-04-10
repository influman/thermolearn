**Control de un termostato virtual inteligente "nest-like" para eedomus**
  
*Instalaci�n:*
1/ Descargue el script thermolearn.php y el archivo ddl.sql en GitHub:  https://github.com/influman/eedomus_ThermoLearn  
2/ Cree una base de datos "thermoLearnv1" en un servidor MySql e importe el archivo "ddl.sql" para la creaci�n de las tablas (con phpMyAdmin, por ejemplo)  
3/ Debe instalar el script "thermolearn.php" en un servidor web/php propio (y no en el controlador eedomus), en una carpeta /thermoLearn  
4/ Modifique el script thermolearn.php para introducir sus  par�metros de acceso a la API eedomus as� como sus par�metros de acceso a la base de datos "thermoLearn"  
   
//*************************************** API eedomus *********************************  
// Credenciales de la API eedomus  
$api_user = "XXXXXX"; //introduzca su api user  
$api_secret = "yyyyyyyyyyyyyyy";  //introduzca su api secret   
//*************************************** Par�metros bdd **************************  
//server MySQL  
$sqlserver='localhost';  
//MySQL login  
$sqllogin='root'; //introduzca el usuario sql  
//MySQL password   
$sqlpass='password'; //introduzca la contrase�a correspondiente al usuario  
//MySQL dataBase  
$dataBase='thermoLearnv1'; //base de datos que debe crear  
  
5/ Vaya a lastore eedomus, instale el plugin "thermoLearn" e introduzca la siguiente informaci�n:  
- la IP de acceso al servidor php/mysql, indicando la ruta  
- el n�mero de la zona de calefacci�n controlada por el plugin (de 1 a 8)  
- el detector de movimiento asociado a esta zona  
- La consigna real de la Zona de Calefacci�n (o su propia  consigna), que sincronizar� el thermoLearn  
El script thermolearn_call.php se instalar� en su controlador. Permite llamar al script externo y transmitirle los argumentos  necesarios.  
    
****************************************************************************************************************  
El termostato inteligente thermoLearn le permite controlar el aprendizaje de hasta 8 zonas de calefacci�n, y establecer de forma autom�tica las consignas de temperatura que mejor se adapten a las costumbres del hogar, en funci�n de los d�as de la semana y de las estaciones.  
  
Su funcionamiento est� basado en los siguientes principios:  
  
El objetivo �ltimo del sistema es establecer consignas de temperatura de forma aut�noma, entre 1 y 8 consignas como m�ximo.  
El sistema de aprendizaje no permite controlar las partes "potencia/conmutaci�n" de la calefacci�n.  
S�lo proporciona las consignas de temperatura al sistema "potencia", por lo que puede ser del tipo hist�resis o PID, o DIY.  
El termostato inteligente debe aprender de forma continua en funci�n de las consignas establecidas por los usuarios bien manualmente, bien mediante reglas existentes.  
Es necesario disponer de un detector de presencia para cada una de las zonas definidas.  
Aprende de forma continua, incluso si el usuario no lo usa para establecer la consigna al final.  
   
En primer lugar, ponga el thermoLearn en modo User y seleccione manualmente las consignas  thermoLearn durante una o dos semanas.  
A continuaci�n, ponga el thermoLearn en modo Smart. De esta forma, seleccionar� por si mismo las consignas.  
Si la consigna establecida de forma autom�tica no es de su agrado, s�lo tiene que seleccionar manualmente la nueva consigna, tras lo cual el thermoLearn aprender� y volver al modo Smart autom�ticamente al cabo de 3 horas.  
El aprendizaje se hace m�s preciso y optimiza el consumo poco a poco, con el paso de los d�as, en funci�n de sus costumbres en cuanto a confort.  
  
El thermoLearn sincroniza su consigna con una consigna eedomus (consigna Zona de Calefacci�n o su propio estado de consigna).  
Debe establecer esta consigna en los par�metros, a trav�s de su c�digo API.  
Debe asegurarse de que todos los valores posibles de la consigna thermoLearn existen en la consigna Zona de Calefacci�n (a�ada las que no existan, en su caso).   

  
*Documentaci�n traducida al espa�ol por www.domoticadomestica.com (Philippe Rochette)  
  
  