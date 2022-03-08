@if($errors->all())
<div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert" id="alertbox">
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
</div>
<script>
    const box = document.getElementById('alertbox');
    setTimeout(() => box.style.display = 'none', 2000);
</script>
@endif