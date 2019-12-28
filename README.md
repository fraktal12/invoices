# invoices
This is a simple Laravel project to create a invoices application.
I used bulma for a better looking interface and jquery for the frontend.

Still need to add the pdf converting and sending the invoice via email, so, consider it work in progress... ;)

1. Clone the repository. Run: git clone git@github.com:fraktal12/invoices.git
2. Install Composer Dependencies. Run: $ composer install
3. Install NPM Dependencies. Run: $ npm install
4. Create a copy of your .env file. Run; $ cp .env.example .env
5. Generate an app encryption key. Run: $ php artisan key:generate
6. Create an empty database for our application.
7. In the .env file, add database information to allow Laravel to connect to the database
8. Migrate the database. Run: $ php artisan migrate

