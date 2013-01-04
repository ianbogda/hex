Calcul des coordonnées des tuiles hexagonales
=============================================

La planète est un icosahèdre
----------------------------

### Mise à plat de l'icosahèdre

```
  -180°    -108°      -36°      36°       108°      180°
   |         |         |         |         |         |
   .         .         .         .         .         . . . +90° lat. -
   .\       /.\       /.\       /.\       /.\       /.                \  Nord
   . \     / . \     / . \     / . \     / . \     / .                 - 7 lignes d'hexagones
   .  \   /  .  \   /  .  \   /  .  \      .  \   /  .                /
   ____\./_______\./_______\./_______\./_______\./___. . . +30° lat. =
   .   /.\   .   /.\   .   /.\   .   / \   .   / \   .                \  Tropiques
   .  / . \  .  / . \  .  / . \  .  / . \  .  / . \  .                 - 7 lignes d'hexagones
   . /  .  \ . /  .  \ . /  .  \ . /  .  \ . /  .  \ .                /
   ./_______\./_______\./_______\./_______\./_______\. . . -30° lat. =
    \   .   / \   .   / \   .   / \   .   / \   .   /                  \  Sud
     \  .  /   \  .  /   \  .  /   \  .  /   \  .  /                   - 7 lignes d'hexagones
      \ . /     \ . /     \ . /     \ . /     \ . /                   /
       \ /       \ /       \ /       \./       \./ . . . . -90° lat. -
        |         |         |         |         |
      -144°      -72°       0°       72°       144°

```

### Nombre de tuiles

Subdivisons chaque triangle en hexagones.

Pour une base de 7 hexagones par côté de triangle, chaque ligne perd un hexagone.
Donc chaque triangle possède : 7+6+5+3+2+1 = 24 hexagones.

En zone équatoriale, nous avons :
* 7*5 = 35 hexagones par ligne
* 7 lignes, donc 245 hexagones

 Zone Nord      :  5*24 = 120
 Zone Sud       :  5*24 = 120
 Zone tropicale : 10*24 = 240

Nous avons un total de 480 hexagones dans notre icosahèdre. 
N'oublions pas les 12 sommets qui sont des pentagones que nous traiterons plus tard.

Nous avons donc 480+12 = 492 tuiles présentent dans ce système.

Coordonnées
-----------

### Latitude

Il y a 22 rangées de cases.

Ayant choisit d'avoir des hexagones alignés horizontalement, toutes les cases de chaque rangée sont à la même latitude.
À partir du centre de la première rangée (le pôle nord) vers le centre de la dernière rangée (le pôle sud) nous avons 180°.

Ce qui nous donne une différence de latitude entre chaque rangée de 180 / (22-1) ou 8,571428571°.

Nous avons le Pôle Nord en 90° et le Pôle Sud en -90°. Donc pour connaitre la latitude de la prochaine rangée, nous ajouterons 180/21 à l'actuelle rangée. Et ce pour chaque rangée.

### Longitude

Le calcul des longitudes est légèrement plus complexe.

Pour commencer, nous avons besoin de connaitre le nombre de tuiles de chaque rangée.
* Les première et dernière lignes (les pôles nord et sud) contient une seule tuile.
* Dans la zone nord, les lignes 2-7 contiennent de 5, 10, 15, 20, 25, et 30 hexagones.
* Dans la zone tropicale, les lignes 8-15 contiennent 35 hexagones chacune.
* Dans la zone sud, les lignes 16-21 contiennett 30, 25, 20, 15, 10 et 5 hexagones.

En divisant 360° par le nombre d'hexagones de la ligne nous connaissons le nombre de degrés entre les hexagones de cette rangée.
Ensuite, nous avons besoin de connaître la position du premier hexagone de chaque rangée.
* La carte s'étend de -180° Ouest à +180° Est.

#### zone nord / zone sud

A partir de la 2e rangée, l'hexagone le plus à gauche est contre le bord gauche de la carte (la marque -180°). Par conséquent, le centre de cet hexagone est -180° + (360°/5)/2 = -144°.
Le deuxième hexagone de la rangée à son centre en -144° + (360°/5) = 72°.

