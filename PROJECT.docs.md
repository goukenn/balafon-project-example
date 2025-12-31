# Wiki Balafon - Guide Complet de la Structure de Projet

**Auteur** : Claude AI Assistant  
**Date** : 31 décembre 2025  
**Version** : 1.0

---

## Table des Matières

1. [Introduction](#introduction)
2. [Architecture Générale](#architecture-générale)
3. [Arborescence du Projet](#arborescence-du-projet)
4. [Fichiers de Configuration](#fichiers-de-configuration)
5. [Répertoires Principaux](#répertoires-principaux)
6. [Flux de Travail](#flux-de-travail)
7. [Bonnes Pratiques](#bonnes-pratiques)
8. [Dépannage](#dépannage)

---

## Introduction

Balafon est un framework PHP web moderne conçu pour simplifier le développement d'applications web robustes. La structure du projet est organisée de manière logique pour faciliter la maintenance, l'évolutivité et la collaboration en équipe.

### Caractéristiques Principales

- **Architecture MVC** : Séparation claire entre modèles, vues et contrôleurs
- **Système de Routage** : Gestion élégante des URLs et des requêtes HTTP
- **Gestion des Thèmes** : Support complet des thèmes avec fichiers `.pcss` dynamiques
- **Système de Vues** : Vues compilables `.bview` et templates `.phtml`
- **Internationalisation** : Support multilingue natif
- **Base de Données** : Schéma builder pour migrations de base de données

---

## Architecture Générale

```
┌─────────────────────────────────────────┐
│      Balafon Web Application             │
├─────────────────────────────────────────┤
│ ┌────────────────────────────────────┐  │
│ │     Frontend (Views + Styles)      │  │
│ │  - Fichiers .bview/.phtml          │  │
│ │  - CSS (.pcss) avec thèmes         │  │
│ │  - Scripts JavaScript              │  │
│ └────────────────────────────────────┘  │
├─────────────────────────────────────────┤
│ ┌────────────────────────────────────┐  │
│ │   Couche Métier (Controllers)      │  │
│ │  - Logique applicative             │  │
│ │  - Routage HTTP                    │  │
│ │  - Gestion des requêtes            │  │
│ └────────────────────────────────────┘  │
├─────────────────────────────────────────┤
│ ┌────────────────────────────────────┐  │
│ │     Backend (Lib + Database)       │  │
│ │  - Classes métier                  │  │
│ │  - Gestion BD                      │  │
│ │  - Services réutilisables          │  │
│ └────────────────────────────────────┘  │
└─────────────────────────────────────────┘
```

---

## Arborescence du Projet

```
BalafonProjectTutorial/
├── Articles/                      # Contenus statiques multilingues
│   ├── about.en.phtml
│   ├── about.fr.phtml
│   ├── about.nl.phtml
│   ├── confidentiality.en.phtml
│   ├── confidentiality.fr.phtml
│   ├── confidentiality.nl.phtml
│   ├── presentation.en.phtml
│   ├── presentation.fr.phtml
│   └── presentation.nl.phtml
│
├── Configs/                       # Configuration applicative
│   ├── .htaccess
│   ├── Lang/                      # Fichiers de langue
│   │   ├── lang.en.presx
│   │   ├── lang.fr.presx
│   │   └── lang.nl.presx
│   ├── profiles.php               # Profils et groupes d'authentification
│   ├── routes.php                 # Définition des routes HTTP
│   └── views.php                  # Configuration des vues
│
├── Contents/                      # Contenus sécurisés
│   └── .htaccess
│
├── Data/                          # Données publiques/uploads
│   └── .htaccess
│
├── Lib/                           # Bibliothèque du projet
│   ├── .htaccess
│   ├── autoload.php               # Chargement automatique des classes
│   ├── Classes/
│   │   └── Database/
│   │       ├── InitDbSchemaBuilder.php
│   │       └── InitMacros.php
│   └── Tests/
│       ├── autoload.php
│       └── BalafonProjectTutorialControllerTest.php
│
├── Scripts/                       # JavaScript partagé
│   └── .htaccess
│
├── Styles/                        # Feuilles de style
│   ├── .htaccess
│   ├── default.pcss               # Style par défaut
│   └── Themes/                    # Thèmes disponibles
│       ├── light.theme.pcss
│       └── dark.theme.pcss
│
├── Views/                         # Fichiers de vue
│   ├── .footer.pinc               # Pied de page commun
│   ├── .header.pinc               # En-tête commun
│   ├── .menu.pinc                 # Menu commun
│   └── default.phtml              # Vue par défaut
│
├── .balafon-sync.project.json     # Configuration de synchronisation
├── .global.php                    # Fonctions globales
├── balafon.config.json            # Configuration du projet
├── BalafonProjectTutorialController.php
├── README.md                      # Documentation projet
└── [Autres fichiers projet]
```

---

## Fichiers de Configuration

### 1. balafon.config.json

Fichier de configuration principal du projet.

```json
{
  "name": "BalafonProjectTutorial",
  "author": "C.A.D. BONDJE DOUE",
  "version": "1.0"
}
```

**Propriétés** :
- `name` : Identifiant unique du projet
- `author` : Auteur du projet
- `version` : Numéro de version sémantique

### 2. Configs/routes.php

Définit tous les chemins HTTP et leurs associés contrôleurs.

```php
<?php
use IGK\System\Http\Route;

// Route::get($actionClass, $uriPattern)
// $actionClass : classe middleware/action
// $uriPattern : chemin avec paramètres optionnels {name}
```

**Exemple d'utilisation** :
```php
Route::get(HomeController::class, "/");
Route::get(ProductController::class, "/products/{id}");
```

### 3. Configs/views.php

Configuration spécifique des vues et des répertoires d'entrée.

```php
<?php
return [
    // "default_dir_entry" => "default",
    // "is_dir_entry" => [],
];
```

### 4. Configs/profiles.php

Gestion des profils d'utilisateurs et des groupes d'authentification.

```php
<?php
use BalafonProjectTutorialController as ctrl;

return [];
```

### 5. .balafon-sync.project.json

Configuration de synchronisation du projet.

```json
{
  "ignoredirs": null,
  "leavedirs": null,
  "cleardirs": null
}
```

---

## Répertoires Principaux

### Articles/

**Destination** : Contenus statiques multilingues

**Contenu** : Pages telles que À propos, Confidentialité, Présentation

**Format** : Fichiers `.phtml` nommés selon le modèle `[nom].[langue].phtml`

**Langues Supportées** :
- `.en.phtml` : Anglais
- `.fr.phtml` : Français
- `.nl.phtml` : Néerlandais

**Exemple** :
```
Articles/
├── about.en.phtml       (À propos - Anglais)
├── about.fr.phtml       (À propos - Français)
└── about.nl.phtml       (À propos - Néerlandais)
```

### Configs/

**Destination** : Tous les fichiers de configuration centralisés

**Sous-répertoires** :

#### Lang/

Fichiers de traduction du projet en format `.presx`.

```php
<?php
// lang.fr.presx
$l["title.default"] = "Accueil";
$l["welcome.message"] = "Bienvenue sur notre application";
```

**Utilisation** :
```php
echo $l["title.default"]; // Affiche "Accueil"
```

### Lib/

**Destination** : Cœur métier et logique applicative

**Structure** :

```
Lib/
├── autoload.php                    # Enregistrement des autoloaders
├── Classes/
│   └── Database/                   # Classes de gestion BD
│       ├── InitDbSchemaBuilder.php # Migrations BD
│       └── InitMacros.php          # Macros globales
└── Tests/
    ├── autoload.php
    └── BalafonProjectTutorialControllerTest.php
```

#### InitDbSchemaBuilder.php

Gère les migrations de la base de données.

```php
<?php
public function upgrade(IDiagramSchemaBuilder $builder){
    // Créer les tables
    $builder->entity(...)
}

public function downgrade(IDiagramSchemaBuilder $builder){
    // Supprimer les tables
    $builder->entity(...);
}
```

#### InitMacros.php

Initialise les macros et configurations globales.

```php
<?php
public function run(AppBuilder $builder){
    // Configuration globale de l'application
}
```

### Scripts/

**Destination** : Fichiers JavaScript partagés et distribués

**Utilisation** : Code JavaScript réutilisable entre plusieurs vues

**Sécurité** : `.htaccess` permet l'accès (`allow from all`)

### Styles/

**Destination** : Feuilles de style CSS dynamiques

#### default.pcss

Fichier CSS principal qui charge automatiquement les thèmes.

```php
<?php
// Variables disponibles :
// $def : styles par défaut
// $xsm_screen, $sm_screen, $lg_screen : styles responsifs
// $cl : couleurs du thème
// $css_m : classe CSS cible
// $ctrl : contrôleur initiateur
```

#### Themes/

Thèmes disponibles :
- `light.theme.pcss` : Thème clair
- `dark.theme.pcss` : Thème sombre

Chaque thème définit les variables couleur via `$cl`.

### Views/

**Destination** : Tous les fichiers de vue

**Fichiers Spéciaux** :

#### .header.pinc

Inclus au début de chaque vue. Initialise :
- Google Fonts
- Variables globales
- En-tête HTML

```php
<?php
igk_google_addfont($doc, "Roboto");
$t->setClass("+google-Roboto");
```

#### .footer.pinc

Pied de page commun à toutes les vues.

```php
<?php
$t->div()->container()->igkcopyright();
```

#### .menu.pinc

Menu de navigation partagé. Retourne un tableau de configuration.

```php
<?php
return [];
```

#### default.phtml

Vue par défaut appelée pour chaque action.

```php
<?php
use IGK\Resources\R;

$t->clearChilds();
$t->div()->addSectionTitle(4)->Content = R::ngets("Title.App_1", $this->AppTitle);
$t->inflate(igk_dir($dir."/".$fname));
```

---

## Flux de Travail

### 1. Requête HTTP Entrante

```
Client HTTP
    ↓
Router (routes.php)
    ↓
Controller (BalafonProjectTutorialController)
    ↓
Action Method
    ↓
View Resolution
```

### 2. Résolution de Vue

```
Contrôleur retourne une action
    ↓
Recherche fichier vue correspondant
    ↓
Chargement .header.pinc
    ↓
Chargement .menu.pinc
    ↓
Chargement vue spécifique
    ↓
Chargement .footer.pinc
    ↓
Application styles (default.pcss + thème)
    ↓
Rendu HTML final
```

### 3. Application des Styles

```
Routes HTTP
    ↓
Contrôleur détermine le thème
    ↓
Chargement default.pcss
    ↓
Chargement thème sélectionné
    ↓
Génération CSS final
    ↓
Injection dans le document
```

---

## Bonnes Pratiques

### 1. Organisation des Fichiers

**À Faire** ✅
```
Organiser logiquement par fonctionnalité
- Articles/ pour contenus statiques
- Configs/ pour toutes les configurations
- Lib/ pour la logique métier
- Views/ pour les interfaces utilisateur
```

**À Éviter** ❌
```
Ne pas mélanger fichiers de configuration, vues et logique
Créer des répertoires inutiles au premier niveau
```

### 2. Nommage des Fichiers

**Convention** :
- Controllers : `NomController.php` (PascalCase)
- Classes : `NomClasse.php` (PascalCase)
- Vues : `nom.phtml` ou `nom.bview` (snake_case)
- Thèmes : `nom.theme.pcss`
- Fichiers partagés : `.nom.pinc` (avec point de préfixe)

### 3. Sécurité

**Protéger les Répertoires Sensibles** :
```apache
# .htaccess pour Configs/, Lib/, Contents/
deny from all

# .htaccess pour Scripts/, Data/, Styles/, Views/
allow from all
```

**Utiliser des Variables d'Environnement** :
```php
// Définir dans .global.php
define('APP_VERSION', '1.0');
define('APP_TIMEZONE', 'UTC');
```

### 4. Multilingue

**Ajouter une Nouvelle Langue** :

1. Créer `Configs/Lang/lang.XX.presx`
2. Copier contenu depuis `lang.en.presx`
3. Traduire toutes les clés
4. Créer articles : `Articles/nom.XX.phtml`

### 5. Thématisation

**Créer un Nouveau Thème** :

1. Dupliquer `Styles/Themes/light.theme.pcss`
2. Renommer en `Styles/Themes/nom.theme.pcss`
3. Personnaliser le tableau `$cl` (couleurs)
4. Ajouter logique de sélection du thème dans le contrôleur

---

## Dépannage

### Problème : Vues Non Trouvées

**Symptôme** : Erreur 404 ou vue blanche

**Solutions** :
1. Vérifier le chemin de la vue dans `Views/`
2. Confirmer que le nomm du fichier correspond à l'action
3. Vérifier les permissions du répertoire `Views/`
4. Consulter `Configs/views.php` pour la configuration

### Problème : Styles Non Appliqués

**Symptôme** : CSS ne se charge pas

**Solutions** :
1. Vérifier le chemin dans `Styles/default.pcss`
2. Confirmer que le thème est correct
3. Vérifier la syntaxe `.pcss` pour les erreurs PHP
4. Vérifier les permissions du répertoire `Styles/`

### Problème : Routes Non Reconnues

**Symptôme** : Erreur 404 sur routes valides

**Solutions** :
1. Vérifier les routes dans `Configs/routes.php`
2. Confirmer que le contrôleur existe
3. Vérifier la syntaxe de la route
4. Activer mod_rewrite dans Apache

### Problème : Traductions Manquantes

**Symptôme** : Clés de traduction non remplacées

**Solutions** :
1. Vérifier la clé dans `Configs/Lang/lang.XX.presx`
2. Confirmer la langue actuelle
3. Utiliser `$l["clé"]` correctement
4. Vérifier la syntaxe PHP du fichier de langue

---

## Conclusion

La structure d'un projet Balafon est conçue pour la maintenabilité et l'évolutivité. En suivant cette architecture et ces conventions, vous construirez des applications web robustes et faciles à maintenir.

Pour plus d'informations, consultez la documentation officielle de Balafon ou les commentaires du code source.

---

**Document généré le** : 31 décembre 2025  
**Auteur** : Claude AI Assistant