<div class="col-sm-3">
    <div class="categories_sec">
        <h1>Categories </h1>
        
        <ul class="responsive-accordion responsive-accordion-default bm-larger categr">
        <?php
            //echo '<pre>'; print_r($header_categories); //echo '</pre>';
        
                $category_created = array();
                $category = array();
                $i = -1;
                foreach($header_categories as $header_category)
                {
                    
                    $categoryId = $header_category->category_id;
            
                    if(!in_array($categoryId,$category_created))
                    {
                        $i++;
                        $category_created[] = $categoryId;
                        $category[$i][] = $header_category;
                    }
                    else
                    {
                        $key = array_search($categoryId, $category_created);
                        $category[$key][] = $header_category;
                    }
                    
                }// end while
            
                //print_r($category); echo '</pre>'; //exit;						
        
                foreach($category as $header_category_detail)
                {
                    echo '<li>
                            <div class="responsive-accordion-head">
                                <a href="javascript:void(0)">'.$header_category_detail[0]->category_title.'</a><i class="fa fa-chevron-down responsive-accordion-plus fa-fw"></i><i class="fa fa-chevron-up responsive-accordion-minus fa-fw"></i>
                            </div>
                            <div class="responsive-accordion-panel">
                                <ul class="sub_categr">';	
                                    foreach($header_category_detail as $header_sub_category)
                                    {
                                        echo "<li><a href='".base_url()."product/category/".$header_sub_category->sub_category_id."'><span>".$header_sub_category->subcategory_title."</span></a></li>";
                                    }
                            
                            echo "</ul>
                             </div>
                            </li>";
                
                }
                
            ?>								
        </ul>
    </div>
    <div class="off_section">
        <a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/off-img.jpg" alt=""></a>
            <div class="offdiv"> 50% off<span>for Skirts</span></div>
        
    </div>
</div>