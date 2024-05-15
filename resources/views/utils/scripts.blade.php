<script src="{{ asset('utils/jquery.js') }}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
{{-- <script src="{{ asset('utils/toastnew.js') }}"></script> --}}
<script src="{{ asset('utils/select2/select2.js') }}"></script>
<script src="{{ asset('utils/quill/quill.js') }}"></script>
<script src="{{ asset('utils/bootbox/bootbox.js') }}"></script>
<script src="{{ asset('utils/message.js') }}"></script>
<script src="{{ asset('utils/validation.js') }}"></script>
<script src="{{ asset('utils/flatpickr/flatpickr.js') }}"></script>




{{-- CDN --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>



@if (session()->has('success'))
    <script>
        toastr.success(`{{ session('success') }}`);
    </script>
@endif
@if (session()->has('error'))
    <script>
        toastr.error(`{{ session('error') }}`);
        console.log(`{{ session('error') }}`);
    </script>
@endif
@if (count($errors) > 0)
    <script>
        toastr.error(`{{ $errors->first() }}`);
    </script>
@endif
