<div align="center">

# 💼 Job Board — Job Application Portal

<img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" />
<img src="https://img.shields.io/badge/Blade-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" />
<img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" />
<img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white" />

A web application for browsing and applying to job listings, with a full admin panel to manage applications and postings.

</div>

---

## Features

**Users**
- Register and log in
- Browse available job listings
- View full job details
- Apply for a job and upload a CV

**Admin**
- Secure admin dashboard
- Add new job listings
- Review applications — accept or reject with one click

---

## Tech Stack

| Layer | Technology |
|-------|-----------|
| Framework | Laravel 10 |
| Templating | Blade |
| Styling | Custom CSS |
| Database | MySQL |
| File Upload | Laravel Storage |

---

## Getting Started

```bash
# Clone & install
git clone https://github.com/mahmoudtawfik1998/job-board.git
cd job-board
composer install

# Setup environment
cp .env.example .env
php artisan key:generate
# → set DB credentials in .env

# Run migrations
php artisan migrate --seed

# Link storage for CV uploads
php artisan storage:link

# Start the server
php artisan serve
```

---

## Demo Credentials

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@jobboard.com | password |
| User | user@test.com | password |

---

## License

[MIT](LICENSE)
