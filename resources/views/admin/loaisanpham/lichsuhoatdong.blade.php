<style type="text/css">
	table { border-spacing: 10px; }
	td { text-align: center;}
	div { size: 20px; font-weight: bold; }
</style>
<div>Lịch sử thao tác trên loại sản phẩm <a href="/admin/loaisanpham/sua/{{$loaisanpham->id}}">{{$loaisanpham->loaisanpham_ten}}</a></div>
<table style="">
@foreach($loaisanpham->revisionHistory()->latest('created_at')->get() as $history )
	
    @if($history->key == 'created_at' && !$history->old_value)
    <li>{{ $history->userResponsible()->name }} created this resource at {{ $history->newValue() }}</li>
  @else
    	
    	<tr>
    		<td><b>></b></td>
    		<td><b style="color: red;">{{ $history->userResponsible()->name }}</b></td>
    		<td>đã thay đổi trường</td>
    		<td><b style="color: red;">{{ $history->fieldName() }}</b></td>
    		<td>từ</td>
    		<td><b style="color: brown;">{{ $history->oldValue() }}</b></td>
    		<td>sang</td>
    		<td><b style="color: blue;">{{ $history->newValue() }}</b></td>
    		<td>lúc</td>
    		<td>{{$history->created_at}}</td>

    	</tr>
    	
  @endif
@endforeach
</table>
