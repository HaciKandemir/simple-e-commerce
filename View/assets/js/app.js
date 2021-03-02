$(document).ready(function() {

    $('.add-to-basket').click(function() {
        productId = $(this).attr("id")
        const formData = new FormData();
        formData.append('id', productId)
        fetch('../../basket.php',{
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data['basket_count']>0){
                 $(".basket-item-count").text(data['basket_count']);
                }
            })
            .catch(err=>{
                console.log(err);
            })
    });



});