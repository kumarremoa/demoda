<?php 
$sizeArrayr = [
    'pajama' => [
      'title' => 'Pajamaset size guide for your quick reference.',
      'size' => [
        's' => ['32-34', '28-30', '34-36'],
        'm' => ['34-36', '30-32', '36-38'],
        'l' => ['36-38','32-34','38-40'],
        'xl' => ['38-40','34-36','40-42'],
        '2xl' => ['40-42','36-38','42-44'],
        '3xl' => ['42-44','38-40','44-46'],
      ],
    ],
    'nightdress' => [
      'title' => 'Nightdress size guide for your quick reference.',
      'size' => [
        'l' => ['44-46','N/A','48-50'],
        'xl' => ['46-48','N/A','50-52'],
      ],
    ],
    'nursing-nightdress' => [
      'title' => 'Nursing Nightdress size guide for your quick reference',
      'size' => [
        'l' => ['46-48','N/A','48-50'],
        'xl' => ['48-50','N/A','50-52'],
      ],
    ],
    'satin-nightdress' => [
      'title' => 'Satin Nightdress size guide for your quick reference.',
      'size' => [
        'l' => ['38-40','N/A','42-44'],
        'xl' => ['40-42','N/A','44-46'],
      ],
    ],
    'nursing-kurti' => [
      'title' => 'Nursing Kurti size guide for your quick reference.',
      'size' => [
        'l' => ['38-40','36-38','40-42'],
        'xl' => ['40-42','38-40','42-44'],
        '2xl' => ['42-44','40-42','44-46'],
      ],
    ],
    'nursing-tshirt' => [
      'title' => 'Nursing T-Shirt size guide for your quick reference.',
      'size' => [
       'm' => ['38-40','N/A','N/A'],
        'l' => ['40-42','N/A','N/A'],
        'xl' => ['42-44','N/A','N/A'],
        '2xl' => ['44-46','N/A','N/A'],
      ],
    ],
    'maternity-pajama' => [
      'title' => 'Maternity Pajamas size guide for your quick reference.',
      'size' => [
        'l' => ['N/A','30-32','38-40'],
        'xl' => ['N/A','32-34','40-42'],
        '2xl' => ['N/A','34-36','42-44'],
      ],
    ],
    'maternity-SIZE' => [
      'title' => 'Maternity size guide for your quick reference.',
      'size' => [
        'l' => ['42-44','N/A','N/A'],
        'xl' => ['44-46','N/A','N/A'],
      ],
    ],
    'bath-robe' => [
      'title' => 'Bathrobe size guide for your quick reference.',
      'size' =>[ 
        'free_size' => ['44-46', 'N/A', 'FREE SIZE'],
      ],
    ],
];
?>
<div class="page-container container">
<div class="row">
  <div class="col-md-12 entry-content">
    <article>
      <div id="0" class="row row row-fluid">
        <div class="col-sm-4 column column_container ">
          <div class="wrapper">
            <div class="single_image content_element align_center">
              <div class="wrapper">
                <div class="single_image-wrapper box_border_grey"><img responsive width="289" height="147" src="<?= $this->config->item('css_images_js_base_url').'images/waist.png'; ?>" class="single_image-img attachment-full" alt="1"></div>
              </div>
            </div>
            <div class="text_column content_element ">
              <div class="wrapper">
                <h4>MEASURE WAIST SIZE</h4>
                <p>Measure around your natural waist</p>
                <p>line keeping one finger distance.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4 column column_container ">
          <div class="wrapper">
            <div class="single_image content_element align_center">
              <div class="wrapper">
                <div class="single_image-wrapper   box_border_grey"><img width="289" height="147" src="<?= $this->config->item('css_images_js_base_url').'images/bust.png'; ?>" class="single_image-img attachment-full" alt="2"></div>
              </div>
            </div>
            <div class="text_column content_element ">
              <div class="wrapper">
                <h4>MEASURE BUST SIZE</h4>
                <p>Measure under your arm around the</p>
                <p>fullest part of your chest</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4 column column_container ">
          <div class="wrapper">
            <div class="single_image content_element align_center">
              <div class="wrapper">
                <div class="single_image-wrapper   box_border_grey"><img width="289" height="147" src="<?= $this->config->item('css_images_js_base_url').'images/hip.png'; ?>" class="single_image-img attachment-full" alt="3"></div>
              </div>
            </div>
            <div class="text_column content_element ">
              <div class="wrapper">
                <h4>MEASURE HIP SIZE</h4>
                <p>Take this measurement horizontally around</p>
                <p>the fullest part of your hip.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="wrapper">
        <?php foreach ($sizeArrayr as $key => $value) { ?>
          <div class="separator content_element separator_align_center sep_width_100 sep_double sep_border_width_2 sep_pos_align_center h3">
            <h4><?=$value['title']?></h4>
          </div>
          <div class="text_column content_element ">
            <div class="wrapper">
              <table border="0" width="90%" style="margin-bottom: 10px ">
                <tbody>
                  <tr>
                    <th align="center">
                      SIZE
                    </th>
                    <th align="center">
                      BUST
                    </th>
                    <th align="center">
                      WAIST
                    </th>
                    <th align="center">
                      HIP
                    </th>
                  </tr>
                  <?php foreach ($value['size'] as $key => $sizes) { ?>
                    <tr>
                    <td style="text-transform: uppercase;">
                      <?=str_replace("_", ' ', $key)?>
                    </td>
                    <?php foreach ($sizes as $singleSize) { ?>
                    <td>
                      <?=$singleSize ?>
                    </td>
                    <?php } ?>
                    
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <?php } ?>
      </div>
    </article>
  </div>
</div>
<div class="clear clearfix"></div>
</div>
