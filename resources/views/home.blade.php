@extends('layouts.admin', ['title' => 'My Profile'])

@section('mainContent')
    <div class="container">
        <div class="d-flex justify-content-between">
            <div class="d-flex gap-3">
                <div class="rounded-lg">
                    <img class="rounded" id="imgSrc" alt="profile_image" width="50" />
                </div>
                <div>
                    <h2 class="fw-bold font-bold">{{ auth()->user()->name }}</h2>
                    <span class="badge bg-warning fs-6 text-capitalize">{{ auth()->user()->user_type }}</span>
                </div>
            </div>
            <div>
                <p>Upload Profile</p>
                <div class="upload-container">
                    <label for="image" class="file-uploader">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-upload" viewBox="0 0 16 16">
                            <path
                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                            <path
                                d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z" />
                        </svg>
                        <input type="file" class="d-none" id="image" />
                    </label>
                </div>
            </div>

        </div>

    </div>

    <script>
        function loadImage(url) {

            if (url.match(/\.(jpeg|jpg|gif|png)$/) != null) {
                return url;
            } else {
                return "https://ui-avatars.com/api/?background=random&color=fff&name={{ auth()->user()->name }}"
            }
        }

        $("#imgSrc").attr('src', loadImage( '{{ auth()->user()->profile_pic }}' ))

        $(document).ready(function() {
            $('#image').change(function(e) {
                var file_data = $('#image').prop('files')[0];
                var form_data = new FormData();
                form_data.append('file', file_data);

                $.ajax({
                    url: '/store/profilepicture', // adjust this URL to your route
                    type: 'POST',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function(data) {
                        console.log(data);
                        // alert('File uploaded successfully.');
                        $("#imgSrc").attr('src', loadImage(data['path']))
                    },
                    error: function(xhr, status, error) {
                        console.error('Error: ' + xhr.responseText);
                        alert('Error uploading file.');
                    }
                });
            });
        });
    </script>
@endsection
