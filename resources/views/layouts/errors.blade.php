<div class="alert alert-primary" style="padding: 8px 30px">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="material-icons">close</i>
    </button>
    @foreach($errors->all() as $error)
        <li style="font-size: 13px; padding: 5px 0">{{ $error }}</li>
    @endforeach
</div>

