## **Technisch ontwerp**

### **Technologieën**

Het word een dynamische website waar als er iets word gewijzigd kan je dat ook meteen zien. Bijvoorbeeld als een student zijn bedrijf aanpast dan kan je dat gelijk zien als je de pagina refreshed.

Omdat het een dynamische website is gaan we deze technologieën gebruiken:

\-    PHP 7.4

o  Dit maakt de pagina dynamisch en dit gaat samen praten met onze database. We gaan ook headers gebruiken om alles vloeiend te laten lopen.

\-    MySQL

o  Dit maakt de pagina’s met de database samenwerken, waar dat nodig is.

\-    HTML/CSS

o  Dit maakt het zodat wij wel iets kunnen zien in de pagina’s en het kunnen opmaken om zo mooi mogelijk te maken.

\-    MariaDB

o  Dit gebruiken wij om een relationele database te maken om tabelen met elkaar te kunnen laten werken.

Dit zijn allemaal talen die wij kunnen gebruiken en toepassen

### **Database ontwerp**

![img](file:///C:/Users/THOMVE~1/AppData/Local/Temp/msohtmlclip1/01/clip_image002.jpg)

Dit zijn alle tabellen die in de database komen. Er is een tabel voor studenten, docenten, bedrijven en een evaluatie van een bedrijf. De oranje gekleurde cellen geven aan dat ze verbonden zijn met een ander ID uit een andere tabel, hier zie je dat Mentor_ID verbonden hoort te zijn met ID_Mentor van de mentor tabel enzovoorts. De geel gekleurde cellen geven aan dat het een primaire sleutel is van een tabel.



 

## **Inhoud**

Het eerste wat je ziet is een index pagina waar je links hebt naar handige websites om stage plekken te kunnen zien en een link naar tips om te solliciteren. Als je bent ingelogd kan je of naar de mentor homepagina komen of naar de studentenhoofdpagina. De mentor pagina kan een overzicht zien van zijn of haar klas, waar die ook naar een detailpagina kan gaan van een van zijn studenten. Bij de studenten homepagina kan de ingelogde student zien bij welk bedrijf hij of zij zit, daar kan hij ook een evaluatie toevoegen en zijn bedrijf aanpassen, verwijderen en/of toevoegen. Als de student een bedrijf heeft toegevoegd ziet de mentor dat gelijk.
 Je kan via elke pagina uitloggen. De detailpagina die de mentor kan zien is ongeveer hetzelfde wat de student kan zien op zijn of haar homepagina.

 

## **Doel- en doelgroep**

Het is de bedoeling dat dit word gebruikt door studenten en mentoren, om overzicht te houden van hun stages (of de studenten hun stages). De bedoeling is het om het makkelijker te maken voor mentoren en studenten om hun stages bij te houden. En vooral voor de mentor om te zien wie er wel en wie er nog geen stage hebben om hulp of vragen te stellen waarom.