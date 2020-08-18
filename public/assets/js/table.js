function getRate(id, callback){
    $.ajax({
        url: '/api/rates/'+id,
        success: function (rate) {
            callback(rate)
        }
    })
}

$(document).ready(function () {
    $('#date-input').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd"
    })
    $('[data-remove-id]').on('click', function (event) {
        event.preventDefault()
        let rowId = $(this).attr('data-remove-id')
        $('.rate-delete-modal').modal('show')
        $('.rate-delete-button').attr('data-remove-id', rowId)
    })
    $('.rate-delete-button').on('click', function () {
        let rowId = $(this).attr('data-remove-id')

        $.ajax({
            url: 'api/rates/'+rowId,
            method: 'DELETE',
            success: function () {
                location.reload()
            }
        })

    })
    $('[data-table-row-id]').on('click', function () {
        let rowId = $(this).attr('data-table-row-id');

        getRate(rowId, (rate)=>{
            console.dir(rate)
            $('.rate-input-modal').find('input[name="USD"]').val(rate.USD)
            $('.rate-input-modal').find('input[name="EUR"]').val(rate.EUR)
            $('.rate-input-modal').find('input[name="CZK"]').val(rate.CZK)
            $('.rate-input-modal').find('input[name="KZT"]').val(rate.KZT)
            $('.rate-input-form').attr('rate-id', rowId)
            $('.rate-input-modal').modal('show')
        });
    })
    $('.rate-input-form').on('submit', function (event) {
        event.preventDefault()

        let rowId = $(this).attr('rate-id')
        let data = $(this).serialize()

        $.ajax({
            url: 'api/rates/'+rowId,
            data: data,
            method: 'PUT',
            success: function (data) {
                location.reload()
            }
        })
    })
    $('.rate-input-create-form').on('submit', function (event) {
        event.preventDefault()

        let data = $(this).serialize()
        $.ajax({
            url: 'api/rates',
            data: data,
            method: 'POST',
            success: function (data) {
                location.reload()
            }
        })

    })
})
