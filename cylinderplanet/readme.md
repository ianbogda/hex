Calcul des coordonnées des tuiles hexagonales
=============================================

La planète est un cylindre
--------------------------

### Mise à plat du cylindre

C'est une carte normale hormis une couture en +/-180° de longitude.

Les pôles sont infranchissables.

### Nombre de tuiles

chaque ligne de la carte possède le même nombre de tuile.

Prenons :
* 36 hexagones par ligne
* 10 lignes, donc 360 hexagones

Coordonnées
-----------

### Latitude

Les pôles sont en -5 et 5.

### Longitude

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

Est-ce que les coordonnés cubiques sont applicables sur le thor dans le système décrit ci-avant ?

### Cas particulier de la couture

La distance entre 2 cases est :
  d = max ( |x1-x2| , |y1-y2| , |z1-z2| )
La terre est cylindrique donc l faut modifier la formule
  d = max ( |x1-x2|, T mod ( |y1-y2| ) , T mod ( |z1-z2| ) )   où T est le nombre de tuiles.

```
              .             .
            /   \         /   \
          /       \     /       \
      \ /           \ /           \ 
       |             |             |
       |     1,35    |     1,0     |
       |             |             |
      / \           / \           / \
    /     \       /     \       /     \
  /         \   /         \   /         \
|             |             |             |
|   0,35      |    0,0      |     0,1     |
|             |             |             |
  \         /   \         /   \          /
    \     /       \     /       \      /
      \ /           \ /           \  /
       |             |             |
       |     -1,0    |    -1,1     |
       |             |             |
        \           / \           /
          \       /     \       /
            \ . /         \ . /

```
donc pour se rendre de (0,0) à (-1,1) il faut :
d = max (0, | 0 - -1 |, 0)
d = max (0, 1, 0)
d = 1

donc pour se rendre de (1,35) à (-1,1) il faut :
d = max (36 mod (| 1 - -1 |), 36 mod (| 35 - 1|), 36 mod (|(-36) - 0 |))
d = max (2, 36 mod 34, 36 mod 36)
d = max (2, 2, 0)
d = 2
