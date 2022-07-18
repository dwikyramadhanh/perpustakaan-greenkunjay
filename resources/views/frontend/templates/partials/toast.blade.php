@if(session('toast'))
<script>
    M.toast({
        html: '{{ session('toast') }}', classes: 'rounded'
    })
</script>
@endif 