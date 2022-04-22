# wordle-webapp

Initialisierung des Projektes. Im folgenden Abschnitt ist der Convention-Guide für dieses Projekt angegeben.

## Conventions

### Übersicht (Inhalt):
* 🎫 Git-Hub
* 💾 Folder
* 🍮 HTML, CSS, JS
* 💻 PHP

<br>

### 🎫 Git-Hub:

#### Branches:
Branches werden von jedem Dev zu einem neuen Feature (Issue) erstellt. Der "master" Branch ist der Hauptbranch (aktuell produktiv). Jeder Dev erstellt zu einem neuen Feauture einen neuen Branch, nach Schema: <br>
>**IS:1_BUCHSTABE_VORNAME branch name ◽ BSP.: IS:M login system**

Nachdem ein Feature fertig entwickelt und getestet ist, wird der Branch durch einen Pull-Request in den master gemerget.
Wichitg, ein solcher Feature-Branch darf auch nicht von anderen Devs bearbeitet werden. D.h. nur der Inhaber darf auf seinen Featrue-Branch comitten. In Absprache natürlich erlaubt.

#### Commits:
Commits sollten regelmäßig auf den jeweiligen Feature-Branch stattfinden. Eine Commit Message wird wie folgt aufgebaut: <br>
>**IS:1_BUCHSTABE_VORNAME Nachricht nach belieben ◽ Bsp.: IS:M Änderungen an der README.md File**

Es ist sinvoll in den Commit Messages die wichtigsten Änderungen zusammenzufassen, sollte der Branch doch einmal von einem anderen Dev gezogen werden müssen.

### 💾 Folder:

#### Ordnernamen:
Ordner für HTML, CSS, JS werden klein geschrieben und sollen keine Lehrzeichen sowie spezielle Zeichen beinhalten.<br>
>**full_file_name ◽ Bsp.: styles oder styles_css oder styles_js**

Die Ordnerstruktur findet sich in dem Abschnitt 🍮 HTML, CSS, JS wieder.