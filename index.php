<?php require_once("config.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Your Idea</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            font-family: Arial, sans-serif;
        }
        .table-container {
        max-width: 800px;
        margin: 30px auto;
        background: rgba(255, 255, 255, 0.1);
        padding: 20px;
        border-radius: 10px;
        backdrop-filter: blur(10px);
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        overflow-x: auto;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        color: white;
        text-align: left;
        border-radius: 10px;
        overflow: hidden;
    }
    th, td {
        padding: 15px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }
    th {
        background: rgba(255, 255, 255, 0.2);
        font-weight: bold;
    }
    tr:hover {
        background: rgba(255, 255, 255, 0.15);
    }
    .delete-btn {
        color: #ff4081;
        cursor: pointer;
        font-size: 18px;
        transition: 0.3s;
    }
    .delete-btn:hover {
        color: #e91e63;
        transform: scale(1.2);
    }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            margin-top: 10px;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: none;
            border-radius: 5px;
            outline: none;
        }
        input:focus, textarea:focus {
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }
        .btn {
            width: 100%;
            margin-top: 15px;
            background: #ff4081;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background: #e91e63;
        }
        .alert {
            margin-top: 10px;
            text-align: center;
        }
        .update-btn {
    display: inline-block;
    padding: 8px 12px;
    border-radius: 5px;
    font-size: 14px;
    font-weight: bold;
    transition: all 0.3s ease-in-out;
}

.update-btn:hover {
    background: #ffca28;
    color: black;
    transform: scale(1.05);
}
    </style>
</head>
<body>

<div class="container">
    <h2>Submit Your Idea</h2>

    <?php
    $idea_title = "";
    $idea_text = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        if (!empty($_POST["title"]) && !empty($_POST["text"])) {
            $idea_title = $_POST["title"];
            $idea_text = $_POST["text"];
            
            $new_idea = array('title' => $idea_title, 'text' => $idea_text);
            $sql = "INSERT INTO ideas (title, text) VALUES (:title, :text)";
            
            try {
                $stmt = $connection->prepare($sql);
                $stmt->execute($new_idea);
                echo "<div class='alert alert-success'>🎉 Idea submitted successfully!</div>";
            } catch (PDOException $e) {
                echo "<div class='alert alert-danger'>❌ Error: " . $e->getMessage() . "</div>";
            }
        } else {
            echo "<div class='alert alert-warning'>⚠️ Please fill in all fields.</div>";
        }
    }
    ?>

    <?php if (!empty($idea_title) && !empty($idea_text)): ?>
        <div class="alert alert-info">
            <h3>✅ Your Idea was Added Successfully</h3>
            <p><strong>Title:</strong> <?php echo htmlspecialchars($idea_title); ?></p>
            <p><strong>Text:</strong> <?php echo nl2br(htmlspecialchars($idea_text)); ?></p>
        </div>
    <?php endif; ?>

    <form action="" method="POST">
        <label for="title">Enter your idea title</label>
        <input type="text" name="title" required>

        <label for="text">Idea Text</label>
        <textarea name="text" rows="5" required></textarea>

        <button type="submit" name="submit" class="btn">Submit</button>
    </form>

</div>
<?php $connection = new PDO($dsn, $database_user, $database_user_password);?>
<?php $sql = "SELECT * FROM ideas"; ?>
<?php $stmt = $connection->prepare($sql);?>
<?php $stmt->execute();?>
<?php $results = $stmt->fetchAll((PDO::FETCH_ASSOC)); ?>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Text</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $row): ?>
            <tr>
            <td>
    <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm update-btn"><i class="fas fa-edit"></i> Update ✍🏻</a></td>
                <td><?php echo $row['title'] ?></td>
                <td><?php echo $row['text'] ?></td>
                <td><span class="delete-btn" > <a href="delete.php?id=<?php echo $row['id'] ?>">❌</a></span></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
