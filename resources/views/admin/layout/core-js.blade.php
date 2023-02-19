<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="/admin/dist/plugins/global/plugins.bundle.js"></script>

<!--end::Global Javascript Bundle-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script src="/admin/dist/js/scripts.bundle.js"></script>


<!-- BEGIN: JS Assets-->
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
</script> -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=['your-google-map-api']&libraries=places"></script> -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>

<script>
    $(document).on('keypress', '.only_number', function(e) {
        // Only ASCII charactar in that range allowed
        var ASCIICode = (e.which) ? e.which : e.keyCode;
        $("#onlynumber_error").html("");
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) {
            $("#onlynumber_error").html("Only Numbers allowed.");
            return false;
        }
        return true;
    });
    function actionEditButton(url, id) {
        return `<a href="` + url + `" data-id="` + id + `" title="Edit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                    <span class="svg-icon svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                            <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                        </svg>
                    </span>
                </a>`;
    }
    function setStringLength(string_value, length = 20) {
        return string_value.length > length ? string_value.substring(0, length) + "..." : string_value;
    }
    function actionHomeButton(url, id) {
        // return `<a class="btn btn-sm btn-clean btn-icon btn-icon-md" target="_blank" href="`+url+`" data-id="` + id + `" title="Edit"><i class="fa fa-edit text-success" ></i></a>`;
        return `<a class="button px-2 mr-1 mb-2 mt-2 text-white mr-3 bg-theme-12" data-toggle="modal" data-target="#delete-confirmation-modal3" href="javascript:;" onclick="status('7','1')">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home w-4 h-4"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></span>
                </a>`;
    }
    function getDateByFormat(date) {
        const d = new Date(date);
        const ye = new Intl.DateTimeFormat('en', {
            year: 'numeric'
        }).format(d);
        const mo = new Intl.DateTimeFormat('en', {
            month: 'short'
        }).format(d);
        const da = new Intl.DateTimeFormat('en', {
            day: '2-digit'
        }).format(d);
        return `${da}-${mo}-${ye}`;
    }
    function actionShowButton(url) {
        return `<a href="` + url + `" title="Show" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                <span class="svg-icon svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
                            <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                </span>
            </a>`;
    }
    function actionShowTitle(url, stringTitle) {
        return `<a class="btn btn-sm btn-clean" href="` + url + `" title="` + stringTitle + `">` + stringTitle + `</a>`;
    }
    function actionDeleteButton(id, deleteclass = "clsdelete") {
        return `<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm ${deleteclass}" data-id="${id}">
                    <span class="svg-icon svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                            </g>
                        </svg>
                    </span>
                </a>`;
    }
    function serialNumberShow(meta) {
        return (parseInt(meta.row) + parseInt(meta.settings._iDisplayStart + 1));
    }
    function actionActiveButton(data, attr, statusclass = "clsstatus") {
        // return parseInt(data) ? "<span class=\"badge badge-success cursor-pointer "+statusclass+" \" "+ attr +" >"+"Active"+"</span>" : "<span class=\"badge badge-danger cursor-pointer  "+statusclass+" \" "+ attr +">"+"Deactivate"+"</span>";
        if (data == 1) {
            return `<div class="badge badge-light-success fw-bolder ${statusclass}" ${attr}>Active</div>`;
        } else {
            return `<div class="badge badge-light-danger fw-bolder ${statusclass}" ${attr}>InActive</div>`;
        }
    }
    // function actionHomeButton(data, attr, statusclass = "clsstatus"){
    //     var html_data_retun = '';
    //     if(data){
    //         html_data_retun = `
    //                 <span class="w-5 h-5 flex items-center justify-center ${statusclass}" ${attr}>
    //                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home w-4 h-4"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
    //                 </span>`;
    //         }else{
    //         }
    //     return html_data_retun;
    // }
    function imagesPreview(input, image_id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#' + image_id).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
    function tableDeleteRow(url, oTable) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: url,
                            type: 'DELETE',
                            dataType: 'json'
                        })
                        .done(function(response) {
                            oTable.draw();
                            Swal.fire('Deleted!', response.message, 'success');
                        })
                        .fail(function(response) {
                            console.log(response);
                            console.log(url);
                            Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                        });
                });
            },
            allowOutsideClick: false
        });
    }
    function tableChnageStatus(url, oTable) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You will be able to revert this.",
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            },
                            url: url,
                            type: 'GET',
                            dataType: 'json'
                        })
                        .done(function(response) {
                            if (response.status == 1) {
                                oTable.draw();
                                Swal.fire('Updated!', response.message, 'success');
                            } else {
                                Swal.fire('Info!', response.message, 'info');
                            }
                        })
                        .fail(function() {
                            Swal.fire('Oops...', 'Something went wrong with ajax !',
                                'error');
                        });
                });
            },
            allowOutsideClick: false
        });
    }
    $(document).ready(function() {
        setTimeout(function() {
            if ($('#ns').length > 0) {
                $('#ns').remove();
            }
        }, 5000)
    });
</script>