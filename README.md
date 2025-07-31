# Livre d'Or PHP

Ce projet est une application web simple de type "livre d'or" développée en PHP. Il permet aux utilisateurs de laisser des messages qui sont stockés dans une base de données SQLite. L'architecture du projet suit le modèle MVC (Modèle-Vue-Contrôleur).

## Structure du projet
- `App/Controller/` : Contrôleurs de l'application
- `App/Tables/` : Modèles représentant les tables de la base de données
- `Core/` : Composants de base (connexion à la base, modèle générique, etc)
- `elements/` : Éléments de mise en page (header, footer, layout)
- `public/` : Fichiers accessibles publiquement (index, CSS)
- `views/` : Vues affichant les données
- `vendor/` : Dépendances gérées par Composer

## Routeur PHP

Ce projet utilise un routeur PHP maison situé dans la classe `Core\Route.php`. Cette classe permet de définir facilement des routes pour gérer les requêtes HTTP (GET, POST, etc.) et d'associer chaque route à une vue ou à une fonction callback.

Exemple d'utilisation dans `index.php` :
```php
Route::get('/', function() {
    echo "Accueil";
});

// Route vers le contrôleur PublicController
Route::get('/', PublicController::index());
```
Le routeur gère aussi les routes dynamiques avec variables :
```php
Route::get('/user/$id', function($id) {
    echo "Utilisateur : $id";
});
```
Les routes peuvent pointer vers des fichiers de vue ou des callbacks PHP. Pour plus de détails, consultez le fichier `Core\Router.php`.
Pour plus d'informations sur les fonctionnements des routeurs, consulter [phprouter](https://phprouter.com/)
**NB** : C'est la même fonctionnement que phprouter mais je l'ai mise en orienté objet

## Late Static Binding dans le Modèle

Le modèle principal (`Core\Model\Model.php`) utilise le mécanisme de **late static binding** (liaison statique tardive) de PHP pour permettre l'héritage flexible des propriétés et méthodes statiques. Cela signifie que les classes enfants (par exemple `Message`) peuvent définir leurs propres propriétés statiques (`$table`, `$primary_key`, `$cols_fillable`), et les méthodes du modèle de base utiliseront toujours les valeurs de la classe appelée, et non celles de la classe parente.

Par exemple, dans `App\Tables\Message.php` :
```php
protected static function current_table(): string {
    return self::$table;
}
```
Grâce à late static binding, si une méthode du modèle de base appelle `static::current_table()`, c'est la version de la classe enfant qui sera utilisée, et la propriété `$table` de la classe enfant sera retournée. Cela permet de réutiliser le code du modèle de base pour différentes tables sans le dupliquer.

## Authentification
Le projet inclut un système d'authentification simple basé sur des sessions. Les utilisateurs peuvent se connecter et se déconnecter, et leurs sessions sont gérées via la classe `Cor\Auth.php`.

## Installation
1. Cloner le dépôt
2. Installer Composer (si ce n'est pas déjà fait) :
   - Télécharger Composer depuis https://getcomposer.org/download/
   - Installer Composer globalement ou localement selon votre environnement
3. Installer les dépendances du projet avec Composer :
   ```sh
   composer install
   ```
   Cela va installer les packages nécessaires et générer l'autoloader dans le dossier `vendor/`.
   Configurer votre `composer.json` si nécessaire pour ajouter des dépendances supplémentaires(prs-4). 
    Pour (re)générer ou mettre à jour l'autoloader manuellement, utilisez :
    ```sh
    composer dump-autoload
    ```
    Cette commande permet de régénérer l'autoloader si vous ajoutez ou modifiez des classes dans le projet.
4. Vérifier la configuration de l'autoloader :
   - L'autoloader généré par Composer (`vendor/autoload.php`) est inclus dans les fichiers PHP principaux du projet via `require_once './../vendor/autoload.php';`
   - Cela permet de charger automatiquement les classes selon la structure des namespaces définis dans le projet. (configurer votre composer.json si nécessaire)
5. Configurer la base de données SQLite :
   - Le fichier de base de données SQLite est situé dans `Core/Database/database.sqlite`.
   - Assurez-vous que le fichier existe et que les permissions sont correctes pour que PHP puisse y écrire.
   - Si le fichier n'existe pas, il sera créé automatiquement lors de la première insertion de données.
6. Lancer le serveur PHP intégré :
   ```sh
   php -S localhost:8000 -t public
   ```

## Auteur
- Projet réalisé par Mendrika Randriamora
