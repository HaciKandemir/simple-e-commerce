$(document).ready(function() {

    //Sepete ekleme
    $('.add-to-basket').click(function() {
        productId = $(this).attr("id");
        const formData = new FormData();
        formData.append('id', productId);
        fetch('../../basket.php',{
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data['basket_count']>0){
                 $(".basket-item-count").text(data['basket_count']);
                }
            })
            .catch(err=>{
                console.log("err:"+err);
            })
    });

    //Adet değiştirme
    $('.up, .down').click(function () {
        let action = null
        if ($(this).hasClass('up')){
            action = 'up';
        }else{
            action = 'down';
        }
        productId = $(this).attr("id");
        const formData = new FormData();
        formData.append('id', productId);
        formData.append('action', action);
        fetch('../../basket.php',{
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data['success']===true){
                    // headerdaki ürün adeti
                    $(".basket-item-count").text(data['basket_count']);
                    // adet ile çöp kutusu arasındaki fiyat
                    $('.price', $(this).parent().parent())[0].innerText=data['this_total_price']
                        .toLocaleString('tr-TR', { style: 'currency', currency: "TRY" });
                    if (action==="up"){
                        $(this).prev('.input-counter')[0].stepUp(1)
                    }else{
                       $(this).next('.input-counter')[0].stepDown(1);
                    }
                }
            })
            .catch(err=>{
                console.log("err:"+err);
            })
    });

    //Sepetten silme
    $('.delete-to-basket').click(function () {
        productId = $(this).attr("id");
        const formData = new FormData();
        formData.append('id', productId);
        formData.append('action',"delete");
        fetch('../../basket.php',{
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                console.log($(this).parent().parent().remove());
                if (data['basket_count']===0){
                    data['basket_count']=null;
                }
                $(".basket-item-count").text(data['basket_count']);
            })
            .catch(err=>{
                console.log("err:"+err);
            })
    });

});