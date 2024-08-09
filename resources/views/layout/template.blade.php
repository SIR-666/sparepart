<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>

</head>

<body class="bg-light">
    <main class="container">
        @include('komponen.pesan')
        @yield('konten')
        <!-- Modal -->
        <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewModalLabel">Detail Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Data will be injected here -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewModalLabel">Detail Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Data will be injected here -->
                        @include('qc_checksheet.edit')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="formModalLabel">Edit Product</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  
                    <!-- Your form content goes here -->
                    {{-- <div class="my-3 p-3 bg-body rounded shadow-sm"> --}}
                      <div class="my-3 p-3 bg-body">                   
                      <!-- Form fields here -->
                      @include('qc_checksheet.edit')
                    </div>
                  
                </div>
                <div class="modal-footer">
                  {{-- <a href='' class="btn btn-primary btn-custom-red" name="back"><i class="fa fa-backward" data-bs-dismiss="modal" aria-hidden="true"></i> Close</a> --}}
                  {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                  {{-- <button type="submit" class="btn btn-success " name="submit">Save Changes <i class="fa fa-bookmark" aria-hidden="true"> </i></button> --}}
                  {{-- <button type="submit" class="btn btn-primary">Save changes</button> --}}
                </div>
              </div>
            </div>
          </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
        $(".btn-edit").click(function() {
          // alert($(this).attr('data-no-ladle'))
            $('#edit_product_name').val($(this).attr('data-product-name'));
            
            var url = "{{url('cs')}}/"+$(this).attr('data-product-name')
            $('#form-edit').attr('action',url)
            
            $('#edit_no_ladle').val(parseInt($(this).attr('data-no-ladle')));
            $('#edit_material').val(($(this).attr('data-material')));
            $('#edit_charging').val(parseInt($(this).attr('data-charging')));

            $('#edit_temp_tapping').val(($(this).attr('data-temp-taping')));
            $('#edit_start_tapping').val(($(this).attr('data-start-time-tapping')));
            $('#edit_reaction_time').val(parseInt($(this).attr('data-reaction-time')));
            $('#edit_start_pouring').val(($(this).attr('data-time-start-pouring')));
            $('#edit_temp_start_pouring').val(parseInt($(this).attr('data-temp-start-pouring')));
            $('#edit_time_pouring_n1').val(($(this).attr('data-n1-tpm')));
            $('#edit_time_pouring_n2').val(($(this).attr('data-n2-tpm')));
            $('#edit_time_pouring_n3').val(($(this).attr('data-n3-tpm')));
            $('#edit_finish_pouring').val(($(this).attr('data-time-finish-pouring')));
            $('#edit_temp_finish_pouring').val(parseInt($(this).attr('data-temp-finish-pouring')));

            $('#edit_qty_mould').val(parseInt($(this).attr('data-pcs-mold')));
            $('#edit_fading_time').val(parseInt($(this).attr('data-fading-time')));
            $('#edit_defect_short').val(parseInt($(this).attr('data-short-pour')));

            $('#edit_mold_bocor').val(parseInt($(this).attr('data-mold-bocor')));
            $('#edit_marubo').val(($(this).attr('data-marubo')));
            $('#edit_frm').val(($(this).attr('data-frm')));
            $('#edit_remark').val(($(this).attr('data-remark')));


            $('#editModal').modal('show');
        });
    </script>


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var viewModal = document.getElementById('viewModal');

            viewModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;

                // Retrieve data attributes

                var productName = button.getAttribute('data-product-name');
                var noLadle = button.getAttribute('data-no-ladle');
                var material = button.getAttribute('data-material');
                var tempTaping = button.getAttribute('data-temp-taping');
                var startTimeTapping = button.getAttribute('data-start-time-tapping');
                var reactionTime = button.getAttribute('data-reaction-time');
                var timeStartPouring = button.getAttribute('data-time-start-pouring');
                var tempStartPouring = button.getAttribute('data-temp-start-pouring');
                var n1Tpm = button.getAttribute('data-n1-tpm');
                var n2Tpm = button.getAttribute('data-n2-tpm');
                var n3Tpm = button.getAttribute('data-n3-tpm');
                var actC = button.getAttribute('data-act-c');
                var actSi = button.getAttribute('data-act-si');
                var actMn = button.getAttribute('data-act-mn');
                var actCr = button.getAttribute('data-act-cr');
                var actCu = button.getAttribute('data-act-cu');
                var actMg = button.getAttribute('data-act-mg');
                var actS = button.getAttribute('data-act-s');
                var actSn = button.getAttribute('data-act-sn');
                var actNi = button.getAttribute('data-act-ni');
                var timeFinishPouring = button.getAttribute('data-time-finish-pouring');
                var tempFinishPouring = button.getAttribute('data-temp-finish-pouring');
                var pcsMold = button.getAttribute('data-pcs-mold');
                var fadingTime = button.getAttribute('data-fading-time');
                var shortPour = button.getAttribute('data-short-pour');
                var moldBocor = button.getAttribute('data-mold-bocor');
                var opPouring = button.getAttribute('data-op-pouring');
                var marubo = button.getAttribute('data-marubo');
                var frm = button.getAttribute('data-frm');
                var remark = button.getAttribute('data-remark');
                var createdAt = button.getAttribute('data-created-at');
                var updatedAt = button.getAttribute('data-updated-at');
                var charging = button.getAttribute('data-charging');

                // Inject data into modal body
                var modalBody = viewModal.querySelector('.modal-body');
                modalBody.innerHTML = `
            
            <p><strong>Product Name:</strong> ${productName}</p>
            <p><strong>No Ladle:</strong> ${noLadle}</p>
            <p><strong>Material:</strong> ${material}</p>
            <p><strong>Temp. Taping:</strong> ${tempTaping}</p>
            <p><strong>Start Time Tapping:</strong> ${startTimeTapping}</p>
            <p><strong>Reaction Time:</strong> ${reactionTime}</p>
            <p><strong>Start Time Pouring:</strong> ${timeStartPouring}</p>
            <p><strong>Temp. Start Pouring:</strong> ${tempStartPouring}</p>
            <p><strong>N1 TPM:</strong> ${n1Tpm}</p>
            <p><strong>N2 TPM:</strong> ${n2Tpm}</p>
            <p><strong>N3 TPM:</strong> ${n3Tpm}</p>
            <p><strong>Act C:</strong> ${actC}</p>
            <p><strong>Act Si:</strong> ${actSi}</p>
            <p><strong>Act Mn:</strong> ${actMn}</p>
            <p><strong>Act Cr:</strong> ${actCr}</p>
            <p><strong>Act Cu:</strong> ${actCu}</p>
            <p><strong>Act Mg:</strong> ${actMg}</p>
            <p><strong>Act S:</strong> ${actS}</p>
            <p><strong>Act Sn:</strong> ${actSn}</p>
            <p><strong>Act Ni:</strong> ${actNi}</p>
            <p><strong>Time Finish Pouring:</strong> ${timeFinishPouring}</p>
            <p><strong>Temp. Finish Pouring:</strong> ${tempFinishPouring}</p>
            <p><strong>PCS Mold:</strong> ${pcsMold}</p>
            <p><strong>Fading Time:</strong> ${fadingTime}</p>
            <p><strong>Short Pour:</strong> ${shortPour}</p>
            <p><strong>Mold Bocor:</strong> ${moldBocor}</p>
            <p><strong>Operator Pouring:</strong> ${opPouring}</p>
            <p><strong>Marubo:</strong> ${marubo}</p>
            <p><strong>Frm:</strong> ${frm}</p>
            <p><strong>Remark:</strong> ${remark}</p>
            <p><strong>Created At:</strong> ${createdAt}</p>
            <p><strong>Updated At:</strong> ${updatedAt}</p>
            <p><strong>Charging:</strong> ${charging}</p>
          `;
            });
        });
    </script>

</body>

</html>
