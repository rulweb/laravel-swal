@if (session()->has('swal'))
<script>swal({!! session()->get('swal') !!})</script>
@endif
