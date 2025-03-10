<?php require_once("config.php"); ?>
<?php $page_title = "Delete Idea 🚮"; ?>
<?php $page_text = "Idea Deletion Successful"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 100px auto;
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
        h1, p {
            text-align: center;
        }
        .alert {
            text-align: center;
            font-size: 1.2rem;
            margin-top: 20px;
        }
        .btn {
            width: 100%;
            margin-top: 15px;
            background: #ff4081;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background: #e91e63;
        }
        .go-back-btn {
            display: block;
            width: 100%;
            text-align: center;
            margin-top: 20px;
            font-size: 1rem;
            background: transparent;
            color: white;
            text-decoration: none;
            border: 2px solid #ff4081;
            padding: 10px;
            border-radius: 5px;
        }
        .go-back-btn:hover {
            background: #ff4081;
        }
    </style>
</head>
<body>

<div class="container">
    <h1><?php echo $page_title ?></h1>
    <p><?php echo $page_text ?></p>

    <?php if (isset($_GET['id'])): ?>
        <?php 
            $id = $_GET['id']; 
            $connection = new PDO($dsn, $database_user, $database_user_password); 
            $sql = "DELETE FROM ideas WHERE id = :id"; 
            $stmt = $connection->prepare($sql); 
            $stmt->bindValue(":id", $id); 
            $stmt->execute(); 
        ?>

        <div class="alert alert-success">
            <p>The idea #<?php echo $id ?> has been deleted successfully.</p>
        </div>

    <?php else: ?>
        <div class="alert alert-danger">
            <p>Error: No idea ID provided.</p>
        </div>
    <?php endif; ?>

    <a href="index.php" class="go-back-btn">Go Back</a>
</div>

</body>
</html>
