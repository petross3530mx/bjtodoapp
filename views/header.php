<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Todo Board</title> 
      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <!-- Styles -->
      <link href="http://october.s-host.net/css/app.css" rel="stylesheet">
      <style></style>
   </head>
      <body style="margin-bottom: 59px;">

              <div id="app">
                 <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <div class="container">
                       <a href="/" class="navbar-brand">
                       Todo Board
                     </a> <a href="/add" class="btn btn-sm btn-primary">+ Add task</a> 
                       <div id="navbarSupportedContent" class=" ">
                          <ul class="navbar-nav mr-auto"></ul>
                          <ul class="navbar-nav ml-auto">
                            <?php if(!isset($_SESSION['admin'])){ ?>
                             <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
                           <?php }
                           else{ ?>
                              <li class="nav-item"><a href="/logout" class="nav-link">Logout</a></li>
                           <?php } ?>
                          </ul>
                       </div>
                    </div>
                 </nav>
