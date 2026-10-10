# phpMyAdmin / MySQL Database Setup Guide

This project includes a complete, 1-click ready SQL dump file containing all existing data:
`ganesh_chaturthi_phpmyadmin.sql` (or `database/ganesh_chaturthi_phpmyadmin.sql`).

## Included Data Summary:
- **161 Student Collection Records**
- **38 Faculty Collection Records**
- **15 Sponsor & Item Contribution Records**
- **14 Expense Categories**
- **109 Celebration Expenses**
- **1 Admin User (`admin@gmail.com`)**

---

## How to Import into phpMyAdmin:

1. Open your **phpMyAdmin** dashboard (e.g. `http://localhost/phpmyadmin`).
2. Click on **Import** in the top menu tab.
3. Click **Choose File** and select `ganesh_chaturthi_phpmyadmin.sql` from the project directory.
4. Click **Go** at the bottom of the page.
5. The `ganesh_chaturthi` database will be created with all tables and data automatically populated.

---

## How to Connect Laravel to phpMyAdmin / MySQL:

Open your `.env` file and update the database settings:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ganesh_chaturthi
DB_USERNAME=root
DB_PASSWORD=
```
