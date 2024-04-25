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

