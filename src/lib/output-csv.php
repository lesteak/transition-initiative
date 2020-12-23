<?php
/**
 * Takes in a filename and an array associative data array and outputs a csv file
 * @param string $fileName
 * @param array $assocDataArray     
 */
function outputCsv($fileName, $assocDataArray)
{
  ob_clean();
  header('Pragma: public');
  header('Expires: 0');
  header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
  header('Cache-Control: private', false);
  header('Content-Type: text/csv');
  header('Content-Disposition: attachment;filename=' . $fileName);
  if (isset($assocDataArray['0'])) {
    $fp = fopen('php://output', 'w');
    //fputcsv($fp, array_keys($assocDataArray['0']));
    foreach ($assocDataArray as $values) {
      fputcsv($fp, $values);
    }
    fclose($fp);
  }
  ob_flush();
}
