  <?php  
include('header.php'); 
include('mail/connection.php');

if(isset($_GET['post'])) {

    $id=mysqli_real_escape_string($conn, $_GET['post']);
    $query="SELECT * FROM posts WHERE id='$id' ";
}

        
    


$result = $conn->query($query);
?>

    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/post-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                    <?php  if($result->num_rows > 0) {
                while( $row = $result->fetch_assoc()) {
                ?>
<div class="post-heading">
                        <h1><?php echo $row['title'];?></h1>
                        <h2 class="subheading"><?php echo $row['subtitle'];?></h2>
                        <span class="meta">Posted by <?php echo $row['author'];?><a href="#"></a> on <?php echo $row['date'];?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <p><?php echo $row['textlong'];?></p>
                  </div>
            </div>
        </div>
    </article>

    <hr>
                
                <?php } } ?>






                    

 <?php  
include('footer.php'); 
?>