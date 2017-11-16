<?php

//print_r($pageData);
$pageData = $pageData[0];

?>

<!-- inner page content -->
<div class="mid"> 
    <div class="content">
        <div class="heading-sec">
            <div class="headng">
                <h4><?php echo $pageData->page_title; ?></h4>
            </div>
            <div class="clr"></div>
        </div>
        
        <div class="inner_page">
           <?php echo $pageData->content; ?>      
        </div>
    </div>

<!-- end inner page content -->
