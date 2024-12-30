
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        
    </style>
</head>

<?php
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nameErr = $emailErr = $genderErr = $agreeErr = "";
$name = $email = $gender = $group = $classDetails = $agree = "";
$select = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and spaces allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        
        }
    }
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }

   
    if (empty($_POST["agree"])) {
        $agreeErr = "You must agree to the terms";
    } else {
        $agree = $_POST["agree"];
    }

    if (isset($_POST["select"])) {
        $select = $_POST["select"];
    }

    if (empty($nameErr) && empty($emailErr) && empty($genderErr) && empty($agreeErr)) {
        $showData = true; 
    }

?>

<body>

    <div class="form-container">
        <h1>Registration form</h1>
        

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" value="<?php echo $name; ?>">
                <span class="required">* <?php echo $nameErr; ?></span>
            </div>

            <div class="form-group">
                <label>E-mail:</label>
                <input type="email" name="email" value="<?php echo $email; ?>" required>
                <span class="required">* <?php echo $emailErr; ?></span>
            </div>

            <div class="form-group">
                <label>Group :</label>
                <input type="text" name="group" value="<?php echo $group; ?>">
            </div>

            <div class="form-group">
                <label>Class details:</label>
                <textarea name="classDetails"><?php echo $classDetails; ?></textarea>
            </div>

            <div class="form-group">
                <label>Gender:</label>  <span class="required">* <?php echo $genderErr; ?></span>
                <div class="radio-group">
                    <input type="radio" name="gender" id="female" value="female" <?php if ($gender == 'female') echo 'checked'; ?> required>
                    <label for="female">Female</label>
                    <input type="radio" name="gender" id="male" value="male" <?php if ($gender == 'male') echo 'checked'; ?>>
                    <label for="male">Male</label>
                   
                </div>
                
            </div>

            <div class="form-group">
                <label>Select Courses:</label>
                <select multiple name="select[]">
                    <option value="PHP" <?php if (in_array("PHP", $select)) echo 'selected'; ?>>PHP</option>
                    <option value="JavaScript" <?php if (in_array("JavaScript", $select)) echo 'selected'; ?>>JavaScript</option>
                    <option value="MySQL" <?php if (in_array("MySQL", $select)) echo 'selected'; ?>>MySQL</option>
                    <option value="HTML" <?php if (in_array("HTML", $select)) echo 'selected'; ?>>HTML</option>
                </select>
            </div>

            <div class="form-group">
                <label>Agree</label>
                <input name="agree" type="checkbox" value="agreed" <?php if ($agree == 'agreed') echo 'checked'; ?> required>
                <span class="required">* <?php echo $agreeErr; ?></span>
            </div>

            <input type="submit" value="Submit" class="submit-btn">
        </form>

        <?php if (isset($showData) && $showData): ?>
        <h2>Your Submitted Data:</h2>
        <p><strong>Name:</strong> <?php echo $name; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Group:</strong> <?php echo test_input($_POST["group"]); ?></p>
        <p><strong>Class Details:</strong> <?php echo test_input($_POST["classDetails"]); ?></p>
        <p><strong>Gender:</strong> <?php echo $gender; ?></p>
        <p><strong>Selected Courses:</strong> <?php echo implode(", ", $select); ?></p>
        <p><strong>Agree:</strong> <?php echo $agree; ?></p>
        <?php endif; ?>

    </div>

</body>

</html>