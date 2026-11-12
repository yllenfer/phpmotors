# CSE 340 – Winter 2021
  - Name: Yllen Fernandez
  - email: fer19020@byui.edu

# PHPMotors
  - Learning how to build a website with PHP and MySQL

## The story behind this project

PHP Motors is the project I built for CSE 340 (Web Backend Development) at
BYU–Idaho. Looking back at it now, I get emotional.

I wrote most of this code by hand: the controllers, the models, the views, the
SQL, and every bug I created along the way and then had to hunt down. It took
countless hours. Honestly, this class almost gave me PTSD. 😅

I wasn't in a quiet dorm room while I built it. I was living in Mexico and
traveling, and I fit this work in wherever I could. I met with classmates,
professors and student tutors, and I kept going until it worked. Every page in
this repo carries a piece of that time.

For years it just sat in a private repo. In 2026 it came back to life with the
help of [Claude](https://claude.com/claude-code). We updated it for PHP 8,
fixed some bugs, made it safer to put online, and packaged it so it can run on
the web again. Seeing it live again means a lot to me.

To everyone who helped me get through that class: thank you.

PHP Motors is a PHP 8 + MySQL app (Apache, PDO). It is packaged as a Docker
image, so any host that runs a Dockerfile and offers MySQL can run it.
The guide below uses [Railway](https://railway.com).

> **Why not Netlify?** Netlify only serves static files and JavaScript/Go
> functions. It cannot run PHP or host a MySQL database, so it can't run this app.

The app lives under `/phpmotors/` (all of its links use that path). Visiting
`/` redirects there.

## Run it locally

Requires Docker.

```bash
cp .env.example .env        # optional: change DB_PASSWORD
docker compose up --build
```

Open <http://localhost:8080>. The first start creates the database and loads
`sql/phpmotors.sql`. To start over with fresh data, run `docker compose down -v`.

## Deploy to Railway

1. **Create the app.** In Railway: *New Project → Deploy from GitHub repo →*
   `phpmotors`. Railway finds the `Dockerfile` and builds it.
2. **Add the database.** In the same project: *+ New → Database → MySQL*.
3. **Connect them.** Open the web service → *Variables*, and add these
   (Railway fills in the values from the MySQL service):

   | Variable      | Value                        |
   |---------------|------------------------------|
   | `DB_HOST`     | `${{MySQL.MYSQLHOST}}`       |
   | `DB_PORT`     | `${{MySQL.MYSQLPORT}}`       |
   | `DB_NAME`     | `${{MySQL.MYSQLDATABASE}}`   |
   | `DB_USER`     | `${{MySQL.MYSQLUSER}}`       |
   | `DB_PASSWORD` | `${{MySQL.MYSQLPASSWORD}}`   |

4. **Data loads by itself.** On start, the app checks the database. If it's
   empty, the app loads the sample data from `sql/phpmotors.sql` over
   Railway's private network. A database that already has data is never touched.

5. **Get a URL.** Web service → *Settings → Networking → Generate Domain*.
   Open `https://<your-domain>/phpmotors/`.

The container listens on Railway's `$PORT` automatically.

### Uploaded images

Images uploaded from the admin page are saved inside the container, so they
disappear on the next deploy. Images that are committed to `images/vehicles`
are always there. To keep uploads, commit them to the repo.

## Configuration

| Variable      | Default     | Notes                                        |
|---------------|-------------|----------------------------------------------|
| `DB_HOST`     | `mysql`     | Falls back to Railway's `MYSQLHOST`          |
| `DB_PORT`     | `3306`      | Falls back to `MYSQLPORT`                    |
| `DB_NAME`     | `phpmotors` | Falls back to `MYSQLDATABASE`                |
| `DB_USER`     | `iClient`   | Falls back to `MYSQLUSER`                    |
| `DB_PASSWORD` | (empty)     | Falls back to `MYSQLPASSWORD`                |

If the database can't be reached, the app shows `view/500.php` and logs the
reason to the container logs.

## Access rules

- Anyone can browse the inventory and vehicle details.
- Logged-in clients can write reviews and edit or delete their own reviews.
- Admins (`clientLevel` 2 or 3) can manage vehicles, classifications and images.
  Uploads must be JPG, PNG or GIF, and scripts never run from `images/`.

## Create your admin account

The sample data in `sql/phpmotors.sql` has placeholder emails and no working
passwords. To get an admin login on a new database:

1. Register on the site (`/phpmotors/accounts/index.php?action=register`).
2. Promote that account to admin, from a MySQL client connected to the database:

   ```sql
   UPDATE client SET clientLevel = '3' WHERE clientEmail = 'you@example.com';
   ```

3. Log out and back in to see the admin pages.


Here's the [link](https://web-production-7e04f1c9.up.railway.app/phpmotors/) to the page
