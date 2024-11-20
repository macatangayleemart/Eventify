<?php
include APP_DIR.'views/templates/header.php';
?>
<body>
    <div id="app">
    <?php
    include APP_DIR.'views/templates/nav.php';
    ?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Event Finder</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        .hero {
            text-align: center;
            padding: 50px;
            background: #f4f4f4;
        }

        .hero h1 {
            margin: 0;
            font-size: 2.5em;
        }

        .hero p {
            margin: 10px 0 20px;
            color: #555;
        }

        .events-section {
            padding: 20px;
        }

        .event-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin: 15px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .event-card h3 {
            margin: 0 0 10px;
        }

        .event-card p {
            margin: 5px 0;
            color: #666;
        }

        .event-card .stars {
            color: gold;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">Local Event Finder</div>
        <nav>
        <nav>
    <a href="#" id="home-link">Home</a>
    <a href="/user/about" id="about-link">About</a>
    <a href="#" id="browse-link">Browse Events</a>
    <a href="#" id="contact-link">Contact</a>
</nav>
        </nav>
    </header>

    <section class="hero">
        <h1>Discover Local Events Around You!</h1>
        <p>From concerts to community meetups, find events tailored to your interests and location.</p>
    </section>

    <section class="events-section">
        <h2>Upcoming Events</h2>
        <div id="events-container">
            <?php if (!empty($events)): ?>
                <?php foreach ($events as $event): ?>
                    <div class="event-card">
                        <h3><?= htmlspecialchars($event['title']); ?></h3>
                        <p><?= htmlspecialchars($event['description']); ?></p>
                        <p><strong>Location:</strong> <?= htmlspecialchars($event['location']); ?></p>
                        <p><strong>Date:</strong> <?= htmlspecialchars($event['start_date']); ?> to <?= htmlspecialchars($event['end_date']); ?></p>
                        <p><strong>Price Range:</strong> <?= htmlspecialchars($event['price_range']); ?></p>
                        <p><strong>Popularity:</strong> <?= htmlspecialchars($event['popularity']); ?></p>
                        <p><strong>Ratings:</strong> 
                            <span class="stars">
                                <?= str_repeat('★', $event['ratings']) . str_repeat('☆', 5 - $event['ratings']); ?>
                            </span>
                        </p>
                        <p><strong>Type:</strong> <?= htmlspecialchars($event['type']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No events found.</p>
            <?php endif; ?>
        </div>
    </section>
</body>
</html>
