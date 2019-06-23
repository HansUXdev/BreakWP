# About BreakWP
This standalone repo is for teaching new developers how to intentionally break a WordPress Site so when they encounter it in the real world, they are prepared to handle it.

# GOALS
The measures of success for this repo are:
* Feel confident you can fix a 500, 404, etc errors on WP
* Less time on the phone with your hosting provider
* Understand why things break and how to prevent things from breaking in the future
* Security Mindful - You don't have to be a security engineer to have good development habits
<!-- * Test Locally - Deploy anywhere -->

# Before you begin
You are required to [install docker](https://docs.docker.com/install/) and [docker composer](https://docs.docker.com/compose/install/) on your computer. You are HIGHLY recommended to  [install git](https://git-scm.com/downloads). You can also install [github gui](https://desktop.github.com/) if you prefer more visual stuff. This will help you track changes to files. I also strongly recommend you [install node](https://nodejs.org/en/download/) because this project uses it for testing via mocha, chai and puppeteer.

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

<!-- You may or may not need to repeat the steps of the previous exersice at this point. This time though, Docker may not rebuild everything like last time. Run `rm -rf -f wp-*/ && rm  -f .htaccess && rm -f license.txt &&  rm -f index.php && rm -f wp-*.php` and try to rebuild the site. -->

As you'll notice you wont be able to login.
Lets go check our database via phpmyadmin or `http://localhost:8080.

Now try to [reset the password](https://kinsta.com/knowledgebase/reset-wordpress-admin-password).

Hint: you will want check wp_options table to select the MD5 option.

## Step 3 - Bad Themes / Plugins
In Progress...

## In Consideration - 
If you want to see these let me know or I may never work on it
  * Migration Exercises
      * DB migration
      * Content migration
      * Article on gotchas with different hosting providers
  * WpScan for teaching predeployment vulnerability scans
      * Bruteforce Attacks
      * DDOS Prevention
      * Open to suggestions & PR's
  * Automate Testing 
  * Add (S)FTP to docker container to teach ftp
  * Testing Email?

## Reading about the project
  * [Breaking WordPress: Part 1](https://medium.com/swlh/using-docker-to-teach-local-wordpress-development-1b5ca2ce22c3)
  * [Breaking WordPress: Part 2](https://medium.com/swlh/testing-wordpress-with-mocha-chai-f531bed8ffad)

## Video Lession on Docker
If you haven't used docker, thats ok.
Here are some video tutorials by [Brad Traversy](github.com/bradtraversy/) to help cover the gap.
* [Quick Wordpress Setup With Docker](https://www.youtube.com/watch?v=pYhLEV-sRpY&t=272s)
* [Docker Playlist](https://www.youtube.com/watch?v=Kyx2PsuwomE&list=PLillGF-Rfqbb6vZqT-Lzi9Al_noaY5LAs)
* [Exploring The Wordpress REST API & React Integration](https://www.youtube.com/watch?v=fFNXWinbgro&t=2703s)

## External Readings
* [UI Testing with Puppeteer and Mocha](https://medium.com/@ankit_m/ui-testing-with-puppeteer-and-mocha-part-1-getting-started-b141b2f9e21)
* [Testing 2](https://medium.com/@dpark/ui-testing-with-puppeteer-and-mocha-8a5c6feb3407)

# Disclaimer

## These exercises WILL
  * Teach real world troubleshooting of real issues
  * Teach basics of WordPress maintiance
  * Teach the importance of using version control like git and tests
  * Simulates the after effect of a malware attack and poor wordpress maintance.
## These exercises will NOT:
  * Teach you how to develop WordPress
  * Teach you the ins & outs of docker and docker-compose, we just use it for a safe place.

