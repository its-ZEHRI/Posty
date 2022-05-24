$(document).ready(function () {

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}
    })

    $(this).on('click', '#add_record', function () {
        $('#Modal').find('form').trigger('reset')
    })

    $(this).on('click', '#btn_modal_close', function () {
        $('#Modal').find('form').trigger('reset')
    })

    $('#add_name').on('click', function (e) {
        e.preventDefault();
        var data = {
           'name'    :  $('#name').val(),
           'address' :  $('#address').val(),
        }
        $.ajax({
            type     : 'POST',
            url      : '/saveName',
            dataType : 'json',
            data     : data,
            success  : function (response) {
                if (response.status == 400) {
                    $('#add_modal_message').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">\
                    <strong>'+ response.message+'</strong>\
                    <button type="button" id="alert_close_btn" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>\
                    </div>')
                }
                else {
                    refresh();
                    $('#Modal').modal('hide');
                    $('#message').html('<div class="alert alert-success alert-dismissible fade show" role="alert">\
                    <strong>'+ response.message+'</strong>\
                    <button type="button" id="alert_close_btn" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>\
                    </div>')
                }
            }
        }) //end ajax
    }) // end of addName

    $(this).on('click', '.editRecord', function () {
        var id = $(this).val();
        $.ajax({
            type   : 'GET',
            url    : '/getRecord/' + id,
            success: function (response) {
                if (response.status == 200) {
                    $('#record_id').val(response.record.id)
                    $('#E_name').val(response.record.name)
                    $('#E_address').val(response.record.address)
                    $('#EditModal').modal('show')
                }
                if (response.status == 400) {
                    $('#message').html('<div class="alert alert-success alert-dismissible fade show" role="alert">\
                    <strong>'+ response.message+'</strong>\
                    <button type="button" id="alert_close_btn" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>\
                    </div>')
                }
            }
        })//end of ajax
    })//end of editRecord

    $(this).on('click', '.DeleteRecord', function (e) {
        var id = $(this).val();
        e.preventDefault();
        $.ajax({
            type    : 'PUT',
            url     : '/DeleteRecord/' + id,
            success : function (response) {
                if (response.status == 200) {
                    $('#message').html('<div class="alert alert-success alert-dismissible fade show" role="alert">\
                    <strong>'+ response.message+'</strong>\
                    <button type="button" id="alert_close_btn" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>\
                    </div>')
                    refresh()
                }
            }
        })//end of ajax
    })//end of delete

    $(this).on('click', '#update_record', function (e) {
        e.preventDefault();
        var id   = $('#record_id').val()
        var data = {
            'name'    : $('#E_name').val(),
            'address' : $('#E_address').val()
        }
        $.ajax({
            type     : 'PUT',
            url      : '/updateRecord/'+id,
            dataType : 'json',
            data     : data,
            success  : function (response) {
                if (response.status == 400) {
                    $('#edit_modal_message').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">\
                    <strong>'+ response.message+'</strong>\
                    <button type="button" id="alert_close_btn" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>\
                    </div>')
                }
                else {
                    $('#EditModal').find('form').trigger('reset')
                    refresh()
                    $('#EditModal').modal('hide')
                    $('#message').html('<div class="alert alert-success alert-dismissible fade show" role="alert">\
                    <strong>'+ response.message+'</strong>\
                    <button type="button" id="alert_close_btn" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>\
                    </div>')
                }
            }
        })//end of ajax
    })//end of update Record

    function refresh() {
        $.ajax({
            type    : 'GET',
            url     : '/refresh',
            success : function (response) {
                $('#name_list').html('');
                $.each(response.data, function (key, item) {
                    $('#name_list').append('<tr>\
                            <td>'+item.id+'</td>\
                            <td>'+item.name+'</td>\
                            <td>'+item.address+'</td>\
                            <td class="text-center">\
                            <button value="'+item.id+'" class="btn btn-sm btn-info editRecord">Edit</button>\
                            <button value="'+item.id+'" class="btn btn-sm btn-danger DeleteRecord">Delete</button></td>\
                        </tr>')
                })// end of each
            }
        })//end of ajax
    }
});
