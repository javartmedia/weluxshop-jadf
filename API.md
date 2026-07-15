## REST API Endpoints

Base URL: `/api/`

| Endpoint | Method | Description |
|----------|--------|-------------|
| products | GET | List all products |
| products/{id} | GET | Get single product |
| categories | GET | List categories |
| orders | GET | User orders (auth) |
| bookings | GET | User bookings (auth) |
| vouchers | GET | Active vouchers |
| reviews/{productId} | GET | Product reviews |
| articles | GET | Published articles |
| notifications | GET | User notifications (auth) |

Authentication via session. Include CSRF token for POST requests.
