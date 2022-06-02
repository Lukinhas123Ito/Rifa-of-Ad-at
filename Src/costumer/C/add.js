$(document).ready(function(){
    
    $('.btn-new').click(function(e){
 
    e.preventDefault()
           
    //This part gonna clear and empty all datas from modal
           
    $('.modal-title').empty()
    $('.modal-body').empty()
           
    //include news text in the header of my modaln page
    $('.modal-title').append('Add Comprador')
           
    //Now, include  a new page within the body of my modal
           
    $('.modal-body').load('Src/type/V/form-type.html')
           
    //THis part add new atributo 
    $('.save').attr('data-operation', 'insert')
           
    //Show the modal body
    $('#modal-type').modal('show')
           
           
    })

})