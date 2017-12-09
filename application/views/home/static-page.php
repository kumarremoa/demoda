<?php

//print_r($pageData);
$pageData = $pageData[0];

?>

<!-- inner page content -->
<div class="mid" style="margin-top: 25px"> 
    <div class="content container">
        <div class="heading-sec">
            <div class="headng">
                <h1><?php echo $pageData->page_title; ?></h1>
            </div>
            <div class="clr"></div>
        </div>
        
        <div class="inner_page static-page">
           <?php echo $pageData->content; ?>      
        </div>
    </div>

<!-- end inner page content -->
