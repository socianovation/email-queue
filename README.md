# E-Mail Queue
Sending Email with PHP Lumen and RabbitMQ 

### How to use
1. Install RabbitMQ in your environment
Follow this guide : https://www.digitalocean.com/community/tutorials/how-to-install-and-manage-rabbitmq
2. After installing RabbitMQ, start the rabbitmq service, navigate to http://[your server ip]:15672
3. Login with your credential (by default guest:guest)
4. Create a new queue (In the example, i set the queue name as 'sending-email') and make sure you set "durable" option to true. 
5. Clone this repo
6. Run ```composer install ```
7. Change the .env content (MAIL_USERNAME and MAIL_PASSWORD) with your mailtrap account or your other mail service provider
8. For the queue listener, run ```php artisan email:listener ```
9. Run ```php -S localhost:8000 -t public```
10. Try run http://localhost:8000/send-email?
to=<email_to>
&from=<email_from>
&content=<email_content>
&subject=<email_subject>
11. Done!! Your email will be sent
