LaraBase
========

LaraBase is a starter app for speeding up the development of Laravel projects. With basic knowledge of Laravel, LaraBase can be adapted and customized to your needs. The frontend of LaraBase is built with Bootstrap 3.2 and the authentication system was built in such a way that you could use it right away or modify UserController.php to change the control flow. LaraBase does not include external packages/libraries as dependencies.

### Live Demo: [http://larabase.turizon.co.in/](http://larabase.turizon.co.in/)

**Admin Account** - Email:`admin@gmail.com`   Password:`password`

### Learn More: [LaraBase Wiki](https://github.com/chiraggude/larabase/wiki)

## Features
* Public pages: Home, Blog, About, FAQ's, Feedback/Contact Form
* Authenticated User pages: Dashboard, Profile, Settings
* User Registration & Login/Logout  (includes - "remember me" option)
* Email Activation: An account activation email is sent the user's email for verification
* Password Reset: Resets the user password after sends reset instructions to the user's email
* User Profile: Users have a Public and Private profile (editable)
* Change Password: User can change password while logged in from Settings page
* Unique Validation Rules for login and registration
* Basic Admin Console to monitor Users (DataTables)
* Dashboard Stats & Graphs
* Contact/Feedback form submissions are saved in DB and emailed to the Admin
* List of all Users with links to their Public Profiles
* Responsive HTML email templates
* Users can set their Timezone preferences in Settings
* Custom Error pages

## Installation and Setup

### Step 1 - Get LaraBase
**Option 1**: [Download LaraBase](https://github.com/chiraggude/larabase/archive/master.zip) and unzip it (remember to rename the folder to larabase)

**Option 2**: Git Clone `git clone https://github.com/chiraggude/larabase.git larabase`

### Step 2: Use Composer to install dependencies: 
```
cd larabase
composer install
```
### Step 3: Configure Settings

By default, LaraBase's environment is set to `local`, so all configurations in `/app/config/local/` will take precedence over configurations in `/app/config/`.

**Step A**: Copy **app.php**, **database.php**, **mail.php** and **larabase.php** from `/app/config/` to `/app/config/local`

**Step B**: Configure App settings in `/app/config/local/app.php`. Add your app encryption `key` and set `debug` to `true`

**Step C**: Create a new database on your machine and change the appropriate settings in `/app/config/local/database.php`

**Step D**: Configure your mail settings in `/app/config/local/mail.php`

**Step E**:  Configure your LaraBase specific settings in `/app/config/local/larabase.php`

[Read this guide if your planning to deploy an app built on LaraBase to production](https://github.com/chiraggude/larabase/wiki/Deployment-on-a-VPS#env-file)


### Step 4: Database Migrations and Seeding
Setup migrations table in DB: `php artisan migrate`

Seed the database: `php artisan db:seed`

### Step 5: Setup extra Dev Tools (optional)
Add the following line to the list of Service Providers in `/app/config/local/app.php`
```
        // Larabase
        'Way\Generators\GeneratorsServiceProvider',
```

### Step 6: Start using LaraBase
LaraBase: [http://localhost/larabase/public](http://localhost/larabase/public)

Admin Account - Email: `admin@gmail.com`   Password: `password`

**Note**: The URL depends on how you have configured your webserver.

## Upcoming Features
* Reports to be displayed in masonry-style grid
* Allow users to destroy their account (soft delete)
* Profile Pictures via Gravatar
* OAuth 1 & 2 - Login via FaceBook, Twitter, LinkedIn, Google, Microsoft, GitHub
* Tracks sign in count, last login,  timestamps and IP address
* Expires sessions that have no activity in a specified period of time
* User Suspension: A user can be temporarily banned from logging in to the app for a small interval (eg. 7 days)
* User Banning: Admins can add a user's email to a banned list. A banned user will not be allowed to create a new account with their existing emails or social accounts (potentially)
* Login Throttling: Locks an account after a specified number of failed sign-in attempts. Can unlock via email or after a specified time period.
* Role based Access Control (RBAC) – Super Admin, Group Admin, Users
* Permissions Types - Manage Everything, Manage a group of users, manage only themselves, manage certain resources, manage only certain actions in a resource

## Pending
* Code refactoring (reduce ickiness)
* Make code base more generic 
* Write tests

## Requirements
* PHP >= 5.4.0
* MCrypt PHP Extension
* Composer

##### Extra Resources
[Mailchimp Email Blueprints](https://github.com/mailchimp/Email-Blueprints)
[Timezones](https://github.com/tamaspap/timezones)
