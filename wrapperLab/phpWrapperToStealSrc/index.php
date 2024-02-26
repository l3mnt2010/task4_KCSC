<?php

if (isset($_GET['page'])){
  include ($_GET['page']);
} else {
 echo "No page found";

}

?>