<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idea Submission Platform - README</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background: #f4f4f4;
            color: #333;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2, h3 {
            color: #444;
        }
        code {
            background: #eee;
            padding: 5px;
            border-radius: 5px;
        }
        pre {
            background: #eee;
            padding: 10px;
            border-radius: 5px;
            overflow-x: auto;
        }
    </style>
</head>
<body>

    <h1>💡 Idea Submission Platform</h1>
    <p>This project is a <strong>PHP-based web application</strong> that allows users to submit, view, update, and delete ideas. The application features a <strong>modern UI</strong> with Bootstrap and uses <strong>PDO (PHP Data Objects)</strong> for secure database interactions.</p>

    <h2>🚀 Features</h2>
    <ul>
        <li>Submit new ideas with a <strong>title</strong> and <strong>description</strong></li>
        <li>Display submitted ideas in a <strong>responsive table</strong></li>
        <li><strong>Update</strong> existing ideas</li>
        <li><strong>Delete</strong> ideas securely</li>
        <li><strong>Stylish UI</strong> with a glassmorphic effect</li>
    </ul>

    <h2>🛠️ Technologies Used</h2>
    <ul>
        <li><strong>PHP</strong> (Backend & Database interaction)</li>
        <li><strong>MySQL</strong> (Database storage)</li>
        <li><strong>PDO</strong> (Secure database connection)</li>
        <li><strong>Bootstrap 5</strong> (Frontend design)</li>
    </ul>

    <h2>📂 Project Structure</h2>
    <pre>
/project-root
│── config.php       # Database configuration  
│── index.php        # Main page (Submit, View, Update, Delete ideas)  
│── update.php       # Update idea page  
│── delete.php       # Delete idea page  
│── styles.css       # Custom styles (if applicable)  
│── README.md        # Project documentation  
    </pre>

    <h2>⚡ Installation</h2>
    <ol>
        <li>Clone the repository:</li>
        <pre><code>git clone https://github.com/your-username/idea-submission-platform.git</code></pre>
        <li>Set up the database:
            <ul>
                <li>Import the <code>database.sql</code> file into MySQL</li>
                <li>Update <code>config.php</code> with database credentials</li>
            </ul>
        </li>
        <li>Start a local PHP server:</li>
        <pre><code>php -S localhost:8000</code></pre>
        <li>Open the browser and go to <code>http://localhost:8000</code></li>
    </ol>

    <h2>🌟 Contributing</h2>
    <p>Feel free to fork the repository and submit a pull request for improvements!</p>

</body>
</html>
