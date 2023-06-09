<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Blood Bank PHP Laravel Project</h1>
    <p>This is a Blood Bank Management System built using PHP Laravel framework and Bootstrap along with vanilla CSS for the front-end. The system allows users to register and login to request blood and hospitals to donate blood. Hospitals can check their blood bank storage, pending requests from any user along with accepting or declining requests from users. Users can see the list of available hospitals providing blood and request them through this web app.
    </p>
    <h2>Features</h2>
    <ul>
        <li>User Registration and Login</li>
        <li>Blood Donation and Request</li>
        <li>Blood searching by group</li>
        <li>Dashboard to see pending requests and blood storage</li>
    </ul>
    <h2>Installation</h2>
    <ol>
        <li>Clone the repository to your local machine</li>
        <li><code>cp .env.example .env</code></li>
        <li>Run <code>composer install</code> to install the required dependencies</li>
        <li>Create a new empty MySQL database and update the <code>.env</code> file with the database details</li>
        <li>Run <code>php artisan key:generate</code></li>
        <li>Run <code>php artisan migrate:fresh --seed</code></li>
        <li>Start the development server by running <code>php artisan serve</code></li>
    </ol>
    <h2>Technologies Used</h2>
    <ul>
        <li>PHP Laravel Framework</li>
        <li>Bootstrap</li>
        <li>MySQL</li>
    </ul>
    <h2>Credits</h2>
    <p>This project was developed by Naimur Rahman. If you find any issues with the code, feel free to open a GitHub issue or submit a pull request.</p>
    <h2>License</h2>
    <p>This project is licensed under the MIT License. Feel free to use it for your own purposes or modify it as needed.</p>
</body>
</html>
#   b l o o d b a n k - m a n a g e m e n t - s y s t e m  
 