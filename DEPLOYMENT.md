# Deployment Guide

1. Upload all files to server (excluding `vendor` and `.env`)
2. Run `composer install --no-dev` on server
3. Set appropriate permissions: `chmod -R 755 public/`, `chmod -R 777 storage/`
4. Configure web server:
   - Apache: set `public/` as DocumentRoot, enable `mod_rewrite`
   - Nginx: set root to `public/`, add rewrite rule to `index.php`
5. Set environment variables in `.env` (production settings)
6. Import database schema and seed if first install
7. Enable HTTPS and configure session cookie secure
