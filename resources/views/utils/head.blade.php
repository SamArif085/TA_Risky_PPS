<link rel="stylesheet" href="{{ asset('utils/select2/select2.css') }}">
<link rel="stylesheet" href="{{ asset('utils/quill/typography.css') }}">
<link rel="stylesheet" href="{{ asset('utils/quill/editor.css') }}">
<link rel="stylesheet" href="{{ asset('utils/flatpickr/flatpickr.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/fonts/boxicons.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/fonts/flag-icons.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/loader/loader.css') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<link rel="stylesheet" href="{{ asset('utils/datatable/dataTables.bootstrap4.css') }}">

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .form-control-select-custom {
        padding: 7px;
        border-radius: 3px;
    }

    .truncated-text {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 300px;
    }

    .small-img {
        width: 300px;
        height: auto;
        margin-right: 10px;
    }

    .img-konten {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .team-item img {
        width: 100%;
        height: auto;
    }

    .team-item .a img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
    }

    .image-container {
        position: relative;
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
        overflow: hidden;
        border-radius: 0.25rem;
    }

    .image-container img {
        display: block;
        width: 100%;
        height: auto;
        border-radius: inherit;
    }

    .welcome-text {
        position: absolute;
        bottom: 50;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 20px;
        box-sizing: border-box;
        text-align: center;
    }

    .welcome-text h1 {
        padding: top:200px;
        font-size: 3em;
        margin-bottom: 0.5em;
        color: white;
    }

    .welcome-text p {
        font-size: 1.2em;
        margin-bottom: 1em;
        color: white;
    }

    .welcome-text .btn {
        font-size: 1em;
        padding: 0.75em 1.5em;
    }
</style>
