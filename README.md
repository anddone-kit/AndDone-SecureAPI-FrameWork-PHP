# AndDone Framework - PHP

This project serves as a sample installation of a project utilizing **AndDone's PHP client library** to integrate with our APIs.

By following the instructions below, you will be able to see our API endpoints in action quickly.

- **Base PHP Client Library**: [AndDone-SecureAPI-ClientLibrary-PHP](https://github.com/anddone-kit/AndDone-SecureAPI-ClientLibrary-PHP)  
- **Developer Documentation**: [DevDocs](https://docs.anddone.com/)  
- **API Explorer**: [AndDone API Explorer](https://docs.anddone.com/explorer/)

---

## ✅ Prerequisites
You must have PHP, Composer and the Laravel Installer installed.\
Follow the steps in the next section or you can find full documenation for the Installation and Laravel at:

[Laravel Documenation](https://laravel.com/docs/11.x/installation#installing-php)


## Installation

1. Open a Powershell window as Administrator
2. Run the following command:
```sh
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.4'))
```


## Installing the API Sample Application
1. Open a Powershell window as Administrator
2. Create a new folder in the workspace folder of choice (ex: d:\workspace\anddone)
```sh
cd d:\workspace
mkdir anddone
```
4. Change to the new folder
```sh
cd anddone
```
5. Clone the repository
```sh
git clone https://github.com/FMK-Agency/anddone-php-sdk-sample-installation.git
````
6. Change to the "anddone-php-sdk-sample-installation" folder
```sh
cd anddone-php-sdk-sample-installation
```
7. Restore packages and Build Solution
```sh
npm i
composer install
npm run build
```
8. Configure PHP
    1.  Find where your php.ini is located.  From your powershell window:
    ```sh
    php -i
    ```
    2.  Look for the line starting with "Loaded Configuration File"
    3.  Open the php.ini for editing and change the "variable_order" to "GPCS".  Example: variables_order = "GPCS"
    4.  Save and close the php.ini file.

## Getting Started
1. Find and note your company AndDone Developer settings.
   1. Login to (UAT) https://portal.uat.anddone.com/   (Production) https://portal.anddone.com/
   2. In the left menu, click "Developer" then "API Keys"
   3. Your xApiKey will be the API Key
   4. Your xAppKey will be the App Key
2. Find your Origin by opening a browser and browse to: https://www.whatsmyip.org/  Your origin will be your IP Address
3. Copy the .env.example file to .env
```sh
cp .env.example .env
```
4. Using your favorite editor, edit file ".env"
5. Find the below settings and modify according to your company Developer settings found above. Update the SDK_ORIGIN, SDK_API_KEY and SDK_APP_KEY to the values to match your company settings.  Set the SDK_VERSION setting (ex: 2.1).  Save the settings and close the file.
```sh
SDK_ORIGIN='youripaddress'
SDK_API_KEY='yourapikey'
SDK_APP_KEY='yourappkey'
SDK_VERSION=2.1
```

## Running the Sample API Application
1. In Powershell, make sure you are in the folder d:\workspace\anddone\anddone-php-sdk-sample-installation
2. Enter the following command:
```sh
php artisan serve
```
3. You should see output similar to the following:

 INFO  Server running on [http://127.0.0.1:8000].

4. Open Chrome and navigate to [http://127.0.0.1:8000]


## Request Payloads
The API Calls are grouped into sections (menu links) on the left side menu.  For example, you can click on the "Payments" link to see all the Payment related API Calls in Tabs on the main screen.

For every API call, a Request Payload (in JSON format) is required.  All Request JSON Files are located in the "public/requests" folder.  When you Click on an API section in the Left Menu, you will see Tabs for each specific API Call.  Clicking on a specific API Tab will show the location and filename of the Request Payload.  In order to change the Request Payload, use an editor to modify the JSON file.  Save the file and re-run the API Call.  You do not need to stop/start the APISample application.

#### Reports Payload
The Reports Payload requires a "reportId" and "date".  To obtain these values:
 1. Login to (UAT) https://portal.uat.anddone.com/   (Production) https://portal.anddone.com/
 2. In the left menu, click "Reporting".
 3. Choose a Report and click "Generate Report"
 4. Enter the date for the data you want and click "Generate"
 5. This will take you to the Report List page.
 6. Note the URL will be in the format of: "/merchant/reports/generate-reports/KGx1n813"
 7. The final path in the URL (ex: KGx1n813) will be the "reportId" to use for the payload
 8. The "date" for the payload is the "Report Date" column on the Report List page, in the format "mm-dd-yyyy"

Note that instead of generating a new report, after clicking the left link "Reporting", you can select already generated reports and follow the same steps for obtaining the "reportId" and "date"

## Responses
After clicking the Run button to execute an API Call, the JSON output will be displayed on the screen.  

## Example API Calls
The code to call each API along with the Request and Response handling are broken out by API Sections.  The code examples are found in the "app\Http\Controllers" directory and named with section and "Controller".  For example, for Batch API Calls, the file "BatchesController.php" contains a sample for each Batch API Call.  This partioning of code allows the separation of the API Sample project UI code to avoid confusion with the basics of the actual API Calls.  

Each API Call takes in the Request data and returns the Response.  How the Request data is obtained is dependent on the project using the API DLL.  For example, this can be from a UI form, reading JSON or XML files or many other ways.  How the Response data is handled is also dependent on the use case of the project using the API DLL. 

## API Call Data Dependence
Some Request Payloads for an API Call may require dependent data from a different API Call.  For example, for "Payments", click the "Payments" section in the left menu.  Then click the "Create" tab and verify your Request Payload.  After verification, click the "Create" button.  The Response JSON will contain a "transactionId".  You can see the "Details" of the payment just created by click on the "Details" tab.  Update the reuqest payload for the Payment Details with the "transactionId" returned from the "Create" API Call.  You can then click the "Payment Details" to retrieve the details of the payment just created.

When Data Dependence exists, the tab containing the API Call will point out the depenedencies.

## Updates
To update the API Sample project, do the following:

1.  Change to the root folder
```sh
cd d:\workspace\anddone\anddone-php-sdk-sample-installation
```
2.  Pull the latest changes
```sh
git pull
```
3.  Rebuild the project
```sh
npm run build
```
