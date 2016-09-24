<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="description" content="Link parser for PubMed links">
    <meta name="author" content="Christi Richards">
    <link rel="icon" href="favicon.ico">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

    <link rel="stylesheet" href="style.css">

    <title>PubMed Link Parser</title>
  </head>

  <body>
      <div class="jumbotron">
            <div class="container">
              <h1>PubMed Link Parser</h1>
              <p>Simple parser that grabs the title from each PubMed link and organizes them into a numbered list.</p>
              <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                  <div class="form-group">
                    <?php echo $error;?>
                    <textarea class="form-control" rows="5" name="urls" placeholder="Paste your URLs (one on each line) and click submit."></textarea>
                  </div>
                  <button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg btn-block">Parse Links</button>
              </form>
            </div>
          </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">

            <?php

              function getTitle($url)
              {
                  //echo $url;
                  $results = file_get_contents($url);
                  if (!$results) {
                      return;
                  }

                  $res = preg_match("/<title>(.*)<\/title>/siU", $results, $title_matches);
                  if (!$res) {
                      return;
                  }

                  $title = preg_replace('/\s+/', ' ', $title_matches[1]);

                  $host = parse_url($url, PHP_URL_HOST);

                  // Remove unnecessary info from the title
                  if ($host == 'www.ncbi.nlm.nih.gov') {
                      $title = strstr($title, ' - PubMed - NCBI', true);
                  }

                  $title = trim($title);

                  return $title;
              }

                    if ((filter_has_var(INPUT_POST, 'urls') &&
                    (strlen(filter_input(INPUT_POST, 'urls')) > 0))) {
                        $urls = htmlentities($_POST['urls']);
                        $urls = explode("\n", $_POST['urls']);
                        $urls = array_map('trim', $urls);
                        $urls = array_filter($urls);

                        $count = 1;

                        foreach ($urls as $url) {
                            $url = trim($url);
                            if (filter_var($url, FILTER_VALIDATE_URL)) {
                                $title = getTitle($url);

                                if ($title === false) {
                                    continue;
                                }

                                echo '<p>'.$count.'. <a href="'.$url.'">'.$title.'</a><br>'.$url.'</p>';

                                ++$count;
                            } else {
                                trigger_error('You must enter URLs.  Please check your input and try again.', E_USER_ERROR);
                            }
                        }
                    } else {
                        echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Warning:</strong> You must enter at least one URL.</div>';
                    }

            ?>

        </div>
      </div>
    </div>

    <footer class="footer">
        <div class="container">
            <span class="text-muted text-center">Made with <i class="fa fa-heart pink"></i> by <a href="https://christirichards.com" title="ChristiRichards.com" target="_blank">Christi Richards</a></span>
        </div>
    </footer>

       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>

  </body>
</html>
