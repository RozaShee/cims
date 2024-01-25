
<?php
// Include your database connection code here
$con =  mysqli_connect("localhost", "root", "", "cimsdb") or die("Database Connection Fail");

// Fetch feedback data from the database
$selectQuery = "SELECT * FROM feedback";
$result = mysqli_query($con, $selectQuery);

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'pages/head.php'; ?>

<head>
<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #4285f4;
            margin-top: 20px;
        }

        p {
            text-align: center;
            color: #4285f4;
            font-size: 18px;
        }

        #test {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 15px;
        }

        #test p {
            margin: 5px 0;
        }

        .rating {
            unicode-bidi: bidi-override;
            direction: rtl;
            text-align: center;
            position: relative;
            display: inline-block;
        }

        .rating > span {
            display: inline-block;
            position: relative;
            width: 1.1em;
            color: #ccc;
            font-size: 24px;
            transition: color 0.3s ease; /* Added transition for smooth color change */
        }

        .rating > span:before {
            content: "\2605";
            position: absolute;
        }

        .rating > span:hover:before,
        .rating > span:hover ~ span:before {
            color: gold;
        }
    </style>
</head>


<body>
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between mt-0 px-2">
                    <h1 class="mb-0"><a href="index.php" class="text-warning h5 mb-0 px-2 ">2NK Sacco </a></h1>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-item active ">
                        <a href="index.php" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item ">
                        <a href="customer.php" class='sidebar-link'>
                            <i class="bi bi-people-fill"></i>
                            <span>Customer</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="price.php" class='sidebar-link'>
                            <i class="bi bi-table"></i>
                            <span>Price Table</span>
                        </a>
                    </li>
                    <!-- <li class="sidebar-item has-dropdown">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-file-earmark-bar-graph"></i>
                            <span>Reports</span>
                        </a>
                        <ul class="dropdown">
                            <li><a href="price_chart.php" class="sidebar-link">Price Chart</a></li>
                            <li><a href="customer_chart.php" class="sidebar-link">Customer Chart</a></li>
                            <li><a href="cust_request_chart.php" class="sidebar-link">Customer Request Chart</a></li>
                            <li><a href="area_chart.php" class="sidebar-link">Area Chart</a></li>
                        </ul>
                    </li> -->
                    <li class="sidebar-item">
                        <a href="courier.php" class='sidebar-link'>
                            <i class="bi bi-truck"></i>
                            <span>Courier</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="reviews_display.php" class='sidebar-link'>
                            <i class="bi bi-star-fill"></i> <!-- Filled star -->
                            <span>Reviews</span>
                        </a>
                    </li>    
                    <li class="sidebar-item">
                        <a href="message.php" class='sidebar-link'>
                            <i class="bi bi-chat"></i>
                            <span>Message</span>
                        </a>
                    </li>
                    <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin') : ?>
                        <li class="sidebar-item">
                            <a href="branch.php" class='sidebar-link'>
                                <i class="bi bi-columns"></i>
                                <span>Branches</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="sidebar-item">
                        <a href="employee.php" class='sidebar-link'>
                            <i class="bi bi-person-fill"></i>
                            <span>Employee</span>
                        </a>
                    </li>
                    <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin') : ?>
                        <li class="sidebar-item">
                            <a href="area.php" class='sidebar-link'>
                                <i class="bi bi-geo-alt-fill"></i>
                                <span>Area</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="gallery.php" class='sidebar-link'>
                                <i class="bi bi-images"></i>
                                <span>Gallery</span>
                            </a>
                        <?php endif; ?>
                        </li>
                    <li class="sidebar-item">
                        <a href="settings.php" class='sidebar-link'>
                            <i class="bi bi-gear-fill"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="logout.php" class='sidebar-link'>
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Log Out</span>
                        </a>
                    </li>
                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>

    <div id="body">
    <p style="color: black;">Customer Reviews;</p>
    <div id="test">
        <?php
        // Check if the function already exists before declaring it
        if (!function_exists('getStarRating')) {
            // Function to generate star rating based on the given rating value
            function getStarRating($rating)
            {
                $rating = intval($rating);
                $stars = "";
                for ($i = 1; $i <= 5; $i++) {
                    $stars .= ($i <= $rating) ? "★" : "☆";
                }
                return "<span class='rating'>$stars</span>";
            }
        }

        // Display feedback data
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div>";
            echo "<p><strong>Username:</strong> " . $row['username'] . "</p>";
            echo "<p><strong>Delivery Process Rating:</strong> " . getStarRating($row['delivery_process_rating']) . "</p>";
            echo "<p><strong>Service Satisfaction Rating:</strong> " . getStarRating($row['service_satisfaction_rating']) . "</p>";
            echo "<p><strong>Package Condition Rating:</strong> " . getStarRating($row['package_condition_rating']) . "</p>";
            echo "<p><strong>Suggestions:</strong> " . $row['suggestions'] . "</p>";
            echo "<p><strong>Submitted Time:</strong> " . time_ago(strtotime($row['created_at'])) . "</p>";
            echo "</div>";
        }

        // Function to generate a human-readable time difference
        function time_ago($timestamp)
{
    $current_time = time();
    $time_difference = $current_time - $timestamp;
    $seconds = $time_difference;
    $minutes = round($seconds / 60);           // value 60 is seconds
    $hours = round($seconds / 3600);           // value 3600 is 60 minutes * 60 sec
    $days = round($seconds / 86400);           // value 86400 is 24 hours * 60 minutes * 60 sec
    $weeks = round($seconds / 604800);         // value 604800 is 7 days * 24 hours * 60 minutes * 60 sec
    $months = round($seconds / 2629440);       // value 2629440 is ((365+365+365+365+366)/5/12) days * 24 hours * 60 minutes * 60 sec
    $years = round($seconds / 31553280);       // value 31553280 is ((365+365+365+365+366)/5) days * 24 hours * 60 minutes * 60 sec

    if ($seconds <= 60) {
        return "Just Now";
    } elseif ($minutes < 60) {
        return ($minutes == 1) ? "one minute ago" : "$minutes minutes ago";
    } elseif ($hours < 24) {
        return ($hours == 1) ? "an hour ago" : "$hours hours ago";
    } elseif ($days < 7) {
        return ($days == 1) ? "yesterday" : "$days days ago";
    } elseif ($weeks < 4.3) {
        return ($weeks == 1) ? "a week ago" : "$weeks weeks ago";
    } elseif ($months < 12) {
        return ($months == 1) ? "a month ago" : "$months months ago";
    } else {
        return ($years == 1) ? "one year ago" : "$years years ago";
    }
}

        // Close the database connection
        mysqli_close($con);
        ?>
    </div>
    </div>

</body>

</html>