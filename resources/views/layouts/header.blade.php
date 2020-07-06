<!-- header -->
	<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				<p>PHÍ GIAO HÀNG GIẢM 100%. <a href="">MUA NGAY</a></p>
			</div>
			<div class="agile-login">
				<ul>
					
					@if(!Auth::check())
                    <li>
                        <a href="dangky">Tạo tài khoản</a>
                    </li>
                    <li>
                        <a href="dangnhap">Đăng nhập</a>
                    </li>
      
                    @else
                    <li>
                    	<a href="nguoidung" class="last">
                    		<span class ="glyphicon glyphicon-user"></span>
                    		{{Auth::user()->name}}
                    	</a>
                    </li>

                    <li>
                    	<a href="dangxuat">Đăng xuất</a>
                    </li>
                    @endif
                    <li><a href="lienhe">Liên hệ</a></li>
				</ul>
			</div>
			<div class="product_list_header" style="margin-top: 10px;">  


            	<a href="giohang" class="last">
            		<p class ="glyphicon glyphicon-shopping-cart"></p>
            		<span>GIỎ HÀNG ({{Cart::count()}})</span>
            	</a>
              
				
            </div>

				
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="logo_products">
		<div class="container">
		<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>Hỗ trợ/Tư vấn : (01234) 456 789</li>
					
				</ul>
			</div>
			<div class="w3ls_logo_products_left">
				<h1><a href="">super Market</a></h1>
			</div>
		<div class="w3l_search" style="width: 300px;">
			<form action="search" method="get" id="proList">
				{{csrf_field()}}
				<div class="btn btn-default" onclick="startDictation()" >
				<i class="fa fa-microphone" ></i></div>
				
				<input style="width: 215px;" type="search" name="search" id="transcript" placeholder="Tìm kiếm sản phẩm..." />
				<button type="submit" class="btn btn-default search" aria-label="Left Align">
					<i class="fa fa-search" aria-hidden="true"> </i>
				</button>
				<div class="clearfix"></div>
			</form>
		</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<script>
  function startDictation() {

    if (window.hasOwnProperty('webkitSpeechRecognition')) {

      var recognition = new webkitSpeechRecognition();

      recognition.continuous = false;
      recognition.interimResults = false;

      recognition.lang = "vi-VN";
      recognition.start();

      recognition.onresult = function(e) {
        document.getElementById('transcript').value
                                 = e.results[0][0].transcript;
        recognition.stop();
        document.getElementById('proList').submit();
      };

      recognition.onerror = function(e) {
        recognition.stop();
      }

    }
  }
</script>