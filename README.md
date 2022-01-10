# pedasys-Task

Fetch TodoList ordered by the due date API
Endpoint: /api/todolist 
Method: GET

Create to-do items API
Endpoint:/additem
Params: json/Text
{
    "attachment":"test.jpg",
	"duedate":"1991-12-29",
	"reminder":"Day",
	"title":"Market a project",
	"user_id":"2",
	"status":1
}
Method: POST

Upload File API 
Endpoint:/fileupload
Method:POST
param: Upload file using form type data in postman


Fetch items with a complete/incomplete filter API
Endpoint:fetch/{param}
param:complete/Incomplete(String)
Method: GET


Edit to-do items API
Endpoint:/updateitem
{
    "id":1
    "attachment":"test.jpg",
	"duedate":"1991-12-29",
	"reminder":"Day",
	"title":"Market a project",
	"user_id":"2",
	"status":1
}
Method: PUT



Able to delete to-do items API
Endpoint:delete/{id}
Params: ID(Int)
Method:Delete

Must be able to mark a to-do item as done (so it is returned in the done list) API
Endpoint:updateitemstatus/{id}
Params: ID(Int)
Method:PUT

Send Reminder Email Funtionality
Enpoint to Send Email for due date:/reminder/
To Run a scheduler run command in terminal-> php artisan schedule:run






DATABASE
pedasys.sql file is attached in the repository just import it into the db


Add credetials to ENV File as mentioned below

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<your db name>
DB_USERNAME=<your db username>
DB_PASSWORD=<your db password>
MAIL_MAILER=smtp
MAIL_HOST=smtp.googlemail.com
MAIL_PORT=465
MAIL_USERNAME=<senders email address>
MAIL_PASSWORD=<senders email password>
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=<senders email address>
MAIL_FROM_NAME="TodoList"



