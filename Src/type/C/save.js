$(document).ready(function(){

$('.save').click(function(e){
    e.preventDefault()

    let dados = $('#form-type').serialize()

    dados += `&operacao=${$('.save').attr('data-operation')}`

    $.ajax({
        type: 'POST',
        dataType:"json",
        assync:true,
        data:dados,
        url:'Src/type/M/save.php',
        success:function(dados){

            Swal.fire({
                title : 'Systema',
                text: dados.message,
                icon:tipo,
                confirmButtonText: 'OK'
            })

            $('#modal-type').modal('hide')
        }
    })
})



})