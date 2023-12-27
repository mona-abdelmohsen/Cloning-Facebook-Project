
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/updatepage.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updata Details</title>
</head>
<body>
    <div class="container">
        <form action="profile.php" method="POST">
            <div class="inputUPdata">
                <span>profile image:</span>
                <input type="file" value="" name="profile_image">
            </div>
            <div class="inputUPdata">
                <span>background image:</span>
                <input type="file" value="" name="background_image">
            </div>
            <div class="inputUPdata">
                <span>Work in:</span>
                <input type="text" value="" name="work_in">
            </div>
            <div class="inputUPdata">
                <span>Study in :</span>
                <input type="text" value="" name="study_in">
            </div>
            <div class="inputUPdata">
                <span>Lives in:</span>
                <input type="text" value="" name="live_in">
            </div>
            <div class="inputUPdata">
                <span>From :</span>
                <input type="text" value="" name="from">
            </div>
            <div class="inputUPdata">
                <span>Birthday :</span>
                <input type="date" value="" name="Birthday">
            </div>
            <div class="inputUPdata">
                <span>link     :</span>
                <input type="text" value="" name="link">
            </div>
            <input type="submit" value="Update" id="updata">
        </form>



    </div>
</body>
</html>