<?php include 'header.php'; ?>

<h1>MoziLista </h1>


<ul>
    <?php if (isset($_SESSION['username'])) : ?>
        <li><a href="index.php?menu=logout">Log Out</a></li>
        <li><a href="index.php?menu=add_movie">Add Movie</a></li>
        <li><a href="index.php?menu=movie_list">Movie List</a></li>
        <li><a href="index.php?menu=gallery">Image Gallery</a></li>
        <li><a href="index.php?menu=upload_image">Upload Image</a></li>
        <li><a href="index.php?menu=view_message">Messages</a></li>
    <?php else : ?>
        <li><a href="index.php?menu=login">Log In</a></li>
        <li><a href="index.php?menu=register">Register</a></li>
    <?php endif; ?>
    <li><a href="index.php?menu=contact">Contact</a></li>
</ul>

<h2>How it works:</h2>
<h3>Create an Account:</h3>
<p>
    Sign up for a free account to get started.
    Simply provide your email and choose a password.
</p>

<h3>Log In:</h3>
<p>
    Once you've created an account, log in to access your personalized movie lists.
</p>

<h3>Add Movies:</h3>

<p>
    Start adding movies to your lists. You can categorize them as:
</p>

<p>Watching: Movies you're currently watching.</p>
<p>Watched: Movies you've already watched.</p>
<p>To Watch: Movies you want to watch in the future.</p>

<p>
    With MoziLista, you'll never forget a movie you want to watch or lose track of what you've already seen.<br>
    Keep your movie-watching experience organized and enjoyable!
</p>



<!--video source and Css-->
<section id="video-section">
    <div class="video-container">
        <video controls autoplay>
            <source src="assets/video.mp4" type="video/mp4">
        </video>
    </div>
    <div class="video-container">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/SOP5v53DD74" frameborder="0" allowfullscreen></iframe>
    </div>
</section>



<section id="map-section">
    <h2>Our Location</h2>
    <iframe src="https://www.google.com/maps/place/Kecskem%C3%A9t,+Izs%C3%A1ki+%C3%BAt+10,+6000/@46.8951452,19.6662058,17z/data=!4m6!3m5!1s0x4743da7757651367:0xfe9bb765d75b9fc6!8m2!3d46.8951452!4d19.6676768!16s%2Fg%2F11bw4337jh?entry=ttu" frameborder="0" allowfullscreen></iframe>
</section>


<?php include 'footer.php'; ?>
