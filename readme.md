Mécanismes
==========


Distance entre des case hexagonales
------------------------------------

### Coordonnées sur la carte hexagonale
```
  ___       ___
 /   \     /   \
/ 0,0 \___/ 2,0 \___
\     /   \     /   \
 \___/ 1,0 \___/ 3,0 \
 /   \     /   \     /
/ 0,1 \___/ 2,1 \___/
\     /   \     /   \
 \___/ 1,1 \___/ 3,1 \
 /   \     /   \     /
/ 0,2 \___/ 2,2 \___/
\     /   \     /   \
 \___/ 1,2 \___/ 3,2 \
 /   \     /   \     /
      \___/ 2,3 \___/
      /   \     /
     /     \___/
```
### Calcul de la distance entre 2 cases adjacantes
#### Problématique des abscisses paires ou impaires

Le calcul de la distance entre 2 cases adjacantes dépend de des coordonnées de la case de départ commme le montre les schémas ci-dessous.

Les coûts sont différents selon si l'abscisse est paire ou impaire.

```
       \___/          |         \___/
       /   \          |         /   \
  \___/ 0,- \___/     |    \___/ 0,- \___/
  /   \     /   \     |    /   \     /   \
_/ -,0 \___/ +,0 \_   |  _/ -,- \___/ +,- \_
 \     /   \     /    |   \     /   \     /
  \___/ 1,1 \___/     |    \___/ 2,2 \___/
  /   \     /   \     |    /   \     /   \
_/ -,+ \___/ +,+ \_   |  _/ -,0 \___/ +,0 \_
 \     /   \     /    |   \     /   \     /
  \___/ 0,+ \___/     |    \___/ 0,+ \___/
  /   \     /   \     |    /   \     /   \
       \___/          |         \___/
```

La gestion de formule pour calculer le coût de déplacement dépend de l'abscisse. tentons de simplifier le système.

#### Modification des axes afin que les abscisses et ordonnées soient sur des axes définis par 2 cotés adjacents de l'hexagone.
```
  ___
 /   \
/ 0,0 \___/
\     /   \
 \___/ 1,0 \___/
 /   \     /   \
/ 0,1 \___/ 2,0 \___/
\     /   \     /   \
 \___/ 1,1 \___/ 3,0 \
 /   \     /   \     /
/ 0,2 \___/ 2,1 \___/
\     /   \     /   \
 \___/ 1,2 \___/ 3,1 \
 /   \     /   \     /
/ 0,3 \___/ 2,2 \___/
\     /   \     /   \
 \___/ 1,3 \___/ 3,2 \
```

Cela permet en plus de se retrouver pour chaque case avec la configuration suivante :
```
       \___/          |         \___/
       /   \          |         /   \
  \___/ 0,- \___/     |    \___/ 0,- \___/
  /   \     /   \     |    /   \     /   \
_/ -,0 \___/ +,- \_   |  _/ -,0 \___/ +,- \_
 \     /   \     /    |   \     /   \     /
  \___/ 1,1 \___/     |    \___/ 2,2 \___/
  /   \     /   \     |    /   \     /   \
_/ -,+ \___/ +,0 \_   |  _/ -,+ \___/ +,0 \_
 \     /   \     /    |   \     /   \     /
  \___/ 0,+ \___/     |    \___/ 0,+ \___/
  /   \     /   \     |    /   \     /   \
       \___/          |         \___/
```
Même rège de déplacement pour chaque case. Ce qui est beaucoup plus simple à gérer.

#### Simplification du système en basculant en coordonées cubiques

Passons le tout en coordonnées cubique avec la contrainte **x+y+z=0**

La distance entre 2 cases est :
  d = max ( |x1-x2| , |y1-y2| , |z1-z2| )

```
  ______          ______
 /      \        /      \
/ 0,0,0  \______/ 2,-1,-1\______
\        /      \        /      \
 \______/ 1,0,-1 \______/ 3,-1,-2\
 /      \        /      \        /
/ 0,1,-1 \______/ 2,0,-2 \______/
\        /      \        /      \
 \______/ 1,1,-2 \______/ 3,0,-3 \
 /      \        /      \        /
/ 0,2,-2 \______/ 2,1,-3 \______/
\        /      \        /      \
 \______/ 1,2,-3 \______/ 3,1,-4 \
 /      \        /      \        /
/ 0,3,-3 \______/ 2,2,-4 \______/
\        /      \        /      \
 \______/ 1,3,-4 \______/ 3,2,-5 \
        \        /      \        /
         \______/ 2,3,-5 \______/
         /      \        /
                 \______/
```
donc pour se rendre de (2,0,-2) à (0,3,-3) il faut :

  d = ( | 2 - 0 | + | 0 - 3 | + | -(2-0) - (0-3)| ) / 2
  d = (     2     +     3     +     -2   +   3    ) / 2
  d = 6/2
  d = 3

La distance entre les 2 cases est de 3, ce qui est bon :)


Biomes
------

<table>
<thead>
<tr>
	<th rowspan="2">Zone d'Élevation</th>
	<th colspan="6">Zone d'humidité</th>
</tr>
<tr>
	<th>6<br>(humide)</th>
	<th>5</th>
	<th>4</th>
	<th>3</th>
	<th>2</th>
	<th>1<br>(aride)</th>
</tr>
</thead>
<tbody>
<tr>
	<th>4<br>(élevé)</th>
	<td colspan="3">NEIGE</td>
	<td>TUNDRA</td>
	<td>NU</td>
	<td>ROUSSI</td>
</tr>
<tr>
	<th>3</th>
	<td colspan="2">TAÏGA</td>
	<td colspan="2">ARBUSTIVES</td>
	<td colspan="2">DÉSERT TEMPÉRÉ</td>
