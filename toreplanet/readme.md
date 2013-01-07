Calcul des coordonnées des tuiles hexagonales
=============================================

La planète est un tore
----------------------

### Mise à plat du tore

Visuellement, le tore ressemble à un beignet.
Prendre un rectangle, identifier les deux bords pour former un cylindre, puis identifier les deux extrémités du cylindre, pour former le tore.
(x² + y² + z² + R² - r²)² = 4R²(x² + y²)²

### Coordonnées du tore
x = cos ( s ) ( R+ r.cos ( t ))
y = sin ( s ) ( R+ r.cos ( t ))
z = r.sin ( t )
Avec 2 constantes : 
* R le rayon majeur
* r le rayon mineur
avec s,t appartiennent à [0,2pi).

### coordonées cartésiennes du tore

(R - sqrt(x² + y²))² + z² = r²
ou
R² - 2.R.sqrt(x² + y²) + x² + y² + z² -r² = 0
soit

### Nombre de tuiles

chaque ligne de la carte possède le même nombre de tuile.

Pour simplifier, nous prendrons:
* 36 hexagones par ligne
* 36 lignes, donc 952 hexagones

Coordonnées
-----------

### Latitude

les "pôles" seront disposés en +/-18 et 0.

### Longitude

de -18 à +18.
* La carte s'étend de -180° Ouest à +180° Est.

Nous connaissons le nombre de tuiles de chaque rangée.

En divisant 360° par le nombre d'hexagones de la ligne nous connaissons le nombre de degrés entre les hexagones de cette rangée.
Ensuite, nous avons besoin de connaître la position du premier hexagone de chaque rangée.

A partir de la 1ère rangée, l'hexagone le plus à gauche est contre le bord gauche de la carte (la marque -180°). Par conséquent, le centre de cet hexagone est -180° + (360°/36)/2 = -175°.
Le deuxième hexagone de la rangée à son centre en -171° + (360°/20) = -153°.

La deuxième rangée commence de sur la moitié de l'hexagone, donc sa longitude est -180°.
L'hexagone suivant est -180° + (360°/20)  = -162°

Chaque ligne se poursuit ensuite d'alternance entre sa première tuile décélée ou non par rapport à -180°.

Exploitation
------------

### Cas particulier de la couture

La distance entre 2 cases est :
  d = max ( |x1-x2| , |y1-y2| , |z1-z2| )

```
              .             .
            /   \         /   \
          /       \     /       \
      \ /           \ /           \ 
       |             |             |
       |     1,17    |     1,18    |
       |             |             |
      / \           / \           / \
    /     \       /     \       /     \
  /         \   /         \   /         \
|             |             |             |
|   0,17      |    0,18     |     0,-17   |
|             |             |             |
  \         /   \         /   \          /
    \     /       \     /       \      /
      \ /           \ /           \  /
       |             |             |
       |    -1,18    |    -1,-17   |
       |             |             |
        \           / \           /
          \       /     \       /
            \ . /         \ . /

```
donc pour se rendre de (0,18) à (-1,-17) il faut :
d = max (| 0 - -1 |, | 18 - -17 |, | (0-18) - (-1-17) |)
d = max (1, 1, 0)
d = 1

donc pour se rendre de (1,17) à (-1,18) il faut :
d = max (| 1 - -1 |, | 17 - 18|, | (-1-17) - (1-18) |)
d = max (2, 1, 1)
d = 2

