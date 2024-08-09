@extends('layout.index')
<!-- START DATA -->
@section('content')
    <!-- Bootstrap CSS -->
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <form> --}}

    

    @csrf
    {{-- <div class="my-3 p-3 bg-body rounded shadow-sm modal-xl"> --}}
    <!-- TOMBOL TAMBAH DATA -->
    <div class="card-body">
        <div class="pb-3">
            <a href='cs/create' class="btn btn-primary">+ Tambah Data</a>
        </div>
        <div class="pb-1">

        </div>

        <div class="table-responsive">
            <table id="zero_config" class="table table-striped border table-bordered display text-nowrap"
                style="width: 100%">
                {{-- <table class="table table-striped"> --}}
                <thead>
                    <tr style="font-size: 12px">

                        <th class="col-md-2">Nama Product</th>
                        <th class="col-md-1">No Ladle</th>
                        <th class="col-md-1">Tipe Material</th>
                        <th class="col-md-1">Temp. Tapping</th>
                        <th class="col-md-1">Start Tapping</th>
                        <th class="col-md-1">Start Pouring</th>
                        <th class="col-md-1">Operator</th>
                        <th class="col-md-1">Status</th>
                        <th class="col-md-2">Act</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- <?php $i = $data->firstItem(); ?> --}}
                    @foreach ($data as $item)
                        <tr style="font-size: 12px">

                            <td>{{ $item->product_name }}</td>
                            <td class="text-center">{{ $item->no_ladle }}</td>
                            <td class="text-center">{{ $item->material }}</td>
                            <td class="text-center">{{ $item->temp_taping }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->start_time_tapping)->format('H:i:s') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->time_start_pouring)->format('H:i:s') }}</td>
                            <td class="text-center">{{ $item->op_pouring }}</td>
                            <td class="text-center">{{ $item->remark }}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#viewModal" data-product-name="{{ $item->product_name }}"
                                    data-no-ladle="{{ $item->no_ladle }}" data-material="{{ $item->material }}"
                                    data-temp-taping="{{ $item->temp_taping }}"
                                    data-start-time-tapping="{{ \Carbon\Carbon::parse($item->start_time_tapping)->format('H:i:s') }}"
                                    data-reaction-time="{{ $item->reaction_time }}"
                                    data-time-start-pouring="{{ \Carbon\Carbon::parse($item->time_start_pouring)->format('H:i:s') }}"
                                    data-temp-start-pouring="{{ $item->temp_start_pouring }}"
                                    data-n1-tpm="{{ \Carbon\Carbon::parse($item->n1_tpm)->format('H:i:s') }}"
                                    data-n2-tpm="{{ \Carbon\Carbon::parse($item->n2_tpm)->format('H:i:s') }}"
                                    data-n3-tpm="{{ \Carbon\Carbon::parse($item->n3_tpm)->format('H:i:s') }}"
                                    data-act-c="{{ $item->act_C }}" data-act-si="{{ $item->act_Si }}"
                                    data-act-mn="{{ $item->act_Mn }}" data-act-cr="{{ $item->act_Cr }}"
                                    data-act-cu="{{ $item->act_Cu }}" data-act-mg="{{ $item->act_Mg }}"
                                    data-act-s="{{ $item->act_S }}" data-act-sn="{{ $item->act_Sn }}"
                                    data-act-ni="{{ $item->act_Ni }}"
                                    data-time-finish-pouring="{{ \Carbon\Carbon::parse($item->time_finish_pouring)->format('H:i:s') }}"
                                    data-temp-finish-pouring="{{ $item->temp_finish_pouring }}"
                                    data-pcs-mold="{{ $item->pcs_mold }}" data-fading-time="{{ $item->fading_time }}"
                                    data-short-pour="{{ $item->short_pour }}" data-mold-bocor="{{ $item->mold_bocor }}"
                                    data-op-pouring="{{ $item->op_pouring }}" data-marubo="{{ $item->marubo }}"
                                    data-frm="{{ $item->frm }}" data-remark="{{ $item->remark }}"
                                    data-created-at="{{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d H:i:s') }}"
                                    data-updated-at="{{ \Carbon\Carbon::parse($item->updated_at)->format('Y-m-d H:i:s') }}"
                                    data-charging="{{ $item->charging }}">
                                    View
                                </button>

                                <button type="button" class="btn btn-warning btn-sm btn-edit"
                                    data-product-name="{{ $item->product_name }}" data-no-ladle="{{ $item->no_ladle }}"
                                    data-material="{{ $item->material }}" data-temp-taping="{{ $item->temp_taping }}"
                                    data-start-time-tapping="{{ \Carbon\Carbon::parse($item->start_time_tapping)->format('H:i:s') }}"
                                    data-reaction-time="{{ $item->reaction_time }}"
                                    data-time-start-pouring="{{ \Carbon\Carbon::parse($item->time_start_pouring)->format('H:i:s') }}"
                                    data-temp-start-pouring="{{ $item->temp_start_pouring }}"
                                    data-n1-tpm="{{ \Carbon\Carbon::parse($item->n1_tpm)->format('H:i:s') }}"
                                    data-n2-tpm="{{ \Carbon\Carbon::parse($item->n2_tpm)->format('H:i:s') }}"
                                    data-n3-tpm="{{ \Carbon\Carbon::parse($item->n3_tpm)->format('H:i:s') }}"
                                    data-act-c="{{ $item->act_C }}" data-act-si="{{ $item->act_Si }}"
                                    data-act-mn="{{ $item->act_Mn }}" data-act-cr="{{ $item->act_Cr }}"
                                    data-act-cu="{{ $item->act_Cu }}" data-act-mg="{{ $item->act_Mg }}"
                                    data-act-s="{{ $item->act_S }}" data-act-sn="{{ $item->act_Sn }}"
                                    data-act-ni="{{ $item->act_Ni }}"
                                    data-time-finish-pouring="{{ \Carbon\Carbon::parse($item->time_finish_pouring)->format('H:i:s') }}"
                                    data-temp-finish-pouring="{{ $item->temp_finish_pouring }}"
                                    data-pcs-mold="{{ $item->pcs_mold }}" data-fading-time="{{ $item->fading_time }}"
                                    data-short-pour="{{ $item->short_pour }}" data-mold-bocor="{{ $item->mold_bocor }}"
                                    data-op-pouring="{{ $item->op_pouring }}" data-marubo="{{ $item->marubo }}"
                                    data-frm="{{ $item->frm }}" data-remark="{{ $item->remark }}"
                                    data-created-at="{{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d H:i:s') }}"
                                    data-updated-at="{{ \Carbon\Carbon::parse($item->updated_at)->format('Y-m-d H:i:s') }}"
                                    data-charging="{{ $item->charging }}">
                                    Edit
                                </button>
                                {{-- <a href='{{'cs/'.$item->product_name.'/edit'}}' data-bs-toggle="modal" data-bs-target="#formModal" class="btn btn-warning btn-sm">Edit</a> --}}
                                <form onsubmit="return confirm('Ensure Deleted Data?')" class="d-inline"
                                    action="{{ url('cs/' . $item->product_name) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="no_ladle" value="{{ $item->no_ladle }}">
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                                </form>
                            </td>
                        </tr>
                        {{-- <?php $i++; ?> --}}
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- AKHIR DATA -->
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
        {{-- </form> --}}
    @endsection



    @section('modal')
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
    @endsection

    @section('addJS')
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
            $(".btn-edit").click(function() {
                // alert($(this).attr('data-no-ladle'))
                $('#edit_product_name').val($(this).attr('data-product-name'));

                var url = "{{ url('cs') }}/" + $(this).attr('data-product-name')
                $('#form-edit').attr('action', url)

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
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}

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
    @endsection
