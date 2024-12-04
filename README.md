# Call Report Application

## Overview
This project is a Laravel-based Call Report Application, designed to allow users to view detailed insights about call data, including agent performance and customer interactions. The application includes a filtering system where users can filter calls by agent, start date, and end date. The project also includes pagination for easy navigation through the call records.  

## Screenshot

Below is a screenshot of the Call Report Application:

<p align="center">
  <img src="public/screenshots.png" alt="Call Report Application"/>
</p>  

## Approach
- **Models**: The application uses the `Call`, `Customer`, and `Agent` models to represent the core data.
- **Controllers**: The `CallReportController` is responsible for processing requests and interacting with the models.
- **Pagination**: Implemented Laravel's built-in pagination for displaying call records in pages.
- **Blade Templates**: The frontend is built using Blade templates. The `calls.index` view displays the call data and includes a form for filtering results by agent and date range.
- **Filter**: The user can filter the data by selecting an agent and specifying a date range.
- **UI Design**: The user interface is styled using [Pico CSS](https://picocss.com/), a minimalistic and simple CSS framework chosen for the simplicity and speed of development.
- **Database**: The application uses SQLite for the database, chosen for simplicity in development and testing.

## Seeder
To quickly populate the database with sample data, the `DatabaseSeeder` is provided. This seeder creates sample `Agent`, `Customer`, and `Call` records.

- The seeder creates **5 agents**.
- Each agent is associated with **10 customers**.
- For each customer, **3 call records** are generated with a reference to the respective agent and customer.

This ensures that the application has enough data for testing and viewing the call report functionality.

Here is the seeder code:

```php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Create agents
        \App\Models\Agent::factory(5)->create()->each(function ($agent) {
            // Create customers for each agent
            $agent->customers()->saveMany(\App\Models\Customer::factory(10)->make())
                ->each(function ($customer) use ($agent) {
                    // Create calls for each customer
                    $customer->calls()->saveMany(\App\Models\Call::factory(3)->make([
                        'agent_id' => $agent->id,
                    ]));
                });
        });
    }
}
```
## Installation

 Clone the repository:

   ```bash
   git clone https://github.com/danimatuko/callmaker.git
   ```

   ```bash
   cd callmaker

   ```
Install dependencies:
```bash
composer install
   ```
Set up environment configuration:
```bash
cp .env.example .env
   ```
Generate the application key:
```bash
php artisan key:generate
   ```

```bash
Configure the database:
# .env
```bash
DB_CONNECTION=sqlite
DB_DATABASE=/path_to_your_project/database/database.sqlite
```

Run migrations and seed the database
```bash
php artisan migrate
php artisan db:seed
   ```
Start the application:
```bash
php artisan serve
   ```





