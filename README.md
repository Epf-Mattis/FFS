# Projet Fun_Facts

Ce projet consiste en une application web pour afficher des "fun facts" de manière aléatoire ou dans un ordre spécifique.

## Installation

Pour installer et exécuter le Projet Fun_Facts sur votre machine locale, suivez ces étapes :

### Étapes d'Installation

1. Clonez le repository depuis GitHub :
    ```bash
    git clone https://github.com/Epf-Mattis/FFS.git
    ```

2. Accédez au répertoire du projet :
    ```bash
    cd FFS
    ```

3. Installez les dépendances PHP via Composer :
    ```bash
    composer install
    ```

4. Installez les dépendances JavaScript via npm :
    ```bash
    npm install
    ```
### Étapes de Configuration

1. Creation d'un fichier .ENV
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=Fun_Facts
DB_USERNAME=root
DB_PASSWORD=motdepasse

2. Connexion + Creation de la DB

```
mysql -u root -p
```
```
CREATE DATABASE Fun_Facts
```



### Compilation des Ressources

Après avoir installé les dépendances, vous devez compiler les ressources frontales à l'aide de webpack. Exécutez la commande suivante :

```bash
npm run dev
```

### Lancement du serveur

Pour lancer le serveur, utilisez la commande suivante :

```bash
php artisan serve
```

## Endpoints

L'application expose deux endpoints :

- [http://127.0.0.1:8000/funfacts](http://127.0.0.1:8000/funfacts) : Permet de récupérer tous les "fun facts" dans l'ordre de création du plus récent au plus ancien.
- [http://127.0.0.1:8000/funfacts/random](http://127.0.0.1:8000/funfacts/random) : Permet de récupérer un "fun fact" aléatoirement.

## Idées de FunFacts

1. Les pingouins n'ont qu'un partenaire dans leur vie et font leur « demande en mariage » en offrant un caillou.
2. Les avions volent plus lentement aujourd'hui que par le passé.
3. L'homme qui a inventé les publicités pop-ups s'est officiellement excusé auprès du monde entier.
4. Les astronautes peuvent voter depuis l'espace.
5. Le drapeau des États-Unis a été dessiné par un lycéen pour un projet de classe.


