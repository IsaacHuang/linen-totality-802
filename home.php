        <!--合成圖片-->
        <section class="intro1" id="end">
          <div class="container">
            <div class="row">
              <div class=" text-center">
                <h1 class="arrow"><b>合成照</b></h1>

                <div id='pic_block'>
                  <p>The mouse pointer position is at: <span></span></p>
                  <?php echo "<img id='custom_pic' name='custom_pic' src='".$custom_pic."'/>";?>
                  <canvas id="pic" name="pic" style="border:1px solid #d3d3d3"></canvas>
                  <img src="" id='pic_finish'/>
                </div>
                <div id='background_block' name='background_block'>
                  <?php echo "<img id='bg_pic' name='bg_pic' src='https://sites.google.com/site/cycufindyourmemory/config/pagetemplates/img/background-".$background.".jpg'/>";?>
                  <canvas id="background" name="background" style="border:1px solid #d3d3d3"></canvas>
                </div><br/>
                <button class="btn btn-primary" id="confirm">確定</button>
                <button class="btn btn-primary" id="reset">重置</button>
              </div>
            </div>
          </div>
        </section>
        <script>
        

        $(document).ready(function(){
          //得知現在的pagex
          $(document).mousemove(function(event){ 
            $("span").text("X: " + event.pageX + ", Y: " + event.pageY); 
          });

          //將背景圖畫入畫布
          var canvas_bg = document.getElementById("background");//讀取canvas的內部值
          var img_bg = document.getElementById("bg_pic");
          var ImgWidth_bg = img_bg.width;
          var ImgHeight_bg = img_bg.height;
          canvas_bg.width = ImgWidth_bg;
          canvas_bg.height = ImgHeight_bg;
          var ctx_bg = canvas_bg.getContext("2d");
          ctx_bg.drawImage(img_bg,0,0);

          //將相片畫入畫布
          var canvas_pic = document.getElementById("pic");
          var img_pic = document.getElementById("custom_pic");
          var ImgWidth_pic = img_pic.width;
          var ImgHeight_pic = img_pic.height;
          canvas_pic.width = ImgWidth_pic;
          canvas_pic.height = ImgHeight_pic;
          var ctx_pic = canvas_pic.getContext("2d");
          ctx_pic.drawImage(img_pic,0,0);

          //隱藏接收的圖片
          $('#bg_pic').hide();
          $('#custom_pic').hide();

          //去背
          var area = "#ffffff";
          var curSize = 30;
          var clickDrag = new Array();
          var drawingAreaX = 362;
          var drawingAreaY = 980;
          var clickX = new Array();
          var clickY = new Array();
          var paint = false;
          var mediumStartX = 362;
          var mediumStartY = 980;
          var mediumImageWidth = ImgWidth_pic;
          var mediumImageHeight = ImgHeight_pic;
          var drawingAreaX = 362;
          var drawingAreaY = 980;
          var drawingAreaWidth = ImgWidth_pic;
          var drawingAreaHeight = ImgHeight_pic;
          drawingcanvas = document.createElement('canvas');
          drawingcanvas.setAttribute('width', ImgWidth_pic);
          drawingcanvas.setAttribute('height', ImgHeight_pic);
          drawingcanvas.setAttribute('id', 'drawingcanvas');
          pic.appendChild(drawingcanvas);
          var drawing_ctx = drawingcanvas.getContext("2d");
          redraw();
          $('#drawingcanvas').mousedown(function(e){
            
            var mouseX = e.pageX - this.offsetLeft;
            var mouseY = e.pageY - this.offsetTop;
            if(mouseY > drawingAreaY && mouseY < drawingAreaY + drawingAreaHeight)
            {
              // Mouse click location on drawing area
              paint = true;
              addClick(mouseX, mouseY, true);
              redraw();
            }
          });
          $('#drawingcanvas').mousemove(function(e){
            if(paint==true){
              addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
              redraw();
            }
          });
          $('#drawingcanvas').mouseup(function(e){
            paint = false;
            redraw();
          });

          $('#drawingcanvas').mouseleave(function(e){
            paint = false;
          });

        });

        //重置
        $('reset').click(function(){
          ctx_pic.clearRect(0, 0, drawingAreaWidth, drawingAreaHeight);
        });



        //合成完成
        $('confirm').click(function(){
          var pic_finish = document.querySelector();
        });
        
        </script>