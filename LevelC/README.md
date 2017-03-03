## Exercice du Niveau C

ATTENTION VOUS NE POUVEZ MODIFIER QUE LA CLASSE PLAYER.PHP
--> Des vérifications seront effectuées !

Objectif :
En tant que maître, de l'entité Bobby (objet Player), 
  votre objectif est d'arriver à la fin de la piste ("track") de l'objet Game.

### Game contient
* un tableau de player ("players")
** chaque élément du tableau player contient les informations liés à ce dernier (position, energie restante, identifiant)
* une piste ("track")
** ne piste ("track") est une sucession de cases ("caractères")

#### Game - Track
La piste ("track") est représentée par une chaine de caractères
* Un "_" représente la piste quand tout va bien 
* Un "X" représente un obstacle 

#### Game - playerSteps
La méthode playerSteps execute les instructions de chaque joueur ('player')

	Etape 1 
	Game vérifie que le joueur a suffisament d'energie ('fuel') pour executer les instructions
	Game tri les instructions.

	Etape 2
	Game va d'abord regarder le nombre de 'A' puis avancer le player sur la piste ("track") autant de fois qu'il y a la lettre 'A' dans les instructions.
	* Si le joueur tombe sur un obstacle (représenté par un 'X') Alors une exeception est levée
	* Si le joueur va plus loin que la piste ("track")" Alors une execption est levée
	* Si le joueur tombe sur la dernière case ("caractère") de la piste ("track") Alors il a gagné
	Note : Si le joueur passe au dessus d'un X, il n'y a pas d'incident... C'est uniquement s'il s'arrête sur la case 'X'

	Etape 3
	Game retournera dans $result les V fois prochaine cases ("caractères") de la piste ("track")
	* S'il y a moins de cases à retourner que le nombre d'instruction, Alors le nombre de cases sera tronqué
	** Exemple : Il reste 5 cases, mais vous avez mis 8. Alors la chaine resultante peut être "X__X_"
	* Sinon la totalité des cases demandes sera retournée

### Player
* un identif

#### Player->getSteps

Le player peut donner une liste d'instruction à Game (représenté sous la forme d'une chaine de caractères)
* Il ne peut pas y avoir plus de 5 instructions de chaque (// La chaîne ne peut pas avoir plus de 5xA ou 5xV)
* un 'A' dans la chaîne permet d'avancer d'un cran son Joueur
* un 'V' dans la chaîne permet de voir les V fois prochaines cases ('caracteres') de la piste ('track')
* Chaque instruction fait perdre 1 point d'energie ('fuel')

Exemple :
* L'instruction : "AAVVV" 
** permettra au Player d'avancer de deux cases et de voir les trois prochaines cases
** consommera 5 points d'energie ('fuel')

* L'instruction : "VAAVAAV" 
** permettra au Player d'avancer de quatre cases et de voir les trois prochaines cases
** consommera 8 points d'energie ('fuel')