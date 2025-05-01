# agileo-api

## Présentation

**agileo-api** est le backend de l'application AGILEO. Il fournit une API RESTful permettant de gérer les données et les fonctionnalités nécessaires au bon fonctionnement de l'application. Ce projet est développé en utilisant [Symfony](https://symfony.com/) et utilise une base de données SQLite pour le stockage des données.

## Fonctionnalités principales

- Gestion des entités via API Platform
- Base de données légère et portable grâce à SQLite
- Architecture modulaire et extensible
- Intégration avec des outils modernes de développement

## Prérequis

Avant de commencer, assurez-vous d'avoir installé les outils suivants :

- [Node.js](https://nodejs.org/) (version 14 ou supérieure)
- [npm](https://www.npmjs.com/) ou [yarn](https://yarnpkg.com/) pour gérer les dépendances
- [PHP](https://www.php.net/) (version 8.1 ou supérieure)
- [Composer](https://getcomposer.org/) pour gérer les dépendances
- [SQLite Viewer](https://marketplace.visualstudio.com/items?itemName=SQLite.sqlite) (extension Visual Studio Code) pour visualiser facilement la base de données SQLite

## Installation

1. Clonez ce dépôt sur votre machine locale :

   ```bash
   git clone https://github.com/votre-utilisateur/agileo-api.git
   cd agileo-api
   ```

2. Installez les dépendances du projet :

   ```bash
   composer install
   ```

3. Configurez les variables d'environnement nécessaires en créant un fichier `.env.local` à la racine du projet. Exemple :

   ```env
   APP_ENV=dev
   DATABASE_URL=sqlite:///%kernel.project_dir%/var/database.db
   ```

4. Lancez le serveur de développement Symfony :

   ```bash
   symfony server:start
   ```

5. Ouvrez votre navigateur et accédez à `http://localhost:8000` pour tester l'API.

## Visualisation de la base de données

Pour explorer la base de données SQLite utilisée par ce projet, nous recommandons d'installer l'extension **SQLite Viewer** dans Visual Studio Code. Voici comment procéder :

1. Ouvrez Visual Studio Code.
2. Accédez à l'onglet des extensions (Ctrl+Shift+X).
3. Recherchez "SQLite Viewer" et installez l'extension développée par SQLite.
4. Une fois installée, vous pouvez ouvrir le fichier `var/database.db` pour visualiser et interagir avec les données.

## Tests

Pour exécuter les tests, utilisez la commande suivante :

```bash
php bin/phpunit
```

## Contribution

Les contributions sont les bienvenues ! Veuillez soumettre une pull request ou ouvrir une issue pour signaler des bugs ou proposer des améliorations.

## Licence

Ce projet est sous licence [MIT](LICENSE).
