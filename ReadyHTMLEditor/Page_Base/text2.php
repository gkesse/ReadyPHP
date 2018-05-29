<br><div class="pgCt00"><div class="bgra"><h1 class="bgra pgCt20 txac  Title1" id="Sommaire"><a class="clrb" href="#">Sommaire</a></h1><div class="txal pgCt10"><div class="dibm Summary1"><div class="pdlb"><span class="fa fa-book clrg pdra"></span><a class="clrg" href="#Introduction">Introduction</a></div><div class="pdlb"><span class="fa fa-book clrg pdra"></span><a class="clrg" href="#Auteur">Auteur</a></div><div class="pdlb"><span class="fa fa-book clrg pdra"></span><a class="clrg" href="#Installation sous Windows avec MinGW">Installation sous Windows avec MinGW</a></div><div class="pdlb"><span class="fa fa-book clrg pdra"></span><a class="clrg" href="#Compilation d’un projet C++ avec MinGW">Compilation d’un projet C++ avec MinGW</a></div><div class="pdlb"><span class="fa fa-book clrg pdra"></span><a class="clrg" href="#Comprendre la structure d’un fichier Makefile">Comprendre la structure d’un fichier Makefile</a></div></div></div></div></div><br><div class="pgCt00"><div class="bgra"><h1 class="bgra pgCt20 txac  Title1" id="Introduction"><a class="clrb" href="#Sommaire">Introduction</a></h1><div class="txal pgCt10">Le C++ est un langage de programmation orienté objet. Le but de ce tutoriel est de vous apprendre le C++.</div></div></div><br><div class="pgCt00"><div class="bgra"><h1 class="bgra pgCt20 txac  Title1" id="Auteur"><a class="clrb" href="#Sommaire">Auteur</a></h1><div class="txal pgCt10">Je suis <b>Gerard KESSE</b>, <br>Ingénieur en Développement Informatique C/C++/Qt, <br>Avec à la fois des compétences en Systèmes Embarqués et en Robotique.<br><br>Formé à Polytech'Montpellier, Je suis un professionnel de conception de projets logiciel applicatif ou embarqué dans les secteurs de l'Aéronautique, de la Robotique, des Drones et de la Vision par Ordinateur. Aussi, Je reste ouvert à d'autres types de secteurs tels que l'Énergie et les Finances.<br><br>Les Sciences de l’Ingénieur sont au cœur du métier d’ingénieur. Sur le site <br><b>ReadyDev</b>, la Plateforme de Développement Continu, dont j'en suis le concepteur, vous trouverez des cours et des tutoriels adaptés aux sciences de l’ingénieur.<br><br><div class="dibm Shift"><div class="dibm pdld ShiftB"><div class="dibm Shift"><div class="dibm pdld ShiftB"><div class="dibm Shift"><div class="dibm pdld ShiftB"><div class="dibm Shift"><div class="dibm pdld ShiftB"><div class="dibm Shift"><div class="dibm pdld ShiftB"><div class="dibm Shift"><div class="dibm pdld ShiftB"><div class="dibm Shift"><div class="dibm pdld ShiftB">J'aime, Je partage.<br><br><b>Gérard KESSE</b><div class="txal ovfa"><div class="txal ovfa"><div class="txal ovfa"><img src="readydev.png" alt="Image.png"></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div><br><br><br><br></div></div></div><br><div class="pgCt00"><div class="bgra"><h1 class="bgra pgCt20 txac Title1" id="Installation sous Windows avec MinGW"><a class="clrb" href="#Sommaire">Installation sous Windows avec MinGW</a></h1><div class="txal pgCt10"><div class="dibm Summary2"><div class="pdlb"><span class="fa fa-book clrg pdra"></span><a class="clrg" href="#Téléchargements">Téléchargements</a></div><div class="pdlb"><span class="fa fa-book clrg pdra"></span><a class="clrg" href="#Installation de MinGW">Installation de MinGW</a></div><div class="pdlb"><span class="fa fa-book clrg pdra"></span><a class="clrg" href="#Installation de Notepad++">Installation de Notepad++</a></div></div><br><br><h2 class="ftwn Title2" id="Téléchargements"><a class="bgra dibm ftfb ftsg clra pgCt10" href="#Installation sous Windows avec MinGW">Téléchargements</a></h2><br><b>Notepad++ :</b><br>https://notepad-plus-plus.org/fr/<br><br><b>MinGW :</b><br>http://www.mingw.org/<br><br><h2 class="ftwn Title2" id="Installation de MinGW"><a class="bgra dibm ftfb ftsg clra pgCt10" href="#Installation sous Windows avec MinGW">Installation de MinGW</a></h2><br><b>Packages MinGW :</b><br>mingw33-base<br>mingw32-gcc-g++<br><br><h2 class="ftwn Title2" id="Installation de Notepad++"><a class="bgra dibm ftfb ftsg clra pgCt10" href="#Installation sous Windows avec MinGW">Installation de Notepad++</a></h2><br><b>Plugins Notepad++ :</b><br>TextFX<br>NppExport</div></div></div><br><div class="pgCt00"><div class="bgra"><h1 class="bgra pgCt20 txac Title1" id="Compilation d’un projet C++ avec MinGW"><a class="clrb" href="#Sommaire">Compilation d’un projet C++ avec MinGW</a></h1><div class="txal pgCt10"><div class="dibm Summary2"><div class="pdlb"><span class="fa fa-book clrg pdra"></span><a class="clrg" href="#Compiler un projet C++ avec un seul fichier source">Compiler un projet C++ avec un seul fichier source</a></div><div class="pdlb"><span class="fa fa-book clrg pdra"></span><a class="clrg" href="#Compiler un projet C++ avec plusieurs fichiers sources">Compiler un projet C++ avec plusieurs fichiers sources</a></div><div class="pdlb"><span class="fa fa-book clrg pdra"></span><a class="clrg" href="#Compiler un projet C++ à partir d’un fichier Makefile">Compiler un projet C++ à partir d’un fichier Makefile</a></div></div><br><br><h2 class="ftwn Title2" id="Compiler un projet C++ avec un seul fichier source"><a class="bgra dibm ftfb ftsg clra pgCt10" href="#Compilation d’un projet C++ avec MinGW">Compiler un projet C++ avec un seul fichier source</a></h2><br><b>Objectif :</b><br>Compiler un projet C++ avec un seul fichier source.<br><br><b>Implémentation :</b><br>Afficher un message dans la console (Bonjour tout le monde).<br><br><b>Résultat :</b><br><br><br><b>Dossier projet :</b><br>src/main.cpp<br>win/bin/<br>win/build/<br><br><b>src/main.cpp</b><br>//===============================================<br>#include<br>//===============================================<br>using namespace std;<br>//===============================================<br>int main(int argc, char** argv) {<br>cout &lt;&lt; "Bonjour tout le monde\n";<br>return 0;<br>}<br>//===============================================<br><br><b>Compilation du projet :</b><br>del /q bin\* build\*<br>g++ -c src/main.cpp -o build/main.o<br>g++ -o bin/GProject.exe build/main.o<br><br><b>Exécution du projet :</b><br>bin/GProject.exe<br><br><h2 class="ftwn Title2" id="Compiler un projet C++ avec plusieurs fichiers sources"><a class="bgra dibm ftfb ftsg clra pgCt10" href="#Compilation d’un projet C++ avec MinGW">Compiler un projet C++ avec plusieurs fichiers sources</a></h2><br><b>Objectif :</b><br>Compiler un projet C++ avec plusieurs fichiers sources.<br><br><b>Implémentation :</b><br>Afficher un message dans la console (Bonjour tout le monde).<br><br><b>Résultat :</b><br><br><b><br>Dossier projet :</b><br>src/main.cpp<br>src/manager/hello.h<br>src/manager/hello.cpp<br>win/bin/<br>win/build/<br><br><b>src/main.cpp</b><br>//===============================================<br>#include "hello.h"<br>//===============================================<br>int main(int argc, char** argv) {<br>sayHello();<br>return 0;<br>}<br>//===============================================<br><br><b>src/manager/hello.h</b><br>//===============================================<br>#ifndef _hello_<br>#define _hello_<br>//===============================================<br>#include<br>//===============================================<br>using namespace std;<br>//===============================================<br>void sayHello();<br>//===============================================<br>#endif<br>//===============================================<br>src/manager/hello.cpp<br>//===============================================<br>#include "hello.h"<br>//===============================================<br>void sayHello() {<br>cout &lt;&lt; "Bonjour tout le monde\n";<br>}<br>//===============================================<br><br><b>Compilation du projet :</b><br>del /q bin\* build\*<br>g++ -c ..\src\main.cpp -o build\main.o<br>-I..\src\manager<br>g++ -c ..\src\manager\hello.cpp -o build\hello.o<br>-I..\src\manager<br>g++ -o bin\GProject.exe build\main.o build\hello.o<br><br><b>Exécution du projet :</b><br>bin/GProject.exe<br><br><h2 class="ftwn Title2" id="Compiler un projet C++ à partir d’un fichier Makefile"><a class="bgra dibm ftfb ftsg clra pgCt10" href="#Compilation d’un projet C++ avec MinGW">Compiler un projet C++ à partir d’un fichier Makefile</a></h2><br><b>Objectif :</b><br>Compiler un projet C++ à partir d’un fichier Makefile.<br><br><b>Implémentation :</b><br>Afficher un message dans la console (Bonjour tout le monde).<br><br><b>Résultat :</b><br><br><br><b>Dossier projet :</b><br>src/main.cpp<br>src/manager/hello.h<br>src/manager/hello.cpp<br>win/Makefile<br>win/bin/<br>win/build/<br><br><b>src/main.cpp</b><br>//===============================================<br>#include "hello.h"<br>//===============================================<br>int main(int argc, char** argv) {<br>sayHello();<br>return 0;<br>}<br>//===============================================<br><br><b>src/manager/hello.h</b><br>//===============================================<br>#ifndef _hello_<br>#define _hello_<br>//===============================================<br>#include<br>//===============================================<br>using namespace std;<br>//===============================================<br>void sayHello();<br>//===============================================<br>#endif<br>//===============================================<br><br><b>src/manager/hello.cpp</b><br>//===============================================<br>#include "hello.h"<br>//===============================================<br>void sayHello() {<br>cout &lt;&lt; "Bonjour tout le monde\n";<br>}<br>//===============================================<br><br><b>win/Makefile :</b><br>all: build\main.o build\hello.o<br>g++ -o bin\GProject.exe build\main.o build\hello.o<br>build\main.o: ..\src\main.cpp<br>g++ -c ..\src\main.cpp -o build\main.o -I..\src\manager<br>build\hello.o: ..\src\manager\hello.cpp<br>g++ -c ..\src\manager\hello.cpp -o build\hello.o -I..\src\manager<br>clean:<br>del /q bin\* build\*<br><br><b>Compilation du projet :</b><br>mingw32-make clean<br>mingw32-make<br><br><b>Exécution du projet :</b><br>bin/GProject.exe </div></div></div><br><div class="pgCt00"><div class="bgra"><h1 class="bgra pgCt20 txac Title1" id="Comprendre la structure d’un fichier Makefile"><a class="clrb" href="#Sommaire">Comprendre la structure d’un fichier Makefile</a></h1><div class="txal pgCt10"><div class="dibm Summary2"><div class="pdlb"><span class="fa fa-book clrg pdra"></span><a class="clrg" href="#Optimiser la structure d’un fichier Makefile">Optimiser la structure d’un fichier Makefile</a></div></div><br><br><h2 class="ftwn Title2" id="Optimiser la structure d’un fichier Makefile"><a class="bgra dibm ftfb ftsg clra pgCt10" href="#Comprendre la structure d’un fichier Makefile">Optimiser la structure d’un fichier Makefile</a></h2><br><b>Objectif :</b><br>Écrire un fichier Makefile optimisé.<br>Créer des macros dans un fichier Makefile.<br><br><b>Implémentation :</b><br>Afficher un message dans la console (Bonjour tout le monde).<br><br><b>Résultat :</b><br> <br><br><b>Dossier projet :</b><br>src/main.cpp<br>src/manager/hello.h<br>src/manager/hello.cpp<br>win/Makeifle<br>win/bin/<br>win/build/<br><br><b>src/main.cpp</b><br>//===============================================<br>#include "hello.h"<br>//===============================================<br>int main(int argc, char** argv) {<br>	sayHello();<br>	return 0;<br>}<br>//===============================================<br><br><b>src/manager/hello.h</b><br>//===============================================<br>#ifndef _hello_<br>#define _hello_<br>//===============================================<br>#include <iostream><br>//===============================================<br>using namespace std;<br>//===============================================<br>void sayHello();<br>//===============================================<br>#endif<br>//===============================================<br><b><br>src/manager/hello.cpp</b><br>//===============================================<br>#include "hello.h"<br>//===============================================<br>void sayHello() {<br>	cout &lt;&lt; "Bonjour tout le monde\n";<br>}<br>//===============================================<br><br><b>Makefile :</b><br>GSRC = ..\src<br>GBIN = bin<br>GBUILD = build<br>GTARGET = $(GBIN)\GProject.exe<br><br>GINCS = \<br>	-I..\src\manager<br><br>GOBJS = \<br>	$(GBUILD)\main.o \<br>	$(GBUILD)\hello.o<br><br>all: $(GOBJS)<br>	g++ -o $(GTARGET) $(GOBJS)<br>$(GBUILD)\main.o: $(GSRC)\main.cpp<br>g++ -c $(GSRC)\main.cpp -o $(GBUILD)\main.o $(GINCS)<br>$(GBUILD)\hello.o: $(GSRC)\manager\hello.cpp<br>g++ -c $(GSRC)\manager\hello.cpp -o $(GBUILD)\hello.o $(GINCS)<br>clean:<br>	del /q $(GBIN)\* $(GBUILD)\*<br><br><b>Macros Makefile :</b><br>GSRC : répertoire des fichiers sources<br>GBIN : répertoire du fichier exécutable<br>GBUILD : répertoire de génération des fichiers objets<br>GTARGET : chemin du fichier exécutable<br>GINCS : liste de répertoires des fichiers entêtes<br>GOBJS : liste des fichiers objets<br><b><br>Compilation du projet :</b><br>mingw32-make clean<br>mingw32-make<br><br><b>Exécution du projet :</b><br>bin/GProject.exe<br></iostream></div></div></div><br>