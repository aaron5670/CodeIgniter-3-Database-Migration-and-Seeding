# CodeIgniter 3 with Database Migration & Seeding
## About
This is a starter template with CodeIgniter 3.1.x and database migration & seeding tools.

### Features
- [x] CodeIgniter Migration with CodeIgniter Command Line Interface (CLI)
- [x] CodeIgniter Database seeding with CodeIgniter Command Line Interface (CLI)
- [x] [Faker PHP Library](https://github.com/fzaninotto/Faker)

### ToDo
- [ ] Pretty CLI commands

### Installation
1. Clone this repository
``git clone https://github.com/aaron5670/CodeIgniter-3-Database-Migration-and-Seeding.git``
2. Install all required packages with Composer with your CLI: ``composer install``.
3. Configure **application/config/config.php**.
4. Configure **application/config/database.php**.


### CLI Commands
| Available Command Line Interface (CLI) commands | Description                                         |
|-----------------------------------------------------------------|-----------------------------------------------------|
| php index.php tools migration "file_name"                       | Create new migration file                           |
| php index.php tools migrate ["version_number"]                  | Run all migrations. The version number is optional. |
| php index.php tools seeder "file_name"                          | Creates a new seed file.                            |
| php index.php tools seed "file_name"                            | Run the specified seed file.                        |

### Example
In **application/database/migrations** is a migrations file and in **application/database/seeds** is a seeder file created for this example.

Type the following commands in your CLI:
1. ``php index.php tools migrate BrandSeeder``
2. ``php index.php tools migrate``
3. ``php index.php tools seed BrandsSeeder``
4. Check your database changes :)
