@if (session('success'))
    <div class="pt-3">
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    </div>
@endif

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var alert = document.getElementById('success-alert');
        if (alert) {
            setTimeout(function() {
                alert.classList.add('alert-hidden');
                setTimeout(function() {
                    alert.style.display = 'none';
                }, 500); // Match this duration to your CSS transition
            }, 3000); // 3 seconds
        }
    });
</script>

@if ($errors->any())
<div class="pt-3">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
                <li>{{$item}}</li>
            @endforeach
        </ul>
    </div>
</div>
    
@endif