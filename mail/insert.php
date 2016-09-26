<?php
include('connection.php');

if( isset( $_POST['add'] ) ) {

     function validateFormData( $formData ) {
        $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }

    
    // set all variables to empty by default
    $title = $subtitle = $author = $date = $textlong = " ";
    
    // check to see if inputs are empty
    // create variables with form data
    // wrap the data with our function
    
    if( !$_POST["title"] ) {
        $titleError = "Please enter a title <br>";
    } else {
        $title = validateFormData( $_POST["title"] );
    }

if( !$_POST["subtitle"] ) {
        $subtitleError = "Please enter a sub title <br>";
    } else {
        $subtitle = validateFormData( $_POST["subtitle"] );
    }

    if( !$_POST["author"] ) {
        $authorError = "Please enter author <br>";
    } else {
        $author = validateFormData( $_POST["author"] );
    }
    
    

    if( !$_POST["date"] ) {
        $dateError = "Please enter date <br>";
    } else {
        $date = validateFormData( $_POST["date"] );
    }
    
    if( !$_POST["textlong"] ) {
        $textError = "Please enter text <br>";
    } else {
        $textlong = validateFormData( $_POST["textlong"] );
    }
    // if required fields have data
    if( $title && $subtitle && $author && $date && $textlong ) {
        
        // create query
        $query = "INSERT INTO posts (id,title, subtitle, author, date, textlong) VALUES (NULL,'$title', '$subtitle', '$author', '$date', '$textlong')";
        
        $result = mysqli_query( $conn, $query );
        
        // if query was successful
        if( $result ) {
            
            // refresh page with query string
                } 
           else {
            
            // something went wrong
            echo "Error: ". $query ."<br>" . mysqli_error($conn);
        }
        
    }
    
}

 
/*
MYSQL INSERT QUERY

INSERT INTO users (id, username, password, email, signup_date, biography)
VALUES (NULL, 'jacksonsmith', 'abc123', 'jack@son.com', CURRENT_TIMESTAMP, 'Hello! I'm Jackson. This is my bio.');

*/

    


// if add button was submitted

mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="../css/clean-blog.min.css" rel="stylesheet">
<link href="../css/styles.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">Blog</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="../index.php">Home</a>
                    </li>
                    <li>
                        <a href="../about.php">About</a>
                    </li>
                    
                    <li>
                        <a href="../contact.php">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->

<header class="intro-header" style="background-image: url('../img/contact-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1>Blog Post Insert</h1>
                        <hr class="small">
                        <span class="subheading">Enter you blog post below</span>
                    </div>
                </div>
            </div>
        </div>
    </header>


    
    <body>
        <div class="container">
            <h1>Blog Post Insert</h1>

            <p class="text-danger">* Required fields</p>
            
            <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">

            <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Title</label>
                             <small class="text-danger">* <?php echo $titleError; ?></small>
                <input type="text" placeholder="title" name="title" ><br><br>
                        </div>
                    </div>

<div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Subtitle</label>
                             <small class="text-danger">* <?php echo $subtitleError; ?></small>
                <input type="text" placeholder="subtitle" name="subtitle"><br><br>
                        </div>
                    </div>

<div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Author</label>
                             <small class="text-danger">* <?php echo $authorError; ?></small>
                <input type="text" placeholder="author" name="author"><br><br>
                                        </div>
                    </div>
                                    
<div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Date</label>
                             <small class="text-danger">* <?php echo $dateError; ?></small>
                <input type="date" placeholder="date" name="date"><br><br>
           </div>
                    </div>
                
<div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Post Text</label>
                             <small class="text-danger">* <?php echo $textError; ?></small>
                           <textarea placeholder="text" name="textlong" rows="10" cols="100">
At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies. 
</textarea>
              
 </div>
                    </div>
                
                
                <div class="row">
                        <div class="form-group col-xs-12">
                       <br><br> <button type="submit" name="add" value="Add Entry" class="btn btn-default">Send</button>
                    
                        </div>
                    </div>


               
            </form>
            
        </div>
        
       
<?php  
include('../footer.php'); 
?>