<!-- navigation -->
	<div class="navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									<li class="active"><a href="" class="act">Home</a></li>	
									<!-- Mega Menu -->

									@foreach($nhom as $ntp)
									
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$ntp->nhom_ten}}<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>{{$ntp->nhom_ten}}</h6>
														@foreach($ntp->loaisanpham as $lsp)
														@if(count($lsp->sanpham) > 0)
														<li><a href="loaisanpham/{{$lsp->id}}/{{$lsp->loaisanpham_url}}.html">{{$lsp->loaisanpham_ten}}</a></li>
														@endif
														@endforeach
													</ul>
												</div>	
												
											</div>
										</ul>
									</li>
									
									@endforeach
									<li><a href="lienhe">Liên hệ</a></li>
								</ul>
							</div>
							</nav>
			</div>
		</div>
		
<!-- //navigation -->