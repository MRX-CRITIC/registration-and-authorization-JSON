<?php

require "cap.php";

?>
<link rel="stylesheet" href="add_news.css">

<form class="center" action="authorization.php" method="post">

    <div class="label-float">
        <input type="text" name="" placeholder=" " required/>
        <label>Заголовок</label>
    </div>

    <div class="label-float">
        <input type="text" name="" placeholder=" " required/>
        <label>Текст новости</label>
    </div>

    <input type="submit">


</form>