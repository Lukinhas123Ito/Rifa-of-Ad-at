$(document).ready(function(){

$('.save').click(function(e){
    
    e.preventDefault()

    let dados = $('#form-type').serialize()

    dados += `&operacao=${$('.save').attr('data-operation')}`

    $.ajax({
        type: 'POST',
        dataType:"JSON",
        assync:true,
        data:dados,
        url:'Src/type/M/save.php',
        success: function(dados) {
            Swal.fire({
                title: 'Sysrifa',
                text: dados.message,
                icon: dados.type,
                confirmButtonText: 'Blz'
            })
            $('#modal-tipo').modal('hide')
        }
    })
})



})