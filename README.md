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
Branches werden von jedem Dev zu einem neuen Feature (Issue) erstellt. Der *master* Branch ist der Hauptbranch (aktuell produktiv). Jeder Dev erstellt zu einem neuen Feauture einen neuen Branch, nach Schema: <br>
>**IS:1_BUCHSTABE_VORNAME branch name ◽ BSP.: IS:M login system**

Nachdem ein Feature fertig entwickelt und getestet ist, wird der Branch durch einen Pull-Request in den master gemerget.
Wichitg, ein solcher Feature-Branch darf auch nicht von anderen Devs bearbeitet werden. D.h. nur der Inhaber darf auf seinen Featrue-Branch comitten. In Absprache natürlich erlaubt.

#### Commits:
Commits sollten regelmäßig auf den jeweiligen Feature-Branch stattfinden. Eine Commit Message wird wie folgt aufgebaut: <br>
>**IS:1_BUCHSTABE_VORNAME Nachricht nach belieben ◽ Bsp.: IS:M Änderungen an der README.md File**

Es ist sinvoll in den Commit Messages die wichtigsten Änderungen zusammenzufassen, sollte der Branch doch einmal von einem anderen Dev gezogen werden müssen.

### 💾 Folder:

#### Ordnernamen:
Ordner für HTML, CSS, JS werden klein geschrieben und sollen keine Lehrzeichen sowie Sonderzeichen beinhalten (Außnahme "_").<br>
>**full_file_name ◽ Bsp.: styles oder styles_css und scripts, files/iamges**

Namen für Unterordner sind je nach Logik zu wählen. Beispielsweise sollte eine FAQ Seite im Ordernamen: <br>
>**/faq/FAQ.html**

zu finden sein.
Die genauere Ordnerstruktur findet sich in dem Abschnitt 🍮 HTML, CSS, JS wieder.

### 🍮 HTML, CSS, JS

#### HTML:
Für HTML gibt es nicht viele Conventions. Wichtig ist, dass "so viele Tags wie nötig, aber so wenig Tags wie möglich" verwendet werden. Die Hautsektionen im `body-Tag` sind: <br>
>**header, main, footer**

Im `header` wird das Menü mit Links beschrieben (mit PHP kann das einmalig in einer seperaten Datei definiert werden).<br>
Im `main` wird der Inhalt der Seite in `section-Tags` beschrieben. Sections sind das, was auf einer Webseite zu sehen ist, wenn sich der Inhalt ändert. Bekannt ist die Hero-Section. Diese ist das Erste, was ein User sieht, wenn er die Webseite aufruft.<br>
Im `footer` werden letzte Links und Anmerkungen gemacht. Meist fasst man auch die Links des `headers` darin nocheinmal geoordnet zusammen.<br>
Tags werden immer klein geschrieben. Die normale Logik ist:

>main <br>
&nbsp;| <br>
&nbsp;__ section <br>
&nbsp; &nbsp; &nbsp;|<br>
&nbsp; &nbsp; &nbsp;__ div 1 <br>
&nbsp; &nbsp; &nbsp;|<br>
&nbsp; &nbsp; &nbsp;__ div 2 <br>