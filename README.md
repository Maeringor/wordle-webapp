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

Es ist sinvoll in den Commit Messages die wichtigsten Änderungen zusammenzufassen. Sollte der Branch doch einmal von einem anderen Dev gezogen werden müssen, kann dieser Änderungen besser nachvollziehen.

### 💾 Folder:

#### Ordnernamen:
Ordner für HTML, CSS, JS werden klein geschrieben und dürfen keine Lehrzeichen sowie Sonderzeichen beinhalten (Außnahme "_").<br>
>**full_file_name ◽ Bsp.: styles oder styles_css und scripts, files/images**

Namen für Unterordner sind je nach Logik zu wählen. Beispielsweise sollte eine FAQ Seite im Ordernamen: <br>
>**/faq/faq.html**

zu finden sein.
Die genauere Ordnerstruktur findet sich in dem Abschnitt 🍮 HTML, CSS, JS wieder.

### 🍮 HTML, CSS, JS

#### HTML:

#### Tags
Für HTML gibt es nicht viele Conventions. Wichtig ist, dass "so viele Tags wie nötig, aber so wenig Tags wie möglich" verwendet werden. Die Hautsektionen im `body-Tag` sind: <br>
>**header, main, footer**

Im `header` wird das Menü mit Links beschrieben (mit PHP kann das einmalig in einer seperaten Datei definiert werden).<br>
Im `main` wird der Inhalt der Seite in `section-Tags` beschrieben. Sections sind das, was auf einer Webseite zu sehen ist, wenn sich der Inhalt ändert. Bekannt ist die Hero-Section. Diese ist das Erste, was ein User sieht, wenn er die Webseite aufruft.<br>
Im `footer` werden letzte Links und Anmerkungen gemacht. Meist fasst man auch die Links des `headers` darin nocheinmal geoordnet zusammen.<br><br>

#### Section-Struktur:
Tags werden immer klein geschrieben. Die normale Logik ist:

>main <br>
&nbsp;| <br>
&nbsp;__ section <br>
&nbsp; &nbsp; &nbsp;|<br>
&nbsp; &nbsp; &nbsp;__ div 1 <br>
&nbsp; &nbsp; &nbsp;|<br>
&nbsp; &nbsp; &nbsp;__ div 2 <br>

#### HTML-File Namen:
Namen werden klein geschrieben und sollten den Zweck der Seite beschreiben. Sonderzeichen und Leerzeichen sind nicht erlaubt (Außname "-").

>**index.html ◽ contact-infos.html**

#### Ordnerstruktur:
Die Ordnerstruktur ist wie folgt. Die Hauptseite `index.html` ist immer auf der Ebene mit der README.md File. Weitere Seiten werden in Ordnern eine oder mehrere Ebenen darunter zusammengefasst. Beispiel einer Struktur:

>README.md <br>
index.html <br>
&nbsp;| <br>
&nbsp;__ support <br>
&nbsp; &nbsp; &nbsp;| <br>
&nbsp; &nbsp; &nbsp;__ contact.html <br>
&nbsp; &nbsp; &nbsp;| <br>
&nbsp; &nbsp; &nbsp;__ faq.html <br>

Sollte es keine sinnvollen Gruppen geben, werden einfach die Namen der Seiten genommen und die Ordner, wie in **💾 Folder** beschrieben, benannt.

#### CSS:
CSS ist eng mit HTML verbunden, denn ohne HTML würde CSS wenig Sinn ergeben. Wichitg sind Klassen in CSS, diese lassen sich direkt in `HTML-Tags` einfügen. Wichtig ist, dass Klassen sinnvoll genutzt werden. Beispeilsweise kann man `styles` vielleicht mehrfach verwenden, weil eine Struktur aus HTML (mit geschachtelten `divs`) auf zwei Seiten oder sogar in zwei Sektionen auf einer Seite 1:1 erneut auftritt. Ziel ist so wenig redundanten Code wie möglich zu schreiben. Das ist auch der Grund dafür, dass es meist eine oder mehrer zentrale Dateien gibt, in der global geltende `styles` festgelegt werden.<br><br>
In diesem Projekt werden wir globale `styles` in 
>**design.css**

ablegen. Bei neuen Einträgen immer die Funktion mit Kommentaren beschreiben und nicht einfach Einträge löschen.<br><br>
Seitenspezifische Designs werden in einer CSS Datei mit dem Namen der Seite geschrieben. Der Name wird vollstädnig klein geschrieben und bei mehreren Wörtern einfach aneinander gehängt. Sonderzeichen sind nicht erlaubt.

>**FAQ Designs in faq.css ◽ globalstyles.css**

Die Struktur ist:

>css
&nbsp;| <br>
&nbsp;__ design.css <br>
&nbsp;| <br>
&nbsp;__ landingpage <br>
&nbsp; &nbsp; &nbsp;| <br>
&nbsp; &nbsp; &nbsp;__ index.css <br>
&nbsp;| <br>
&nbsp;__ special_styles <br>

Klassennamen sind so zu wählen, dass sie die Funktion der `section`, des `divs`, `links`, etc. beschreiben. Beispiel cta (call to action) Button in `index.html`:
> **&lt;a href="/wordle/wordle-game.html class="cta-button blue-button"&gt;**