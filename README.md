ABOUT

Unlock the power of instant payments with our easy M-Pesa STK Push integration using the Intasend API. Simplify online transactions for your customers and skyrocket your website's performance. Say goodbye to lengthy checkout processes and hello to seamless payments with an optimized solution.

Language used : PHP
API: IntaSend API (for seamless transaction)

WHAT TO DO

Ensure you've incooperate your own credentials whether you want to do testing (DEVELOPER MODE) or run in Production mode (PRODUCTION MODE)

        API base URL: https://sandbox.intasend.com/api/
    
use the POST above if you're running in developer mode and,

        API base URL: https://payment.intasend.com/api/

if you wanna go live with the code.

First of all if you don't have an IntaSend account you may need to SignUp. Use the link below.

                Live environment for your production.
                Sign up URL: https://payment.intasend.com/account/signup/

If you want to be in Developer mode:

                Sandbox / Development Environment
                Sign up for the sandbox environment for your development and testing.

                Sign up URL: https://sandbox.intasend.com/


STEPS TO TAKE

1. Once you've created an account\you're in production mode, navigate to the intergration page to locate your publishable KEY and Token KEY.

As you generate the token KEY and acquire the Publishable KEY, go the code you extracted from above and navigate to the  "credentials.php" the paste the necessary details.

            'publishable_key'=>'YOUR-PUBLISHABLE-KEY',
            'token'=>'YOUR-TOKEN-KEY'

2. Delete the vendor folder present so that you can install your own by running the following command in your terminal.This will install the necessary packages that is in the composer.json file.

           composer install

3. Launch you XAMPP application or any application that you use to run PHP files.Incase of XAMPP application, ensure this entire folder is placed in the 'htdocs' folder in the XAMPP directorate for smooth running.

4. That's it ENJOY.
