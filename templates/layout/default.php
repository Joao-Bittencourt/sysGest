<?php

/* include "app/view/header.php";
  include "app/view/menu.php";
  include "app/view/right.php";
  include "app/view/$file.php";
  include "app/view/footer.php";
 */

echo $this->element('header');
echo $this->element('menu');
echo $this->element('right');
echo $this->Flash->render();
echo $this->fetch('content');

