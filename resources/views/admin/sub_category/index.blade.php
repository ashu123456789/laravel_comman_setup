@extends('../admin/layout.sidemenu')


@section('subcontent')

<!--begin::Custom Page Header Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">SubCategory List</h1>
            <!--end::Title-->

            <!--begin::Separator-->
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            {{ Breadcrumbs::render('sub_categories.index') }}
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->

        <!--begin::Actions-->
        <div class="d-flex align-items-center py-1">
            <!--begin::Button-->
            <a href="{{ route('sub_categories.create') }}" class="btn btn-sm btn-primary">Create New SubCategory</a>
            <!--end::Button-->
        </div>
        <!--end::Actions-->

    </div>
    <!--end::Container-->
</div>

<!--end::Custom Page Header Toolbar-->


<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <!--begin::Tables Widget 10-->
        <div class="card mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">{{trans_choice('content.sub_category', 2)}}</span>
                </h3>
                <!-- Menu Bar -->
            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div class="card-body pt-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table id="kt_table_1" class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="border-0">
                                <th class="p-0">{{trans_choice('content.id_title', 1)}}</th>
                                <th class="p-0 min-w-150px">{{trans_choice('content.name_title', 1)}}</th>
                                <th class="p-0 min-w-200px">{{trans_choice('content.description_title', 1)}}</th>
                                <th class="p-0 min-w-150px">{{trans_choice('content.image_title', 1)}}</th>
                                <th class="p-0 min-w-150px">{{trans_choice('content.status_title', 1)}}</th>
                                <th class="p-0 min-w-100px text-end">{{trans_choice('content.action_title', 1)}}</th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>

                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Table container-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Tables Widget 10-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->

@endsection

@push('scripts')

<script>
    var oTable;
    $(document).ready(function() {
        oTable = $('#kt_table_1').DataTable({
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [
                [0, 'desc']
            ],
            oLanguage: {
                sLengthMenu: "Show _MENU_",
            },
            createdRow: function(row, data, dataIndex) {
                // Set the data-status attribute, and add a class
                $(row).attr('role', 'row');
                $(row).find("td").last().addClass('text-danger');

            },
            ajax: "{{ route('sub_categories.index') }}",
            //     dom: `<"top pull-right"f>lt<"botttom">
            // <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_emailr'p>>`,
            columnDefs: [{
                targets: [],
                orderable: false,
                searchable: false,
                // className: 'mdl-data-table__cell--non-numeric'
            }],
            columns: [{
                    data: 'id',
                    name: 'id',
                    render: function(data, type, row, meta) {
                        return "#" + serialNumberShow(meta);
                    }
                },

                {
                    data: 'name',
                    name: 'name',
                    render: function(data, type, row, meta) {
                        return `<div class="font-medium whitespace-no-wrap">${data}</div>`;
                    }
                },

                {
                    data: 'description',
                    name: 'description',
                    render: function(data, type, row, meta) {
                        return `<div class="flex items-center justify-left">${data}</div>`;
                    }
                },

                {
                    data: 'image',
                    name: 'image',
                    render: function(data, type, row, meta) {
                        return `<div class="flex sm:justify-center">
                                    <div class="intro-x w-10 h-10 image-fit">
                                    <img alt="${row['name']}" style="width:85px;" src="${data}"> 
                                    </div>
                                </div>`;
                    }
                },
                {
                    data: 'is_active',
                    name: 'is_active',
                    render: function(data, type, row, meta) {
                        console.log(data);
                        var attr = `data-id="${ row['id'] }" data-status="${ data }"`;
                        var avtive_data = actionActiveButton(data, attr);
                        return avtive_data;
                    }
                },

                {
                    data: 'id',
                    name: 'id',
                    render: function(data, type, row, meta) {

                        var edit_url = `{{ url('/') }}/admin/sub_categories/` + row['id'] + `/edit/`;
                        var show_url = `{{ url('/') }}/admin/sub_categories/` + row['id'] + ``;

                        var edit_data = actionEditButton(edit_url, row['id']);
                        var show_data = actionShowButton(show_url);
                        // var show_home = actionHomeButton(row['id']);

                        var del_data = actionDeleteButton(row['id']);
                        return `<div class="flex justify-left items-center"> ${show_data} ${edit_data} ${del_data} </div>`;

                    }
                },
            ],
        });
    });

    $(document).on('click', '.clsdelete', function() {
        var id = $(this).attr('data-id');
        var e = $(this).parent().parent();
        var url = `{{ url('/') }}/admin/sub_categories/` + id;
        // var url = `{{route('sub_categories.destroy', 'id')}}`;
        tableDeleteRow(url, oTable);
    });

    $(document).on('click', '.clsstatus', function() {
        var id = $(this).attr('data-id');
        var status = $(this).attr('data-status');
        var url = `{{ url('/') }}/admin/sub_categories/status/` + id + `/` + status;
        tableChnageStatus(url, oTable);
    });
</script>


@endpush