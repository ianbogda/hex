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

Prenons :
* 20 hexagones par ligne
* 36 lignes, donc 480 hexagones

Coordonnées
-----------

### Latitude


### Longitude

Exploitation
------------

Est-ce que les coordonnés cubiques sont applicables sur le thor dans le système décrit ci-avant ?

### Cas particulier de la couture

La distance entre 2 cases est :
  d = max ( |x1-x2| , |y1-y2| , |z1-z2| )

```
              .             .
            /   \         /   \
          /       \     /       \
      \ /           \ /           \ 
       |             |             |
       |   7.5,-166  |   7.5,162   |
       |             |             |
      / \           / \           / \
    /     \       /     \       /     \
  /         \   /         \   /         \
|             |             |             |
|   0,-162    |    0,180    |     0,162   |
|             |             |             |
  \         /   \         /   \          /
    \     /       \     /       \      /
      \ /           \ /           \  /
       |             |             |
       |  -7.5,-166  |  -7.5,162   |
       |             |             |
        \           / \           /
          \       /     \       /
            \ . /         \ . /

```
donc pour se rendre de (0,180) à (-7.5,162) il faut :


donc pour se rendre de (0,-180) à (0,-162) il faut :