La troisième rangée commence sur la moitié de l'hexagone, donc sa longitude est -180°.
L'hexagone suivant est -180° + (360°/10)  = -216°

Chaque ligne se poursuit ensuite d'alternance entre sa première tuile décélée ou non par rapport à -180°.

#### zone tropicale

Le principe est le miême que pour les zone nord et sud.

### Résumé en tableau

<table>
<tr><th>Rangée</th><th>Latitude</th><th>Tuiles / Rangée</th><th>Longitude de Référence</th><th>Incrémentation</th></tr>
<tr><td>1</td> <td>90</td><td>1</td><td>0</td><td>-</td></tr>
<tr><td>2</td> <td>81.4285714285714</td><td>5</td><td>-144</td><td>72</td></tr>
<tr><td>3</td> <td>72.8571428571429</td><td>10</td><td>-180</td><td>36</td></tr>
<tr><td>4</td> <td>64.2857142857143</td><td>15</td><td>-168</td><td>24</td></tr>
<tr><td>5</td> <td>55.7142857142857</td><td>20</td><td>-180</td><td>18</td></tr>
<tr><td>6</td> <td>47.1428571428571</td><td>25</td><td>-172.8</td><td>14.4</td></tr>
<tr><td>7</td> <td>38.5714285714286</td><td>30</td><td>-180</td><td>12</td></tr>
<tr><td>8</td> <td>30</td><td>35</td><td>-174.857142857143</td><td>10.2857142857143</td></tr>
<tr><td>9</td> <td>21.4285714285714</td><td>35</td><td>-180</td><td>10.2857142857143</td></tr>
<tr><td>10</td><td>12.8571428571429</td><td>35</td><td>-174.857142857143</td><td>10.2857142857143</td></tr>
<tr><td>11</td><td>4.28571428571429</td><td>35</td><td>-180</td><td>10.2857142857143</td></tr>
<tr><td>12</td><td>-4.28571428571429</td><td>35</td><td>-174.857142857143</td><td>10.2857142857143</td></tr>
<tr><td>13</td><td>-12.8571428571429</td><td>35</td><td>-180</td><td>10.2857142857143</td></tr>
<tr><td>14</td><td>-21.4285714285714</td><td>35</td><td>-174.857142857143</td><td>10.2857142857143</td></tr>
<tr><td>15</td><td>-30</td><td>35</td><td>-180</td><td>10.2857142857143</td></tr>
<tr><td>16</td><td>-38.5714285714286</td><td>30</td><td>-180</td><td>12</td></tr>
<tr><td>17</td><td>-47.1428571428571</td><td>25</td><td>-180</td><td>14.4</td></tr>
<tr><td>18</td><td>-55.7142857142857</td><td>20</td><td>-180</td><td>18</td></tr>
<tr><td>19</td><td>-64.2857142857143</td><td>15</td><td>-180</td><td>24</td></tr>
<tr><td>20</td><td>-72.8571428571429</td><td>10</td><td>-180</td><td>36</td></tr>
<tr><td>21</td><td>-81.4285714285714</td><td>5</td><td>-180</td><td>72</td></tr>
<tr><td>22</td><td>-90</td><td>1</td><td>0</td><td>-</td></tr>
</table>

Exploitation
------------

Pour exploiter ce tableau, nous pouvons envisager une représentation différent :

```json
[
{"map":[
{"tile_id":1,"row":1,"lat":90,"lon":0,"type_id":1},
{"tile_id":2,"row":2,"lat":81.43,"lon":-144,"type_id":1},
{"tile_id":3,"row":2,"lat":81.43,"lon":-72,"type_id":1},
{"tile_id":4,"row":2,"lat":81.43,"lon":0,"type_id":2},
{"tile_id":5,"row":2,"lat":81.43,"lon":72,"type_id":1},
{"tile_id":6,"row":2,"lat":81.43,"lon":144,"type_id":2},
{"tile_id":7,"row":3,"lat":72.86,"lon":-180,"type_id":2},
{"tile_id":7,"row":3,"lat":72.86,"lon":-144,"type_id":3},
…
{"tile_id":492,"row":22,"lat":-90,"lon":0,"type_id":1}
],
"hex_eaquateur":35}
]
```
