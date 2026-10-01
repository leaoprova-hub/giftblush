# GiftBlush – gift shop website

Graduation project (high school). A multi-page website for a gift shop.

**Pages:** home, about, catalog, promotions, contact, author.
**Tech:** HTML5, CSS3, JavaScript, PHP, MySQL.

The contact form (`contacts.html`) sends messages to `submit_form.php`, which stores them in a MySQL table using PDO prepared statements.

## Run the contact form locally
1. Create the database: import `database.sql`.
2. Copy `config.example.php` to `config.php` and fill in your database details.
3. Serve the folder with PHP (e.g. XAMPP or `php -S localhost:8000`).

The other pages are static and work without PHP. Add your images to the `pictures/` folder.
