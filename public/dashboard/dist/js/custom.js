/**
 * AdminLTE Demo Menu
 * ------------------
 * You should not use this file in production.
 * This file is for demo purposes only.
 */
$(function () {
    'use strict'

    /**
     * Get access to plugins
     */

    $(".checkALL").change(function() {

        $(this).each(function () {
            if(this.checked){
                $(".delete-item").attr('checked', true)
            }else {
                $(".delete-item").attr('checked', false)
            }
        });


    });

    $('.deleteAll').on('click', function () {

            // $('#exampleModal').modal('show')
            if($('input[name="item[]"]').is(':checked')){
                $('#isChecked').modal('show')
            }else
            {
                $('#notChecked').modal('show')
            }

      });

      $('.submitFormDelete').on('click', function () {
            $('#formDeleteAll').submit();
      });



    //   $('.delete').on('click', function () {
    //         $('#deleteModal').modal('show')
    //   });

    //ajax add edit
      $('.form-ajax').on('submit',function (event) {
        event.preventDefault();
        var route   = $(this).data('route');
        var dataSend   = new FormData(this);

        var btn_text = $('.submit-ajax span').html();
        $('.submit-ajax').attr('disabled', 'disabled');
        $('.submit-ajax span').text('loading...');
        $.ajax({
            url     : route,
            type    : 'post',
            data    : dataSend,
            dataType:'json',
            processData: false,
            contentType: false,
            cache: false,
            success : function(data){
                if(data.status === 0)
                {
                    $('.date-pockets').empty()
                    $('.inside-empty').empty()
                    $('.has-error').removeClass('has-error')
                    $.each( data.message, function( key, value ) {

                        $('#'+key+'_div_inside').empty()
                        $('#'+key+'_input_inside').addClass('has-error')
                        $('#'+key+'_div_inside').append('<small class="has-val">'+value+'</small>');
                    });
                    $('.submit-ajax').removeAttr('disabled');
                    $('.submit-ajax span').text(btn_text);
                }else{
                    toastr.success(data.message);
                    $('.submit-ajax span').removeAttr('disabled');
                    $('.submit-ajax span').text(btn_text);
                    window.location.reload()
                    // $('.form-ajax').location.reload();
                }
            }
        });

    });


    //delete all
    $(document).on('submit','#formDeleteAll',function(event){
        event.preventDefault();
        var route   = $(this).data('route');
        var data   = $(this).serialize();

        $.ajax({
            url     : route,
            type    : 'post',
            data    : data,
            dataType:'json',
            success : function(data){
                if(data.status === 0)
                {
                    toastr.error(data.message)
                    console.log('not remove')

                }else{

                    $('#formDeleteAll .table').DataTable().ajax.reload();

                    toastr.success(data.message)
                }
            }
        });
        $('#isChecked').modal('hide')
    });
    //delete
    $(document).on('click','.delete',function(){

            var route   = $(this).data('route');
            var token   = $(this).data('token');
            $.confirm({
                icon                : 'glyphicon glyphicon-floppy-remove',
                animation           : 'rotateX',
                closeAnimation      : 'rotateXR',
                title               : 'Make the deletion process',
                autoClose           : 'cancel|6000',
                text                : 'Are you sure you want to delete?',
                confirmButtonClass  : 'btn-outline',
                cancelButtonClass   : 'btn-outline',
                confirmButton       : 'Yes',
                cancelButton        : 'No',
                dialogClass			: "modal-danger modal-dialog",
                confirm: function () {
                    $.ajax({
                        url     : route,
                        type    : 'post',
                        data    : {_method: 'delete', _token :token},
                        dataType:'json',
                        success : function(data){
                            if(data.status === 0)
                            {
                                toastr.error(data.message)
                                //Swal.fire("خطأ!", data.message, "error")
                            }else{
                                $('.table-responsive .table').DataTable().ajax.reload();
                                toastr.success(data.message)

                            }
                        }
                    });
                }
            });
    });

    //ajax pockets
    $('#pockets-ajax').on('submit',function (event) {
        event.preventDefault();
        var route   = $(this).data('route');
        var dataSend   = new FormData(this);

        var btn_text = $('#pockets-ajax .submit-ajax span').html();
        $('#pockets-ajax .submit-ajax').attr('disabled', 'disabled');
        $('#pockets-ajax .submit-ajax span').text('loading...');
        $.ajax({
            url     : route,
            type    : 'post',
            data    : dataSend,
            dataType:'json',
            processData: false,
            contentType: false,
            cache: false,
            success : function(data){
                if(data.status === 0)
                {
                    $('.date-pockets').empty()
                    $('.inside-empty').empty()
                    $('.has-error').removeClass('has-error')
                    $.each( data.message, function( key, value ) {
                        $('#'+key+'_div_inside').empty()
                        $('#'+key+'_input_inside').addClass('has-error')
                        $('#'+key+'_div_inside').append('<small class="has-val">'+value+'</small>');
                    });
                    $('.submit-ajax').removeAttr('disabled');
                    $('.submit-ajax span').text(btn_text);
                }else if(data.status === 1){
                    toastr.success(data.message);
                    $('#pockets-ajax').removeAttr('disabled');
                    $('#pockets-ajax span').text(btn_text);
                    window.location.reload()
                    // $('.form-ajax').location.reload();
                }else{

                    $('.date-pockets').empty()
                    $('.date-pockets').append('<p class="alert alert-danger">'+data.message+'</p>');
                    $('#pockets-ajax .submit-ajax').removeAttr('disabled');
                    $('#pockets-ajax .submit-ajax span').text(btn_text);
                }
            }
        });

    });


     //add patient
     $(document).on('click','#patient-ajax',function () {
        var route       = $(this).data('route');
        var token       = $(this).data('token');
        var name        = $(this).data('name');
        var address     = $(this).data('address');
        var age         = $(this).data('age');
        var id          = $(this).data('id');
        var patient      = "patient";

        $.confirm({
            icon                : 'glyphicon glyphicon-floppy-remove',
            animation           : 'rotateX',
            closeAnimation      : 'rotateXR',
            title               : 'تأكد عملية الكشف',
            autoClose           : 'cancel|6000',
            text             : 'هل أنت متأكد من الكشف ؟',
            confirmButtonClass  : 'btn-outline',
            cancelButtonClass   : 'btn-outline',
            confirmButton       : 'نعم',
            cancelButton        : 'لا',
            dialogClass			: "modal-info modal-dialog",
            confirm: function (){
                $.ajax({
                    url     : route,
                    type    : 'post',
                    data    : {_token: token,
                                patient: patient,
                                id: id,
                                name: name,
                                address: address,
                                age: age
                            },
                    dataType:'json',
                    success : function(data){
                        if(data.status === 0)
                        {
                           $.each( data.message, function( key, value ) {
                            toastr.error(value);
                           });
                        }else{
                            toastr.success(data.message);
                            $('.table-responsive .table').DataTable().ajax.reload();
                            // $('.form-ajax').location.reload();
                        }
                    }
                });
            }



        })
    });


    //add confirm
    $(document).on('click','#update-ajax',function () {
        var route   = $(this).data('route');
        var token   = $(this).data('token');
        var id      = $(this).data('id');

        $.confirm({
            icon                : 'glyphicon glyphicon-floppy-remove',
            animation           : 'rotateX',
            closeAnimation      : 'rotateXR',
            title               : 'تأكد عملية الحجز',
            autoClose           : 'cancel|6000',
            text             : 'هل أنت متأكد من عملية الحجز؟',
            confirmButtonClass  : 'btn-outline',
            cancelButtonClass   : 'btn-outline',
            confirmButton       : 'نعم',
            cancelButton        : 'لا',
            dialogClass			: "modal-info modal-dialog",
            confirm: function (){
                $.ajax({
                    url     : route,
                    type    : 'post',
                    data    : {_token: token, id: id},
                    dataType:'json',
                    success : function(data){
                        if(data.status === 0)
                        {
                            toastr.success(data.message);

                        }else{
                            toastr.success(data.message);
                            $('.table-responsive .table').DataTable().ajax.reload();
                            // $('.form-ajax').location.reload();
                        }
                    }
                });
            }



        })
    });

})
