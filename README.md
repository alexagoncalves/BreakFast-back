# BreakFast

<p align="center">
  <img width="460" height="300" src="https://github.com/alexagoncalves/BreakFast-back/blob/main/public/images/breakfast-responsive.png">
</p>


## INTRODUCTION
Dans un environnement rural où la voiture devient vite obligatoire pour aller
chercher du pain ou commander des viennoiseries, une solution de petit déjeuner à domicile a été pensée.

L’idée est de pouvoir commander ses gâteaux préférés, ses croissants, ses pains
au chocolat, ou tout autre chose que peut proposer une boulangerie, sans devoir
remplir son plein d’essence et tout en restant en chaussons…
Ce projet tient également compte des soucis de la vie quotidienne pour les gens à
mobilité réduite ou isolés.
Ainsi, rien de plus simple dans l’ère numérique que de commander des plats à
distance pour un petit-déjeuner romantique, en famille, ou encore pour faire plaisir
à ses collègues de travail.

## OBJECTIF
Break’Fast est un site de vente en ligne permettant aux utilisateurs de commander
depuis chez eux leurs petits-déjeuners livrés à domicile ou en Click and Collect,
partout en France métropolitaine.

## LES FONCTIONNALITÉS DE L’APPLICATION
- Recherche de boulangeries par zone géographique (code postal) ;
- Voir le détail d'une boulangerie et tous les produits associés à cette boulangerie,
ainsi que les délais et frais de livraison ;
- Ajout, suppression et changement de quantité de produits du panier ;
- Payement en ligne ;
- Inscription et connexion utilisateur ;
- Ajout des boulangeries aux favoris ;
- Accéder aux formules préparées pour un petit-déjeuner en un seul clic ;
- Accéder à une page Blog avec des articles envoyés par les utilisateurs : idées petitsdéjeuners,
suggestions de petits-déjeuners équilibrées, recettes, etc. ;
- Contacter les administrateurs du site via un formulaire de contact ;
- Gestion des produits en vente par les partenaires ;
- Gestion des entités par les administrateurs via un backoffice ;
- Historique des commandes ;
- Page de profil d'utilisateur.

## LES RÔLES UTILISATEURS DE L’APPLICATION
### Utilisateur non connecté (visiteur)
Recherche des boulangeries avec filtres (végan, bio...) et par code postal.
Accès à la liste de boulangeries et au détail d'une boulangerie avec leurs
produits respectifs.
Ajout, suppression et édition des quantités des produits du panier.
Accès aux articles du blog, page de contact, inscription et connexion.
### Utilisateurs connectés (trois types)
- **user**: ajout des boulangeries aux favoris, validation de commande, page de
profil, historique des commandes et tous les droits susmentionnés.
- **partenaire**: accès au backoffice - gestion des produits de sa propre
boulangerie et tous les droits susmentionnés.
- **admin**: accès au backoffice - gestion: création, édition, suppression et
visualisation de toutes les entités -> utilisateurs, commandes, produits, boulangeries,
catégories, tags et articles du blog et tous les droits susmentionnés.

## LES TECHNOLOGIES FRONT ET BACK UTILISÉES
### FRONT-END
- Javascript/React.js
- React-Redux
- React-Router
- Axios
- Babel
- Webpack
- CSS - SASS
### BACK-END
- PHP/Symfony
- JWT Authentication
- ORM Doctrine
- SQL - MariaDB
- CSS - Bootstrap
