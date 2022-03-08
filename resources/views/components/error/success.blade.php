@if(session('success'))
    <div id='alertbox' class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert" id="successBox">
        <strong class="font-bold">Action Successfull</strong>
        <p class="block sm:inline">{{ session('success') }}</p>
    </div>
<script>
    const box = document.getElementById('alertbox');
    setTimeout(() => box.style.display = 'none', 2000);
</script>
@endisset