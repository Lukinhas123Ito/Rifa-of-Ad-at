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
        url:'Src/buyyer/M/save.php',
        success:function(dados){
            
            Swal.fire({
               
                    title: 'Cadastro concluido',
                    text: dados.messagem,
                    icon: dados.tipo,
                    confirmButtonText: 'OK'
                
            })

            $('#modal-type').modal('hide')
            
        }
    })
})



})