Calcul des coordonnées des tuiles hexagonales
=============================================

La planète est un cylindre
--------------------------

### Mise à plat du cylindre

C'est une carte normale hormis une couture en +/-180° de longitude.

### Nombre de tuiles

chaque ligne de la carte possède le même nombre de tuile.

Prenons :
* 20 hexagones par ligne
* 24 lignes, donc 480 hexagones

Coordonnées
-----------

### Latitude

Il y a 22 rangées de cases.

Ayant choisit d'avoir des hexagones alignés horizontalement, toutes les cases de chaque rangée sont à la même latitude.

La première rangée est en +90°, la dernière en -90°

Le décalage de latitude d'une rangée vers la suivante est 180°/24 = 7.5°

Donc la deuxième rangée est en 90° - (180°/24) = 82.5°.


### Longitude

Le calcul des longitudes est légèrement plus complexe.

Nous connaissons le nombre de tuiles de chaque rangée.

En divisant 360° par le nombre d'hexagones de la ligne nous connaissons le nombre de degrés entre les hexagones de cette rangée.
Ensuite, nous avons besoin de connaître la position du premier hexagone de chaque rangée.
* La carte s'étend de -180° Ouest à +180° Est.

A partir de la 1ère rangée, l'hexagone le plus à gauche est contre le bord gauche de la carte (la marque -180°). Par conséquent, le centre de cet hexagone est -180° + (360°/20)/2 = -171°.
Le deuxième hexagone de la rangée à son centre en -171° + (360°/20) = -153°.

La deuxième rangée commence de sur la moitié de l'hexagone, donc sa longitude est -180°.
L'hexagone suivant est -180° + (360°/20)  = -162°

Chaque ligne se poursuit ensuite d'alternance entre sa première tuile décélée ou non par rapport à -180°.

