<?php
    $custom_pic=$_POST['custom_pic'];//取得拍照的照片
?>


<!--<section class="hero" id="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-right navicon">
                  <a id="nav-toggle" class="nav_slide_button" href="#"><span></span></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center inner">
                  <h1 class="animated fadeInDown">回到過去 回憶中原</h1>
                  <h3 class="animated fadeInUp delay-05s">CYCU Find your memory</h3>
          
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                  <a href="#intro" class="learn-more-btn">Start</a>
                </div>
            </div>
        </div>
    </section>-->
        <!--介面開始-->
        <!--<section class="intro text-center section-padding" id="intro">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2 wp1">
                <h1><b>介紹</b></h1>
                <h1 class="arrow"></h1>
                  <p>介紹想回味從前的大學時光嗎？<br>
                  想重返中原大學美麗的往昔景致嗎？<br>快乘上這部時光機跟我們一起探索過去吧！<br>本系統是中原大學60周年校慶特別活動<br>
                  可選擇中原老校園當背景照相<br>
                  於臉書分享出去即可參加抽獎唷！<br>
                </p>
              </div>
            </div>
          </div>
        </section>-->
        <!--介面結束-->
        <!--背景照選擇開始-->
        <!--<section class="swag text-center">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <h1>選張懷念的校園場景吧!</h1><br>
                <a href="#responsive" class="down-arrow-btn"><i class="fa fa-chevron-down"></i></a>
              </div>
            </div>
          </div>
        </section>-->
        <!--<section class="text-center" id="responsive">
          <div class="container-fluid nopadding responsive-services">
            <div class="wrapper">
              <div class="fluid-white"></div>
            </div>
            <div class="container designs">
              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <div id="servicesSlider"><br><br>
                    <ul class="slides">
                      <li>
                        <h1 class="arrow">中原大草皮</h1>
                        <div class="iphone">
                          <div class="wp3"></div>
                        </div>
                      </li>
                      <li>
                        <h1 class="arrow">中原教學大樓</h1>  
                      </li>
                      <li>
                        <h1 class="arrow">中原資館樓</h1>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <a href="#abc" class="down-arrow-btn"><i class="fa fa-chevron-down"></i></a>
        </section>-->
        <!--背景照選擇結束-->
        <!--拍照階段-->
        <!--<section class="swag text-center" id = "abc">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <h1>來拍照吧!<br><span>做出 <em>獨一無二</em> 的動作</span></h1>
                <a href="#portfolio" class="down-arrow-btn"><i class="fa fa-chevron-down"></i></a>
              </div>
            </div>
          </div>
        </section>-->
        <!--合成圖片-->
        <section class="portfolio text-center section-padding" id="portfolio">
          <div class="container">
            <div class="row">
              <div id="portfolioSlider">
                <h1></h1>
                </div>
                <div class="abox">
                  <!--將表格傳送至=>php Server的url-->
                  <form role="form" id="form1" action="http://linen-totality-802.appspot.com/" enctype="multipart/form-data" method="post">
                    <!--拍照後data的存放地點-->
                    <!--<input type="hidden" name="custom_pic" id="custom_pic">-->
                    <!--<input type="hidden" name="is_video" id="is_video" value="yes">-->
                    <!--執行拍照-->
                    <!--<button type="button" class="btn btn-primary" id="screenshot-button">Take!</button>
                    
                  </form>  <br/>
                    <div class="row">
                      <div class="col-md-12" id='screen'>-->
                        <!--螢幕的即時呈現-->
                        <!--<video id="videoscreen" style="width:95%;" autoplay></video>
                        <img id="screen-stream" src="" alt="" />-->
                        <!--拍照後圖片呈現-->
                        <!--<img id="screenshot" style="width:95%;" src="">
                        <canvas id="screenshot-canvas"></canvas>-->
                        <?php echo "<img src='".$custom_pic."'>";?>
                      </div>
                    </div>
                </div>
                <!--拍照階段結束-->
              </div>
            </div>
          </div>
        </section>
        <div id="fb-root">
          <?php echo "<div class='fb-share-button' data-href='".$custom_pic." data-layout='button_count'></div>";?>
        </div>