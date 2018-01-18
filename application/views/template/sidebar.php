<div class="widget categories-widget">
    <div class="widget-title">
        Categories
    </div>
    <ul class="cat-list">
    <?php
    $category_created = array();
    $category = array();
    $i = -1;
    // print_r($checkbox);die;
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
        
    }
 
    if (isset($checkbox) && $checkbox) {
        foreach($category as $header_category_detail){
        foreach($header_category_detail as $header_sub_category){ 
            if($header_sub_category->product_count ){ ?>
            <form action="" method="post">
            <li>
                <label class="checkbox">
                    <input onchange="this.form.submit()" name="category_name[]" type="checkbox"> <?=ucwords($header_sub_category->subcategory_title) ?>
                </label>
                <span><?=$header_sub_category->product_count ?></span>
            </li>
            </form>
        <?php } }
        }
    } else{
        foreach($category as $header_category_detail){
        foreach($header_category_detail as $header_sub_category){ 
            if($header_sub_category->product_count ){ ?>
            <li><a href="<?=sub_category_url($header_sub_category) ?>" title="<?=ucwords($header_sub_category->subcategory_title) ?>"><?=ucwords($header_sub_category->subcategory_title) ?></a>
                <span><?=$header_sub_category->product_count ?></span>
            </li>
        <?php } }
        } 
    } ?>								
    </ul>
</div>