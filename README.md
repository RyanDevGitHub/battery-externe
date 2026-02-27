# Initialisation MVC PHP natif

Architecture MVC minimale sans framework, avec front controller.

## Structure

- `public/index.php` : point d'entrée unique
- `app/Core/Router.php` : gestion des routes GET
- `app/Controllers/HomeController.php` : contrôleur de la page d'accueil
- `app/Views/layout.html` + `app/Views/home.html` : vues HTML
- `public/assets/css/style.css` : styles
- `public/assets/js/app.js` : script JS

## Route disponible

- `GET /` → `HomeController@index`

## Lancer localement

Exemple avec serveur PHP embarqué :

```bash
php -S localhost:8000 -t public
```

Puis ouvrir `http://localhost:8000/`.
