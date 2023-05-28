# Genesis Front-End School test task

Ostap Fetsko • o.fetsko@gmail.com

---

## Setup

1. Configure mail server settings via `.env` or environmnet variables in `docker-compose.yml`:

   ```bash
   MAIL_MAILER=
   MAIL_HOST=
   MAIL_PORT=
   MAIL_USERNAME=
   MAIL_PASSWORD=
   MAIL_ENCRYPTION=
   MAIL_FROM_ADDRESS=
   MAIL_FROM_NAME=
   ```

2. Install dependencies
   
   ```bash
   composer install
   ```

3. Start docker container
   
   ```bash
   docker compose up -d
   ```

4. API service runs on `locahost:8000`

## License

MIT License.

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
