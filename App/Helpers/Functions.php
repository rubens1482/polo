<?php

function base_url($url = null) {
   return preg_replace('@/+$@', '', trim(dirname($_SERVER['SCRIPT_NAME']), '\\')) . '/' . $url;
}

// funções pra jogar print_r na view
function pr($data, $index = null) {
   if ($index) {
      $_SESSION['print_r']['<b class="text-danger">' . $index . '</b>'] = $data;
   } else {
      $_SESSION['print_r'][] = $data;
   }
}

function get_pr() {
   if (isset($_SESSION['print_r'])) {
      echo '<pre class="pre"><code>';
      print_r($_SESSION['print_r']);
      echo '</code></pre>';
      unset($_SESSION['print_r']);
   }
}
