@extends('layout.index')
<!-- START FORM -->
@section('content')
    <!-- Bootstrap CSS -->
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
    <style>
        .btn-custom-red {
            background-color: #ff0000;
            /* Merah */
            border-color: #ff0000;
        }
    </style>
    <form action='{{ url('cs') }}' method='post'>
        {{-- <form  method='post'> --}}

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Auto Insert Current Time</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <script>
                document.addEventListener('DOMContentLoaded', (event) => {
                    const timeInputs = document.querySelectorAll('.auto-time');

                    timeInputs.forEach(input => {
                        input.addEventListener('click', function() {
                            const now = new Date();
                            const hours = String(now.getHours()).padStart(2, '0');
                            const minutes = String(now.getMinutes()).padStart(2, '0');
                            input.value = `${hours}:${minutes}`;
                        });
                    });
                });
            </script>
        </head>

        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm modal-xl">
            <div class="mb-3 row">
                <label for="product_name" class="col-sm-2 col-form-label text-end">Nama Product</label>
                {{-- <div class="col-sm-10"> --}}
                {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                {{-- <input type="combobox" class="form-control" name='product_name' value="{{Session::get('product_name')}}" id="product_name"> --}}
                {{-- </div> --}}
                {{-- <label for="combobox">Select an option:</label> --}}
                <div class="col-sm-10">
                    <select class="form-control" name="product_name" id="product_name"
                        value="{{ Session::get('product_name') }}">
                        @foreach ($options as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="no_ladle" class="col-sm-2 col-form-label text-end">No Ladle</label>
                <div class="col-sm-1">
                    {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                    <input type="number" class="form-control" name='no_ladle' value="{{ Session::get('no_ladle') }}"
                        id="no_ladle">
                </div>
                <label for="material" class="col-sm-1 col-form-label text-end">Material</label>
                <div class="col-sm-2">
                    {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                    <input type="text" class="form-control" name='material' value="{{ Session::get('material') }}"
                        id="material">
                </div>
                <label for="charging" class="col-sm-1 col-form-label text-end">Charging</label>
                <div class="col-sm-1">
                    {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                    <input type="number" class="form-control" name='charging' value="{{ Session::get('charging') }}"
                        id="charging">
                </div>

            </div>
            <div class="mb-3 row">
            </div>

            <div class="mb-3 row">
                <label for="temp_tapping" class="col-sm-2 col-form-label text-end">Temp. Tapping</label>
                <div class="col-sm-2">
                    {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                    <input type="text" class="form-control ocr-trigger" name='temp_tapping'
                        value="{{ Session::get('temp_tapping') }}" id="temp_tapping" readonly>
                </div>
                <label for="start_tapping" class="col-sm-2 col-form-label text-end">Start Tapping</label>
                <div class="col-sm-2">
                    {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                    <input type="time" class="form-control auto-time" name='start_tapping'
                        value="{{ Session::get('start_tapping') }}" id="start_tapping">
                </div>
                <label for="reaction_time" class="col-sm-2 col-form-label text-end">Reactime Time</label>
                <div class="col-sm-2">
                    {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                    <input type="number" step="any" class="form-control" name='reaction_time'
                        value="{{ Session::get('reaction_time') }}" id="reaction_time">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="start_pouring" class="col-sm-2 col-form-label text-end">Start Pouring</label>
                <div class="col-sm-2">
                    {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                    {{-- <label for="start_pouring">Start Pouring Time:</label> --}}
                    <input type="time" class="form-control auto-time" name="start_pouring"
                        value="{{ Session::get('start_pouring') }}" id="start_pouring">
                    {{-- <input type="time" class="form-control" name='start_pouring' value="{{Session::get('start_pouring')}}" id="start_pouring"> --}}
                </div>
                <label for="temp_start_pouring" class="col-sm-2 col-form-label text-end">Temp Start Pouring</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control ocr-trigger" name="temp_start_pouring"
                        value="{{ Session::get('temp_start_pouring') }}" id="temp_start_pouring" readonly>
                </div>

            </div>

            <div class="mb-3 row">
                <label for="time_pouring_n1" class="col-sm-2 col-form-label text-end">Time Pouring N1</label>
                <div class="col-sm-2">
                    {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                    <input type="time" class="form-control auto-time" name='time_pouring_n1'
                        value="{{ Session::get('time_pouring_n1') }}" id="time_pouring_n1">
                </div>
                <label for="time_pouring_n2" class="col-sm-2 col-form-label text-end">Time Pouring N2</label>
                <div class="col-sm-2">
                    {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                    <input type="time" class="form-control auto-time" name='time_pouring_n2'
                        value="{{ Session::get('time_pouring_n2') }}" id="time_pouring_n2">
                </div>
                <label for="time_pouring_n3" class="col-sm-2 col-form-label text-end">Time Pouring N3</label>
                <div class="col-sm-2">
                    {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                    <input type="time" class="form-control auto-time" name='time_pouring_n3'
                        value="{{ Session::get('time_pouring_n3') }}" id="time_pouring_n3">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="finish_pouring" class="col-sm-2 col-form-label text-end">Time Finish Pouring</label>
                <div class="col-sm-2">
                    {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                    <input type="time" class="form-control auto-time" name='finish_pouring'
                        value="{{ Session::get('finish_pouring') }}" id="finish_pouring">
                </div>
                <label for="temp_finish_pouring" class="col-sm-2 col-form-label text-end">Temp. Finish
                    Pouring</label>
                <div class="col-sm-2">
                    {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                    <input type="text" class="form-control ocr-trigger" name='temp_finish_pouring'
                        value="{{ Session::get('temp_finish_pouring') }}" id="temp_finish_pouring" readonly>
                </div>
                <label for="qty_mould" class="col-sm-2 col-form-label text-end">Qty Mould</label>
                <div class="col-sm-2">
                    {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                    <input type="number" class="form-control" name='qty_mould' value="{{ Session::get('qty_mould') }}"
                        id="qty_mould">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="fading_time" class="col-sm-2 col-form-label text-end">Fading Time</label>
                <div class="col-sm-2">
                    {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                    <input type="number" class="form-control" name='fading_time'
                        value="{{ Session::get('fading_time') }}" id="fading_time">
                </div>
                <label for="defect_short" class="col-sm-2 col-form-label text-end">Defect Short Pouring</label>
                <div class="col-sm-2">
                    {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                    <input type="number" class="form-control" name='defect_short'
                        value="{{ Session::get('defect_short') }}" id="defect_short">
                </div>
                <label for="mold_bocor" class="col-sm-2 col-form-label text-end">Defect Mold Bocor</label>
                <div class="col-sm-2">
                    {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                    <input type="number" class="form-control" name='mold_bocor'
                        value="{{ Session::get('mold_bocor') }}" id="mold_bocor">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="marubo" class="col-sm-2 col-form-label text-end">Marubo Type</label>
                <div class="col-sm-2">
                    {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                    <input type="text" class="form-control" name='marubo' value="{{ Session::get('marubo') }}"
                        id="marubo">
                </div>
                <label for="frm" class="col-sm-2 col-form-label text-end">FRM/LDR Check</label>
                <div class="col-sm-2">
                    {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                    <input type="text" type="any" class="form-control" name='frm'
                        value="{{ Session::get('frm') }}" id="frm">
                </div>
                <label for="remark" class="col-sm-2 col-form-label text-end">Remark</label>
                <div class="col-sm-2">
                    {{-- <input type="number" class="form-control" name='noreg' id="noreg"> --}}
                    <input type="text" class="form-control" name='remark' value="{{ Session::get('remark') }}"
                        id="remark">
                </div>
            </div>


            <div class="mb-3 row">
                <label for="jabatan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10 text-end">

                    <a href='{{ url('cs') }}' class="btn btn-primary btn-custom-red" name="back"><i
                            class="fa fa-backward" aria-hidden="true"></i> BACK</a>
                    <button type="submit" class="btn btn-success " name="submit">SIMPAN <i class="fa fa-bookmark"
                            aria-hidden="true"> </i></button>

                </div>

            </div>

        </div>
    </form>



    {{-- JavaScript --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Tesseract.js -->
    <script src="https://cdn.jsdelivr.net/npm/tesseract.js@4.0.2/dist/tesseract.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#product_name').change(function() {
                var productName = $(this).val();
                $.ajax({
                    url: '{{ route('getProductDetails') }}',
                    type: 'GET',
                    data: {
                        product_name: productName
                    },
                    success: function(response) {
                        $('#material').val(response.material);
                        $('#qty_mould').val(response.qty_mould);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            let video = document.getElementById('video');
            let canvas = document.getElementById('canvas');
            let context = canvas.getContext('2d');

            $('.ocr-trigger').on('click', function() {
                // Set the current input field
                currentInput = $(this);
                $('#cameraModal').modal('show');

                // Open camera
                if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                    navigator.mediaDevices.getUserMedia({
                        video: true
                    }).then(function(stream) {
                        video.srcObject = stream;
                        video.play();
                    }).catch(function(err) {
                        console.error('Error accessing camera: ' + err);
                    });
                } else {
                    alert('Your browser does not support camera access.');
                }
            });

            $('#captureButton').on('click', function() {
                // Capture the image
                context.drawImage(video, 0, 0, canvas.width, canvas.height);
                let imageData = canvas.toDataURL('image/png');

                // Use Tesseract.js to process the image
                Tesseract.recognize(
                    imageData,
                    'eng', {
                        logger: info => console.log(info), // Log progress
                        // Whitelist only numeric characters
                        config: 'tessedit_char_whitelist=0123456789 --psm 6'
                    }
                ).then(({
                    data: {
                        text
                    }
                }) => {
                    // Display the OCR result in the input field
                    // $('#temp_start_pouring').val(text);
                    if (currentInput) {
                        currentInput.val(text);
                    }
                    // Stop the stream and hide the modal after OCR processing
                    video.srcObject.getTracks().forEach(track => track.stop());
                    $('#cameraModal').modal('hide');
                }).catch(error => {
                    console.error('OCR Error: ' + error);
                });
            });

            $('#cameraModal').on('hidden.bs.modal', function() {
                video.srcObject.getTracks().forEach(track => track.stop());
            });
        });
    </script>


    {{-- <script>
        $(document).ready(function() {
            $('#temp_start_pouring').on('click', function() {
                // Open camera
                if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                    navigator.mediaDevices.getUserMedia({
                        video: true
                    }).then(function(stream) {
                        // Create a video element to display the stream
                        const video = document.createElement('video');
                        video.srcObject = stream;
                        video.play();

                        // Append the video element to the body or a specific container
                        document.body.appendChild(video);

                        // Stop the stream when the video is clicked (for demonstration purposes)
                        video.addEventListener('click', function() {
                            stream.getTracks().forEach(track => track.stop());
                            document.body.removeChild(video);
                        });
                    }).catch(function(err) {
                        console.error('Error accessing camera: ' + err);
                    });
                } else {
                    alert('Your browser does not support camera access.');
                }
            });
        });
    </script> --}}



    <!-- AKHIR FORM -->
@endsection

@section('modal')
    <!-- Camera Modal -->
    <div class="modal fade" id="cameraModal" tabindex="-1" role="dialog" aria-labelledby="cameraModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cameraModalLabel">Capture Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <video id="video" width="100%" autoplay></video>
                    <canvas id="canvas" style="display: none;"></canvas>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="captureButton">Capture</button>
                </div>
            </div>
        </div>
    </div>
@endsection
