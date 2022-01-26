# Note App Project

## About the project

This project was an induvidual school assignment to work through CRUD in PHP. Assignment was to make a note website where visitors can create, see created notes, update, and delete notes.

### Assignment Requirements

- Website developed using HTML, CSS and PHP with minimum of one HTML-form.
- A connected SQL database with minimum of one table.
- Every Note should have an unique id, title, body text, and completed notation of some sort.
- Basic design, but design is no priority.

### Prerequisites

- You need Docker installed and running on your machine.

## Get started

1. Clone this repo to your local machine.

2. Navigate to the root folder of the project in
   your terminal and run the command docker-compose up

3. In your browser, navigate to address 127.0.0.1

4. Upen a new tab and go to 127.0.0.1:8080 to log into the database.

5. Login credentials are found in the docker-compose.yml file on line 27-29.

6. Once logged into the database notice the "Import" link highlighted in blue in the left panel of the site.

7. Click the import, and choose "upload file" and choose the "db.sql"-file found in the root folder of the project. Click execute.

8. You should now have a users, and notes table. Go back to the tab that's running the website in your browser and create an account.

9. Log in with your newly created account and create notes as you see fit.

10. To log out, navigate to the profile page and click "logout".
