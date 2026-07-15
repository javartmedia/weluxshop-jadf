## Installation

1. Clone repository
2. Install dependencies: `composer install`
3. Copy `.env.example` to `.env` and edit database credentials
4. Create database: `mysql -u root -p < database/sql/schema.sql`
5. Run migrations: `php database/migrations/migrate.php`
6. Seed data: `php database/seeders/seed.php`
7. Set `public/` as document root
8. Ensure Apache rewrite enabled or use `php -S localhost:8000 -t public`
9. Access site and login as admin: `admin@weluxshop.com` / `admin123`
