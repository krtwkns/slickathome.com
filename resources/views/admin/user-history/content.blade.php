<br>
<!-- include summernote css/js-->
<div class="flash-message" style="margin-left: -16px;margin-right: -16px; margin-top: 13px;">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
      <div class="alert alert-{{ $msg }}">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p class="" style="border-radius: 0">{{ Session::get('alert-' . $msg) }}</p>
      </div>
    {!!Session::forget('alert-' . $msg)!!}
    @endif
  @endforeach
</div>
<div style="overflow: auto">
<table id="myTable" class="table table-striped table-bordered" cellspacing="0">
	<thead>
		<tr>
      <th>No.</th>
      <th>Nama User</th>
      <th>Waktu Login</th>
		</tr>	
  </thead>
  <tbody>
    @php
      $number = 0 ;
    @endphp

    @forelse($users_history as $user_history) 

    @php
      $number ++ ;
    @endphp
    <tr>
      <td>{{$number}}</td>
      <td>{{$user_history->username['name']}}</td>
      <td>{{$user_history->timestamp_history}}</td>
    </tr>
     <?php $number++ ?>
     @empty
        <tr>
          <td colspan="5"><center>Belum user history</center></td>
        </tr>
    @endforelse
  </tbody>
</table>
</div>


