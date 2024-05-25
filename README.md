## <span style="font-size:24px;">ABOUT</span>

Unlock the power of instant payments with our easy M-Pesa STK Push integration using the IntaSend API. Simplify online transactions for your customers and skyrocket your website's performance. Say goodbye to lengthy checkout processes and hello to seamless payments with an optimized solution.

**Language used**: PHP  
**API**: IntaSend API (for seamless transactions)

## <span style="font-size:24px;">WHAT TO DO</span>

Ensure you've incorporated your own credentials whether you want to do testing (DEVELOPER MODE) or run in Production mode (PRODUCTION MODE).

- **API base URL** (Developer Mode): `https://sandbox.intasend.com/api/`
- **API base URL** (Production Mode): `https://payment.intasend.com/api/`

If you don't have an IntaSend account, you may need to sign up. Use the links below:

- **Live environment for your production**:  
  Sign up URL: [https://payment.intasend.com/account/signup/](https://payment.intasend.com/account/signup/)

- **Sandbox / Development Environment**:  
  Sign up for the sandbox environment for your development and testing.  
  Sign up URL: [https://sandbox.intasend.com/](https://sandbox.intasend.com/)

## <span style="font-size:24px;">STEPS TO TAKE</span>

1. **Create an Account / Switch to Production Mode**:  
   Once you've created an account or you're in production mode, navigate to the integration page to locate your publishable KEY and Token KEY.  
   As you generate the token KEY and acquire the Publishable KEY, go to the code you extracted from above and navigate to the `credentials.php`, then paste the necessary details:

    ```php
    'publishable_key' => 'YOUR-PUBLISHABLE-KEY',
    'token' => 'YOUR-TOKEN-KEY'
    ```

2. **Install Dependencies**:  
   Delete the vendor folder present so that you can install your own by running the following command in your terminal. This will install the necessary packages that are in the `composer.json` file.

    ```sh
    composer install
    ```

3. **Run PHP Files**:  
   Launch your XAMPP application or any application that you use to run PHP files. In the case of the XAMPP application, ensure this entire folder is placed in the `htdocs` folder in the XAMPP directory for smooth running.

4. That's it! <span style="font-size:16px;">ENJOY</span>.
