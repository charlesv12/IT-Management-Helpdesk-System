# Northstar IT Helpdesk

A React and Laravel helpdesk application for creating and managing support tickets. React Router handles the client side views; Laravel validates and persists ticket records through Eloquent.

## Run locally

Requirements: PHP 8.3+, Composer, Node.js 20.19+ or 22.12+, and PostgreSQL.

1. Create a PostgreSQL database (default name: `helpdesk`) and set `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` in `backend/.env`.
2. In `backend`, install dependencies, copy `.env.example` to `.env` for first setup, generate an app key, and run `php artisan migrate`.
3. In `frontend`, run `npm install`.
4. Start `npm run dev:backend` and `npm run dev:frontend` from the project root.

Open http://127.0.0.1:5173. Vite proxies `/api` to Laravel on port 8017.

## Sign in

The demo login accepts username `itadmin` and password `helpdesk123`. This is client side demonstration gating only; use real server side authentication before deployment.

## Ticket workflow

Ticket list, create, detail, and edit routes are protected by the client login gate. New tickets require requester name and email, issue category, priority, subject, and description. Laravel repeats validation before storing records. Tickets use an auto incrementing ID (shown as the ticket number), default to Open, and remain in PostgreSQL when the frontend or backend development servers restart.

Ticket endpoints: `GET /api/tickets`, `POST /api/tickets`, `GET /api/tickets/{id}`, and `PUT /api/tickets/{id}`.

