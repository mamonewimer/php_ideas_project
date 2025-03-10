<?php require_once("config.php"); ?>
<?php $page_title = "Update Idea 💡"; ?>
<?php $page_text = "Modify your idea details below"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            max-width: 500px;
            background: rgba(255, 255, 255, 0.12);
            padding: 30px;
            border-radius: 15px;
            backdrop-filter: blur(15px);
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
            transition: 0.3s ease-in-out;
        }

        .container:hover {
            transform: translateY(-5px);
        }

        h1 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 15px;
        }

        p {
            font-size: 1rem;
            opacity: 0.9;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: 600;
            text-align: left;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: none;
            border-radius: 8px;
            outline: none;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            transition: 0.3s;
            font-size: 1rem;
        }

        input:focus,
        textarea:focus {
            background: rgba(255, 255, 255, 0.3);
            box-shadow: 0px 0px 12px rgba(255, 255, 255, 0.5);
        }

        textarea {
            height: 100px;
            resize: none;
        }

        .btn {
            width: 100%;
            background: linear-gradient(135deg, #ff4081, #ff79b0);
            color: white;
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            font-size: 1.1rem;
        }

        .btn:hover {
            background: linear-gradient(135deg, #e91e63, #ff5687);
            transform: scale(1.05);
            box-shadow: 0px 5px 15px rgba(255, 64, 129, 0.5);
        }

        .go-back-btn {
            display: block;
            margin-top: 15px;
            text-decoration: none;
            font-size: 1rem;
            font-weight: bold;
            color: white;
            border: 2px solid #ff4081;
            padding: 10px;
            border-radius: 8px;
            transition: 0.3s;
        }

        .go-back-btn:hover {
            background: #ff4081;
            color: white;
            transform: scale(1.05);
        }
    </style>
</head>

<body>

    <div class="container">
        <h1><?php echo $page_title ?></h1>
        <p><?php echo $page_text ?></p>
        <a href="index.php" class="go-back-btn">⬅️ Go Back</a>

        <?php if (isset($_GET['id'])): ?>
            <?php
            $id = $_GET['id'];
            $connection = new PDO($dsn, $database_user, $database_user_password);
            $sql = "SELECT * FROM ideas WHERE id = :id";
            
            $statement = $connection->prepare($sql);
            $statement->bindParam(":id", $id);
            $statement->execute();
            $idea = $statement->fetch(PDO::FETCH_ASSOC);
            ?>
          <?php 
if (isset($_POST['title']) && strlen($_POST['title']) > 30) { 
    echo "Title is too long"; 
} 
?>

            <form method="post">
                <?php foreach ($idea as $key => $value): ?>
                    <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
                    <?php if ($key == 'text'): ?>
                        <textarea name="<?php echo $key; ?>" id=""><?php echo $value; ?></textarea>
                        <?php if ($key == 'id') {
                            echo 'readonly';
                        } ?>

                    <?php else: ?>
                        <?php if ($key == 'id') {
                            echo 'readonly';
                        } ?>

<input type="text" value="<?php echo htmlspecialchars($value); ?>" id="<?php echo $key; ?>" name="<?php echo $key ; ?>" 
<?php if ($key == 'id') echo 'readonly'; ?>>


                    <?php endif; ?>

                <?php endforeach; ?>

                <button type="submit" class="btn">💾 Update Idea</button>
            </form>
            <?php if(isset($_POST['id'])): ?>
                <?php $idea = array(
                    'id' => $_POST['id'],
                    'title' => $_POST['title'],
                    'text' => $_POST['text']
                ); ?>
                <?php $connection = new PDO($dsn, $database_user, $database_user_password);?>
                <?php $sql = "UPDATE ideas SET title=:title, text=:text WHERE id=:id"; ?>
                <?php $statement = $connection->prepare($sql); ?>
                <?php $statement->execute($idea); ?>
                <div class="alert alert-success">
                    <p>The idea has been updated successfully.</p>
                </div>
                <?php endif; ?>
                
        <?php endif; ?>
    </div>

</body>

</html>