<div class="inline-block">
    <form action="{{ $attributes['action'] }}" method="POST">
        @csrf
        @method("DELETE")
        <x-user.atoms.button class="form-delete" type="button">
            Delete
        </x-user.atoms.button>
    </form>

    @once
        @push('footer')
            <script src="{{ asset("js/jquery-3.6.0.min.js") }}"></script>
            <script src="{{ asset("js/sweetalert-2.1.2.min.js") }}"></script>
            <script>
                $(function(){
                   $(".form-delete").on("click", function(event){
                        const $this = $(this);
                        event.preventDefault();
                        Swal.fire({
                            title: 'Are you sure to Delete?',
                            showCancelButton: true,
                            confirmButtonText: "Yes",
                        }).then(res => {
                            if (res.isConfirmed) {
                                $this.closest("form").submit();
                            }
                        });
                    });
                });
            </script>
        @endpush
    @endonce
</div>