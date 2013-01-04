Mécanismes
==========

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
