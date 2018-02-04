**Gestion d'un thermostat virtuel intelligent "nest-like" pour eedomus**  
  
*Installation:*  
1/ T�l�charger le script thermolearn.php et le fichier ddl.sql depuis le GitHub  https://github.com/influman/eedomus_ThermoLearn  
2/ Cr�er une base de donn�e "thermoLearnv1" sur votre serveur MySql et importer le fichier "ddl.sql" pour la cr�ation des tables (via phpMyAdmin par exemple)  
3/ Le script "thermolearn.php" est �installer sur votre  serveur web/php (pas sur la box eedomus donc),
dans un dossier /thermoLearn  
4/ Modifier le script thermolearn.php afin d'y renseigner vos param�tres d'acc�s � l'API eedomus et vos param�tres d'acc�s � la base de donn�e "thermoLearn"  
  
    //*************************************** API eedomus *********************************  
    // Identifiants de l'API eeDomus  
    $api_user = "XXXXXX"; //ici saisir api user  
    $api_secret = "yyyyyyyyyyyyyyy";  //ici saisir api secret  
    //*************************************** Parametres bdd **************************  
    //server MySQL  
    $sqlserver='localhost';  
    //MySQL login  
    $sqllogin='root'; //ici saisir le user sql
    //MySQL password  
    $sqlpass='password'; //ici saisir le pass du user
    //MySQL dataBase  
    $dataBase='thermoLearnv1'; //base � cr�er  
  	
5/ Sur le store eedomus, installer le plug-in "thermoLearn", en renseignant :  
- l'ip d'acc�s au serveur php/mysql avec le chemin  
- le num�ro de la zone de chauffage contr�l�e par ce plug-in (1 � 8).  
- le d�tecteur de mouvement li� � cette zone  
- La consigne r�elle de Zone de Chauffage (ou votre propre consigne), qui sera synchronis�e par le thermoLearn  
Le script thermolearn_call.php est alors install� sur votre box. Il permet d'appeler le script d�port�, et d'y passer les arguments n�cessaires.  
  
  
****************************************************************************************************************  
Le thermostat int�lligent thermoLearn permet de g�rer l'apprentissage de 8 zones de chauffage au maximum,  
et de restituer automatiquement les consignes de temp�rature les plus adapt�es aux habitudes du foyer,  
en fonction des jours de la semaine, et des saisons.  
  
En voici les principes :  
  
Le syst�me a pour objectif final de fixer des consignes de temp�rature de mani�re autonome, de 1 � 8 consignes maximum.  
Les parties "puissance/commutation" des chauffages ne sont pas g�r�es via le syst�me d'apprentissage.   
Celui-ci ne fournit que les consignes de temp�rature au syst�me "puissance", qui peut donc �tre hyst�r�sis ou PID, ou DIY.  
Le thermostat intelligent doit apprendre en continue en fonction des consignes fix�es manuellement par les utilisateurs,   
soit manuellement, soit par r�gles existantes.  
Il a besoin d'un d�tecteur de pr�sence par zone d�finie.  
Il apprend en continue, m�me si ce n'est pas lui qui est utilis� pour fixer la consigne au final.  
  
Positionner d'abord le thermoLearn en mode User, et s�lectionner manuellement les consignes thermoLearn pendant une � deux semaines.  
Positionner ensuite le thermoLean en mode Smart, il s�lectionnera alors lui-m�me les consignes.  
Lorsque la consigne d�termin�e automatiquement ne vous convient pas, il suffit de s�lectionner manuellement la nouvelle consigne,  
et le thermoLearn apprendra, puis repassera en Smart automatiquement 3h plus tard.  
Au fil des jours, l'apprentissage s'affine et optimise votre consommmation, conform�ment � vos habitudes de confort.  
  
Le thermoLearn synchronise sa consigne avec une consigne eedomus (consigne Zone de Chauffage ou votre propre �tat de consigne).  
Cette consigne est � donner en param�tre via son code API.  
Il faut s'assurer que toutes les valeurs possibles de la consigne thermoLearn existent dans la consigne Zone de Chauffage, les rajouter le cas �ch�ant.  

  

