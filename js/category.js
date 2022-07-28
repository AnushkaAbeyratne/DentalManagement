$(document).ready(function (){

    $("#catid").change(function(){
        var url="../controller/productcontroller.php?status=getCatSubcategories";

        var x= $("#catid").val();

        $.post(url,{cat_id:x},function(data) {
            $("#subcatdiv").html(data).show();

        })
    })

    $("#additem").click(function () {
        var url="../controller/purchasingController.php?status=get_item";
        $.post(url,function(data) {
            $("#itemdisplay").append(data)
        })
    })

    $("#itemtable").on("click",".remove",function () {
        $(this).parents("tr").remove()
})



});

