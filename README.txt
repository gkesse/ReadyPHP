//===============================================
// WampServer Telechargement
//===============================================
http://www.wampserver.com/
https://sourceforge.net/projects/wampserver/files/
https://sourceforge.net/projects/wampserver/files/WampServer%202/
https://sourceforge.net/projects/wampserver/files/WampServer%202/Wampserver%202.5/

//===============================================
// WampServer Autoriser Virtual Host
//===============================================
C:\wamp\bin\apache\apache2.4.17\conf\httpd.conf
Decommenter
LoadModule vhost_alias_module modules/mod_vhost_alias.so
Include conf/extra/httpd-vhosts.conf

//===============================================
// WampServer Configurer Port Virtual Host 
//===============================================
C:\wamp\bin\apache\apache2.4.17\conf\httpd.conf
Listen 0.0.0.0:8800
Listen [::0]:8800

//===============================================
// WampServer Configurer Serveur Virtual Host 
//===============================================
C:\wamp\bin\apache\apache2.4.17\conf\extra\httpd-vhosts.conf
<VirtualHost *:8800>
    ServerName www.readydev.com
    ServerAdmin gerard.kesse@outlook.fr
    DocumentRoot "C:\Users\sabine\Downloads\Gerard\Programs\ReadyDev"
        <Directory "C:\Users\sabine\Downloads\Gerard\Programs\ReadyDev">
            Options All
            AllowOverride All
            Order allow,deny
            allow from all
            Require all granted
        </Directory>
</VirtualHost>

//===============================================
// Facebook Créer Application
//===============================================
Mes Applications
Ajouter une Application
Nom d’usage
ReadyStock
Adresse e-mail de contact
kernelly.blavatsky@outlook.fr
Créer un ID App
Code
Envoyer
ID de l’APP
174224726598769
Clé secrète
d0a7df28bc4b8b76bda3c29d7e94f138
