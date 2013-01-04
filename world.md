Quel monde doit-on généré ?
===========================

Nous avons trois possibilités : 
  + un disquemonde
  + un cylindre
  + Une planete

## Le disquemonde

Le disquemonde est plus simple à gérer, sa modélisation correspondt très facilement avec un modèle BDD classique.

Un simple systeme (x,y) suffit.

## Le cylindre

Le cylindre est presque aussi simple à gérer que le disque monde, il faut préter attention à la couture.

## Une planète

### Modélisation selon un d20

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

### Continuons la simplification

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
