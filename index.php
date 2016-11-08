<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="description" content="Link parser for PubMed links">
    <meta name="author" content="Christi Richards">
    <link rel="icon" href="favicon.ico">

    <link rel="stylesheet" href="dist/css/main.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/octicons/3.5.0/octicons.min.css">

    <title>PubMed Link Parser</title>
  </head>

  <body>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php" title="Pubmed Link Parser">Pubmed Link Parser</a>
          </div>
        </div>
      </nav>
      <div class="preloader"></div>
      <div class="jumbotron text-center">
          <div class="container">
              <h1>PubMed Link Parser</h1>
              <p>Simple parser that grabs the page title from each PubMed page via URL and organizes them into numbered batches of 30.</p>
              <form method="POST" id="parser">
                  <div class="form-group">
                    <textarea class="form-control" rows="5" name="urls" placeholder="Paste your URLs (one on each line) and click Parse Links."></textarea>
                  </div>
                  <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block"><i class="octicon octicon-eye"></i>  Parse Links</button>
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
            <p class="text-center"><span class="text-muted"><span class="octicon octicon-code black"></span> with <span class="octicon octicon-heart pink"></span> by <a href="https://christirichards.com" title="ChristiRichards.com" target="_blank">Christi Richards</a> | Contribute on <a href="https://github.com/christirichards/pubmed-link-parser/" target="_blank"><span class="octicon octicon-logo-github"></span></a></span></p>
        </div>
    </footer>

       <script src="dist/js/main.min.js"></script>

  </body>
</html>
