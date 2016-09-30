<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="description" content="Link parser for PubMed links">
    <meta name="author" content="Christi Richards">
    <link rel="icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/octicons/3.5.0/octicons.min.css">

    <title>PubMed Link Parser</title>
  </head>

  <body>
      <div class="preloader"></div>
      <div class="jumbotron">
          <div class="container">
              <h1>PubMed Link Parser</h1>
              <p>Simple parser that grabs the page title from each PubMed page via URL and organizes them into numbered batches of 30.</p>
              <form method="POST" id="parser">
                  <div class="form-group">
                    <textarea class="form-control" rows="5" name="urls" placeholder="Paste your URLs (one on each line) and click Parse Links."></textarea>
                  </div>
                  <button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg btn-block">Parse Links</button>
              </form>
            </div>
          </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12" id="parser-response">
        </div>
     </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="text-center"><span class="text-muted">Made with <span class="octicon octicon-heart pink"></span> by <a href="https://christirichards.com" title="ChristiRichards.com" target="_blank">Christi Richards</a> | Contribute on <a href="https://github.com/christirichards/pubmed-link-parser/" target="_blank"><span class="octicon octicon-logo-github"></span></a></span></p>
        </div>
    </footer>

       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>
       <script src="assets/js/main.js"></script>

  </body>
</html>
