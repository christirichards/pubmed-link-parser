<?php
/*------------------------------------------------------------------------------
** File:        parser.php
** Description: PubMed Link Parser
** Version:     1.0.1
** Updated:     November 23rd, 2016
** Author:      Christi Richards
** Homepage:    https://github.com/christirichards
** Project:     https://github.com/christirichards/pubmed-link-parser
**------------------------------------------------------------------------------
** Created for NutritionFacts.org https://github.com/nutritionfactsorg
**------------------------------------------------------------------------------ */

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

              echo '<div class="center-block text-center"><div class="btn-group" role="group" aria-label="Batch Options">
                <button type="button" class="btn btn-sm btn-secondary" id="titles"><span class="octicon octicon-info"></span> Titles</button>
                <button type="button" class="btn btn-sm btn-secondary" id="numbering"><span class="octicon octicon-list-ordered"></span> Numbering</button>
                <button type="button" class="btn btn-sm btn-secondary" id="links"><span class="octicon octicon-link"></span> Links</button>
              </div></div>';

              foreach (array_chunk($urls, 30, true) as $batch_number => $batch) {
                  echo '<div class="col-md-4 single-batch">';
                  echo '<h3>'.$batch_count[$batch_number].' Batch
                  <button type="button" class="btn btn-sm btn-secondary pull-right" data-clipboard-target="#'.$batch_count[$batch_number].'"><span class="octicon octicon-clippy"></span></button></h3><div id="'.$batch_count[$batch_number].'">';

                  $url_count = 1;
                  foreach ($batch as $url) {
                      $url = trim($url);
                      if (filter_var($url, FILTER_VALIDATE_URL)) {
                          $title = getTitle($url, 'h1');

                          if ($title === false) {
                              continue;
                          }

                          echo '<p><span class="numbering">'.$url_count.'.</span> <a href="'.$url.'" class="link">'.$url.'</a><br />
                          <span class="title">'.$title[1].'</span></p>';

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
