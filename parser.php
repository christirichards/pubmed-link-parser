<?php

    include_once 'inc/simple_html_dom.php';

    function getTitle($url, $tagname)
    {
        $values = array();
        $html = file_get_html($url);
        foreach ($html->find($tagname) as $tag) {
            $values[] = trim($tag->innertext);
        }

        return $values;
    }

      $error = '';

      if ($_POST) {
          $urls = $_POST['urls'];
          if (!empty($_POST['urls'])) {
              $urls = explode(PHP_EOL, $_POST['urls']);

              $urls = array_map('trim', $urls);
              $urls = array_filter($urls);

              $batch_count = ['First', 'Second', 'Third', 'Fourth', 'Fifth', 'Sixth', 'Seventh', 'Eighth', 'Ninth', 'Tenth'];

              $batch_number = 1;

              foreach (array_chunk($urls, 30, true) as $batch_number => $batch) {
                  echo '<div class="col-md-4 single-batch">';
                  echo '<h3>'.$batch_count[$batch_number].' Batch <button class="btn btn-sm btn-secondary pull-right" data-clipboard-target="#'.$batch_count[$batch_number].'"><img src="assets/images/clipboard.svg" class="clipboard"></button></h3><div id="'.$batch_count[$batch_number].'">';
                  $url_count = 1;
                  foreach ($batch as $url) {
                      $url = trim($url);
                      if (filter_var($url, FILTER_VALIDATE_URL)) {
                          $title = getTitle($url, 'h1');

                          if ($title === false) {
                              continue;
                          }

                          echo '<p>'.$url_count.'. <a href="'.$url.'">'.$title[1].'</a><br>'.$url.'</p>';

                          ++$url_count;
                      } else {
                          echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Link Skipped: Not a URL</strong> Please check your input and try again</div>';
                      }
                  }
                  echo '</div></div>';
              }
          } else {
              echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Warning:</strong> You must enter at least one URL.</div>';
          }
      }
