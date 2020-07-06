<!-- //footer -->
<div class="footer">
		<div class="container">
			<div class="w3_footer_grids">
				<div class="col-md-3 w3_footer_grid">
					<h3>Thông tin liên hệ</h3>
					
					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Đại Học Cần Thơ, Đường 3/2, <span>Ninh Kiều ,Cần Thơ</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:admin@gmail.com">admin@gmail.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+0123 456 789</li>
					</ul>
				</div>
				{{-- <div class="col-md-2 w3_footer_grid">
					<h3>Liên hệ</h3>
					<ul class="info"> 
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="about.html">Liên hệ</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="contact.html">Contact Us</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="short-codes.html">Short Codes</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="faq.html">FAQ's</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="products.html">Special Products</a></li>
					</ul>
				</div> --}}
				@foreach($nhom as $ntp)
				 <div class="col-md-2 w3_footer_grid">
					<h3 style=" text-transform: capitalize;">{{$ntp->nhom_ten}}</h3>
					<ul class="info">
					    @foreach($ntp->loaisanpham as $lsp)
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="loaisanpham/{{$lsp->id}}/{{$lsp->loaisanpham_url}}.html">{{$lsp->loaisanpham_ten}}</a></li>
						@endforeach
					</ul>
				</div>
				@endforeach
				<div class="col-md-3 w3_footer_grid">
					<h3>Profile</h3>
					<ul class="info"> 
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="">Trang chủ</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="giohang">Giỏ hàng ({{Cart::count()}})</a></li>
						{{-- <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="login.html">Login</a></li> --}}
						@if(!Auth::check())
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="dangky">Tạo tài khoản</a></li>
						@else
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="dangxuat">Đăng xuất</a></li>
						@endif
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		
		<div class="footer-copy">
			
			<div class="container">
				<p>© 2017 Super Market</p>
			</div>
		</div>
		
	</div>	
	<div class="footer-botm">
			<div class="container">
				<div class="w3layouts-foot">
					<ul>
						<li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="payment-w3ls">	
					<img src="frontend/images/card.png" alt=" " class="img-responsive">
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<!-- //footer -->	