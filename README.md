# About BreakWP
This standalone repo is for teaching new developers how to intentionally break a WordPress Site so when they encounter it in the real world, they are prepared to handle it.

# Before you begin
You are required to [install docker](https://docs.docker.com/install/) and [docker composer](https://docs.docker.com/compose/install/) on your computer. You are HIGHLY recommended to  [install git](https://git-scm.com/downloads). You can also install [github gui](https://desktop.github.com/) if you prefer more visual stuff.This will help you track changes to files.

Once these are properly installed you can download this either as a zip or just clone/fork the repo.

## Starting the exercise
If you are using git/github open up the `.gitignore` and remove everyline except  
```
readme.html 
license.txt
```
Then make a commit with all the WordPress files. This will allow you to see any changes in the files during the exercise. It will not however help you when changes are made to your database.

Now simply run `docker compose up` or `docker compose up -d` to run in the background. If you something running on ports 8000 or 8080 then it will error out. 

Once you have everything in you will need to setup/install wordpress on ```localhost:8000```.
Then you will want to test that PhpmyAdmin  will run on ```localhost:8080```.

On wordress the username will be `wordpress` and the password will be `wordpress`. Select "Confirm use of weak password".

On phpmy admin the username will be `wordpress` and the password will be `wordpress`.

Please note, we are intentionally making this site vulnerable to hackers for education purposes. A such, please do not deploy this to a live site under any condition.


## Step 1 - Using Git and Checking your core files
When you have setup WP, please navigate to ```localhost:8000/break1.php```. Your site should now be broken. If you used source control like git and made a git commit / push you, you can now check if any if changed. If you are for some reason, not using source control you should be and this is a good reason why. 

For now, simply delete `wp-config.php`. Then run `docker-compose down` and then `docker-compose up`. Now your site is back up and running. This is because the file changed something called "connection strings" which is how a site connects to the database.


## Step 2 - WP Admin Login Issues
After you have finished the first step, please navigate to ```localhost:8000/test/break2.php```. 
Now try to login to the dashboard via  `http://localhost:8000/wp-login.php`. 

You may or may not need to repeat the steps of the previous exersice at this point. This time though, Docker may not rebuild everything like last time. Run `rm -rf -f wp-*/ && rm  -f .htaccess && rm -f license.txt &&  rm -f index.php && rm -f wp-*.php` and try to rebuild the site.

As you'll notice you wont be able to login.
Lets go check our database via phpmyadmin or `http://localhost:8080.

Now trys [reset the password](https://kinsta.com/knowledgebase/reset-wordpress-admin-password).


Hint: you will want check wp_options table to select the MD5 option.

## Step 3 - Checking the path / theme
Hint: check the htaccess file

## Step 4 - Checking plugins
Hint: check the htaccess file


## Step 5 - Automate testing these issues.



## This exercise WILL
  * Teach real world troubleshooting of real issues
  * Teach basics of WordPress maintiance
  * Teach the importance of using version control like git
  * Simulates the after effect of a malware attack and thrives to teach atleast the basics of cleanup

## This exercise will NOT:
  * Teach you how to develop WordPress
  * Teach you all the ins & outs of docker and docker-compose, we just use it



## External Readings
[UI Testing with Puppeteer and Mocha](https://medium.com/@ankit_m/ui-testing-with-puppeteer-and-mocha-part-1-getting-started-b141b2f9e21)
[Testing 2](https://medium.com/@dpark/ui-testing-with-puppeteer-and-mocha-8a5c6feb3407)