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