</tr>
<tr>
	<th>2</th>
	<td>FORÊT TEMPERÉE HUMIDE</td>
	<td colspan="2">FORÊT TROPICALE A FEUILLES CADUQUES</td>
	<td colspan="2">PRAIRIE</td>
	<td>DÉSERT TEMPERÉ</td>
</tr>
<tr>
	<th>1<br>(bas)</th>
	<td colspan="2">FORÊT TROPICALE HUMIDE</td>
	<td colspan="2">FORÊT TROPICALE SAISONIÈRE</td>
	<td>PRAIRIE</td>
	<td>DÉSERT SUBTROPICAL</td>
</tr>
</tbody>
</table>


Programmer un parcours pour certaines unités
--------------------------------------------

Pour des considérations de jouabilité, il convient :
 . de sélectionner le point d'arrivée souhaité
 . de sélectionner des points intermédiaures ?
 . arrer le mouvement de l'unité lors de rencontre d'autres unités

### Calcul du chemin le moins couteux

#### A* Pathfinding

```
  ___
 /   \
/ 0,0 \___/
\     /   \
 \___/ 1,0 \___/
 /   \     /   \
/ 0,1 \___/ 2,0 \___/
\     /   \     /   \
 \___/ 1,1 \___/ 3,0 \
 /   \     /   \     /
/ 0,2 \___/ 2,1 \___/
\     /   \     /   \
 \___/ 1,2 \___/ 3,1 \
 /   \     /   \     /
/ 0,3 \___/ 2,2 \___/
\     /   \     /   \
 \___/ 1,3 \___/ 3,2 \
```

Pour se rendre de (0,0) à (2,2), quel est le chemin le court ?

##### Pseudo code
```
créer la liste ouverte de nœuds, contenant initialement que notre noeud de départ
créer la liste fermée des nœuds, initialement vide
Tant que (nous n'avons pas atteint notre objectif) {
  envisager la meilleure nœud dans la liste ouverte (le nœud avec la valeur plus faible f)
  si (ce noeud est le but) {
     nous avons terminé
  }
  sinon {
    déplacer le nœud actuel à la liste fermée et tenir compte de tous ses voisins
    pour (chaque voisin) {
      si (ce voisin est dans la liste fermée et notre valeur actuelle est inférieure à g) {
        mettre à jour le voisin avec la nouvelle inférieure, la valeur g
        changer parent du voisin à notre noeud courant
      }
      sinon si (ce voisin est dans la liste ouverte et notre valeur actuelle est inférieure à g) {
        mettre à jour le voisin avec la nouvelle inférieure, la valeur g
        changer parent du voisin à notre noeud courant
      }
      d'autre ce voisin n'est pas dans la liste soit ouverte ou fermée {
        ajouter le voisin à la liste ouverte et définissez sa valeur g
      }
    }
  }
}
```

Qeul monde doit-on généré ?
---------------------------

Nous avons trois possibilités : 
  + un disquemonde
  + un cylindre
  + Une planete

### Le disquemonde

Le disquemonde est plus simple à gérer, sa modélisation correspondt très facilement avec un modèle BDD classique.

Un simple systeme (x,y) suffit.

### Le cylindre

Le cylindre est presque aussi simple à gérer que le disque monde, il faut préter attention à la couture.

### Une planète

#### Modélisation selon un d20

Envisageons la modélisation différemment. Nous nous appuyerons sur le d20 (20 triangles équilatéraux).
```
     ___________ +90
    /\
   /  \_________ +30
  |    |
  |    |________ -30
   \  /
    \/__________ -90
```
```
 144  __   -144        +/-180
  72 /  \  - 72   108  /\  -108
	  \/           36 \__/  -36
	  0
```
Découpons chaque triangle en 20 hexagones de coté.

Cela nous fait : 60/20 = 3
Chaque hexagone est à 3° de son voisin d'est et d'ouest.

A l'équateur, nous avons une ligne de 5*20=100 hexagones.

La terre fait 360° de à l'équateur. Sur la base de 100 hexagones à l'équateur, cela fait 360/100=3,6
chaque hexagone est à 3,6° de son voisin d'est et d'ouest.

On perd un hexagone par ligne entre chaque triangle (puisqu'il y en a 5, nous perdons 5 hexagones par lignes).

Il y a 20 ligne Nord et 20 lignes Sud plus 20 lignes dans la partie équatoriale
Donc pour la partie Nord nous avons
```
105
100
95
90
85
80
…
20
15
10
5
```
soit 105 + (95+5) + (90+10) + … + (55+45) + 50 = 1055.

Pour chaque hemisphere hors tropiques, nous avons 20 hexa de haut et 100 hexa de circonférnece soit 20*100 = 2000 hexagones

Notre planete de compose d'un total de 1055 + 2000 = 3055 hexagones

#### Continuons la simplification

Il faut bien choisir l'orientation des hexagones. En effet, les hexagones peuvent être aligner selon 2 axes : 
  + horizontal
  + vertical

Nous choisirons un alignement horizontal afin de simplifier la modélisation : chaque ligne ou longitude est composée d'hexagones.
```
 -- Horizontal --->         |  Vertical
 / \ / \ / \ / \ / \        |  __    __
|   |   |   |   |   |       | /  \__/  \__/
 \ / \ / \ / \ / \ /        | \__/  \__/  \
  |   |   |   |   |         | /  \__/  \__/
 / \ / \ / \ / \ / \        | \__/  \__/  \
```
sources : 
* [Calculer les positions des hexagones](http://oldguygaming.com/calculating-the-hex-positions)
* [Modélisation d'une sphère en hexagones](http://oldguygaming.com/exporting-my-ft3-world-back-to-cc3)
