# Database Schema

The database consists of 40+ tables covering users, products, orders, bookings, etc.  
Refer to `database/sql/schema.sql` for the complete CREATE TABLE statements.

Key tables:
- `users`, `roles`, `permissions` — authentication & authorization
- `products`, `categories`, `brands` — product catalog
- `orders`, `order_items`, `payments`, `shipments` — e-commerce transactions
- `treatments`, `doctors`, `branches`, `bookings` — appointment system
- `vouchers`, `coupon_usage`, `promotions`, `flash_sales` — marketing
- `articles`, `comments`, `faqs` — content
- `activity_logs`, `audit_logs` — system logs
