var $modal = $('#quickModal');
$(document).on("click", ".btn-view-book", function (e) {
    e.preventDefault();
    var id = $(this).attr('data-id');
    var tempEditUrl = "{{ route('books.show', ':id') }}";
    tempEditUrl = tempEditUrl.replace(':id', id);
    $modal.load(tempEditUrl, function (response) {
        $modal.modal('show');
    });
});

$(document).on("click", ".btn-view-book-sale", function (e) {
    e.preventDefault();
    var id = $(this).attr('data-id');
    var tempEditUrl = "{{ route('books.show', ':id') }}";
    tempEditUrl = tempEditUrl.replace(':id', id);
    $modal.load(tempEditUrl, function (response) {
        $modal.modal('show');
    });
});


$(document).ready(function () {
    $('#bookSaleRequest').DataTable({
    aaSorting: [0, 'desc'],
    // scrollY: "200px",
    scrollCollapse: true,
    // paging: false,
    processing: true,
    serverSide: true,
    ajax: "{{ route('dashboard.books-sale-request.json') }}",
    columns: [{
        data: 'DT_RowIndex',
        render: function (data, type, row) {
            return '<strong> #' + data + '</strong>';
            }
        },
        {
            data: 'book',
            name: 'book',
            render: function (data, type, row) {
                return '<strong>' + data.title + '</strong>';
            } },
        {
            data: 'user',
            name: 'user',
            render: function (data, type, row) {
                var abc = '<span class="badge badge-success mb-1">' + data.first_name + ' ' + data.last_name + '</span>';
                var bcd = ' ';
                if (data.vendor != null) {
                    bcd = '<span class="badge badge-danger mb-1">' + data.vendor.store_title + '</span>';
            }
            return abc + ' </br> ' + bcd;
        }
        },

        {
            data: 'status',
            name: 'status',
            render: function (data, type, row) {
                if (data === 'Active') {
                    return '<h5><span class="btn btn-outline-success btn-book-sale-toggle"  data-id="' + row.id + '">Active</span></h5>';
                } else if (data === 'Inactive') {
                    return '<h5><span class="btn btn-outline-danger btn-book-sale-toggle"  data-id="' + row.id + '">Inactive</span></h5>';
                }
            }
        },
        {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
        }]
    });
});

$(document).ready(function () {
    $('#bookRequest').DataTable({
        aaSorting: [0, 'desc'],
        // scrollY: "200px",
        scrollCollapse: true,
        // paging: false,
        processing: true,
        serverSide: true,
        ajax: "{{ route('dashboard.books-request.json') }}",
        columns: [{
            data: 'DT_RowIndex',
            render: function (data, type, row) {
                return '<strong> #' + data + '</strong>';
            }
        },
        {
            data: 'title',
            name: 'title',
            render: function (data, type, row) {
                return '<strong>' + data + '</strong>';
            }
        },
        {
            data: 'isbn_13',
            name: 'isbn_13',
            render: function (data, type, row) {
                return '<span class="badge badge-danger mb-1">' + data + '</span>'
            }
        },

        {
            data: 'status',
            name: 'status',
            render: function (data, type, row) {
                if (data === 'Active') {
            return '<h5><span class="btn btn-outline-success btn-book-toggle"  data-id="' + row.id + '">Active</span></h5>';
                } else if (data === 'Pending') {
            return '<h5><span class="btn btn-outline-danger btn-book-toggle"  data-id="' + row.id + '">Inactive</span></h5>';
                }
            }
        },{
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
        }]
    });
});


$(document).on("click", ".btn-book-toggle", function (e) {
    e.preventDefault();
    var $this = $(this);
    var id = $this.attr('data-id');
    var tempEditUrl = "{{ route('dashboard.books-request.status', ':id') }}";
    tempEditUrl = tempEditUrl.replace(':id', id);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: tempEditUrl,
        contentType: false,
        processData: false,
        cache: false,
        success: function (response) {
            $('#bookRequest').DataTable().ajax.reload();
            $.toast({
                heading: 'Success',
                text: response.success,
                position: 'top-right',
                stack: false,
                icon: 'success',
                loader: false,
            })
        },
        error: function (response) {
            $.toast({
                heading: 'Warning',
                text: response.responseJSON.error,
                position: 'top-right',
                stack: false,
                icon: 'warning',
                loader: false,
            }) 
        }
    });

});

$(document).on("click", ".btn-book-sale-toggle", function (e) {
    e.preventDefault();
    var $this = $(this);
    var id = $this.attr('data-id');
    var tempEditUrl = "{{ route('dashboard.books-sale-request.status', ':id') }}";
    tempEditUrl = tempEditUrl.replace(':id', id);
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    $.ajax({
        type: "POST",
        url: tempEditUrl,
        contentType: false,
        processData: false,
        cache: false,
        success: function (response) {
            $('#bookSaleRequest').DataTable().ajax.reload();
            $.toast({
                heading: 'Success',
                text: response.success,
                position: 'top-right',
                stack: false,
                icon: 'success',
                loader: false,
            })
        },
        error: function (response) {
            $.toast({
                heading: 'Warning',
                text: response.responseJSON.error,
                position: 'top-right',
                stack: false,
                icon: 'warning',
                loader: false,
            })
        }
    });
});
