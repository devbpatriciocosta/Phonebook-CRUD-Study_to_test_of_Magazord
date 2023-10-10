<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove Group</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 50px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
        }

        h1 {
            margin-top: 0;
            text-align: center;
            font-size: 36px;
            color: #333;
        }

        p {
            font-size: 18px;
            color: #666;
            margin-bottom: 20px;
        }

        input[type="submit"], a {
            display: inline-block;
            background-color: #2ecc71;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 18px;
            margin-right: 10px;
            transition: all 0.3s ease-in-out;
        }

        input[type="submit"]:hover, a:hover {
            background-color: #27ae60;
        }

        a {
            background-color: #e74c3c;
        }

        a:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Remove Group</h1>
        <form method="post" action="#">
            <p>Are you sure you want to delete this group?</p>
            <input type="submit" name="submit" value="Delete Group">
            <a href="groups.php" class="back-link" title="back to groups">Cancel</a>
        </form>
    </div>

</body>
</html>














<!--       .message {
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 4px;
      }
      .error {
        background-color: #ffe0e0;
        color: #d8000c;
      }
      .success {
        background-color: #e6ffe6;
        color: #006600;
      } -->